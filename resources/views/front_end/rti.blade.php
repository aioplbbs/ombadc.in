<x-front-layout :menus="$menus" :departments="$departments">
        
    @push('style')
    <link rel="apple-touch-icon" sizes="57x57" href="favicon/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="favicon/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="favicon/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="favicon/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="favicon/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="favicon/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="favicon/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="favicon/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192" href="favicon/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="favicon/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://www.ombadc.in/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://www.ombadc.in/assets/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" href="https://www.ombadc.in/assets/css/plugins.css">
	<link rel="stylesheet" href="https://www.ombadc.in/assets/css/style.css">
	<link rel="stylesheet" href="https://www.ombadc.in/assets/css/owl.css">
	<link href="https://www.ombadc.in/assets/css/all.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://www.ombadc.in/assets/css/owl.theme.default.css" />
	<link href="https://www.ombadc.in/assets/css/fsscroller.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="https://www.ombadc.in/assets/css/rti.css">
    @endpush
    <section class="section banner">
		<div class="bg-banner" style="background-image: url('https://www.ombadc.in/images/innerbanner/history.jpg');background-size: cover;">
			<div class="b-title">
				<ul class="b-menu">
					<li class="b-item"><a href="{{ route('home') }}">Home</a></li>
					<li class="b-item"><a class="active">RTI</a></li>
				</ul>
				<h3>RTI</h3>
			</div>
		</div>
	</section>
    <section class="header" style=" background: linear-gradient(to left, #dce35b, #45b649);  line-height: 28px;
        margin-bottom: 16px;
        margin-top: 18px;
        padding-bottom: 4px;
        border-bottom: 1px solid #CCC; padding: 0 10%;">
		<div class="container py-4"
    >
		<h4 class="ombadc" style="text-align: center;
            color: black;
            font-size: 32px;
            text-: 0px 1px 0px #000;
            font-weight: 600;
            text-decoration: underline;"
        >Odisha Mineral Bearing Areas Development Corporation (OMBADC)</h4>	
        <p class="ombadc_p" style="text-align: center;color: black;padding-bottom: 20px; font-size: 16px;">
            Aranya Bhawan, 1st Floor, GD-2/12 Chandrasekharpur, Bhubaneswar,751023, Odisha 
        </p>
        <div class="row">
			<div class="col-md-3">
			    <!-- Tabs nav -->
				<div class="nav flex-column nav-pills nav-pills-custom" id="v-pills-tab" role="tablist" aria-orientation="vertical">
					<a class="nav-link mb-1 active" id="v-pills-home-tab" data-toggle="pill" href="#001" role="tab" aria-controls="v-pills-home" aria-selected="true">
						<span class="font-weight-bold small " href="#001">1. About the Organization</span>
                    </a>
					<a class="nav-link mb-1 " id="v-pills-profile-tab" data-toggle="pill" href="#002" role="tab" aria-controls="v-pills-profile" aria-selected="false">
						<span class="font-weight-bold small " href="#002">2. Powers and Duties</span>
                    </a>
					<a class="nav-link mb-1 " id="v-pills-messages-tab" data-toggle="pill" href="#003" role="tab" aria-controls="v-pills-messages" aria-selected="false">
						<span class="font-weight-bold small ">3. Decision Making Process</span>
                    </a>
					<a class="nav-link mb-1 " id="v-pills-settings-tab" data-toggle="pill" href="#004" role="tab" aria-controls="v-pills-settings" aria-selected="false">
						<span class="font-weight-bold small ">4. Norms for Discharge of Functions</span>
                    </a>
					<a class="nav-link mb-1 " id="v-pills-profile-tab" data-toggle="pill" href="#005" role="tab" aria-controls="v-pills-profile" aria-selected="false">
						<span class="font-weight-bold small ">5. Rules & Regulations</span>
                    </a>
					<a class="nav-link mb-1 " id="v-pills-messages-tab" data-toggle="pill" href="#006" role="tab" aria-controls="v-pills-messages" aria-selected="false">
						<span class="font-weight-bold small ">6. Categories of Documents</span>
                    </a>
					<a class="nav-link mb-1  " id="v-pills-settings-tab" data-toggle="pill" href="#007" role="tab" aria-controls="v-pills-settings" aria-selected="false">
						<span class="font-weight-bold small ">7. Formulation of Policy</span>
                    </a>
					<a class="nav-link mb-1  " id="v-pills-profile-tab" data-toggle="pill" href="#008" role="tab" aria-controls="v-pills-profile" aria-selected="false">
						<span class="font-weight-bold small ">8. Boards/ Councils/ Committees</span>
                    </a>
					<a class="nav-link mb-1  " id="v-pills-messages-tab" data-toggle="pill" href="#009" role="tab" aria-controls="v-pills-messages" aria-selected="false">
						<span class="font-weight-bold small ">9. Directory of Officers & Employees</span>
                    </a>
					<a class="nav-link mb-1  " id="v-pills-settings-tab" data-toggle="pill" href="#010" role="tab" aria-controls="v-pills-settings" aria-selected="false">
						<span class="font-weight-bold small ">10.Remuneration & Compensation</span>
                    </a>
					<a class="nav-link mb-1  " id="v-pills-profile-tab" data-toggle="pill" href="#011" role="tab" aria-controls="v-pills-profile" aria-selected="false">
						<span class="font-weight-bold small ">11. Budget Provision</span>
                    </a>
					<a class="nav-link mb-1  " id="v-pills-messages-tab" data-toggle="pill" href="#012" role="tab" aria-controls="v-pills-messages" aria-selected="false">
						<span class="font-weight-bold small ">12. Schemes & Programmes</span>
                    </a>
					<a class="nav-link mb-1  " id="v-pills-settings-tab" data-toggle="pill" href="#013" role="tab" aria-controls="v-pills-settings" aria-selected="false">
						<span class="font-weight-bold small ">13. Concessions & Permits</span>
                    </a>
					<a class="nav-link mb-1  " id="v-pills-profile-tab" data-toggle="pill" href="#014" role="tab" aria-controls="v-pills-profile" aria-selected="false">
						<span class="font-weight-bold small ">14. Information in Electronic Form</span>
                    </a>
					<a class="nav-link mb-1  " id="v-pills-messages-tab" data-toggle="pill" href="#015" role="tab" aria-controls="v-pills-messages" aria-selected="false">
						<span class="font-weight-bold small ">15. Facilities for Citizens</span>
                    </a>
					<a class="nav-link mb-1  " id="v-pills-settings-tab" data-toggle="pill" href="#016" role="tab" aria-controls="v-pills-settings" aria-selected="false">
						<span class="font-weight-bold small ">16. PIOs Details</span>
                    </a>
					<a class="nav-link mb-1  " id="v-pills-profile-tab" data-toggle="pill" href="#017" role="tab" aria-controls="v-pills-profile" aria-selected="false">
						<span class="font-weight-bold small ">17. Other Information</span>
                    </a>
				</div>
			</div>
			<div class="col-md-9">
				<!-- Tabs content -->
				<div class="tab-content" id="v-pills-tabContent">
					<div class="tab-pane fade  rounded bg-white show active" id="001" role="tabpanel" aria-labelledby="v-pills-home-tab">
						<h4 class="history_bg">Aim & Objectives of the Organization:</h4>
						<p class="history_p pt-15">
							The Company is a Special Purpose Vehicle (SPV) incorporated for undertaking, inter alia, Projects/ works for tribal welfare and area development so as to promote inclusive growth in the mineral bearing areas of the State as per the scheme prepared by the Government of Odisha and approved by the Supreme Court of India in IA No. 2746-48, 2862, 2941, 3629 and 3721 in W.P(c) No.202 of 1995 in its order dated 27th January 2014 and 28th April 2014.
						</p>
						<br>
						<h4 class="history_bg">History & Background of its Establishment:</h4>
						<h6 class="pt-15">Introduction:</h6>
						<p class="history_p">
							“ Shri T N Godavaram Thirumulapad was a member of the princely Nilambar Kovilakam family in the Malabar region of Kerala. He had initiated, what turned out to be a landmark intervention by the Hon’ble Supreme Court to protect India’s forests. He was the genesis behind the Writ Petition (Civil) No. 202 of 1995.”<br><br>
							It all started in September 1995, when Godavaram Thirumulapad was distressed on seeing the destruction of the wooden area in Gudalurin the Nilgiris, Tamilnadu. These wooden areas, Janmam Lands (absolute proprietary lands) of the Nilambar Kovilakam had been taken over by the State of Kerala following the enactment of the Gudalur Janmam Estates (Abolition and Conversion into Ryotwari) Act of 1969. Since the government was unable to protect the forest as illegal felling was on the rise, Godavaram Thirumulapad filed a writ petition in the Supreme Court which was enlisted as Writ Petition (Civil) No. 202 of 1995. The Hon’ble Court immediately took cognizance of the matter and on Dec 12, 1996 passed an interim order directing tree felling and non forest activities in forests across the country be stopped. This order had a large scale impact across the country and was followed by more than a thousand Interlocutory Applications (IAs) filed covering issues like mining in forest areas, tree felling, management of protected areas and encroachment.<br><br>
							In response to the raising no. of IAs and the technical nature of issues involved, the Hon’ble Court ordered for the constitution of an expert committee, The Central Empowered Committee (CEC) in May 2002. In September 2002, the CEC was notified as a statutory committee with wide ranging powers to deal with pending IAs, hear fresh applications and pass orders in consonance with the Hon’ble Supreme Court. A new pattern in the administration of forests had been set up. The case is still open but not under active hearing and the CEC continues as a statutory body.<br><br>
							Another major incident that took place was the setting up of the Shah Commission by the Union Ministry of Mines in 2010 to investigate the illegal mining of iron ore and manganese in the country. The Commission’s report revealed a sort of scam in Odisha and exposed that illegal mining of iron ore and manganese has caused a loss of Rs. 59,203 Crore to the state’s exchequer and recommended that the state government should recover this money as soon as possible. The recovered amount should be used for the development of two districts- Keonjhar and Sundargarh because these were the two districts badly affected by illegal excess mining and destruction of large tracts of forests. The CEC was asked to rationalize the Net Present Value (NPV) of the natural resources like forest as well as the illegally mined minerals.<br><br>
							In the month of April 2010, the CEC recommended for use of 50% of additional NPV through a Special Purpose Vehicle (SPV) for undertaking specific tribal welfare and area development works to ensure inclusive growth of the mineral bearing areas. The Hon’ble Court approved this proposal and asked the Govt. of Odisha to comply with the recommendations of the CEC. On 27th January 2014, the Hon’ble Supreme Court passed another judgement which said- "50% of the additional amounts of Net Present Value (NPV) recovered by the State of Odisha from the mining lessees will be used by the State of Odisha through a Special Purpose Vehicle (SPV) for undertaking specific tribal welfare and area development works so as to ensure inclusive growth of the mineral bearing areas. The State of Odisha will accordingly file within four weeks from today; a comprehensive plan for the development of tribal’s out of the aforesaid funds, taking into consideration their requirements of health, education, communication, recreation, livelihood and cultural lifestyle as indicated in this Court’s judgment.<br><br>
						</p>
						<h4 class="history_bg">Establishment of OMBADC:</h4>
						<p class="history_p pt-15">
							The CEC made a visit to Odisha in March 2014 and advised the State government to furnish a scheme on the Special Purpose Vehicle for their reference and filing before the Hon’ble Supreme Court. In response to the advice of the CEC, the state government vide letter no. 10 F (L) 19/2013(pt) dated 29/03/2014 submitted the scheme for filing before the Hon’ble Supreme Court.<br><br>
							The scheme proposed by the Govt. of Odisha was accepted by the Hon’ble court on 28th April 2014 and its judgement said that –
							“We have perused the Scheme prepared by the State Government of Odisha and the recommendation of the Central Empowered Committee and we approve the Scheme and direct Ad-hoc CAMPA to transfer to the SPV 50 per cent of the additional amount of the NPV within a month for undertaking tribal welfare development works.”<br><br>
							“The State Government has earlier, registered a Society, namely, Society for Inclusive Development of Mineral Bearing Areas of Odisha, which has been registered vide registration number 23354/74 of 2011-12 under the Societies Registration Act, 1860 to act as SPV for the purpose. It is now proposed to wind up the said Society and to replace it with ‘Odisha Mineral Bearing Areas Development Corporation’ to be set up under section 25 of the Companies Act.” as an SPV.<br><br>
							Finally, Odisha Mineral Bearing Areas Development Corporation (OMBADC) was registered as a Section-8 company under the Companies Act of 2013 at the Registrar of Companies, Cuttack on 2nd December 2014 and is categorized as Company limited by shares (Public Limited Company) as well as a State government Company.
						</p>
					</div>
					<!-- 001 -->
					<div class="tab-pane fade  rounded bg-white" id="002" role="tabpanel" aria-labelledby="v-pills-profile-tab">
						<h4 class="history_bg">A. General Manager Operation :</h4>
						<ol class="ol_style">
							<li>He will co-ordinate with the line department like health & family welfare, A&FE Dept, F&E Dept. F&ARD Dept., Pollution Control Board, Skill Development Dept. and RD Dept. for their project submission, DPR Preparation. Approval by the Board and Oversight Authority and supervision of the projects.</li>
							<li>He will ensure scrutiny of project proposals and evaluate periodically with assistance of PMU the effectiveness of project implementation in consonance with objectives of OMBADC.</li>
							<li>He will monitor the functioning of PMU of OMBADC.</li>
							<li>He will deal with manpower agency of the corporation and keep record of performance of the personnel engaged through service provider or other agency.</li>
							<li>He will look after the website development of the board and update the information periodically.</li>
							<li>He will monitor the submission of the report and returns by line department through Nodal officers and conduct periodical review meeting in consultation with CEO, OMBADC.</li>
							<li>He will ensure periodical report compilation such as QPR, HPR and Annual report etc as and when required. He will supervise the presentations for BOD and OA.</li>
							<li>He will process the procurement and purchase the stock and store articles with approval of CEO which will be attended by GM Finance for payment and stock entry.</li>
							<li>He will co-ordinate with PCCF&HOFF, Odisha in for utilising the office space and annual payment of different cess for services provided by him at Aranya Bhawan, where OMBADC is located. He will resolve any issues relating to Aranya Bhawan.</li>
							<li>He will coordinate with other General Managers in case of overlapping functions.</li>
							<li>He will discharge any additional duties as may be entrusted by CEO, OMBADC from time to time.</li>
						</ol>
						<h4 class="history_bg">B. General Manager Administration :</h4>
						<ul class="ol_style">
							<li>He will be over all responsible for the establishment and administrative functions of OMBADC.</li>
							<li>He will deal with all personnel files of officials of OMBADC deputed to the corporation and discharge the liability of the corporation on account of their deputation to OMBADC under Foreign Service condition.</li>
							<li>To keep record of attendance, leave and other service matters of employees of the corporation including members of PMU.</li>
							<li>To formulate and adopt the establishment the establishment rules of the corporation and to liaison with the government on establishment matters.</li>
							<li>To prepare the draft affidavits for court cases in Supreme Court and other lower courts and settle other legal issues related to the OMBADC.</li>
							<li>He will co-ordinate with the line department like PR&DW Dept; Housing & Urban Development, school & Mass Education Department, W&CD Dept, SC&ST Development Dept. for their project submission ,Approval, DPR preparation, and supervise the project implementation.</li>
							<li>He will ensure scrutiny of project proposals and evaluate periodically with assistance of PMU the effectiveness of project implementation in consonance with objective of OMBADC.</li>
							<li>He will monitor the submission of the report and returns by line departments through Nodal officers and conduct periodical review meetings in consultation with CEO, OMBADC.</li>
							<li>He will organise periodic review meeting /Board meeting in consultation with CEO.</li>
							<li>He will maintain the records of manpower agency of the corporation and keep record of performance of the personal engaged through service provider and ensure timely submission of their bills for entitlements.</li>
							<li>He will ensure timely submission of bills and TE bills for officials, OSDs, PMU etc.</li>
							<li>He will ensure deployment of vehicle to officials of OMBADC and provide a pool vehicle for office business. All the hired vehicles should have secretariat pass for smooth official business with various line departments.</li>
							<li>He will notify all statutory notifications of the company from time to time.</li>
							<li>He will comply the observations made by Board of Directors or over sight Authority as and when required.</li>
							<li>He will prepare the Expression of interest for different service provider, travel agent/tour operator or manpower agency. He will submit the draft tender notice as and when required.</li>
							<li>He will coordinate with other General Managers in case of overlapping functions.</li>
							<li>He will discharge any additional duties as may be entrusted by CEO, OMBADC from time to time.</li>
						</ul>
						<h4 class="history_bg">C. The General Manager Finance :</h4>
						<ul class="ol_style">
							<li>He will be in over all responsible of finance and Accounting functions of OMBADC including but not limited to the following duties and responsibilities.</li>
							<li>To advice the CEO to manage the funds of the OMBADC in efficient and effective manner so as to earn maximum interest to the corporation.</li>
							<li>He will make liaison with banks, treasury and finance Department.</li>
							<li>He will prepare the Annual Operational Expenses Budget for efficient release of money to meet administrative expenses of OMBADC and project expenses by line department against approved projects</li>
							<li>He will prepare the monthly and Annual Accounts of the corporation in Tally ERP 9.0 and maintain proper accounts and records as per statutory requirements.</li>
							<li>He will attend all the Income tax matters and appear before the IT authorities as and when required in consultation with income tax experts of OMBADC.</li>
							<li>He will attend to the statutory Auditors, Auditors of C&AG of India, AG Odisha and submit reply to the observation of auditors.</li>
							<li>He will supervise and monitor the activities of the Internal Auditors appointed for the OMBADC and obtain the reports for appraisal of Board of the company</li>
							<li>To examine the financial clauses of all tenders floated, the agreements signed by the corporation.</li>
							<li>To discharge the function as a Drawing and Disbursement officer and to prepare pay rolls of the staff of OMBADC, PMU etc. and maintain the cash book and Bank statements.</li>
							<li>He will maintain stock and store of the corporation and report on depreciation in value of the store article as and when required.</li>
							<li>He will ensure statutory deduction of all taxes from the bills raised by OMBADC.</li>
							<li>He will monitor submission of periodical and Annual Utilisation certificate in prescribed format by Line Department.</li>
							<li>He will ensure timely release of fund to project implementing agencies of line department to augment project expenditure after observing statutory compliances.</li>
							<li>He will coordinate with other General Manager in case of overlapping functions.</li>
							<li>He will discharge any additional duties as may be entrusted by CEO, OMBADC from time to time.</li>
						</ul>
						<h4 class="history_bg">D. Duties & Responsibility of Company Secretary :</h4>
						<ul class="ol_style">
							<li>The company secretary during his employment with the OMBADC shall perform the duties and exercise the powers which the Company may from time to time properly assign to him in his capacity as Company Secretary or in connection with the business.</li>
							<li>The employee will be responsible for efficient and effective discharge of all functions in the Company as required by the CEO/Directors from time to time.</li>
							<li>The function and duties of Company Secretary (Employee) shall include.
								<ul class="ol_style1">
									<li>To report to the Board about compliance with the provisions of the new Act, the rules made there under and other laws applicable to the company.</li>
									<li>To ensure that the company complies with the applicable secretarial standards.</li>
									<li>To provide to the directors of the company, collectively and individually, such guidance as them a require, with regard to their duties , responsibility and powers.</li>
									<li>To facilitate the convening of meeting and attend board , committee and general meeting and maintain the minutes of these meetings.</li>
									<li>To obtain approvals from the Board, general netting ,the Government and such other authorities as required and under the provisions of the Act.</li>
									<li>To represent before various regulators , and other authorities under the Act in connection with discharge of various duty's under the Act.</li>
									<li>Board in the conduct of the affairs of the company.</li>
									<li>To assist and advice the Board in ensuring good corporate governance and in complying with the corporate governance requirements and best practices.</li>
									<li>To discharge such other duties as have been specified under the Act and rules.</li>
									<li>Such others duties as maybe the Board from time to time.</li>
									<li>Maintaining all the statutory and non-statutory essential registers , book , files ,records, papers , etc.</li>
									<li>Preparing and filing with the registrar of Companies and other consult authorities the reports, returns , documents , papers etc. Complete in all respects and with in the prescribed periods of time.</li>
									<li>Advice then General Manager , Finance in the Income Tax Act / GST for filing the quarterly and annual returns of OMBADC after making scrutiny of the Finance and account related documents / files available with the finance and accounts section.</li>
									<li>For caring out the instructions , directions and advice of the Board of Directors / Chairman / CEO / of the OMBADC given to him time to time, discharge the duties as per the Companies Act 2013.</li>
								</ul>
							</li>
							<li>To Company Secretory will be authorize to Act/ sign documents / appear before any judicial or quasi-judicial authority on behalf of the OMBADC.It is expected to him that he will do / commit / signed any document strictly in the interest of the establishment and within the preview of law. In case he commits any breach of trust or privilege in such discharge of his duty, he will personally liable for the consequence of such acts and omissions.</li>
						</ul>
						<h4 class="history_bg">E. Roles and responsibilities of PMU :</h4>
						<ul class="ol_style">
							<li>Working in close coordination with OMBADC Cells at the district level as well as with the relevant stakeholders at the village, gram panchayat and block level, identify/assess critical existing need gaps and then make a priority for taking suitable interventions. OMBADC will help in coordination works with the above-mentioned stakeholders.</li>
							<li>Rolling out annual implementation plans of the already approved and under implementation projects. Annual implementation plan needs to be prepared at the beginning of financial year containing detail actions, timelines, cost estimates along with the implementing agency.</li>
							<li>Work in close coordination with the OMBADC Cells at the district level and ensure proper monitoring of all the projects against agreed outcomes.</li>
							<li>Designing formats for DPR, MoUs /Agreements/ notices/ Reports/ communications, wherever required, for any activity relating to implementation of the scheme</li>
							<li>Evaluation and Analysis of the project reports of the implementing agencies such as DPR Evaluation, Funds release request of subsequent installment, withdrawal request and any other task as per the direction of OMBADC from time to time.</li>
							<li>Seek synergies and convergence with various line departments to avoid duplicity at the field level.</li>
							<li>In consultation of the OMBADC Cell members at district level, identify, design and promote innovativ<br>e solutions through field level pilot interventions, especially in the areas of livelihoods, education, skill development and healthcare and adopt best practices from various sectors and geographies to the district.</li>
							<li>To maintain various available communication media such as the OMBADC website and Twitter account, assist in conveying the effectiveness of OMBADC’s activities on the lives and livelihoods of the mining affected communities and encourage such communities to take ownership of such interventions to ensure sustainability in the long run.</li>
							<li>Preparation of policy briefs, documentation of lessons learnt and impact assessment reports as per the requirement of the project.</li>
							<li>Drafting of Reports/ Presentations and generating data of various forms/kinds as per the requirement of the Government/Courts from time to time.</li>
							<li>Assist OMBADC in the entire procurement cycle for different projects to be implemented in the area.</li>
							<li>Assist OMBADC in conducting various capacity building activities and knowledge management on the objectives and guidelines of OMBADC for different stakeholders.</li>
							<li>Technical and Facilitation assistance to the OMBADC in its interactions with external stakeholders, various state government departments as well as national governments.</li>
							<li>From the Perspective plan, rolling out annual implementation plans need to be prepared at the beginning of financial year containing detail actions, timelines, cost estimates along wit the implementing agency.</li>
							<li>Parallelly liaison with Line departments and their field level offices to seek proposals that have already been developed and then evaluate such proposals for their effectiveness.</li>
							<li>Having created and or received a shelf of projects, create plans for implementation and monitor against agreed outcomes.</li>
						</ul>
					</div>
					<!-- 002 -->
					<div class="tab-pane fade  rounded bg-white" id="003" role="tabpanel" aria-labelledby="v-pills-messages-tab">
						<table class="table table-bordered" style="--bs-table-border-color: black;">
							<thead>
								<tr>
									<th>Sl.</th>
									<th>Activity</th>
									<th>Level of Action</th>
									<th>Time Frame</th>
								</tr>
							</thead>
							<tbody style="color: black; font-size:13px;">
								<tr>
									<td>1</td>
									<td style='vertical-align:middle'>To receive a letter and put a diary no.</td>
									<td>Concerned DEO/Assistant</td>
									<td>Same day</td>
								</tr>
								<tr>
									<td>2</td>
									<td style='vertical-align:middle'>Letters to reach the concerned section / PMU through proper channel</td>
									<td>Respective GM</td>
									<td>01 day</td>
								</tr>
								<tr>
									<td>3</td>
									<td style='vertical-align:middle'>To process the paper under correspondence</td>
									<td>Admin. Assistant</td>
									<td>2-3 days</td>
								</tr>
								<tr>
									<td>4</td>
									<td style='vertical-align:middle'>Scrutiny by concerned Section Officer / PMU member</td>
									<td>Respective Expert</td>
									<td>02 days</td>
								</tr>
								<tr>
									<td>5</td>
									<td style='vertical-align:middle'>Scrutiny by Team leader - PMU</td>
									<td>Team leader - PMU</td>
									<td>02 day</td>
								</tr>
								<tr>
									<td>6</td>
									<td style='vertical-align:middle'>Disposal / scrutiny by GMs</td>
									<td>Respective GM</td>
									<td>01 day</td>
								</tr>
								<tr>
									<td>7</td>
									<td style='vertical-align:middle'>Disposal / scrutiny by CEO</td>
									<td>CEO</td>
									<td>01 day</td>
								</tr>
								<tr>
									<td>8</td>
									<td style='vertical-align:middle'>Return to respective Section after disposal by the final authority</td>
									<td>Admin. Assistant</td>
									<td>Should be routed back through same channel in same day for further action</td>
								</tr>
							</tbody>
						</table>
					</div>
					<!-- 003 -->
					<div class="tab-pane fade  rounded bg-white " id="004" role="tabpanel" aria-labelledby="v-pills-settings-tab">
						<table class="table table-bordered" style="--bs-table-border-color: black;">
							<thead>
								<tr>
									<th>Sl.</th>
									<th>Activity</th>
									<th>Time Frame/ Norm</th>
									<th>Remarks</th>
								</tr>
							</thead>
							<tbody style="color: black; font-size:13px;">
								<tr>
									<td>1</td>
									<td style='vertical-align:middle'>Diary of letter</td>
									<td>5 minutes per letter</td>
									<td>-</td>
								</tr>
								<tr>
									<td>2</td>
									<td style='vertical-align:middle'>Dispatch of letter</td>
									<td>5 minutes per letter</td>
									<td>Registered Dak including entry in messenger book</td>
								</tr>
								<tr>
									<td>3</td>
									<td style='vertical-align:middle'>Typing Job</td>
									<td>30 pages per day</td>
									<td>English only</td>
								</tr>
								<tr>
									<td rowspan="2" width="6%">4</td>
									<td rowspan="2" width="45%" style='vertical-align:middle'>Docketing / initiating
										primary not by Dealing Asst.
                                    </td>
									<td width="27%">3 days from the date receipt of P.U.C.</td>
									<td width="21%">In case of normal correspondence</td>
								</tr>
								<tr>
									<td width="27%">On same day NB: if P.C is not available may take more time</td>
									<td width="21%">In case of very important correspondence </td>
								</tr>
								<tr>
									<td rowspan="2" width="6%">5</td>
									<td rowspan="2" width="45%" style='vertical-align:middle'>Next higher authority</td>
									<td width="27%">May take 07 days for final order</td>
									<td width="21%">In case of normal correspondence</td>
								</tr>
								<tr>
									<td width="27%">May take two days NB : if P.C is not available may take more time</td>
									<td width="21%">In case of very important correspondence</td>
								</tr>
								<tr>
									<td>6</td>
									<td style='vertical-align:middle'>Scrutiny of Plan, Scheme, Projects and Preparation of reports, etc</td>
									<td>One month of time</td>
									<td>-</td>
								</tr>
							</tbody>
						</table>
					</div>
					<!-- 004 -->
					<div class="tab-pane fade  rounded bg-white " id="005" role="tabpanel" aria-labelledby="v-pills-profile-tab">
						<table class="table table-bordered" style="--bs-table-border-color: black;">
							<thead>
								<tr>
									<th>Sl.</th>
									<th>Name of the Act, Rules, Regulations etc.</th>
									<th>Download</th>
								</tr>
							</thead>
							<tbody style="color: black; font-size:13px;">
								<tr>
									<td>1</td>
									<td>Article of Association</td>
									<td><a href="https://www.ombadc.in/images/documents/docs_1721648934.PDF"><i class="fa-solid fa-download"></i></a></td>
								</tr>
								<tr>
									<td>2</td>
									<td>Memorandum of Association</td>
									<td><a href="https://www.ombadc.in/images/documents/docs_1721648706.PDF"><i class="fa-solid fa-download"></i></a></td>
								</tr>
								<tr>
									<td>3</td>
									<td>Guidelines for Project Financing, Implementation and Monitoring</td>
									<td>
                                        <a href="https://www.ombadc.in/images/documents/docs_1721648869.PDF"><i class="fa-solid fa-download"></i></a>
										<a href="https://www.ombadc.in/images/documents/docs_1721648487.pdf"><i class="fa-solid fa-download"></i></a>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<!-- 005 -->
					<div class="tab-pane fade  rounded bg-white " id="006" role="tabpanel" aria-labelledby="v-pills-messages-tab">
						<table class="table table-bordered" style="--bs-table-border-color: black;">
							<thead>
								<tr>
									<th>Sl.</th>
									<th>Name of Record</th>
									<th>Details of Information Available</th>
									<th>Unit/ Section where Available</th>
								</tr>
							</thead>
							<tbody style="color: black; font-size:13px;">
								<tr>
									<td rowspan="5">1</td>
									<td rowspan="5">Files, Records, Information</td>
									<td>All Project files with Detailed Project Reports submitted by various Line Departments, Quarterly Progress Reports</td>
									<td>-</td>
								</tr>
								<tr>
									<td>Files pertaining to Annual Accounts, Financial Audit, Statutory Audit etc.</td>
									<td>-</td>
								</tr>
								<tr>
									<td>Files related to Annual General Meeting, BoD Meetings, Oversight Authority Meetings & other reviews with line departments.</td>
									<td>-</td>
								</tr>
								<tr>
									<td>Files related to issue of Sanction Orders, Release Orders, Utilisation Certificates etc.</td>
	 								<td>-</td>
								</tr>
								<tr>
									<td>Income Tax related records</td>
									<td>-</td>
								</tr>
							</tbody>
						</table>
					</div>
					<!-- 006 -->
					<div class="tab-pane fade  rounded bg-white " id="007" role="tabpanel" aria-labelledby="v-pills-settings-tab">
						<br><br><br>
						<h4>All policies as regards to OMBADC is Subject to approval of Board of Directors followed by concurrence of Oversight Authority.</h4>
						<br><br><br>
					</div>
					<!-- 007 -->
					<div class="tab-pane fade  rounded bg-white " id="008" role="tabpanel" aria-labelledby="v-pills-profile-tab">
						<ol style="color: black; font-size:13px;">
							<li class="name_b">
                                Shri Manoj Ahuja <br />
                                <span class="name_p"> IAS, Chief Secretary cum Chairman OMBADC</span>
							</li>
							<li class="name_b">
                                Smt. Anu Garg <br /> 
                                <span class="name_p">IAS, Development Commissioner-cum-Additional Chief Secretary, P & C Dept</span>
							</li>
							<li class="name_b">
                                Shri Satyabrata Sahu <br />
                                <span class="name_p"> IAS, Additional Chief Secretary, Revenue and Disaster Management Dept.</span>
							</li>
							<li class="name_b">
                                Shri Girish S.N.<br />
								<span class="name_p"> IAS, Commissioner-cum-Secretary to the Panchayati Raj and Drinking Water Department</span>
							</li>
							<li class="name_b">
                                Shri Saswat Mishra<br />
								<span class="name_p">IAS, Principal Secretary, Finance Department</span>
							</li>
							<li class="name_b">
                                Shri Rohita Kumar Lenka<br />
								<span class="name_p">IFS, Chief-Executive-Officer, OMBADC</span>
							</li>
							<li class="name_b">
                                Shri Suresh Pant<br />
								<span class="name_p">IFS, Principal Chief Conservator of Forest & HoFF, Odisha</span>
							</li>
							<li class="name_b">
                                Shri Surendra Kumar<br />
								<span class="name_p">IAS, Additional Chief Secretary, Steel and Mines Dept</span>
							</li>
							<li class="name_b">
                                Shri Sanjeeb Kumar Mishra<br />
								<span class="name_p">Principal Secretary of ST & SC Development, Minorities & Backward Classes Welfare Department</span>
							</li>
							<li class="name_b">
                                TBN 1 <br />
								<span class="name_p">Independent Director </span>
							</li>
							<li class="name_b">
                                TBN 2<br />
								<span class="name_p">Independent Director </span>
							</li>
							<li class="name_b">
                                TBN 3<br />
                                <span class="name_p">Independent Director </span>
							</li>
							<li class="name_b">
                                TBN 4 <br />
								<span class="name_p">Independent Director </span>
							</li>
							<li class="name_b">
                                TBN 5<br />
								<span class="name_p">Independent Director </span>
							</li>
							<li class="name_b">
                                TBN 6<br />
								<span class="name_p">Independent Director </span>
							</li>
						</ol>
					</div>
					<!-- 008 -->
					<div class="tab-pane fade  rounded bg-white " id="009" role="tabpanel" aria-labelledby="v-pills-messages-tab">
						<table class="table table-bordered" style="--bs-table-border-color: black;">
                            <thead>
                                <tr>
                                    <th>Sl.</th>
                                    <th>Name</th>
                                    <th>Designation</th>
                                    <!-- <th>Mobile No.</th> -->
                                    <th>E-Mail</th>
                                </tr>
                            </thead>
                            <tbody style="color: black; font-size:13px;">
                                <tr>
                                    <td colspan="4" style="font-weight: bold;">OMBADC OFFICIALS</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Shaikh Naimuddin</td>
                                    <td>OSD to OA</td>
                                    <!-- <td>9717866988</td> -->
                                    <td>ShaikhNaimuddin1@Yahoo.com</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Dwaipayan Pattnaik</td>
                                    <td>OSD-II to OA</td>
                                    <!-- <td>8895351519</td> -->
                                    <td>dwaipayanpattanaik@gmail.com</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>&nbsp;</td>
                                    <td>General Manager (Admin)</td>
                                    <!-- <td></td> -->
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Jayanta Kumar Das</td>
                                    <td>General Manager (Operations)</td>
                                    <!-- <td>9437576447</td> -->
                                    <td>jkdascuttack@gmail.com</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Bhabani Prasad Das</td>
                                    <td>General Manager (Finance)</td>
                                    <!-- <td>7008696438</td> -->
                                    <td>bdash16@gmail.com</td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>Purna Chandra Gouda</td>
                                    <td>PA to CEO</td>
                                    <!-- <td>9937705601</td> -->
                                    <td>pshome1984@gmail.com</td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>Santosh Kumar Nanda</td>
                                    <td>Junior Assistant</td>
                                    <!-- <td>7008972396</td> -->
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>8</td>
                                    <td>Swati Swagatika Pratihari</td>
                                    <td>Company Secretary</td>
                                    <!-- <td>8093340001</td> -->
                                    <td>swati.pratihari1@gmail.com</td>
                                </tr>
                                <tr>
                                    <td>9</td>
                                    <td>Aditya Mohan Pradhan</td>
                                    <td>Skill Development Expert</td>
                                    <!-- <td>9599806326</td> -->
                                    <td>aditya.ombadc@gmail.com</td>
                                </tr>
                                <tr>
                                    <td colspan="4" style="font-weight: bold;">PMU</td>
                                </tr>
                                <tr>
                                    <td>10</td>
                                    <td>Ambuj Prasad</td>
                                    <td>Team Leader</td>
                                    <!-- <td>8084152573</td> -->
                                    <td>prasad.ambuj@gmail.com</td>
                                </tr>
                                <tr>
                                    <td>11</td>
                                    <td>Abhigyan Prakash</td>
                                    <td>MIS Expert</td>
                                    <!-- <td>8509198415</td> -->
                                    <td>abhigyan.mis.odisha@gmail.com</td>
                                </tr>
                                <tr>
                                    <td>12</td>
                                    <td>Jagannath Mishra</td>
                                    <td>Livelihood Expert</td>
                                    <!-- <td>9861642229</td> -->
                                    <td>jjnmishra8@gmail.com</td>
                                </tr>
                                <tr>
                                    <td>13</td>
                                    <td>Jeeban Jyoti</td>
                                    <td>Water Supply &amp; Sanitation Expert</td>
                                    <!-- <td>9777818516</td> -->
                                    <td>jyoti.roj144@gmail.com</td>
                                </tr>
                                <tr>
                                    <td>14</td>
                                    <td>Sagar Masanta</td>
                                    <td>Infrastructure Expert</td>
                                    <!-- <td>9348505218</td> -->
                                    <td>rsagar.masanta@gmail.com</td>
                                </tr>
                                <tr>
                                    <td>15</td>
                                    <td>Nalini Das</td>
                                    <td>Water Supply &amp; Sanitation Expert</td>
                                    <!-- <td>9777348504</td> -->
                                    <td>ctboy_das@yahoo.co.in</td>
                                </tr>
                                <tr>
                                    <td>16</td>
                                    <td>Nishipadma Subhadarshini</td>
                                    <td>Social Development Expert</td>
                                    <!-- <td>8895091372</td> -->
                                    <td>nishi.ombadc@gmail.com</td>
                                </tr>
                                <tr>
                                    <td>17</td>
                                    <td>Sudarshan Sawra</td>
                                    <td>Education Expert</td>
                                    <!-- <td>9304086538</td> -->
                                    <td>Sudarshan.ombadc@gmail.com</td>
                                </tr>
                                <tr>
                                    <td>18</td>
                                    <td>Subhransu Mahapatra</td>
                                    <td>Health Expert</td>
                                    <!-- <td>9437627988</td> -->
                                    <td>subhransu.ombadc@gmail.com</td>
                                </tr>
                                <tr>
                                    <td>19</td>
                                    <td>Parth Vishnoi</td>
                                    <td>Monitoring and Evaluation Expert</td>
                                    <!-- <td>8249032316</td> -->
                                    <td>parthvishnoi@gmail.com</td>
                                </tr>
                            </tbody>
                        </table>
					</div>
					<!-- 009 -->
					<div class="tab-pane fade  rounded bg-white" id="010" role="tabpanel" aria-labelledby="v-pills-settings-tab">
						<table class="table table-bordered" style="--bs-table-border-color: black;">
							<thead>
								<tr>
									<th width="6%">Sl.</th>
									<th width="30%">Name</th>
									<th width="20%">Designation</th>
									<th width="15%">Basic Pay</th>
									<th>Remarks</th>
								</tr>
							</thead>
							<tbody style="color: black; font-size:13px;">
								<tr>
									<td>1</td>
									<td></td>
									<!-- <td>G. M. (Admin), G. M. (Operations)- In charge</td> -->
									<td>G. M. (Admin)</td>
									<!-- <td>138800</td> -->
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td>2</td>
									<td>Bhabani Prasad Dash</td>
									<td>G. M. (Finance)</td>
									<td>86100</td>
									<td>Deputed from Govt. of Odisha</td>
								</tr>
								<tr>
									<td>3</td>
									<td>Sri Jayant Kumar Das</td>
									<td>G. M. (Operation)</td>
									<td>90000(Consolidated)</td>
									<td>Contractual</td>
								</tr>
								<tr>
									<td>4</td>
									<td>Swati Swagatika Pratihari
									</td>
									<td>Company Secretary</td>
									<!-- <td>87550(consolidated)</td> -->
									<td>-</td>
									<td>Contractual</td>
								</tr>
							</tbody>
						</table>
					</div>
					<!-- 010 -->
					<div class="tab-pane fade  rounded bg-white " id="011" role="tabpanel" aria-labelledby="v-pills-profile-tab">
						<table class="table table-bordered" style="--bs-table-border-color: black;">
							<thead>
								<tr>
									<th align="center" width="20">SL</th>
									<th align="center" width="200">Sector</th>
									<th align="center">Department</th>
									<th align="center" width="100">Amount<br>in Rs. Cr.</th>
								</tr>
							</thead>
							<tbody style="color: black; font-size:13px;">
                                @php
                                $total_sanctioned = 0;
                                $sl=1;
                                @endphp
                                @foreach($sectors as $sector)
                                    @php
                                    $sl=1;
                                    @endphp
                                    @foreach($sector->departments as $department)
                                        <tr>
                                            <td align="center" style="vertical-align:middle; text-align:center;">{{ $sl }}</td>
                                            @if($department->page_id == $sector->id)
                                                <td align="center" style="vertical-align:middle; text-align:center;" rowspan="{{ $sector->departments->count() }}">{{ $sector->name }}</td>
                                            @endif
                                            <td align="center" style="vertical-align:middle; text-align:left;">{{ $department->name }}</td>
                                            <td align="center" style="vertical-align:middle; text-align:right;">{{ $department->sanctioned }}</td>
                                        </tr>
                                        @php
                                        $total_sanctioned += $department->sanctioned;
                                        $sl++;
                                        @endphp
                                    @endforeach
                                @endforeach
								<tr>
									<td align="center" colspan="3" style="vertical-align:middle; text-align:right;">Total</td>
									<td align="center" style="vertical-align:middle; text-align:right;">{{ $total_sanctioned }}</td>
								</tr>
							</tbody>
						</table>
					</div>
					<!-- 011 -->
					<div class="tab-pane fade  rounded bg-white " id="012" role="tabpanel" aria-labelledby="v-pills-messages-tab">
						<table class="table table-bordered" style="--bs-table-border-color: black;">
							<thead>
								<tr>
									<th align="center" width="20">SL</th>
									<th align="center" width="200">Sector</th>
									<th align="center">Department</th>
									<th align="center" width="100">Amount<br>in Rs. Cr.</th>
								</tr>
							</thead>
							<tbody style="color: black; font-size:13px;">
                                @foreach($sectors as $sector)
                                    @php
                                    $total_sanctioned_projects = 0;
                                    $sl=1;
                                    $printedSector = false;
                                    @endphp
                                    @foreach($sector->departments as $department)
                                        @foreach($department->projects as $project)
                                        <tr>
                                            <td align="center" style="vertical-align:middle; text-align:center;"><?= $sl ?></td>
                                            @if(!$printedSector)
                                                <td align="center" style="vertical-align:middle; text-align:center;" rowspan="{{ $department->projects->count() }}">{{ $sector->name }}</td>
                                                @php $printedSector = true; @endphp
                                            @endif
                                            <td align="center" style="vertical-align:middle; text-align:left;">{{ $project->name }}</td>
                                            <td align="center" style="vertical-align:middle; text-align:right;">{{ $project->sanctioned }}</td>
                                        </tr>
                                        @php
                                        $total_sanctioned_projects += $project->sanctioned;
                                        $sl++;
                                        @endphp
                                        @endforeach
                                    @endforeach
                                @endforeach
								<tr>
									<td align="center" colspan="3" style="vertical-align:middle; text-align:right;">Total</td>
									<td align="center" style="vertical-align:middle; text-align:right;">{{ $total_sanctioned_projects }}</td>
								</tr>
							</tbody>
						</table>
					</div>
					<!-- 012 -->
					<div class="tab-pane fade  rounded bg-white " id="013" role="tabpanel" aria-labelledby="v-pills-settings-tab">
						<br><br><br>
						<h4>Concessions & Permits</h4>
						<br><br><br>
					</div>
					<!-- 013 -->
					<div class="tab-pane fade  rounded bg-white " id="014" role="tabpanel" aria-labelledby="v-pills-profile-tab">
						<table class="table table-bordered" style="--bs-table-border-color: black;">
							<thead>
								<tr>
									<th>Sl.</th>
									<th>Name of the Act, Rules, Regulations etc.</th>
									<th>Download</th>
								</tr>
							</thead>
							<tbody style="color: black; font-size:13px;">
								<tr>
									<td>1</td>
									<td>Article of Association</td>
									<td><a href="https://www.ombadc.in/images/documents/docs_1721648934.PDF"><i class="fa-solid fa-download"></i></a></td>
								</tr>
								<tr>
									<td>2</td>
									<td>Memorandum of Association</td>
									<td><a href="https://www.ombadc.in/images/documents/docs_1721648706.PDF"><i class="fa-solid fa-download"></i></a></td>
								</tr>
								<tr>
									<td>3</td>
									<td>Guidelines for Project Financing, Implementation and Monitoring</td>
									<td>
                                        <a href="https://www.ombadc.in/images/documents/docs_1721648869.PDF"><i class="fa-solid fa-download"></i></a>
										<a href="https://www.ombadc.in/images/documents/docs_1721648487.pdf"><i class="fa-solid fa-download"></i></a>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<!-- 014 -->
					<div class="tab-pane fade  rounded bg-white " id="015" role="tabpanel" aria-labelledby="v-pills-messages-tab">
						<br><br><br>
						<h4>Information available at website.</h4>
						<br><br><br>
					</div>
					<!-- 015 -->
					<div class="tab-pane fade  rounded bg-white " id="016" role="tabpanel" aria-labelledby="v-pills-settings-tab">
						<table class="table table-bordered" style="--bs-table-border-color: black;">
							<thead>
								<tr>
									<th width="6%">Sl.</th>
									<th width="15%">Name</th>
									<th width="15%">Designation</th>
									<th width="10%">Office Phone No.</th>
									<th>Address</th>
									<th>Name of Office/ Division</th>
									<th>Demarcation of Area/ Activities if more than one P.I.O is there</th>
								</tr>
							</thead>
							<tbody style="color: black; font-size:13px;">
								<tr>
									<td>1</td>
									<td>Sri Bhabani Prasad Das</td>
									<!-- <td>GM(Admin), GM(Operations)- In charge</td> -->
									<td>GM(Finance)</td>
									<td>0674-2300488</td>
									<td>1st Floor, Aranya Bhawan-GD2/12, CS Pur, Bhubaneswar-751023</td>
									<td>OMBADC</td>
									<td>1st Appellate Authority</td>
								</tr>
								<tr>
									<td>2</td>
									<td>Smt. Swati Swagatika Pratihari</td>
									<!-- <td>GM(Admin), GM(Operations)- In charge</td> -->
									<td>Company Secretary</td>
									<td>0674-2300488</td>
									<td>1st Floor, Aranya Bhawan-GD2/12, CS Pur, Bhubaneswar-751023</td>
									<td>OMBADC</td>
									<td>PIO</td>
								</tr>
							</tbody>
						</table>
					</div>
					<!-- 016 -->
					<div class="tab-pane fade  rounded bg-white" id="017" role="tabpanel" aria-labelledby="v-pills-profile-tab">
						<br><br><br>
						<h4>All other information as may be prescribed for dissemination shall be collected, tabulated, compiled, collected and provided in the form of manual from time to time. No other information prescribed to the published.</h4>
						<br><br><br>
					</div>
					<!-- 017 -->
				</div>
			</div>
		</div>
    </section>

    @push('script')
    <script src="https://www.ombadc.in/assets/js/vendor/jquery-3.6.0.min.js"></script>
	<script src="https://www.ombadc.in/assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>
	<!-- Popper JS -->
	<script src="https://www.ombadc.in/assets/js/popper.min.js"></script>
	<!-- Bootstrap JS -->
	<script src="https://www.ombadc.in/assets/js/bootstrap.min.js"></script>
	<!-- Plugins JS -->
	<script src="https://www.ombadc.in/assets/js/plugins.js"></script>
	<!-- Ajax Mail -->
	<script src="https://www.ombadc.in/assets/js/ajax-mail.js"></script>
	<script>
		new WOW().init();
		$('.reset').click(function() {
			new WOW().init();
		})
	</script>
	<!-- Main JS -->
	<script src="https://www.ombadc.in/assets/js/main.js"></script>
	<!-- Add these scripts at the end of the body section, just before the closing </body> tag -->
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script type="text/javascript" src="https://www.ombadc.in/assets/js/mdb.min.js"></script>
	<div class="d-none">
		<script type="text/javascript" src="https://www.ombadc.in/assets/js/mdbFsscroller.min.js"></script>
	</div>
	<script>
		$('.owl-carousel').owlCarousel({
			loop: false,
			margin: 10,
			nav: true,
			responsive: {
				0: {
					items: 1
				},
				600: {
					items: 1
				},
				1000: {
					items: 3
				}
			}
		})
	</script>
	<script>
		$(document).scroll(function() {
			if ($(this).scrollTop() > 10) {
				$('.sml-logo').show('slow');
				$('.logo-main').addClass('logo-white-bg');
				$('.new-logo').hide('slow');
			} else {
				$('.sml-logo').hide('slow');
				$('.logo-main').removeClass('logo-white-bg');
				$('.new-logo').show('slow');
			}
		});
	</script>
    @endpush
</x-front-layout>


