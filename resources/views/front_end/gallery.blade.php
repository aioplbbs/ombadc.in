<x-front-layout :menus="$menus" :departments="$departments">
    @push('style')
    <style>
      body{
        overflow-x: hidden
      }
      .photo-gallery {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
      }
      .photo-gallery .item {
        margin: 5px 5px 0px 0px;
      }
      .photo-gallery .item .box_10{
        position:absolute;
        bottom:0;
        width:100%;
        padding:5px 0;
        text-align:center;
        background:rgb(0,0,0,0.7);
        color:#FFF;

      }
    </style>
    @endpush
    <section class="section banner">
        <div class="bg-banner"style="background-image: url('https://www.ombadc.in/images/innerbanner/history.jpg');background-size: cover;">
            <div class="b-title">
                <ul class="b-menu">
                    <li class="b-item"><a href="">Home</a></li>
                    <li class="b-item"><a href="javascript:void(0)">About Us</a></li>
                    <li class="b-item"><a class="active">Photo Gallery</a></li>
                </ul>
                <h3> Photo Gallery</h3>
            </div>
        </div>
    </section>

    
    <section class="section">
	    <div id="container-fluid">
	        <div class="row">
	          @if($slug!=null)
              <div class="demo-gallery">
			            <ul class="lightgallery" id="lightgallery">
                        @foreach($gallery->getMedia('gallery') as $data)
                        @php
                          $imageUrl = $data->getUrl() ?: asset('assets/images/small/small-1.jpg');
                          $thumbnail = $data->getUrl('thumb') ?: asset('assets/images/small/small-1.jpg');
                        @endphp
                        <li data-responsive="{{ $imageUrl }}" data-src="{{ $imageUrl }}">
                            <a href="">
                                <img src="{{ $thumbnail }}" alt="{{ $data->caption }}" title="{{ $data->caption }}" />
                            </a>
                        </li>
                        @endforeach
                  </ul>
		          </div> 
		        @else
		        <div class="MultiCarousel-inner photo-gallery">
                    @foreach($galleries as $gallery)
                    @php
                      $imageUrl = $gallery->getFirstMediaUrl('gallery', 'thumb') ?: asset('assets/images/small/small-1.jpg');
                      $thumbnail = $gallery->getFirstMedia('gallery')->getUrl('thumb') ?: asset('assets/images/small/small-1.jpg');
                    @endphp
                    <div class="item">
                        <a class="gal_img" href="{{ route('galleries', ['slug'=>$gallery->slug]) }}">
                            <div class="pad15">
                                <div class="image-box item-zoom" >
                                    <img src="{{ $thumbnail }}" alt="{{ $gallery->caption }}" class="titel_image" >
                                </div>
                                <div class="box_10">
                                    {{ substr($gallery->caption, 0, 200) }} @if(strlen($gallery->caption) >200) {{ ' ..' }} @endif
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
		        </div>
		        @endif
	        </div>
	    </div>
    </section>

    @push('script')
    <!-- jQuery JS -->
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
                    tileItem.style.background =  "url(" + imgObject[i] + ")";
                    tileItem.style.backgroundSize = "contain";  
                    tilesContainer.appendChild(tileItem);      
                }
            };
        }
    
        let imgObject = [
            @if($slug != null)
            @foreach($gallery->getMedia('gallery') as $gallery)
                "{{ $gallery->getUrl() }}",
            @endforeach
            @endif
        ];
    
        let mainImg = 0;
        let prevprevImg = imgObject.length - 2;
        let prevImg = imgObject.length - 1;
        let nextImg = 1;
        let nextnextImg = 2;
    
        function loadGallery() {
            let mainView = document.getElementById("mainView");
            mainView.style.background = "url(" + imgObject[mainImg] + ")center center / cover no-repeat";

            let left_leftView = document.getElementById("left-leftView");
            left_leftView.style.background = "url(" + imgObject[prevprevImg] + ")";
            
            let leftView = document.getElementById("leftView");
            leftView.style.background = "url(" + imgObject[prevImg] + ")";

            let right_rightView = document.getElementById("right-rightView");
            right_rightView.style.background = "url(" + imgObject[nextnextImg] + ")";
            
            let rightView = document.getElementById("rightView");
            rightView.style.background = "url(" + imgObject[nextImg] + ")";
            
            let linkTag = document.getElementById("linkTag")
            linkTag.href = imgObject[mainImg];
        };

        function scrollRight() {
            prevImg = mainImg;
            mainImg = nextImg;
            if (nextImg >= (imgObject.length -1)) {
                nextImg = 0;
            } else {
                nextImg++;
            }; 
            loadGallery();
        };
    
        function scrollLeft() {
            nextImg = mainImg
            mainImg = prevImg;
            
            if (prevImg === 0) {
                prevImg = imgObject.length - 1;
            } else {
                prevImg--;
            };
            loadGallery();
        };
    
        document.getElementById("navRight").addEventListener("click", scrollRight);
        document.getElementById("navLeft").addEventListener("click", scrollLeft);
        document.getElementById("rightView").addEventListener("click", scrollRight);
        document.getElementById("leftView").addEventListener("click", scrollLeft);
        document.addEventListener('keyup',function(e){
            if (e.keyCode === 37) {
                scrollLeft();
            } else if(e.keyCode === 39) {
                scrollRight();
            }
        });
        loadGallery();
    </script>
    <link rel='stylesheet' href="https://www.ombadc.in/assets/css/lightgallery.css">
    <script src='https://www.ombadc.in/assets/js/lightgallery-all.min.js'></script>
    <script>
        $(document).ready(function() {
            $('#lightgallery').lightGallery({
                pager: true
            });
        });
    </script>
    @endpush
</x-front-layout>
