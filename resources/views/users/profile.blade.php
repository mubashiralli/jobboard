@extends('layouts.app')

@section('content')

<section class="section-hero overlay inner-page bg-image" style="background-image: url({{asset('assets/images/hero_1.jpg')}});margin-top: -1.6rem;" id="home-section">
            <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-7">
                <div class="card p-3 py-4">
                        
                        <div class="text-center">
                            <img src="{{asset('assets/images/' . $user->image)}}" width="100" class="rounded-circle">
                        </div>
                        
                        <div class="text-center mt-3">
                            <!-- <span class="bg-secondary p-1 px-4 rounded text-white">Pro</span> -->
                            <a class="btn btn-warning btn-block btn-lg " href ={{asset("assets/files/" . $user->cv)}} style="width:50%;">Resume</a>
                            <h5 class="mt-2 mb-0">{{ ucfirst($user->name) }}</h5>
                            <span>{{$user->job_title}}</span>
                            
                            <div class="px-4 mt-1">
                                <p class="fonts">{{$user->bio}}</p>
                            
                            </div>
                            
                            <div class="px-3">
                        <a href="{{$user->facebook}}" target='_blank' class="pt-3 pb-3 pr-3 pl-0 underline-none"><span class="icon-facebook"></span></a>
                        <a href="{{$user->linkedin}}" target='_blank' class="pt-3 pb-3 pr-3 pl-0"><span class="icon-linkedin"></span></a>
                        <a href="{{$user->x}}" target='_blank' class="pt-3 pb-3 pr-3 pl-0"><span class="icon-twitter"></span></a>
                    </div>
                        
                        
                            
                        </div>
                        
                    
                        
                        
                    </div>
                </div>
            </div>

            
            </div>
        </section>
@endsection