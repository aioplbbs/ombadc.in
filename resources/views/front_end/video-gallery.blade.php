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
.demo-gallery > ul {
    margin-bottom: 0;
    display: inline-block;
    display: flex
;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: space-evenly;
}
.demo-gallery > ul li {
    width: 45%;
    border-radius: 5px;
    overflow: hidden;
    padding: 5px;
    border: 1px solid #d9d9d9;
    box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
}
.demo-gallery p{
  font-size: 1.3rem;
  color: black;
}
</style>
    @endpush
    <section class="section banner">
		<div class="bg-banner" style="background-image: url('{{ frontAsset('assets/images/breadcrump.jpg') }}');background-size: cover;">
			<div class="b-title">
				<ul class="b-menu">
					<li class="b-item"><a href="{{ route('home') }}">Home</a></li>
					<li class="b-item"><a href="javascript:void(0)">About Us</a></li>
					<li class="b-item"><a class="active">Video-galleries</a></li>
				</ul>
				<h3> Program Managing Unit</h3>
			</div>
		</div>
	</section>

	<section class="section">
	    <div id="container-fluid" class="container">
	        <div class="row">
                <div class="col-md-12 mt-4 mb-4">
                    <div class="demo-gallery">
					    <ul>
                            @foreach($videos as $video)
                                <li>
						            <iframe 
                                        width="100%" 
                                        height="325" 
                                        src="https://www.youtube.com/embed/{{ $video->code }}" 
                                        frameborder="0" 
                                        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" 
                                        allowfullscreen=""
                                    ></iframe>
                                    <br>
                                    <p>{{ $video->name }}</p>
						        </li>
                            @endforeach
					    </ul>
				    </div> 
                </div>
			</div>
	    </div>
    </section>
</x-front-layout>