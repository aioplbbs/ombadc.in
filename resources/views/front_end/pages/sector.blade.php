@if (!empty($page->getMedia('page_banner')))

<section class="section banner">
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        @php
        $i=0;
        @endphp
        @foreach($page->getMedia('page_banner') as $banner)
            <div class="carousel-item @if($i == 0){{'active'}} @endif">
                <img src="{{$banner->getUrl()}}" class="d-block w-100" alt="...">
            </div>
            @php
            $i++;
            @endphp
        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span> </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span> </button>
    </div>
</section>
@else

@endif

<section class="section counter-section">
    <div class="purpose-sec">
    <div class="container-fluid">
        <div class="row">
        <div class="col-lg-7 col-md-12 purpose-left" style="background-color: #92dcab; overflow-y: hidden; ">
            <h3 class="boldh3">{{ $page->name }}</h3> 
            {!! $page->page_content !!}
            <button class="btn-readmore" onClick="toggleReadMore9()" id="moreBtn9">Read more ...</button>

            <script>
                function toggleReadMore9() {
                var dots = document.getElementById("dots9");
                var moreText = document.getElementById("morex9"); 
                var btnText = document.getElementById("moreBtn9");
                var scrollableText = document.getElementById("scrollableText9");
                console.log(dots);
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
            
            </div>
            @php
            $sector_data = $page->customData->data;
            @endphp
        <div class="col-lg-5 col-md-12">
            <div class="counter-content">
            <div id='containertfgh'>
                <div class='legendio'>
                <div class='legendio-top'> </div>
                
                </div>
                <div id='first' class='item15'>
                <div class='valuehtju'>
                    <div><span class="animate" data-final-value="{{ $sector_data['sanctioned'] }}">0</span><small> cr</small></div>
                </div>
                <div class='titleopls'>Sanctioned
                    
                </div>
                </div>
                <div id='second' class='item25'>
                <div class='valuehtju'>
                    <div><span class="animate" data-final-value="{{ $sector_data['released'] }}">0</span><small> cr</small></div>
                </div>
                <div class='titleopls'>Released
                    
                </div>
                </div>
                <div id='third' class='item35'>
                <div class='valuehtju'>
                    <div><span class="animate" data-final-value="{{ $sector_data['utilized'] }}">0</span><small> cr</small></div>
                </div>
                <div class='titleopls'>Utilized
                    
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
</section>