@extends('Dashboard.layout.layout')
@include('Dashboard.layout.nav')
@section('content')

                        <div class="row">
                            <div class="col-lg-6 m-auto col-md-12">
                            <div class="card mb-3 pb-3">
                                <div class="row no-gutters">
                                  <div class="col-md-12">
                                    <div class="card-body">
                                        <h4 class="card-title">Show / {{$cert->title}}</h4>
                                        <p class="card-text">Title : <span class="font-weight-bold text-primary">{{$cert->title}}</span>  </p>
                                        <p class="card-image">Image : <img class="img-fluid rounded w-100" src="{{Storage::disk('s3')->url($cert->image)}}" alt="{{$cert->title}}">   </p>


                                        <div style="float: right">
                                        <a href="{{route('certificate.edit' , $cert->id)}}" class="btn btn-inverse-primary ">Edit</a>
                                        </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>

                        </div>

@endsection
