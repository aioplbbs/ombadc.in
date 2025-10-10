@props(['menus'=> []])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title> {{session('site_settings')['site_title']['title'] ?? env('APP_NAME')}} </title>

        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="{{frontAsset('/assets/css/fancybox.css')}}" />
        <link rel="stylesheet" href="{{frontAsset('/assets/css/kit.css')}}" />
        <link rel="stylesheet" href="{{frontAsset('/assets/css/icons.css')}}" />
        <link rel="stylesheet" href="{{frontAsset('/assets/css/responsive.css')}}" />
        <link rel="stylesheet" href="{{frontAsset('/assets/css/bootstrap.min.css')}}" />
    </head>
    <body>
        <div class="background-yellow">
            <div class="container">
            <div class="top-nav">
                <div class="time">
                <i class="fas fa-clock fa-spin"></i>
                <div id="live-time"></div>
                </div>
                <div class="top-links">
                <a href="#"><i class="fa-solid fa-comment-dots"></i>Feedback</a> |
                <a href="#"><i class="fa-solid fa-address-card"></i>Contacts</a>
                </div>
            </div>
            </div>
        </div>
        <div class="background-red">
            <div class="container">
            <div class="middle-nav">
                <div class="logo">
                <img src="{{session('site_settings')['site_logo']??''}}" alt="" />
                </div>
                <div class="name">
                <h1>Kalam Institute Of Technology (Polytechnic)</h1>
                <h2>Berhampur, Odisha</h2>
                </div>
                <div class="right-logo">
                <img src="{{frontAsset('/assets/icons/aicte.png')}}" alt="" />
                <!-- <img src="./assets/icons/bput-logo.png" alt=""> -->
                <img src="{{frontAsset('/assets/icons/pngwing.com.png')}}" alt="" />
                </div>
            </div>
            </div>
        </div>

          <!-- navbar start -->
            <nav class="navbar navbar-expand-lg navbar-light sticky-top library">
            <div class="container">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav w-100 justify-content-around">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/"><i class="fa-solid fa-house"></i></a>
                    </li>
                    @if(!empty($menus['Navbar']))
                      @include('front_end.menu', ['items' => $menus['Navbar']])
                    @endif
                </ul>
                </div>
            </div>
            </nav>

            <!-- navbar end -->
        
        {{ $slot }}

        <footer class="fbg">
    <div class="container">
      <div class="footer-main">
        <div class="sect left-s">
          <img src="{{session('site_settings')['site_logo']??''}}" alt="logo" />
          <h1>Kalam Institute Of Technology (Polytechnic)</h1>
          <p>
            Govinda Vihar, Govindapur<br />
            Po: Laxmipur, Berhampur-761003<br />
            Dist: Ganjam (Odisha)
          </p>
          <div class="contacts-f">
            <p><i class="fa-solid fa-phone-volume"></i> (06811) 259136</p>
            <p><i class="fa-solid fa-phone-volume"></i> (06811) 259137</p>
            <p>
              <i class="fa-solid fa-envelope"></i> admission.kit@gmail.com
            </p>
            <p>
              <i class="fa-solid fa-envelope"></i> principalkitb@gmail.com
            </p>
          </div>
          <div class="social-m">
            <a href="{{ session('site_settings')['social']['facebook'] }}"><i class="fa-brands fa-facebook-f"></i></a>
            <a href="{{ session('site_settings')['social']['twitter'] }}"><i class="fa-brands fa-x-twitter"></i></a>
            <a href="{{ session('site_settings')['social']['youtube'] }}"><i class="fa-brands fa-youtube"></i></a>
            <a href="{{ session('site_settings')['social']['instagram'] }}"><i class="fa-brands fa-instagram"></i></a>
          </div>
        </div>

        <div class="sect middle-f">
          <h1 class="main-heading" style="color: white">Quick Links</h1>
          <ul class="cstm-ul">
            @if(!empty($menus['Quick Links']))
            @foreach($menus['Quick Links'] as $quick)
            <li>
              <a href="{{$quick['url']}}"><i class="fa-solid fa-angles-right"></i> {{$quick['title']}}</a>
            </li>
            @endforeach
            @endif
          </ul>
          <h1 class="main-heading" style="color: white">Weather at KIT</h1>

          <div class="weather-container">
             <div class="left-whether">
              <img id="weather-icon" src="" alt="Weather Icon">
      
              <div class="description" id="description"></div>
          </div> 
          <div class="right-whether">
              <div class="temp" id="temp"></div>
              <div class="feels-like" id="feels-like"></div>
              <div class="temp-min-max" id="humidity"></div>
              <div class="wind" id="wind"></div>
          </div>
            
            
          </div>
        </div>
        <div class="sect right-f">
          <h1 class="main-heading" style="color: white">Get Direction</h1>

          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d960780.7893895293!2d84.70210912555811!3d19.837838967326245!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a3d5709c8c9526f%3A0x921f65cce2335729!2sKalam%20Institute%20Of%20Technology!5e0!3m2!1sen!2sin!4v1708687522225!5m2!1sen!2sin"
            width="100%" height="300" style="border: 0" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
            <br>
            <br>
            <p style="color:white;background: #ffffff2b;padding: .5rem 1rem;border-radius: 10px;">Approved by AICTE, New Delhi, Affiliated to BPUT, Rourkela &amp; SCTE&amp;VT, Odisha
              Govindapur, Po: Laxmipur-761003 Berhampur, Ganjam, Odisha
              </p>
        </div>
      </div>
    </div>
    <div class="real-footer background-yellow">
      <p>
        Copyright © 2025 Kalam Institute Of Technology (Polytechnic), All Rights
        Reserved.
      </p>
      <p>
        Developed and Maintained by
        <a target="_blank" href="https://allindiaonline.in/">All India Online PVT. LTD.</a>
      </p>
    </div>
  </footer>
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

</body>



</html>
