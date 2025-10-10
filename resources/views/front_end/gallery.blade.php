<x-front-layout :menus="$menus">
  <div class="inner-banner">
    <img src="{{frontAsset('/assets/image/innerbanner.jpg')}}" alt="" width="100%" />
    <p class="inner-banner__text">Photo Gallery @if(!empty($gallery)) » {{$gallery->caption}} @endif</p>
  </div>

  <div class="container mb-5">
    <div
      class="row d-flex justify-content-between mt-5"
      style="padding: 0 40px"
    >
      <div class="col-md-12 mx-auto">
        <div class="content">
          <h1 class="main-heading">Photo Gallery @if(!empty($gallery)) » {{$gallery->caption}} @endif</h1>

          
            @if(!empty($galleries) && $galleries->isNotEmpty()) 
            <div class="glry-grid">
              @foreach($galleries as $value)
              <div class="item">
                <a class="gal_img" href="{{url('galleries/'.$value->slug)}}">
                  <div class="pad15">
                    <div class="image-box item-zoom">
                      <img
                        src="{{$value->getFirstMediaUrl('gallery')}}"
                        alt=""
                        class="titel_image"
                      />
                    </div>

                    <div class="box_10">{{$value->caption??''}}</div>
                  </div>
                </a>
              </div>
              @endforeach 
              </div>
            @endif

            @if(!empty($gallery))
            <div class="demo-gallery">
            <div class="glry-grid">
            @foreach($gallery->getMedia('gallery') as $value)
            <a
                href="{{$value->getUrl()}}"
                data-fancybox="gallery"
              >
                <img
                  src="{{$value->getUrl()}}"
                  alt="{{$gallery->caption??''}}"
                  title="{{$gallery->caption??''}}"
                />
              </a>
            @endforeach
            </div>
            </div>
            @endif

          
        </div>
      </div>
    </div>
  </div>
</x-front-layout>
