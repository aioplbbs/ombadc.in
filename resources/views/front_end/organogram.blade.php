<x-front-layout :menus="$menus" :departments="$departments">
    @push('style')

    @endpush

    <section class="section banner">
        <div class="bg-banner" style="background-image: url('https://www.ombadc.in/images/innerbanner/history.jpg');background-size: cover;">
            <div class="b-title">
                <ul class="b-menu">
                    <li class="b-item"><a href="https://ombadc.office.aio.in/">Home</a></li>
                    <li class="b-item"><a href="javascript:void(0)">About Us</a></li>                        
                    <li class="b-item"><a class="active">Organogram</a></li>
                </ul>
                <h3> Organogram </h3>
            </div>
        </div>
    </section>

    <section class="section">
	    <div class="sec-bg">
		    <div class="container-fluid">
			    <ol class="static-org-chart">
                    <li class="after2 before3">
                        <div class="staff_card-1">                          
                            <div class="staff_info">
                                <div class="staff_image">
                                    <img src="images/oversight.jpg" alt="" class="card-img-top" />
                                </div>
                                <div class="staff_name_container padd19px">
                                    <div class="staff_name">
                                        Shri Justice A.K. Pattnaik
                                    </div>
                                    <div class="staff_title">
                                        Oversight Authority
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="after">
                        <div class="staff_card-1">                          
                            <div class="staff_info">
                                <div class="staff_image">
                                    <img src="https://www.ombadc.in/images/profile_images/1eca833ba32ea6d0c6813fd0649f5c18_1.png" alt="" class="card-img-top" />
                                </div>
                                <div class="staff_name_container">
                                    <div class="staff_name">
                                        Shri Manoj Ahuja, IAS
                                    </div>
                                    <div class="staff_title">
                                        Chairman
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </li>
                    <li class="after">
                        <div class="staff_card-1" id="popup2d">                          
                            <div class="staff_title staff_title-single">
                                <a class="button" href="#popup2">Board Of Directors</a>
                            </div>
                        </div>
                    </li>
                    <li class="after">
                        <div class="staff_card-1">                          
                            <div class="staff_info">
                                <div class="staff_image">
                                    <img src="https://www.ombadc.in/images/profile_images/g-rajesh.png" alt="" class="card-img-top" />
                                </div>
                                <div class="staff_name_container">
                                    <div class="staff_name">
                                        Shri Rohita Kumar Lenka, IFS
                                    </div>
                                    <div class="staff_title">
                                        Chief Executive Officer
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li >
					<ol id="second">
						<li class="before after">
							<div class="staff_card card-2">
								<div class="staff_info">
									<div class="staff_image1">
										<img src="https://www.ombadc.in/images/Shaikh%20Naimuddin%20.png" class="card-img-top" />
									</div>
									<div class="staff_name_container1">
										
										<div class="staff_name smallfont">
											S K Naimuddin
										</div>
										<div class="staff_title smallfont">
										  OSD I
									  </div>
									</div>
								</div>
							</div>
						</li>
						<li class="before flex-left">
							<div class="staff_card card-2">
								
								<div class="staff_info">
									<div class="staff_image1">
										<img src="https://www.ombadc.in/images/Shri%20Dwaipayan%20Pattanaik%20(OSD%20I%20to%20Oversight%20Authority).png" class="card-img-top" />
									</div>
									<div class="staff_name_container1">
									   
										<div class="staff_name smallfont">
											Shri Dwaipayan Pattnaik
										</div>
										<div class="staff_title smallfont">
										  OSD II
									   </div>
									</div>
								</div>
							</div>
						</li>
						<li class="before">
							<div class="staff_card card-2">
							   
								<div class="staff_info">
									<div class="staff_image1">
										<img src="images/GMs/Shri-Jayant-Kumar-Das.jpg" class="card-img-top" />
									</div>
									<div class="staff_name_container1">
										<div class="staff_name smallfont">
											Shri Jayant Kumar Das
										</div>
										<div class="staff_title smallfont">
										  G M (Operations)
									  </div>
									</div>
								</div>
							</div>
						</li>
						<li class="before">
							<div class="staff_card card-2">
								<div class="staff_info">
									<!-- <div class="staff_image1">
										<img src="images/profile_images/shri-sudhakar-burgi.png" class="card-img-top" />
									</div> -->
									<div class="staff_image1">
										<img src="images/GMs/no-photo.jpg" class="card-img-top" />
									</div>
									<div class="staff_name_container1">
                                        <!-- 										
										<div class="staff_name smallfont">
											Shri Sudhakar Burgi
										</div> -->
										<div class="staff_name smallfont">
											NA
										</div>
										<div class="staff_title smallfont">
										  G M (Admin)
									  </div>
									</div>
								</div>
							</div>
						</li>
						<li class="before">
							<div class="staff_card card-2">
								
								<div class="staff_info">
									<div class="staff_image1">
										<img src="images/GMs/Shri-Bhabani-Prasad-Das(GM-Finance).jpg" class="card-img-top" />
									</div>
									<div class="staff_name_container1">
									   
										<div class="staff_name smallfont">
											Shri Bhabani Prasad Das
										</div>
										<div class="staff_title smallfont">
										  G M (Finance)
									  </div>
									</div>
								</div>
								
							</div>
						   
						</li>
						<li class="before after">
							<div class="staff_card card-2">
								
								<div class="staff_info">
									<div class="staff_image1">
										<img src="https://www.ombadc.in/images/Swati%20Swagatika%20Pratihari%20(Company%20Secretary).jpeg" class="card-img-top" />
									</div>
									<div class="staff_name_container1">
										
										<div class="staff_name smallfont">
										Smt. Swat Swagatika Pratihari
										</div>
										<div class="staff_title smallfont">
										  Company Secretary
									  </div>
									</div>
								</div>
							   
							</div>
						 
						</li>
					</ol>
					<ol id="third">
						<li class="before1">
							<div class="staff_card card-2" id="popup3d">
								<div class="staff_title staff_title-single">
								  <a class="button"  data-toggle="popover" href="#popup3">PMU</a>
								</div>
							</div>
						</li>
						<li class="before1">
							<div class="staff_card card-2">
								<div class="staff_title staff_title-single">
								    Skill Dev. Expert
								</div>
							</div>
						</li >
						<li class="before2 after">
							<div class="staff_card card-2 ">
								<div class="staff_title third-card staff_title-single">
									Supporting Staffs
								</div>
							</div>
						</li>
					</ol>
				</li>
			</ol>
		</div>
	</div>
</section>

    @push('script')
    
    @endpush
</x-front-layout>