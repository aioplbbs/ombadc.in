<x-front-layout :menus="$menus" :departments="$departments">
    @push('style')
    <style>
        .new-heading-bodx{
            font-weight: bold;
            color: white;
            text-align: center;
            font-weight: 700;
            margin-bottom: 20px;
            text-shadow: 0px 5px rgb(0 0 0 / 20%);
        }
        .sub-coll-sdg-x{
            z-index: 999;
            border-radius: 5px;
            background: #6395ec;
            color: #FFF;
            font-size: 18px;
            padding: 5px 10px;
        }
    </style>
    @endpush
    <section class="section banner">
        <div class="bg-banner"style="background-image: url('https://www.ombadc.in/images/innerbanner/history.jpg');background-size: cover;">
            <div class="b-title">
                <ul class="b-menu">
                    <li class="b-item"><a href="">Home</a></li>
                    <li class="b-item"><a href="javascript:void(0)">About Us</a></li>
                    <li class="b-item"><a class="active">Who's Who</a></li>
                </ul>
                <h3> Who's Who</h3>
            </div>
        </div>
    </section>
    <section class="section">
        <div class="sec-bg">
            <div id="container-fluid">
                <div class="row staff">
                    <div class="col-lg-4 col-md-12 bod">
                        <a href="#bod" onClick="getProfileView('bod');">
                            <h3>Board Of<br> Directors</h3>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-12 ombadc-official">
                      <a href="#ombadc-official" onClick="getProfileView('ombadc-official');">
                        <h3>OMBADC <br>Official</h3>
                      </a>
                    </div>
                    <div class="col-lg-4 col-md-12 supporting-staffs">
                      <a href="#supporting-staffs" onClick="getProfileView('supporting-staffs');">
                        <h3> Supporting<br> Staffs</h3>
                      </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @php
    $board_of_directors = $personal_profiles->filter(function($personal_profile){
        return $personal_profile->staff_category == 'Board Of Directors (Officials)';
    });
    $independent_directors = $personal_profiles->filter(function($personal_profile){
        return $personal_profile->staff_category == 'Board Of Directors (Independent)';
    });
    $ombadc_officials = $personal_profiles->filter(function($personal_profile){
        return $personal_profile->staff_category == 'Board Of Directors (Officials)' && $personal_profile->designation == 'IFS, Chief-Executive-Officer, OMBADC';
    });
    $general_managers = $personal_profiles->filter(function($personal_profile){
        return $personal_profile->staff_category == 'Ombadc Officials';
    });
    $experts = $personal_profiles->filter(function($personal_profile){
        return $personal_profile->staff_category == 'Expert';
    });
    $supporting_staffs = $personal_profiles->filter(function($personal_profile){
        return $personal_profile->staff_category == 'Supporting Staff';
    });
    @endphp
    
    <section class="section" style="background-color: #50c978;" id="bod">
        <h3 style="text-align:center; padding-top:10px;" class="new-heading-bodx">Board Of Directors</h3>
        <h4 style="text-align:center">15 members - 9 Government officials as directors and 6 independent directors.</h4>
        <div class="sec-bg">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="sub-coll-sdg-x">Government Officials as Directors (7 IAS, 2 IFS)</div>
                    @foreach($board_of_directors as $personal_profile)
                    @php
                    $image_url = $personal_profile->getFirstMediaUrl('personal-profile')
                    @endphp
                    <div class="col-xl-6 col-lg-5 col-md-6">
                        <center>
                            <div class="cards">
                                <div class="profile-pic">
                                    <img src="{{ $image_url }}" alt="staff">
                                </div>
                                <div class="bottom">
                                    <div class="content"><br>
                                        <p class="about-me">{{ $personal_profile->expertise }}</p>
                                    </div>
                                    <div class="bottom-bottom">
                                        <span class="name">{{ $personal_profile->name }}</span>
                                        <div class="social-links-container"><br>
                                            {{ $personal_profile->designation }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </center>
                    </div>
                    @endforeach
                    <div class="sub-coll-sdg-x">Independent Directors</div>
                    @foreach ($independent_directors as $personal_profile)
                    @php
                    $image_url = $personal_profile->getFirstMediaUrl('personal-profile')
                    @endphp
                    <div class="col-xl-4 col-lg-5 col-md-6">
                        <center>
                            <div class="cards">
                                <div class="profile-pic">
                                    <img src="{{ $image_url }}" alt="staff">
                                </div>
                                <div class="bottom">
                                    <div class="content"><br>
                                        <p class="about-me">{{ $personal_profile->expertise }}</p>
                                    </div>
                                    <div class="bottom-bottom">
                                        <span class="name">{{ $personal_profile->name }}</span>
                                        <div class="social-links-container"><br>
                                            {{ $personal_profile->designation }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </center>
                    </div> 
                    @endforeach
                </div>
            </div>
        </div>
        <!--// Our Team Area -->
    </section>

    <section class="section" style="background-color: #51c878;" id="ombadc-official">
        <h3 style="text-align:center; padding-top:10px;" class="new-heading-bodx">OMBADC Officials</h3>
        <h4 style="text-align:center">Headed by Chief Executive Officer and 3 General Managers in addition to 1 SD&TE Expert.</h4>

        <div class="sec-bg">
            <div class="container-fluid">
	            <div class="row justify-content-center">
	                <div class="sub-coll-sdg-x">Chief Executive Officer</div> 
                    @foreach($ombadc_officials as $personal_profile)
                    @php
                    $image_url = $personal_profile->getFirstMediaUrl('personal-profile')
                    @endphp
                    <div class="col-xl-4 col-lg-5 col-md-6">
			            <center>
			                <div class="cards">
								<div class="profile-pic">
									<img src="{{ $image_url }}" alt="staff">
								</div>
								<div class="bottom">
									<div class="content"><br>
										<p class="about-me">{{ $personal_profile->expertise }}</p>
									</div>
									<div class="bottom-bottom">
										<span class="name">{{ $personal_profile->name }}</span>
										<div class="social-links-container"><br>
											{{ $personal_profile->designation }}
										</div>
									</div>
								</div>
							</div>
                        </center>
		            </div>
                    @endforeach
		            <div class="sub-coll-sdg-x">General Managers</div> 
                    @foreach($general_managers as $personal_profile)
                    @php
                    $image_url = $personal_profile->getFirstMediaUrl('personal-profile')
                    @endphp
                    <div class="col-xl-4 col-lg-5 col-md-6">
			            <center>
			                <div class="cards">
								<div class="profile-pic">
									<img src="{{ $image_url }}" alt="staff">
								</div>
								<div class="bottom">
									<div class="content"><br>
										<p class="about-me">{{ $personal_profile->expertise }}</p>
									</div>
									<div class="bottom-bottom">
										<span class="name">{{ $personal_profile->name }}</span>
										<div class="social-links-container"><br>
											{{ $personal_profile->designation }}
										</div>
									</div>
								</div>
							</div>
                        </center>
		            </div>
                    @endforeach
		            <div class="sub-coll-sdg-x">Experts</div> 
                    @foreach($experts as $personal_profile)
                    @php
                    $image_url = $personal_profile->getFirstMediaUrl('personal-profile')
                    @endphp
                    <div class="col-xl-4 col-lg-5 col-md-6">
			            <center>
			                <div class="cards">
								<div class="profile-pic">
									<img src="{{ $image_url }}" alt="staff">
								</div>
								<div class="bottom">
									<div class="content"><br>
										<p class="about-me">{{ $personal_profile->expertise }}</p>
									</div>
									<div class="bottom-bottom">
										<span class="name">{{ $personal_profile->name }}</span>
										<div class="social-links-container"><br>
											{{ $personal_profile->designation }}
										</div>
									</div>
								</div>
							</div>
                        </center>
		            </div>
                    @endforeach
	            </div>
            </div>
        </div>
        <!--// Our Team Area -->
    </section>


    <section class="section" style="background-color: #51c878;padding-top:30px" id="supporting-staffs">
        <h3 style="text-align:center; padding-top:10px;" class="new-heading-bodx">Supporting Staffs</h3>
        <div class="sec-bg">
            <div class="container-fluid">
	            <div class="row justify-content-center">
                    @foreach ($supporting_staffs as $personal_profile)
                    @php
                    $image_url = $personal_profile->getFirstMediaUrl('personal-profile')
                    @endphp
                    <div class="col-xl-4 col-lg-5 col-md-6">
                        <center>
                            <div class="single-team ">
                                <a href="#pp_{{ $personal_profile->name }}" onClick="getProfileView('');">
                                    <div class="single-team-image">
                                        <img src="{{ $image_url }}" alt="{{ $personal_profile->name }}" title="{{ $personal_profile->name }} ({{ $personal_profile->designation }})">
                                        <h4 style="color:white; margin-top:15px;">{{ $personal_profile->name }}</h4>
                                        <h6 style="color:white">{{ $personal_profile->expertise }}</h6>
                                    </div>
                                </a> 
                            </div>
                        </center>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!--// Our Team Area -->
    </section>
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
        document.querySelectorAll('a[href^="#pp_"]').forEach(function(link) {
            link.addEventListener("click", function(event) {
                event.preventDefault(); // Prevent the default link behavior
                var sectionId = this.getAttribute("href").substring(1); // Extract section ID from href
                var targetSection = document.getElementById(sectionId);

                if (targetSection) {
                    var scrollOffset = targetSection.offsetTop - (window.innerHeight / 6);

                    window.scrollTo({
                        top: scrollOffset,
                        behavior: "smooth",
                    });
                }
            });
        });
    </script>
    @endpush
</x-front-layout>


