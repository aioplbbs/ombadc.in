<x-front-layout :menus="$menus">
  <!-- banner start -->

<div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-pause="false">
    <div class="carousel-inner">
      @php
      $i=0;
      @endphp
    @foreach($banners as $banner)
      <div class='carousel-item @if($i==0) active @endif'>
        <img class="d-block w-100" src="{{$banner['original_url']}}" alt="Second slide" />
      </div>
      @php
      $i++;
      @endphp
    @endforeach
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

  <!-- banner end -->

  <!-- news scroll start -->
<div class="latest-news">
    <div class="left-news-box">
      <div class="polygon"></div>
      Latest News
    </div>
    <div class="news-contents">
      <marquee id="marquee" onmouseover="this.stop()" onmouseout="this.start()" class="notice_marquee">
@if(!empty($notices['Latest News']))
@foreach($notices['Latest News'] as $notice)
  <a href="{{$notice['url']}}" 
    target="@if($notice['notice_open_in']=='New') _blank @endif">  {{$notice['notice_name']}}
    @if($notice['notice_blink']=='Yes') <strong class="new">New</strong> @endif
  </a>
@endforeach
@endif
      </marquee>
    </div>
    <button onclick="toggleMarquee()" id="playPauseBtn">
      <i class="fas fa-pause"></i>
    </button>
    <script>
      var marquee = document.getElementById("marquee");
      var isPaused = false;
      var playPauseBtn = document.getElementById("playPauseBtn");

      function toggleMarquee() {
        if (isPaused) {
          marquee.start();
          playPauseBtn.innerHTML = '<i class="fas fa-pause"></i>';
        } else {
          marquee.stop();
          playPauseBtn.innerHTML = '<i class="fas fa-play"></i>';
        }
        isPaused = !isPaused;
      }
    </script>
  </div>

  <!-- news scroll end -->

  <div class="container">
    <div class="row d-flex justify-content-between mt-2">
      <div class="col-md-12 mx-auto">
        <div class="content">
          <div class="imp-links">
            <a href="#" class="single-box-links">
              <i class="fa-solid fa-user-plus"></i>
              <p>Admission</p>
              <i class="fa-solid fa-arrow-right"></i>
            </a>
            <a href="#" class="single-box-links">
              <i class="fa-regular fa-money-bill-1"></i>
              <p>Fee Payment</p>
              <i class="fa-solid fa-arrow-right"></i>
            </a>
            <a href="#" class="single-box-links">
              <i class="fa-solid fa-user-tie"></i>
              <p>Faculties</p>
              <i class="fa-solid fa-arrow-right"></i>
            </a>
            <a href="#" class="single-box-links">
              <i class="fa-solid fa-comments"></i>
              <p>Grievance</p>
              <i class="fa-solid fa-arrow-right"></i>
            </a>
            <a href="#" class="single-box-links">
              <i class="fa-solid fa-calendar-days"></i>
              <p>Holiday List</p>
              <i class="fa-solid fa-arrow-right"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row d-flex justify-content-between mt-2">
      <div class="col-md-8 mx-auto">
        <div class="content">
          <h1 class="main-heading">Institution's Vision</h1>
          <p class="main-vsn">
            About KIP The KIP campus is located in the out-skirts of Berhampur
            city on NH-5. It is about 10 Kms from Berhampur Railway Station &
            5 kms from Berhampur University. The campus is a pollution free
            zone surrounded by lush-green area and noise-free environment.
            Through-out the year, the environment in the area seems to be very
            pleasant blessed by the nature and the geographical location due
            to close proximity from Bay of Bengal & Gopalpur-on-Sea, an
            international tourist place. Around the Institution or very near
            to the location, the presence of many central government
            establishments such as AD college of Indian Army, Indian Rare
            Earth Limited, Berhampur University, College of Fisheries, O.U.A.T
            & National Software Park etc. will support the students with the
            best study atmosphere to pursue technical courses along with the
            facility and opportunity of job oriented Industrial training to
            build best career to prepare for the jobs in corporate sector in
            India and abroad. Utkal Insurance Management and Educational Trust
            (UIMET) was established in Aug-2006 by a group of visionaries with
            the sole objective of promoting technical education in Orissa with
            a view to support the needs of industry and society at large by
            providing due opportunity to the people of Orissa, to upgrade
            their economic standard and maintain a better human life.
            <!-- <img class="back-img" src="{{frontAsset('/assets/icons/mission-accomplished.png')}}" alt="image" /> -->
          </p>
        </div>
      </div>

      <div class="col-md-4 mx-auto">
        <div class="content">
          <div class="card">
            <div class="card__img">
              <img src="{{frontAsset('/assets/image/background.jpg')}}" alt="" width="100%" />
            </div>
            <div class="card__avatar">
              <img src="https://www.kit.edu.in/images/crman.jpg" alt="" />
            </div>
            <div class="card__title">Mr.Kanhu Charan Choudhury</div>
            <div class="card__subtitle">Chairman</div>
            <!-- <p class="description-p">
                Technology is redefining how we interact with the world. The
                multi-disciplinary roles within the fields of engineering,
                architecture and IT will allow you to play an active role in
                this redefinition. Look ahead and arm yourself with the skills
                and knowledge from Kalam Institute of Technology.
              </p> -->
            <div class="card__wrapper">
              <a href="" class="email">
                <i class="fa-solid fa-circle-arrow-right"></i> Know More</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row d-flex justify-content-between mt-2">
      <div class="col-md-8 mx-auto">
        <div class="content">
          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                aria-selected="true">Notice Board</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
                aria-selected="false">News & Events</a>
            </li>
          
          </ul>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
              <ul class="timeline">

@if(!empty($notices['Notices']))
@foreach($notices['Notices'] as $notice)
 <li>
  <div class="timeline-date">{{date('d', strtotime($notice['created_at']))}} <span>{{date('M Y', strtotime($notice['created_at']))}}</span></div>
  <a href="{{$notice['url']}}" 
    target="@if($notice['notice_open_in']=='New') _blank @endif">  {{$notice['notice_name']??''}}
    @if($notice['notice_blink']=='Yes') <strong class="new">New</strong> @endif
  </a>
  </li>
@endforeach
@endif
              </ul>
              <div><a href="/all/notice" class="view-all"> View All ...</a></div>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
              <ul class="timeline">

@if(!empty($notices['News & Event']))
@foreach($notices['News & Event'] as $notice)
 <li>
  <div class="timeline-date">{{date('d', strtotime($notice['created_at']))}} <span>{{date('M Y', strtotime($notice['created_at']))}}</span></div>
  <a href="{{$notice['url']}}" 
    target="@if($notice['notice_open_in']=='New') _blank @endif">  {{$notice['notice_name']}}
    @if($notice['notice_blink']=='Yes') <strong class="new">New</strong> @endif
  </a>
  </li>
@endforeach
@endif
              </ul>
              <div><a href="/all/news" class="view-all"> View All ...</a></div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4 mx-auto">
        <div class="content">

          <h1 class="main-heading">Academic Update</h1>

          <ul class="acd-updates">

@if(!empty($menus['Academic Update']))
@foreach($menus['Academic Update'] as $academic)
 <li>
  <a href="{{$academic['url']}}">{{$academic['title']}}</a>
 </li>
@endforeach
@endif

          </ul>
        </div>
      </div>
    </div>
  </div>

  <div class="arcives mt-2 mb-2">
    <div class="container">
      <div class="main-box-a">
        <div class="single-box-a">
          <img src="{{frontAsset('/assets/icons/reading-book.png')}}" alt="icon" />
          <h2 class="numbers" data-target="1000">0</h2>
          <h3 class="name-a">Students</h3>
        </div>

        <div class="single-box-a">
          <img src="{{frontAsset('/assets/icons/teacher.png')}}" alt="icon" />
          <h2 class="numbers" data-target="75">0</h2>
          <h3 class="name-a">Faculty & Staff</h3>
        </div>

        <div class="single-box-a">
          <img src="{{frontAsset('/assets/icons/alumni.png')}}" alt="icon" />
          <h2 class="numbers" data-target="6000">0</h2>
          <h3 class="name-a">Alumni</h3>
        </div>

        <div class="single-box-a">
          <img src="{{frontAsset('/assets/icons/project-management.png')}}" alt="icon" />
          <h2 class="numbers" data-target="10000">0</h2>
          <h3 class="name-a">Projects</h3>
        </div>

        <div class="single-box-a">
          <img src="{{frontAsset('/assets/icons/lecture.png')}}" alt="icon" />
          <h2 class="numbers" data-target="20000">0</h2>
          <h3 class="name-a">Conferences</h3>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row d-flex justify-content-between mt-2 mb-2">
      <div class="col-md-6 mx-auto">
        <div class="content">
          <div class="container">
            <h1 class="main-heading">Campus Facilities</h1>

            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-pause="false">
              <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="6"></li>
              </ol>
              <div class="carousel-inner csd">
                <div class="carousel-item active">
                  <img class="d-block w-100" src="{{frontAsset('/assets/image/computer lab.jpg')}}" alt="First slide" />
                  <div class="carousel-caption d-none d-md-block">
                    <h5>Computer Centre</h5>
                    <p>
                      Our tech hub fuels innovation with cutting-edge
                      resources, driving academic and research excellence.
                    </p>
                  </div>
                </div>

                <div class="carousel-item">
                  <img class="d-block w-100" src="{{frontAsset('/assets/image/Library1.jpg')}}" alt="Second slide" />
                  <div class="carousel-caption d-none d-md-block">
                    <h5>Library</h5>
                    <p>
                      A scholarly cornerstone offering curated knowledge for
                      academic growth and research exploration.
                    </p>
                  </div>
                </div>

                <div class="carousel-item">
                  <img class="d-block w-100" src="{{frontAsset('/assets/image/chemistry-lab-cdlsiet.jpg')}}" alt="Second slide" />
                  <div class="carousel-caption d-none d-md-block">
                    <h5>Laboratories</h5>
                    <p>
                      Hands-on learning hubs equipped to nurture critical
                      thinking and problem-solving skills.
                    </p>
                  </div>
                </div>

                <div class="carousel-item">
                  <img class="d-block w-100" src="{{frontAsset('/assets/image/hostel-room.jpg')}}" alt="Second slide" />
                  <div class="carousel-caption d-none d-md-block">
                    <h5>Hostel</h5>
                    <p>
                      A supportive community fostering cultural exchange and
                      personal growth.
                    </p>
                  </div>
                </div>

                <div class="carousel-item">
                  <img class="d-block w-100" src="{{frontAsset('/assets/image/21.png')}}" alt="Second slide" />
                  <div class="carousel-caption d-none d-md-block">
                    <h5>Transport</h5>
                    <p>
                      Reliable commuting solutions ensuring seamless campus
                      access.
                    </p>
                  </div>
                </div>

                <div class="carousel-item">
                  <img class="d-block w-100" src="{{frontAsset('/assets/image/canteen.jpg')}}" alt="Second slide" />
                  <div class="carousel-caption d-none d-md-block">
                    <h5>Canteen</h5>
                    <p>
                      A culinary oasis promoting social interaction and
                      nourishment.
                    </p>
                  </div>
                </div>

                <div class="carousel-item">
                  <img class="d-block w-100" src="{{frontAsset('/assets/image/audi.jpg')}}" alt="Second slide" />
                  <div class="carousel-caption d-none d-md-block">
                    <h5>Auditorium</h5>
                    <p>
                      A hub for intellectual discourse and cultural
                      enrichment.
                    </p>
                  </div>
                </div>

                <div class="carousel-item">
                  <img class="d-block w-100" src="{{frontAsset('/assets/image/conf.jpg')}}" alt="Second slide" />
                  <div class="carousel-caption d-none d-md-block">
                    <h5>Seminar Hall</h5>
                    <p>
                      A space for interactive learning and professional
                      development.
                    </p>
                  </div>
                </div>
              </div>
              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 mx-auto">
        <div class="content">
          <div class="container">
            <h1 class="main-heading">Photo Gallery</h1>
            <div class="main-f">
              @foreach ($galleries as $gallery)
              <a class="single-f" href="{{ $gallery->getUrl() }}" data-fancybox="gallery">
                <img src="{{ $gallery->getUrl() }}" alt="image" />
              </a>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</x-front-layout>