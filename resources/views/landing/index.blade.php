@extends('template.landing')
@section('content')
    
<section id="home" class="video-section js-height-full">
    <div class="overlay"></div>
    <div class="home-text-wrapper relative container">
        <div class="home-message">
            <p>Edulogy High School</p>
            <small>Edulogy is the ideal choice for your organization, your business and your online education system. Create your online course now with unlimited page templates, color options, and menu features.</small>
            <div class="btn-wrapper">
                <div class="text-center">
                    <a href="{{ route('landing.create') }}" class="btn btn-primary wow slideInLeft">Register Sekarang</a>
                </div>
            </div><!-- end row -->
        </div>
    </div>  
    <div class="slider-bottom">
        <span>Explore <i class="fa fa-angle-down"></i></span>
    </div>
</section>
<section class="section gb">
    <div class="container">
        <div class="section-title text-center">
            <h3>Program</h3>
            <p>Maecenas sit amet tristique turpis. Quisque porttitor eros quis leo pulvinar, at hendrerit sapien iaculis. Donec consectetur accumsan arcu, sit amet fringilla ex ultricies.</p>
        </div><!-- end title -->
    </div><!-- end container -->
</section>
@endsection