@extends('Dashboard.layout.layout')
@include('Dashboard.layout.nav')
@section('content')

                        <div class="row">
                            <div class="col-lg-6 m-auto col-md-12">
                            <div class="card mb-3 pb-3">
                                <div class="row no-gutters">
                                  <div class="col-md-12">
                                    <div class="card-body m-auto">
                                        <h4 class="card-title">Show / {{$test->name}}</h4>
                                        <div class="row ">
                                            <div class="col-6">
                                                <p class="card-text">Name : <span class="font-weight-bold text-primary">{{$test->name}}</span>  </p>
                                                <p class="card-text">Title : <span class="font-weight-bold text-primary">{{$test->title}}</span>  </p>
                                                <p class="card-text">Comment : <span class="font-weight-bold text-primary">{{$test->comment}}</span>  </p>
                                            </div>
                                            <div class="col-4 ">
                                                <img class="card-img" alt="{{$test->name}}" src="{{Storage::disk('s3')->url($test->image)}}" style=" max-width: 100%; max-height:100%;  object-fit:cover" >
                                            </div>
                                        </div>
                                        <div style="float: right">
                                        <a href="{{route('testmonial.edit' , $test->id)}}" class="btn btn-inverse-primary ">Edit</a>
                                        </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>

                        </div>

@endsection
