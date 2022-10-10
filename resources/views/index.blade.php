@extends('layouts/frontendLayout/frontend_design')
@section('content')
            <div class="tm-section tm-bg-img" id="tm-section-1">
                <div class="tm-bg-white ie-container-width-fix-2">
                    <div class="container ie-h-align-center-fix" >
                        <div class="row">
                            <div class="col-xs-12 ml-auto mr-auto ie-container-width-fix">
                            @if(Session::has('error_message'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert" style="width: 70%">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <strong>Oh snap!</strong> {!! session('error_message') !!}
                            </div>
                            @endif

                            <div class="container" style="text-align: center;">
                              <form action="{{ url('/track-order') }}" method="post" style="display: inline-block;">{{ csrf_field() }}
                                <div class="form-group row ">
                                <div class="">
                                <label><i class="fa fa-phone fa-2x"> Phone number</i></label>
                                  <input name="phone_no" type="text" class="form-control" id="phone_no" placeholder="Phone Number..." required >
                                  </div>
                                </div>
                                <div class="form-group row ">
                                <div class="">
                                <label><i class="fa fa-hashtag fa-2x"> Order number</i></label>
                                  <input name="order_no" type="text" class="form-control" id="order_no" placeholder="Order Number..." required>
                                  </div>
                                </div>
                                <div class="form-group tm-form-element">
                                    <button type="submit" class="btn btn-primary" style="text-align: center;">Track</button>
                                 </div>
                              </form>
                            </div>
                        </div>
                                              
                        </div>      
                    </div>
                </div>                  
            </div>
            
            <div class="tm-section-2">
                <div class="container">
                    <div class="row">
                        <div class="col text-center">
                            <h2 class="tm-section-title">We are here to help you?</h2>
                            <p class="tm-color-white tm-section-subtitle">Subscribe to get our newsletters</p>
                            <a href="#" class="tm-color-white tm-btn-white-bordered">Subscribe Newletters</a>
                        </div>                
                    </div>
                </div>        
            </div>
            
            <div class="tm-section tm-position-relative" id="our-services">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none" class="tm-section-down-arrow">
                    <polygon fill="#283179" points="0,0  100,0  50,60"></polygon>                   
                </svg> 
                <div class="container tm-pt-5 tm-pb-4">
                    <div class="row text-center">
                    @foreach($services as $service)
                        <article class="col-sm-12 col-md-4 col-lg-4 col-xl-4 tm-article">                            
                            <i class="fa tm-fa-6x {{ $service->icon }} tm-color-primary tm-margin-b-20"></i>
                            <h3 class="tm-color-primary tm-article-title-1">{{ $service->title }}</h3>
                            <p>{{ $service->detail }}</p>
                        </article>
                        @endforeach
                    </div>        
                </div>
            </div>
            <div class="tm-section tm-section-pad tm-bg-gray" id="tm-section-4">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="tm-article-carousel">  

                            @foreach($abouts as $about)
                                <article class="tm-bg-white mr-2 tm-carousel-item">
                                    <img src="{{ asset('images/backend_images/about/'.$about->image) }}" alt="Image" class="img-fluid" style="margin-left: 30px; width: 500px;"> 
                                    <div class="tm-article-pad">
                                        <header><h3 class="text-uppercase tm-article-title-2">{{ $about->title }}</h3></header>
                                        <p>{{ $about->detail }}</p>
                                        <a href="#" class="text-uppercase btn-primary tm-btn-primary">Get More Info.</a>
                                    </div>                                
                                </article>
                            @endforeach 
                            </div>    
                        </div>
                    </div>
                </div>
            </div>
            <div class="tm-section tm-section-pad tm-bg-img tm-position-relative" id="tm-section-6">
                <div class="container ie-h-align-center-fix">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-7">
                            <!--<div id="google-map"></div>-->        
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-5 mt-3 mt-md-0">
                            <div class="tm-bg-white tm-p-4">
                            @if(Session::has('success_message'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <strong></strong> {!! session('success_message') !!}
                            </div>
                            @endif
                                <form action="{{ url('/contact') }}" method="post" class="contact-form" id="contactForm">{{ csrf_field() }}
                                    <div class="form-group">
                                        <input type="text" id="contact_name" name="name" class="form-control" placeholder="Name" required/>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" id="contact_email" name="email" class="form-control" placeholder="Email" required/>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" id="contact_subject" name="subject" class="form-control" placeholder="Subject" required/>
                                    </div>
                                    <div class="form-group">
                                        <textarea id="contact_message" name="message" class="form-control" rows="9" placeholder="Message" required></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary tm-btn-primary">Send Message Now</button>
                                </form>
                            </div>                            
                        </div>
                    </div>        
                </div>
            </div>
             @endsection     