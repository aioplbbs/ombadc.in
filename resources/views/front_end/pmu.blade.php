<x-front-layout :menus="$menus" :departments="$departments">
    @push('style')
    <style>
        .new-heading-bodx{
            font-weight: bold;
            color: white;
            text-align: center;
            font-weight: 700;
            margin-bottom: 20px;
            text-shadow: 0px 5px rgb(0 0 0 / 20%);
        }
        .sub-coll-sdg-x{
            z-index: 999;
            border-radius: 5px;
            background: #6395ec;
            color: #FFF;
            font-size: 18px;
            padding: 5px 10px;
        }
    </style>
    @endpush
    <section class="section banner">
		<div class="bg-banner" style="background-image: url('{{ frontAsset('assets/images/breadcrump.jpg') }}');background-size: cover;">
			<div class="b-title">
				<ul class="b-menu">
					<li class="b-item"><a href="{{ route('home') }}">Home</a></li>
					<li class="b-item"><a href="javascript:void(0)">About Us</a></li>
					<li class="b-item"><a class="active">PMU</a></li>
				</ul>
				<h3> Program Managing Unit</h3>
			</div>
		</div>
	</section>

	<section class="section" style="background-color: #51c878;">
		<div class="sec-bg">
			<div class="container-fluid">
				<div class="row justify-content-center">
					@php
					$i=0;
					@endphp
                    @foreach($personal_profiles as $personal_profile)
                    @php
                    $image_url = $personal_profile->getFirstMediaUrl('personal_profile')
                    @endphp
                    @if($i==0)
                    <div class="col-xl-12 col-lg-5 col-md-6">
						<center>
							<div class="cards">
								<div class="profile-pic">
									<img src="{{ $image_url }}" alt="staff">
								</div>
								<div class="bottom">
									<div class="content"><br>
										<p class="about-me">{{ $personal_profile->short_brief }}</p>
									</div>
									<div class="bottom-bottom">
										<span class="name">{{ $personal_profile->name }}</span>
										<div class="social-links-container"><br>
											{{ $personal_profile->designation }}
										</div>
									</div>
								</div>
							</div>
						</center>
					</div>
                    @else
                    <div class="col-xl-4 col-lg-5 col-md-6">
						<!-- <center> -->
						<div class="cards">
							<div class="profile-pic">
								<img src="{{ $image_url }}" alt="staff">
							</div>
							<div class="bottom">
								<div class="content"><br>
									<p class="about-me">{{ $personal_profile->short_brief }}</p>
								</div>
								<div class="bottom-bottom">
									<span class="name">{{ $personal_profile->name }}</span>
									<div class="social-links-container"><br>
										{{ $personal_profile->designation }}
									</div>
								</div>
							</div>
						</div>
						<!-- </center> -->
					</div>
                    @endif
                    @php
                    $i++;
                    @endphp
                    @endforeach
				</div>
			</div>
		</div>
		<!--// Our Team Area -->
	</section>
</x-front-layout>