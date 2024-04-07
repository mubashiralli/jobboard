@extends('layouts.app')
<section class="section-hero overlay inner-page bg-image"
  style="background-image: url({{asset('assets/images/hero_1.jpg')}});" id="home-section">
  <div class="container">
    <div class="row">
      <div class="col-md-7">
        <h1 class="text-white font-weight-bold">{{$job->job_title}}</h1>
        <div class="custom-breadcrumbs">
          <a href="#">Home</a> <span class="mx-2 slash">/</span>
          <a href="#">Job</a> <span class="mx-2 slash">/</span>
          <span class="text-white"><strong>{{$job->job_title}}</strong></span>
        </div>
      </div>
    </div>
  </div>
</section>

@if(\Session::has('save'))
<div class="alert alert-success">
  <p>{{ \Session::get('save')}}</p>
</div>
@endif
@if(\Session::has('applied'))
<div class="alert alert-success">
  <p>{{ \Session::get('applied')}}</p>
</div>
@endif
<section class="site-section">
  <div class="container">
    <div class="row align-items-center mb-5">
      <div class="col-lg-8 mb-4 mb-lg-0">
        <div class="d-flex align-items-center">
          <div class="border p-2 d-inline-block mr-3 rounded">
            <img src="{{asset('assets/images/' . $job->image)}}" alt="Image">
          </div>
          <div>
            <h2>{{$job->job_title}}</h2>
            <div>
              <span class="ml-0 mr-2 mb-2"><span class="icon-briefcase mr-2"></span>{{$job->job_title}}</span>
              <span class="m-2"><span class="icon-room mr-2"></span>{{$job->job_region}}</span>
              <span class="m-2"><span class="icon-clock-o mr-2"></span><span
                  class="text-primary">{{$job->job_type}}</span></span>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-8">
          <div class="mb-5">
            <figure class="mb-5"><img src="{{asset('assets/images/job_single_img_1.jpg')}}" alt="Image"
                class="img-fluid rounded"></figure>
            <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span class="icon-align-left mr-3"></span>Job
              Description</h3>
            <p>{{$job->jobdescription}}</p>

          </div>
          <div class="mb-5">
            <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span
                class="icon-rocket mr-3"></span>Responsibilities
              </h3>
            <ul class="list-unstyled m-0 p-0">
            @foreach ($job->responsibilities as $responsibility)
              <li class="d-flex align-items-start mb-2"><span
                  class="icon-check_circle mr-2 text-muted"></span>
                  <span>{{$responsibility}}</span>
              </li>
              @endforeach
            </ul>
          </div>

          <div class="mb-5">
            <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span class="icon-book mr-3"></span>Education +
              Experience</h3>
            <ul class="list-unstyled m-0 p-0">
              @foreach ($job->education_experience as $education)
              <li class="d-flex align-items-start mb-2"><span
                  class="icon-check_circle mr-2 text-muted"></span>
                  <span>{{$education}}</span></li>
              @endforeach
            </ul>
          </div>

          <div class="mb-5">
            <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span class="icon-turned_in mr-3"></span>Other
              Benifits</h3>
            <ul class="list-unstyled m-0 p-0">
              
              @foreach($job->otherbenefits as $benefits)
              <li class="d-flex align-items-start mb-2"><span
                  class="icon-check_circle mr-2 text-muted"></span><span>{{$benefits}}</span>
                </li>
              @endforeach
            </ul>
          </div>

          <div class="row mb-5">
            <div class="col-6">
              <form action="{{route('save.job')}}" method="POST">
                @csrf
                <input type="hidden" name="job_id" value="{{$job->id}}">
                @if($status == false)
                <button type="submit" name="submit" class="btn btn-block btn-light btn-md"><i
                    class="icon-heart"></i>Save Job</button>
                @else:
                <button disabled class="btn btn-block btn-success btn-md"><i class="icon-heart"></i>Saved!</button>
                @endif
              </form>

              <!--add text-danger to it to make it read-->
            </div>
            <div class="col-6">
              <form action="{{route('apply.job')}}" method="POST">
                @csrf
                <input type="hidden" name="job_id" value="{{$job->id}}">
                @if($isapplied == true)
                <input type="hidden" name = "retract" value="yes">
                <button type="submit" name="submit" class="btn btn-block btn-success btn-md">Retract Your application</button>
                @else
                <button type="submit" name="submit" class="btn btn-block btn-primary btn-md">Apply Now</button>
                @endif
              </form>
            </div>
          </div>

        </div>
        <div class="col-lg-4">
          <div class="bg-light p-3 border rounded mb-4">
            <h3 class="text-primary  mt-3 h5 pl-3 mb-3 ">Job Summary</h3>
            <ul class="list-unstyled pl-3 mb-0">
              <li class="mb-2"><strong class="text-black">Published on:</strong> April 14, 2019</li>
              <li class="mb-2"><strong class="text-black">Vacancy:</strong> {{$job->vacancy}}</li>
              <li class="mb-2"><strong class="text-black">Employment Status:</strong> {{$job->job_type}}</li>
              <li class="mb-2"><strong class="text-black">Experience:</strong> {{$job->experience}}</li>
              <li class="mb-2"><strong class="text-black">Job Location:</strong> {{$job->job_region}}</li>
              <li class="mb-2"><strong class="text-black">Salary:</strong> {{$job->salary}}</li>
              <li class="mb-2"><strong class="text-black">Gender:</strong> {{$job->gender}}</li>
              <li class="mb-2"><strong class="text-black">Application Deadline:</strong> April 28, 2019</li>
            </ul>
          </div>

          <div class="bg-light p-3 border rounded">
            <h3 class="text-primary  mt-3 h5 pl-3 mb-3 ">Share</h3>
            <div class="px-3">
              <a href="#" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-facebook"></span></a>
              <a href="#" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-twitter"></span></a>
              <a href="#" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-linkedin"></span></a>
            </div>
          </div>
          <div class="bg-light p-3 border rounded mb-4">
            <h3 class="text-primary  mt-3 h5 pl-3 mb-3 ">Jobs Categories</h3>
            <ul class="list-unstyled pl-3 mb-0">
              @foreach($categories as $category)
              <li class="mb-2">
              <a class="pt-3 pb-3 pr-3 pl-0"href='{{route('categories.job', $category->name)}}'>{{$category->name}}</a> 
            </li>
              @endforeach
            </ul>
          </div>
        </div>
      </div>
    </div>
</section>

<section class="site-section" id="next">
  <div class="container">

    <div class="row mb-5 justify-content-center">
      <div class="col-md-7 text-center">
        <h2 class="section-title mb-2">{{$totalJobs}} Related Jobs</h2>
      </div>
    </div>

    <ul class="job-listings mb-5">
      @foreach ($relevantJobs as $job)
      <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
        <a href="{{route('single.job', $job->id)}}"></a>
        <div class="job-listing-logo">
          <img src="{{asset('assets/images/' . $job->image)}}" alt="Image" class="img-fluid">
        </div>

        <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
          <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
            <h2>{{$job->job_title}}</h2>
            <strong>{{$job->company}}</strong>
          </div>
          <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
            <span class="icon-room"></span> {{$job->job_region}}
          </div>
          <div class="job-listing-meta">
            <span class="badge badge-danger">{{$job->job_type}}</span>
          </div>
        </div>

      </li>
      @endforeach

    </ul>



  </div>
</section>


<section class="bg-light pt-5 testimony-full">

  <div class="owl-carousel single-carousel">


    <div class="container">
      <div class="row">
        <div class="col-lg-6 align-self-center text-center text-lg-left">
          <blockquote>
            <p>&ldquo;Soluta quasi cum delectus eum facilis recusandae nesciunt molestias accusantium libero dolores
              repellat id in dolorem laborum ad modi qui at quas dolorum voluptatem voluptatum repudiandae.&rdquo;</p>
            <p><cite> &mdash; Corey Woods, @Dribbble</cite></p>
          </blockquote>
        </div>
        <div class="col-lg-6 align-self-end text-center text-lg-right">
          <img src="{{asset('assets/images/person_transparent_2.png')}}" alt="Image" class="img-fluid mb-0">
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-lg-6 align-self-center text-center text-lg-left">
          <blockquote>
            <p>&ldquo;Soluta quasi cum delectus eum facilis recusandae nesciunt molestias accusantium libero dolores
              repellat id in dolorem laborum ad modi qui at quas dolorum voluptatem voluptatum repudiandae.&rdquo;</p>
            <p><cite> &mdash; Chris Peters, @Google</cite></p>
          </blockquote>
        </div>
        <div class="col-lg-6 align-self-end text-center text-lg-right">
          <img src="{{asset('assets/images/person_transparent.png')}}" alt="Image" class="img-fluid mb-0">
        </div>
      </div>
    </div>

  </div>

</section>

<section class="pt-5 bg-image overlay-primary fixed overlay" style="background-image: url({{asset('assets/images/hero_1.jpg')}});">
  <div class="container">
    <div class="row">
      <div class="col-md-6 align-self-center text-center text-md-left mb-5 mb-md-0">
        <h2 class="text-white">Get The Mobile Apps</h2>
        <p class="mb-5 lead text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit tempora adipisci
          impedit.</p>
        <p class="mb-0">
          <a href="#" class="btn btn-dark btn-md px-4 border-width-2"><span class="icon-apple mr-3"></span>App Store</a>
          <a href="#" class="btn btn-dark btn-md px-4 border-width-2"><span class="icon-android mr-3"></span>Play
            Store</a>
        </p>
      </div>
      <div class="col-md-6 ml-auto align-self-end">
        <img src="{{asset('assets/images/apps.png')}}" alt="Image" class="img-fluid">
      </div>
    </div>
  </div>
</section>
@section('content')

@endsection