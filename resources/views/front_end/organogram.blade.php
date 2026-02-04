<x-front-layout :menus="$menus" :departments="$departments">
    @push('style')

    @endpush

    <section class="section banner">
        <div class="bg-banner" style="background-image: url('{{ frontAsset('assets/images/breadcrump.jpg') }}');background-size: cover;">
            <div class="b-title">
                <ul class="b-menu">
                    <li class="b-item"><a href="{{ route('home') }}">Home</a></li>
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
                                    <img src="{{ frontAsset('assets/images/oversight.jpg') }}" alt="" class="card-img-top" />
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
                                    <img src="https://d2er6gsnxjpdia.cloudfront.net/664/eGAqN8oXM1tW1ZV4.png" alt="" class="card-img-top" />
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
                                    <img src="https://d2er6gsnxjpdia.cloudfront.net/641/c92arETZ9M3au7j7.png" alt="" class="card-img-top" />
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
										<img src="https://d2er6gsnxjpdia.cloudfront.net/assets/images/Shaikh%20Naimuddin%20.png" class="card-img-top" />
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
										<img src="https://d2er6gsnxjpdia.cloudfront.net/assets/images/Shri%20Dwaipayan%20Pattanaik%20(OSD%20I%20to%20Oversight%20Authority).png" class="card-img-top" />
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
										<img src="https://d2er6gsnxjpdia.cloudfront.net/assets/images/Shri-Jayant-Kumar-Das.jpg" class="card-img-top" />
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
										<img src="https://d2er6gsnxjpdia.cloudfront.net/assets/images/no-photo.jpg" class="card-img-top" />
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
										<img src="https://d2er6gsnxjpdia.cloudfront.net/assets/images/Shri-Bhabani-Prasad-Das(GM-Finance).jpg" class="card-img-top" />
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
										<img src="https://d2er6gsnxjpdia.cloudfront.net/662/KqktFgcZB1JzFamm.jpeg" class="card-img-top" />
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

	<div id="popup2" class="overlay1">
        <div class="popup-organogram">
            <a class="close" href="#section" id="section2">&times;</a>
            <div class="bod-image-organogram">
                <div class="bod-first"> 
                    @foreach($personal_profiles->where('staff_category', 'Board Of Directors (Officials)') as $personal_profile)
					@php
						$imageUrl = $personal_profile->getFirstMediaUrl('personal_profile');
					@endphp
                    <div class="card" style="width:150px;height: 150px !important;">
                        <div class="card-img" style="margin:0;border-radius:10%; box-shadow: none; text-align:center"> 
                            <img style=" width:70%;border-radius:10%;box-shadow: none;border:1px solid lightgreen" src="{{ $imageUrl }}" alt="{{ $personal_profile->name }}" title="{{ $personal_profile->name }} ({{ $personal_profile->designation }})" />
                            <p style="text-align:center ; font-weight: bold;box-shadow: none;line-height:20px">{{ $personal_profile->name }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div id="popup3" class="overlay2">
        <div class="popup-organogram">
            <a class="close" href="#section" id="section3">&times;</a>
            <div class="bod-image-organogram">
                <div class="bod-first"> 
                    @foreach($personal_profiles->where('staff_category', 'PMU') as $personal_profile)
					@php
						$imageUrl = $personal_profile->getFirstMediaUrl('personal_profile');
					@endphp
                    <div class="card" style="height: 220px !important;">
                        <div class="card-img" style="margin:0;border-radius:10%; box-shadow: none; text-align:center"> 
                            <a href="pmu.php#pp_{{ $personal_profile->name }}">
                                <img style=" width:70%;border-radius:10%;box-shadow: none;border:1px solid lightgreen"  src="{{ $imageUrl }}" alt="{{ $personal_profile->name }}" title="{{ $personal_profile->name }} ({{ $personal_profile->designation }})" />
                                <p style="text-align:center ; font-weight: bold;box-shadow: none;">{{ $personal_profile->name }}</p>
                                <p style="text-align:center; padding:0; line-height:13px">{{ $personal_profile->designation }}</p>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    @push('script')
    <script src="assets/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>
    <!-- Popper JS -->
    <script src="assets/js/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Plugins JS -->
    <script src="assets/js/plugins.js"></script>
    <!-- Ajax Mail -->
    <script src="assets/js/ajax-mail.js"></script>
    <script>
        new WOW().init();
        $('.reset').click(function(){
            new WOW().init();
        })
    </script>
    <!-- Main JS -->
    <script src="assets/js/main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" src="assets/js/mdb.min.js"></script>
    <div class="d-none">
        <script type="text/javascript" src="assets/js/mdbFsscroller.min.js"></script>
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
            if ( $(this).scrollTop() > 10 ) {
                $('.sml-logo').show('slow');
                $('.logo-main').addClass('logo-white-bg');
                $('.new-logo').hide('slow');
            } else {
                $('.sml-logo').hide('slow');
                $('.logo-main').removeClass('logo-white-bg');
                $('.new-logo').show('slow');
            }
        }); 
        $(document).ready(function(){
	        $('#popup2d').hover(function(){ 
                console.log("Hello");
    	        $('#popup2').show();
	        });
	        $('#popup3d').hover(function(){ 
    	        $('#popup3').show();
	        });
            $('#section2').click(function(){ 
                $('#popup2').hide();
            });
            $('#section3').click(function(){ 
                $('#popup3').hide();
            });
        });
    </script>
    @endpush
</x-front-layout>