<x-front-layout :menus="$menus">
<div class="inner-banner">
    <img src="{{frontAsset('/assets/image/innerbanner.jpg')}}" alt="" width="100%" />
    <p class="inner-banner__text"><a href="">Home</a> <i class="fa-solid fa-angles-right"></i> {{$page->name}}</p>
</div>

<section>
    <div class="container">
        <div class="row d-flex justify-content-between mt-2">
            @if($page->page_type=='None')
            <div class="col-md-12 mx-auto">
                <h2 class="main-heading">{{$page->name}}</h2>
                 <div class="content">
                      {!! $page->page_content !!}
                </div>
            </div>
            @elseif($page->page_type=="Left")
            
                    <div class="col-md-8 mx-auto">

                              <div class="content">
                                <h2 class="main-heading">{{$page->name}}</h2>
                      {!! $page->page_content !!}
                             </div>
                    </div>
            <div class="col-md-4 mx-auto">
                <div class="content">
                <img src="{{$page->getFirstMediaUrl('page_photo')}}" alt="" width="100%" style="border-radius: 8px; border:5px solid gray" />
           </div>
            </div>




            @elseif($page->page_type=="Right")



             <h2 class="main-heading">{{$page->name}}</h2>
                  
            <div class="col-md-4 mx-auto">
                <div class="content">
                <img src="" alt="" width="100%" style="border-radius: 8px; border:5px solid gray" />
           </div>
            </div>
              <div class="col-md-8 mx-auto">
                
                              <div class="content">
                      {!! $page->page_content !!}
                             </div>
                    </div>




            @endif
        </div>
    </div>
</section>



</x-front-layout>