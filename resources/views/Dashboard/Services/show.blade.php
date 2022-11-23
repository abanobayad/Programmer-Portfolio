@extends('Dashboard.layout.layout')
@include('Dashboard.layout.nav')
@section('content')

                        <div class="row">
                            <div class="col-lg-6 m-auto col-md-12">
                            <div class="card mb-3 pb-3">
                                <div class="row no-gutters">
                                  <div class="col-md-12">
                                    <div class="card-body">
                                        <h4 class="card-title">Show / {{$service->title}}</h4>
                                        <p class="card-text">Title : <span class="font-weight-bold text-success">{{$service->title}}</span>  </p>
                                        <p class="card-text">Icon : <i class="{{$service->fontaws}} text-success"></i> </p>
                                        <p class="card-text">Description : <span class="font-weight-bold text-success">{{$service->desc}}</span>  </p>
                                        <div style="float: right">
                                        <a href="{{route('service.edit' , $service->id)}}" class="btn btn-inverse-success ">Edit</a>
                                        </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>

                        </div>

@endsection
