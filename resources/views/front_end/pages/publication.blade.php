<section class="section banner">
	<div class="bg-banner"style="background-image: url('https://www.ombadc.in/images/innerbanner/breadcrump.jpg');background-size: cover;">
		<div class="b-title">
			<ul class="b-menu">
				<li class="b-item"><a href="{{url('/')}}">Home</a></li>
				<li class="b-item"><a href="javascript:void(0)">Publications</a></li>
				<li class="b-item"><a class="active">{{$page->name}}</a></li>
			</ul>
			<h3>{{$page->name}}</h3>
		</div>
	</div>
</section>

<section class="section">
        <div class="maain-meeting-grid">
        @if(!empty($page->sub_content))
        @foreach($page->sub_content as $value)
        <a class="maain-meeting-grid-box" target="_blank" href="{{$value->getFirstMediaUrl('page_pdf')}}">
           <div>
            <img src="{{$value->getFirstMediaUrl('page_photo')}}" alt="image">
            <p class="meeting-caption">{{$value->name}}</p>
            <p class="meeting-date-caption"> </p>
            <p class="description-card"> {{$value->page_content}}</p>
            <button class="read-all-doc" href="{{$value->getFirstMediaUrl('page_pdf')}}">Read</button>
           </div>
        </a>
        @endforeach
        @endif
    </div>
</section>