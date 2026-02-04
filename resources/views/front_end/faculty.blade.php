<x-front-layout :menus="$menus">

<div class="inner-banner">
    <img src="{{frontAsset('/assets/image/innerbanner.jpg')}}" alt="" width="100%" />
    <p class="inner-banner__text"><a href="{{ route('home') }}">Home</a> <i class="fa-solid fa-angles-right"></i> Faculties</p>
</div>

<section class="faculty" style="background-image: url('/assets/image/1167169_ORU2CC0.jpg')">
    <div class="faculty-grid">
        @foreach($faculties as $faculty)
            <div class="faculty-grid-box">
                <img src="{{ $faculty->getFirstMediaUrl('faculty_profile') }}" alt="{{ $faculty->name }}">
                <h3>{{ $faculty->salutation }} {{ $faculty->name }}</h3>
                <h4>{{ $faculty->designation }}</h4>
                <h4><a href="{{url('profile/'.$faculty->slug)}}">View Profile</a></h4>
            </div>
        @endforeach
    </div>
</section>


</x-front-layout>


