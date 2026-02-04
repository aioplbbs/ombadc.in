<x-front-layout :menus="$menus">
<!-- <div class="inner-banner">
    <img src="{{frontAsset('/assets/image/innerbanner.jpg')}}" alt="" width="100%" />
    <p class="inner-banner__text"><a href="">Home</a> <i class="fa-solid fa-angles-right"></i> {{$page->name}}</p>
</div> -->
@push('style')
<style>
    #morex,
    #morex1,
    #morex3,
    #morex6,
    #morex9 {
      display: none ;
    }

    .scrollable {
      overflow: auto ;
    }

    .non-scrollable {
      overflow: hidden ;
    }

    .btn-readmore {
      border: none;
      /* color: red; */
      background: none;
      text-align: right;
      /* right: 0px; */
      font-size: 20px;
      padding: 0;
      margin: 0;
    }

    ::-webkit-scrollbar {
      width: 5px;
    }


    ::-webkit-scrollbar-track {
      background: #f1f1f1;
    }


    ::-webkit-scrollbar-thumb {
      background: #888;
    }



    ::-webkit-scrollbar-thumb:hover {
      background: #008b3d;
    }



    #containertfgh {
      /* border: 1px solid red; */
    width: 100%;
    height: 550px;
    position: relative;
      /* background: radial-gradient(ellipse at center, rgba(139, 143, 145, 1) 0%, rgba(111, 113, 113, 1) 47%, rgba(63, 63, 65, 1) 100%); */
    }

    .legendio {
      position: absolute;
      color: #315d2c;
      left: 40vh;
      top: -3vh;
      text-align: center;
      /* border: 1px solid red; */
      width: 40vh;
      font-size: 6vh;
      font-weight: bold;

    }


    .item15 {
      border: solid 25px #92dcab;
      border-radius: 100%;
      position: absolute;
      box-shadow: #000 0 0 15px;
      background-color: white;
      display: flex;
      flex-direction: column;
      text-align: center;
    }

    .item25 {
      border: solid 20px #329152;
      border-radius: 100%;
      position: absolute;
      box-shadow: #000 0 0 15px;
      background-color: white;
      display: flex;
      flex-direction: column;
      text-align: center;
    }

    .item35 {
      border: solid 19px #003e15;
      border-radius: 100%;
      position: absolute;
      box-shadow: #000 0 0 15px;
      background-color: white;
      display: flex;
      flex-direction: column;
      text-align: center;
    }



    .valuehtju {
      display: flex;
      flex-grow: 1.5;
      /* font-family: 'Rubik'; */
      font-weight: bold;
      align-items: flex-end;
      justify-content: center;
    }

    .valuehtju span {
      vertical-align: baseline;
    }

    .valuehtju small {
      font-size: .5em;
      line-height: 1em;
    }

    .titleopls {
      flex-grow: 1;
      align-items: flex-end;
      justify-content: center;
    }

    .titleopls i {
      display: block;
      font-size: 1.4em;
    }

    #first {
      left:0;
      top: 0;
      width: 300px;
      height: 300px;
      z-index: 1;
    }

    #first .valuehtju {
      font-size: 45px;
    }

    #first .titleopls {
      font-size: 30px;
      margin-top: 15px;
    }

    #second {
      left: 213px;
    top: 177px;
      width: 250px;
      height: 250px;
      z-index: 2;
    }

    #second .valuehtju {
      font-size: 35px;
    }

    #second .titleopls {
      margin-top: 15px;
      font-size: 30px;
    }

    #third {
      left: 69px;
    top: 335px;
      width: 230px;
      height: 230px;
      z-index: 3;
    }

    #third .valuehtju {
      font-size: 30px;
    }

    #third .titleopls {
      font-size: 30px;
      margin-top: 15px;
    }
    .department-heading {
            font-size: 2rem;
            color: #008b3d;
        }

        .about-cont p {
            font-size: 1.3rem;
            line-height: 1.5;
            color: #000;
        }

        .sambalpuri-bullet li {
            font-size: 1.2rem;
        }

        td {
            padding: 8px;
            text-align: left;
        }
  </style>
@endpush


    @switch($page->page_type)
      @case('Sector')
        @include('front_end.pages.sector')
        @break
      @case('Annual Reports')
        @include('front_end.pages.card-list', ['bread' => 'Publication'])
        @break
      @case('Brochures')
        @include('front_end.pages.card-list', ['bread' => 'Publication'])
        @break
      @case('Articles')
        @include('front_end.pages.card-list', ['bread' => 'Publication'])
        @break
      @case('Success Story')
        @include('front_end.pages.card-list', ['bread' => 'Publication'])
        @break
      @case('Downloads')
        @include('front_end.pages.card-list')
        @break
      @case('Orders')
        @include('front_end.pages.card-list', ['bread' => 'About Us'])
        @break
      @case('Guidelines')
        @include('front_end.pages.card-list', ['bread' => 'About Us'])
        @break
      @case('None')
        {!! $page->page_content !!}
        @break
    @endswitch

@push('script')
  <script data-cfasync="false" src="https://www.ombadc.in/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
  <script>
    function toggleReadMore6() {
      var dots = document.getElementById("dots6");
      var moreText = document.getElementById("morex6"); // mention in upper css to display none
      var btnText = document.getElementById("moreBtn6");
      var scrollableText = document.getElementById("scrollableText6");
      if (dots.style.display === "none") {
        dots.style.display = "inline";
        btnText.innerHTML = "Read more...";
        moreText.style.display = "none";
        scrollableText.className = "non-scrollable";
      } else {
        dots.style.display = "none";
        btnText.innerHTML = "Read less...";
        moreText.style.display = "inline";
        scrollableText.className = "scrollable";
      }
    }
  </script>
  <script>
		// number animate when it aper in view port
       $(document).ready(function() {
    const options = {
      root: null, // Use the viewport as the root
      rootMargin: '0px',
      threshold: 0.1, // When 10% of the element is in the viewport
    };
    const observer = new IntersectionObserver(entries => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
			
          const $element = $(entry.target);
          const finalValue = parseFloat($element.data('final-value'));
          const duration = 3000; // 3 seconds
          const steps = 120; // Number of animation steps
          const stepValue = finalValue / steps;
          let currentValue = 0;
          const stepDuration = duration / steps;

          function animateValue() {
            if (currentValue < finalValue) {
              currentValue += stepValue;
              $element.text(Math.round(currentValue));
              setTimeout(animateValue, stepDuration);
            } else {
              $element.text(finalValue);
            }
          }

          animateValue();
          observer.unobserve(entry.target); // Stop observing once animation starts
        }
      });
    }, options);

    $('.animate').each(function() {
      observer.observe(this);
    });
  });
    </script>
  <script>
    document.getElementById("outer3").addEventListener("click", toggleState3);

      function toggleState3() {
        let galleryView = document.getElementById("galleryView")
        let tilesView = document.getElementById("tilesView")
        let outer = document.getElementById("outer3");
        let slider = document.getElementById("slider3");
        let tilesContainer = document.getElementById("tilesContainer");
        if (slider.classList.contains("active")) {
          slider.classList.remove("active");
          outer.classList.remove("outerActive");
          galleryView.style.display = "flex";
          tilesView.style.display = "none";

          while (tilesContainer.hasChildNodes()) {
            tilesContainer.removeChild(tilesContainer.firstChild)
          }
        } else {
          slider.classList.add("active");
          outer.classList.add("outerActive");
          galleryView.style.display = "none";
          tilesView.style.display = "flex";

          for (let i = 0; i < imgObject.length - 1; i++) {
            let tileItem = document.createElement("div");
            tileItem.classList.add("tileItem");
            tileItem.style.background = "url(" + imgObject[i] + ")";
            tileItem.style.backgroundSize = "contain";
            tilesContainer.appendChild(tileItem);
          }
        };
      }
  </script>
@endpush
</x-front-layout>