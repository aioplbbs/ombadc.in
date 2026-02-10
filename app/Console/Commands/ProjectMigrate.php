<?php

namespace App\Console\Commands;

use App\Models\Project;
use Illuminate\Console\Command;

class ProjectMigrate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:project-migrate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $data = [
            // ["PR&DW", "Mega Rural Piped Water Supply Schemes for the districts of Keonjhar, Sundargarh, Mayurbhanj & Jajpur", 4472.73, 4097.229, 3968.82],
            // ["PR&DW", "Mega PWS to 285 villages in 04 blocks of Rourkela Division, Phase-III", 443.25, 294, 259.52],
            // ["PR&DW", "Mega PWS to Lephripda, Tangarpalli, Sundargarh, Bargaon, Subdega & Balisankara Block of Sundargarh Division", 554.58, 484.37, 484.37],
            // ["PR&DW", "Mega Pipe Water supply schemes in Mayurbhanj", 1578.31, 1021.12, 832.89],
            // ["PR&DW", "Mega PWS to 13 GPs of Kaptipada block", 149.91, 1021.12, 68.76],
            // ["PR&DW", "Single & Multi Village piped water supply projects for Rairangpur & Baripada RWSSS Divisions of Mayurbhanj", 856.87, 771.21, 681.03],
            // ["H&UD", "Augmentation of Water Supply to ULB's of Keonjhar, Sundargarh, Mayurbhanj & Jajpur districts", 20.35, 18.57, 18.57],
            // ["H&UD", "Drink from tap from 7 ULBs and Balance 7 ULBs without drink from tap Component.", 880.4, 836.38, 804.39],
            // ["S&ME", "Development of Infrastructure & other facilities in Elementary schools including KGBV's, Secondary Schools & 40 Odisha Adarsh Vidhyalayas (OAV's) across 4 districts.", 1495.6, 1226.96, 981.66],
            // ["S&ME", "Upgradation of Centre of Excellence and Science Laboratories in N.C. College, Jajpur", 15.2, 14.44, 13.98],
            // ["S&ME", "Development of Infrastructure & Quality Education in Secondary Schools (Phase-I)", 156, 156, 137.83],
            // ["S&ME", "Development of Infrastructure & Quality Education in Secondary Schools (Phase-II)", 533.4, 533.4, 452.55],
            // ["S&ME", "Infrastructure development and Quality education in 36 Odisha Adarsha Vidyalaya in 6 districts -Anugul, Dhenkanal, Deogarh, Jajpur, Jharsuguda and Mayurbhanj.\"", 489.53, 146.86, 143.74],
            // ["S&ME", "Development of Infrastructure & Quality Education in Secondary Schools (Phase-III)", 125.46, 125.46, 96.69],
            // ["S&ME", "Development of School Infrastructure and Quality Education in Secondary Schools under 5T Initiative -Phase IV", 150, 147.75, 103.53],
            // ["S&ME", "Const. of New Classroom Building at Madhupur Gada High School, Dharamshala, Jajpur", 4.89, 1.47, 0],
            // ["S&ME", "Const. of new higher secondary school classroom building at Dharmashala Mahavidyalaya, Dharmashala, Jajpur", 9.78, 2.93, 0],
            // ["SC&ST", "Development of Educational Infrastructure for SC & ST Students of SC & ST Department Schools", 61.34, 60.06, 49.41],
            // ["SC&ST", "Activities pertaining to Tribal Culture", 4.6, 4.37, 4.37],
            // ["HE", "Infrastructure Development in Maharaja Sriram Bhanja Deo University\"", 27.92, 19.48, 8.35],
            // ["SD&TE", "Modernization of Govt. ITI & Engineering Schools & Skill development of Tribal Youths.", 66.57, 60.35, 46.63],
            // ["SD&TE", "Construction of Academic Building & Library-cum-Research centre in the Govt. College of Engineering, Keonjhar by SD&TE Dept", 33.39, 33.39, 22.97],
            // ["SD&TE", "Improving Infrastructure & opening of Centre of Excellence (CoE) in Govt. ITIs & Polytechnics", 123.45, 86.44, 46.98],
            // ["SD&TE", "Establishment of CoE in Mining with AR/VR (simulation) Technology at Govt. ITI (Mining Skill Academy), Koira, Sundargarh", 12.2, 10.940000000000001, 6.61],
            // ["SD&TE", "Creation/upgradation of infrastructure of Technical, Vocational, and Educational Training (TVET) institutes in the OMBADC area for improving the employability of youth", 104.8, 31.44, 0],
            // ["SD&TE", "Conduct Life Skill Training for improving employability of youth under OMBADC districts", 2.7, 0.81, 0],
            // ["SD&TE", "Creation of infrastructure for establishment of industry led government ITI at Lakhanpur of Jharsuguda district under OMBADC for increasing employability of youth", 24.48, 7.34, 0],
            // ["SD&TE", "Skill Development Training and Placement of Youth from mining sector", 1.53, 0.45, 0],
            // ["A&FE", "Capacity Building for Experimental Model & Infrastructure development through OUAT", 146.92, 102.84, 39.51],
            // ["DSYS ", "Construction of Indoor Stadium across different ULBs in OMBADC districts", 104.15, 104.15, 93.79],
            // ["H&FW", "Upgradation of Infrastructure in Health Institutions.", 986.67, 675.31, 469.64],
            // ["H&FW", "Construction of 150 bedded MCH Hospital at Jajpur", 66.44, 65.32, 65.32],
            // ["H&FW", "Procurement of medical equipment for Health Institution in Mayurbhanj", 3.21, 3.2, 2.05],
            // ["H&FW", "Strengthening of Health System in Mayurbhanj district ", 36.76, 34.94, 20.44],
            // ["WCD", "Strengthening of Integrated Child Development Services.", 1380.57, 1026.1, 670.05],
            // ["WCD", "Mukhya Mantri Sampoorna Poosti Yojana (MSPY)", 589.46, 236.1, 83.54],
            // ["SSEPD", "Composite Rehabilitation Centre for persons with intellectual disabilities", 34.99, 23.5, 19.79],
            // ["SSEPD", "\"Construction of 03 no. of Composite Rehabilitation Centres in the districts of Keonjhar, Mayurbhanj and Sundergarh\"", 106.36, 74.45, 37.31],
            // ["F&ARD", "Livelihood Promotion through fisheries activities.  ", 36.94, 36.83, 36.45],
            // ["F&ARD", "Livelihood Promotion of tribals through Animal Husbandry.  ", 58.22, 48.38, 45.5],
            // ["FE&CC", "Livelihood promotion in 5 Forest Divisions of Ama Jungala Yojana (AJY)  ", 43.43, 39.52, 27],
            // ["Mission Shakti (OLM)", "Enhancing livelihoods of poor by leveraging strength of SHG and their Federation.", 34.78, 20.86, 16.06],
            // ["A&FE", "Horticulture activities", 14.11, 14.11, 12.85],
            // ["A&FE", "Livelihood Promotion and Skill Development through Horticulture Activities (II Phase)", 65.45, 65.44, 65.44],
            // ["A&FE", "Development of Mega Nursery in 04 districts", 11.71, 6.21, 4.4741],
            // ["HT&H", "Projects under Sericulture & Handloom sector for upliftment of Rural/Tribal farmers/Weavers", 51.64, 12.44, 7.6],
            // ["HT&H", "Livelihood generation opportunities through promotion of Handicrafts Sectors  ", 35.04, 24.5, 16.5],
            // ["Mission Shakti ", "Development of Mission Shakti Bhawan & Mission Shakti Village at Jajpur", 8, 7.6, 5.19],
            // ["RD", "Construction of all weather connectivity roads and  bridges across 4 mining affected districts.", 272.59, 259.56, 238.07],
            // ["RD", "Improvement & Construction of Roads and Bridges for unconnected habitations under Hemgir, Kutra and Rajgangpur blocks of Sundargarh District", 169, 148.89, 89.17],
            // ["RD", "Improvement and Construction of Roads in Ghasipura Constituency\"", 25, 17.49, 8.32],
            // ["RD", "Construction of 3 nos. Bridges under Pallahara Block of Angul District", 13.36, 13.35, 10.61],
            // ["RD", "Construction of all weather road from Bagnamara to Paramandpur Kasidiha via Uchasahi Road", 2.5, 1.75, 0.75],
            // ["R&B", "Improvement of Road under Pallahara & Kaniha Block of Angul District", 68.22, 20.47, 6.27],
            // ["FE&CC(SPCB)", "Installation of Continuous Ambient Air Quality Monitoring Stations (CAAQMS) & Continuous River Water Quality Monitoring Stations (CRWQMS).", 16.65, 12.17, 11.4],
            // ["A&FE", "Integrated Watershed Management Program & Water Harvesting Structures.", 10.13, 10.13, 10.13],
            // ["A&FE", "Integrated Watershed Management Program & Construction of Farm Pond", 110.72, 70.72, 58.6],
            // ["FE&CC", "Water Conservation through Soil & Moisture Conservation works.", 348.89, 247.61, 167.57],
            // ["FE&CC", "Creation of Green Belt in Mining prone areas of Odisha.", 200, 127.06, 116.62],
            ["H&UD", "Water bodies in 04 ULB's of 3 Districts.", 31.4, 18.84, 17.94],
        ];

        foreach($data as $record){
            Project::create([
                'department_id' => 28,
                'name' => $record[1],
                'sanctioned' => $record[2],
                'released' => $record[3],
                'utilized' => $record[4],
            ]);
        }

    }
}
