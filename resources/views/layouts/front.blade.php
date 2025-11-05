@props(['menus'=> [], 'departments'=>[]])


<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
      <meta charset="utf-8">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <title>{{session('site_settings')['site_title']['title'] ?? env('APP_NAME')}}</title>
      <meta property="og:image" content="https://www.ombadc.in/images/logo.png">
      <meta name="description" content="is a Public Limited Government Company, not for profit, has been incorporated under Section 8 of the Companies Act, 2013 on 02.12.2014.">
      <meta property="og:url" content="https://ombadc.in">
      <meta name="keywords" content="Odisha, govt, state Government, ombadc, OMBADC,Odisha Mineral Bearing Areas Development Corporation (OMBADC),Public Limited Government Company, tribal">
      <link rel="icon" type="image/x-icon" href="https://www.ombadc.in/images/favicon.ico">
      <link rel="stylesheet" href="{{frontAsset('assets/css/bootstrap.min.css')}}">
      <link rel="stylesheet" href="{{frontAsset('assets/css/material-design-iconic-font.min.css')}}">
      <link rel="stylesheet" href="{{frontAsset('assets/css/plugins.css')}}">

      <link rel="stylesheet" href="https://www.ombadc.in/assets/css/style.css">
      <!-- <link rel="stylesheet" href="/assets/css/responsive.css"> -->
      <link rel="stylesheet" href="{{frontAsset('assets/css/owl.css')}}">
      <link href="{{frontAsset('assets/css/all.min.css')}}" rel="stylesheet">
      <link rel="stylesheet" href="{{frontAsset('assets/css/owl.theme.default.css')}}" />
      <link href="{{frontAsset('assets/css/fsscroller.min.css')}}" rel="stylesheet" />
      <script src="{{frontAsset('assets/js/jquery.min.js')}}"></script>
      <script src="{{frontAsset('assets/js/vendor/modernizr-3.6.0.min.js')}}"></script>
      
      <style>
        /* Add this CSS to style the tooltip */
        body {
          overflow-x: hidden;
        }

        .st0[data-tooltip] {
          position: relative;
        }

        .st0[data-tooltip]:hover::after {
          content: attr(data-tooltip);
          position: absolute;
          top: 100%;
          left: 0;
          white-space: pre-line;
          /* This will preserve the line breaks */
          background-color: rgba(0, 0, 0, 0.8);
          color: white;
          padding: 5px;
          border-radius: 3px;
        }

        .extra-data {
          padding: 160px 0;
          position: relative;
          background-color: red;
          width: 100%;
          /* height: 400px; */
          display: flex;
          justify-content: space-evenly;
          align-items: center;
          /* background-color: rgba(15, 85, 15, 0.75); */
          /* background-color: #167868; */
          /* background-color: rgba(22, 120, 104, 0.75); */
          background-color: rgb(6 75 64 / 75%);

          flex-direction: column;

        }

        .extra-data .headings-extra {
          font-weight: bold;
          color: #ffcc00;
          text-shadow: 0px 1px 4px #fdfdfd7a;
          font-size: 46px;
        }

        .extra-data .data-extra {
          padding: 20px;
          font-size: 80px;
          color: white;
          font-weight: bolder;
          text-shadow: -2px 1px 3px #464646d1;


        }

        .extra-data .inner-image-prabhu {
          position: absolute;
          width: 100%;
          z-index: -9;
        }

        .main-div-distance-prabhu {
          display: flex !important;
          width: 100%;
          justify-content: space-between !important;
          align-items: center !important;
        }

        .extra-data .extra-data-left {
          width: 100%;
          text-align: center;
          display: flex;
          justify-content: space-evenly;
          align-items: flex-start;
        }

        .extra-data .extra-data-right {
          width: 55%;
          text-align: center;

        }

        .down-data {
          display: flex;
          width: 100%;
          padding: 15px;
          /* border: 1px solid red; */
          background-color: aliceblue;
          border-radius: 5px;
          background-color: #ffffff96;
          backdrop-filter: blur(4px);
          box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        }

        .down-data .small-data-extra {
          display: flex;
          justify-content: space-around;
          width: 75%;
          padding-bottom: 25px;
          margin: auto;
          flex-direction: column-reverse;
          flex-wrap: nowrap;
          border-right: 1px solid #999999;
        }

        .down-data .small-data-extra:last-child {
          border-right: none;
        }

        .data-extra-g {
          padding: 35px 0 0 0;
          font-size: 70px;
          font-weight: bolder;
          color: #005445;
        }

        .data-extra-n {
          border-bottom: 1px solid #999999;
          font-size: 30px;
          padding-bottom: 7px;
          font-weight: bold;
          color: #3c3c3c;
        }
      </style>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      @stack('style')
      <script type="text/javascript" charset="UTF-8" src="https://www.gstatic.com/charts/51/loader.js"></script>
      <link id="load-css-0" rel="stylesheet" type="text/css" href="https://www.gstatic.com/charts/51/css/core/tooltip.css">
      <link id="load-css-1" rel="stylesheet" type="text/css" href="https://www.gstatic.com/charts/51/css/util/util.css">
      <script type="text/javascript" charset="UTF-8" src="https://www.gstatic.com/charts/51/js/jsapi_compiled_default_module.js"></script>
      <script type="text/javascript" charset="UTF-8" src="https://www.gstatic.com/charts/51/js/jsapi_compiled_graphics_module.js"></script>
      <script type="text/javascript" charset="UTF-8" src="https://www.gstatic.com/charts/51/js/jsapi_compiled_ui_module.js"></script>
      <script type="text/javascript" charset="UTF-8" src="https://www.gstatic.com/charts/51/js/jsapi_compiled_corechart_module.js"></script>
    </head>

    <body>
      <div class="full-screen-scroller">
        <div class="fss-dotted-scrollspy">
          <button type="button" class="fss-nav-btn fss-mainview-prev">
            <i class="fa fa-chevron-up"></i> 
          </button>
          <a href="#view-1" class="fss-nav-item active"></a>
          <a href="#view-2" class="fss-nav-item"></a>
          <a href="#view-3" class="fss-nav-item"></a>
          <a href="#view-4" class="fss-nav-item"></a>
          <a href="#view-5" class="fss-nav-item"></a>
          <a href="#view-6" class="fss-nav-item"></a>
          <a href="#view-7" class="fss-nav-item"></a>
          <button type="button" class="fss-nav-btn fss-mainview-next">
            <i class="fa fa-chevron-down"></i> 
          </button>
        </div>
        <div fss-anchor="view-1" class="fss-mainview fss-active">
          <link rel="stylesheet" href="https://www.ombadc.in/assets/css/responsive.css">
          <div class="main-wrapper">
            <div class="rectangle5" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight5" aria-controls="offcanvasRight5">
              <a href="#" data-toggle="modal" data-target="#myModal5">
                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-link-45deg link-icon" viewBox="0 0 16 16">
                  <path d="M4.715 6.542 3.343 7.914a3 3 0 1 0 4.243 4.243l1.828-1.829A3 3 0 0 0 8.586 5.5L8 6.086a1.002 1.002 0 0 0-.154.199 2 2 0 0 1 .861 3.337L6.88 11.45a2 2 0 1 1-2.83-2.83l.793-.792a4.018 4.018 0 0 1-.128-1.287z" />
                  <path d="M6.586 4.672A3 3 0 0 0 7.414 9.5l.775-.776a2 2 0 0 1-.896-3.346L9.12 3.55a2 2 0 1 1 2.83 2.83l-.793.792c.112.42.155.855.128 1.287l1.372-1.372a3 3 0 1 0-4.243-4.243L6.586 4.672z" />
                </svg>
              </a>
            </div>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight5" aria-labelledby="offcanvasRightLabel">
              <div class="offcanvas-header">
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
              </div>
              <div class="offcanvas-body p-0" style=" margin-top: -48px">
                <div class="department5">
                  <h3> Department Links</h3>
                  <div class="D-Links">
                    <ul>
                      @foreach($departments as $department)
                      <li>
                        <a href="{{$department->short_name}}" class="links" target="_blank">
                            <i class="fa fa-angle-double-right"></i> {{$department->name}}
                        </a>
                      </li>
                      @endforeach
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="feedback-fix1" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasLeft">
              <a href="#" data-toggle="modal" data-target="#myModal5">
                <i class="fa fa-comments" style="font-size:27px;color: white; padding: 3px;"></i> </a>
            </div>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasLefttLabel" style="height: 380px; top:30%; width: 300px;">
              <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasLeftLabel">Your Feedback </h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
              </div>
              <div class="offcanvas-body" style="padding: 0px 0px;">
                <div class="container">
                  <form class="contact-bx" action="Action.php" method="post" onSubmit="return feedbackValidate(this);">
                    <input type="hidden" name="act" value="feedback">
                    <div class="col-md-12">
                      <input type="text" class="form-control wihi" placeholder="Name *" aria-label="Name " name="Name" id="Name">
                    </div>
                    <div class="col-md-12">
                      <input type="email" class="form-control wihi" id="inputEmail4" placeholder="Email *" name="Email" id="Email">
                    </div>
                    <div class="col-md-12">
                      <input type="password" class="form-control wihi" id="inputPassword4" placeholder="Mobile Number *" name="Mobile" id="Mobile">
                    </div>

                    <div class="col-12">
                      <textarea class="form-control wihi-area" id="exampleFormControlTextarea1" placeholder="Your Feedback *" rows="2" name="Message" id="Message"></textarea>
                      <p class="wihi-area">(Maximum 500 Characters left) </p>
                    </div>
                    <div class="col-12">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="feedback-fix" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasLeft" aria-controls="offcanvasLeft">
              <a href="#" data-toggle="modal" data-target="#myModal3">
                <i class="fa fa-cog fa-spin" style="font-size:26px"></i> </a>
            </div>

            <!-- <div class="feedback-fix" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasLeft" aria-controls="offcanvasLeft">
              <a href="#">
                <i class="fa fa-cog fa-spin" style="font-size:26px"></i> </a><i class="ri-settings-3-line"></i>
            </div> -->

            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasLeft" aria-labelledby="offcanvasLefttLabel">
              <div class="offcanvas-header">
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
              </div>
              <div class="offcanvas-body p-0" style=" margin-top: -48px">
                <div class="widget-categories">
                  <h4 class="widget-title">
                    <span>Quick Access</span>
                  </h4>
                  <ul>
                    <li><a href="sitemap.php"><span class="categories-name">Sitemap</span> <span class="count-item"><i class="fa fa-sitemap"></i></span></a></li>
                    <li><a href="https://www.ombadc.in/screen-reader-access.php" ><span class="categories-name">Screen Reader</span> <span class="count-item"><i class="fa fa-volume-up"></i></span></a></li>
                    <li><a href="#" onclick="changeFontSize('+'); return false;"><span class="categories-name">Font Size</span> <span class="count-item">A+</span></a></li>
                    <li><a href="#" onclick="changeFontSize('reset'); return false;"><span class="categories-name">Font Size</span> <span class="count-item">A</span></a></li>
                    <li><a href="#" onclick="changeFontSize('-'); return false;"><span class="categories-name">Font Size</span> <span class="count-item">A-</span></a></li>
                  </ul>
                </div>
              </div>
            </div>
            <header class="header-area active" id="sec0" id="tag0">
              <div class="header-bottom-area" style="box-shadow: 1px 1px 5px #3c3c3c;">
                <div class="container-fluid">
                  <div class="logos row">
                    <div class="col-md-12" style="padding-left: 280px; position: relative;">
                      <div class="logo-main" id="logo-container">
                        <img src="https://ombadc.in/images/logo-new.png" class="new-logo mainlogo-gsap" id="logo1">
                        <div class="sm-logo-area">
                          <img src="https://ombadc.in/images/logo.png" class="sml-logo" style="display:none;" id="logo2">
                        </div>
                      </div>

                      <div class="containers">
                        <div class="row header-middle">
                          <div class="col-lg-8 col-md-9 col-10">
                            <div class="logo-area name-gsap">
                              <a href="<?= 3 ?>">
                                <img src="https://www.ombadc.in/images/logo_black_011.png" alt="logo" class="main_logo"> 
                              </a>
                            </div>
                          </div>
                          <d class="col-md-4 name-gsap">
                            <!-- <div class="logo_bg"> -->
                            <!-- <div class="row"> -->
                            <!-- <div class="col-md-1"></div> -->
                            <!-- <div class="col-md-8"> -->
                            <!-- <img src="/images/5t_logo.png" class="fivet_logo"> -->
                            <!-- </div> -->
                            <!-- <div class="col-md-4"> -->
                            <!-- <div class="odia-logo"> -->
                            <!-- <img src="/images/odisha_govt_logo.png" class="govt_logo"> -->
                            <!-- </div> -->
                            <!-- </div> -->
                            <!-- </div> -->
                            <!-- </div> -->

                            <a href="https://odisha.gov.in/" target="_blank" class="images-logo-back" ><img src="https://www.ombadc.in/images/odisha_govt_logo.png" alt=""></a>
                          </d>
                        </div>
                        <div class="row">
                          <div class="bdr-btm">
                            <div class="col-lg-12 col-md-12 col-12">
                              <div class="header-bottom-right">
                                <div class="main-menu">
                                  <nav class="main-navigation ">
                                    <div class="menu-logo">
                                      <a href="<?= 3 ?>"><img src="https://www.ombadc.in/images/logo.png" class="sticky_logo"></a>
                                    </div>
                                    <ul>
                                      <li class="menu-gsap"><a href="{{route('home')}}">Home</a></li>
                                      @if(!empty($menus['Navbar']))
                                        @include('front_end.menu', ['items' => $menus['Navbar']])
                                      @endif
                                    </ul>
                                  </nav>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="mobile-menu d-block d-lg-none"> </div>
                </div>
              </div>
            </header>
          </div>
        </div>
        <script>
          function changeFontSize(action) {
            let elements = document.querySelectorAll('body, body *'); // Select all elements

            elements.forEach(element => {
              let currentSize = parseFloat(window.getComputedStyle(element).fontSize);

              if (action === '+') {
                element.style.fontSize = (currentSize + 1) + 'px'; // Increase by 1px
              } else if (action === '-') {
                element.style.fontSize = (currentSize - 1) + 'px'; // Decrease by 1px
              } else if (action === 'reset') {
                element.style.fontSize = ''; // Reset to default
              }
            });
          }
        </script>
      </div>

      {{ $slot }}

      <div fss-anchor="view-6" class="fss-mainview view3">
        <div class="bg-product section box-div-main inner_banner_footer">
          <div class="container-fluid" style="padding: 0;">
            <div class="bg">
              <h3 class="f_contact mt-6">Contact Us</h3>
              <div class="row">
                <!-- <div class="col-md-1"></div> -->
                <div class="col-md-6">
                  <div class="bdr-right">
                    {!! session('site_settings')['map']['value'] ?? '' !!}
                  </div>
                </div>
                
                <div class="col md-6">
                  <div class="mail_address">
                    <h4>E-Mail:</h4>
                    <p class="text-underline">{{session('site_settings')['email']['value'] ?? ''}}</p>
                    <br>
                    <h4>Address:</h4>
                    <p>{!! session('site_settings')['address']['value'] ?? '' !!}</p>
                    <h4>Follow Us:</h4>
                    @php
                      $social_link = session('site_settings')['social'];
                    @endphp
                    <ul class="social-icon">
                      @if($social_link['facebook']!='')<li><a href="{{$social_link['facebook']}}" target="_blank"><i class="ri-facebook-circle-fill"></i></a></li>@endif
                      @if($social_link['twitter']!='')<li><a href="{{$social_link['twitter']}}" target="_blank"><i class="ri-twitter-fill"></i></a></li>@endif
                      @if($social_link['linked_in']!='')<li><a href="{{$social_link['linked_in']}}" target="_blank"><i class="ri-linkedin-fill"></i></a></li>@endif
                      @if($social_link['youtube']!='')<li><a href="{{$social_link['youtube']}}" target="_blank"><i class="ri-youtube-fill"></i></a></li>@endif
                      @if($social_link['instagram']!='')<li><a href="{{$social_link['instagram']}}" target="_blank"><i class="ri-instagram-fill"></i></a></li>@endif  
                    </ul>
                  </div>
                </div>
              </div>
              <div class="footer-logo">
                <a href="index.html"><img src="https://www.ombadc.in/images/logo.png" class="img-responsive"></a>
              </div>
              <div class="footer-bottom">
                <div>
                  <div class="col-lg-12">
                    <div class="copyright">
                      <div class="copy-right pt--10 pb--10 text-center text-white">
                        <p style="color: white;">&copy; <?= date("Y") ?> OMBADC,All Right Reserved. Developed and Maintained
                          by <span><a href="https://allindiaonline.in/" target="_blank">All India On-Line Pvt. Ltd.</a></span></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
<style id="antiClickjack">
  body {
    display: none !important;
  }
</style>
<script type="text/javascript">
  if (self === top) {
    var antiClickjack = document.getElementById("antiClickjack");
    antiClickjack.parentNode.removeChild(antiClickjack);
  } else {
    top.location = self.location;
  }
</script>
<script src="https://www.ombadc.in/assets/js/gsap.min.js"></script>
<script src="https://www.ombadc.in/assets/js/ScrollTrigger.min.js"></script>
<!-- <script src="https://www.ombadc.in/assets/js/animation.js"></script> -->

<script>
  // Check if the current page is the home page (modify the condition accordingly)
  document.addEventListener('DOMContentLoaded', function(){
    if (window.location.href === 'https://ombadc.office.aio.in/') {
      console.log(window.location.href);
    // Load the script only on the home page
    var script = document.createElement('script');
    script.src = 'https://www.ombadc.in/assets/js/animation.js';
    document.head.appendChild(script);
  }
  });
  
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
</script>
  <script>
  const apiKey = '77c967783ac68de6cc13f0854316ed9d';
  const lat = '19.3386277';
  const lon = '84.8968779';
  async function fetchWeatherData() {
      const response = await fetch(`https://api.openweathermap.org/data/2.5/weather?lat=${lat}&lon=${lon}&units=metric&appid=${apiKey}`);
      const data = await response.json();
      document.getElementById('temp').textContent = ` ${data.main.temp}°C`;
      document.getElementById('feels-like').textContent = `Feels like: ${data.main.feels_like}°C`;
      document.getElementById('humidity').textContent = `Humidity: ${data.main.humidity}%`;
      document.getElementById('description').textContent = data.weather[0].description;
      document.getElementById('weather-icon').src = `http://openweathermap.org/img/wn/${data.weather[0].icon}@2x.png`;
      const windSpeedKmh = (data.wind.speed * 3.6).toFixed(2);
      document.getElementById('wind').textContent = `Wind: ${windSpeedKmh} km/h, ${data.wind.deg}°`;
  }
  fetchWeatherData();
</script>
<script src="{{frontAsset('/assets/js/jquery-3.3.1.slim.min.js')}}"></script>
<script src="{{frontAsset('/assets/js/popper.min.js')}}"></script>
<script src="{{frontAsset('/assets/js/bootstrap.min.js')}}"></script>
<script src="{{frontAsset('/assets/js/fancybox.umd.js')}}"></script>
<script src="{{frontAsset('/assets/js/kit.js')}}"></script>
@stack('script')

</body>
</html>
