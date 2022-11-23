@extends('Dashboard.layout.layout')
@include('Dashboard.layout.nav')
@section('content')

                        <div class="row">
                            <div class="col-lg-12 m-auto col-md-12">
                            <div class="card mb-3 pb-3">
                                <div class="row no-gutters">
                                  <div class="col-md-4">
                                    <img src="{{Storage::disk('s3')->url($about->image)}}" class="card-img" alt="...">
                                  </div>
                                  <div class="col-md-8">
                                    <div class="card-body">
                                        <h4 class="card-title">About Me Info</h4>
                                        <p class="card-text">Name : <span class="font-weight-bold text-success">{{$about->name}}</span>  </p>
                                        <p class="card-text">Email : <span class="font-weight-bold text-success">{{$about->email}}</span> </p>
                                        <p class="card-text">Phone : <span class="font-weight-bold text-success">{{$about->phone}}</span> </p>
                                        <p class="card-text">Address : <span class="font-weight-bold text-success">{{$about->address}}</span> </p>
                                        <p class="card-text">Degree : <span class="font-weight-bold text-success">{{$about->degree}}</span> </p>
                                        <p class="card-text">Job Title : <span class="font-weight-bold text-success">{{$about->JobTitle}}</span> </p>
                                        <p class="card-text">Expericence : <span class="font-weight-bold text-success">{{$about->exp}} </span> years</p>
                                        <p class="card-text">Freelance : <span class="font-weight-bold text-success">{{$about->freelance}}</span> </p>
                                        <p class="card-text">Date of Birth : <span class="font-weight-bold text-success">{{$about->date_of_birth->format('j M Y')}} </span> </p>
                                        <p class="card-text">Description : <span class="font-weight-bold text-success">{{$about->desc}}</span> </p>
                                        <div style="float: right">
                                        <a href="{{route('about.edit' , $about->id)}}" class="btn btn-inverse-success ">Edit</a>
                                        </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>

                        </div>

@endsection
