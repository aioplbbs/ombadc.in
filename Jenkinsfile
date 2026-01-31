pipeline {
    agent any

    stages {
        stage('Load ENV') {
            steps {
                script {
                    // Set environment variables
                    env.SFTP_HOST = "65.20.83.229"
                    env.SFTP_PATH = "public_html"
                    env.SFTP_UPLOAD_TYPE = "partial"
                }
            }
        }

        stage('Upload to SFTP') {
            steps {
                withCredentials([
                    usernamePassword(
                        credentialsId: 'ombadc.in',
                        usernameVariable: 'SFTP_USER',
                        passwordVariable: 'SFTP_PASS'
                    )
                ]){
                    script {
                        if (env.SFTP_UPLOAD_TYPE == "full") {
                            // First Time: Upload all files
                            sh """
                                lftp -u $SFTP_USER,'$SFTP_PASS' ftp://$SFTP_HOST -e "
                                    set ssl:verify-certificate no;
                                    mirror -R . $SFTP_PATH --overwrite --verbose --exclude .git --exclude .git/**;
                                    bye
                                "
                            """
                        } else {
                            // Subsequent Runs: Only changed files
                            sh """
                                #####git fetch origin main
                                CHANGED_FILES=\$(git diff --name-only HEAD~1 HEAD | grep -v '^.git/')
                                for FILE in \$CHANGED_FILES; do

                                    if [ -f "\$FILE" ]; then
                                        DIR=\$(dirname "\$FILE")
                                        lftp -u $SFTP_USER,'$SFTP_PASS' ftp://$SFTP_HOST -e "
                                            set ssl:verify-certificate no;
                                            mirror -R \$DIR \$SFTP_PATH/\$DIR --overwrite --verbose --only-newer --exclude .git --exclude .git/** --include-glob=\$(basename "\$FILE");
                                            bye
                                        "
                                    fi
                                done
                            """
                        }
                    }
                }
            }
        }
    }
}
