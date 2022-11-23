@extends('Dashboard.layout.layout')
@include('Dashboard.layout.nav')
@section('content')

                        <div class="row">
                            <div class="col-lg-6 m-auto col-md-12">
                            <div class="card mb-3 pb-3">
                                <div class="row no-gutters">
                                  <div class="col-md-12">
                                    <div class="card-body">
                                        <h4 class="card-title">Show / {{$q->title}}</h4>
                                        <p class="card-text">Title : <span class="font-weight-bold text-success">{{$q->title}}</span>  </p>
                                        <p class="card-text">Organization : <span class="font-weight-bold text-success">{{$q->org}}</span> </p>
                                        <p class="card-text">Type : <span class="font-weight-bold text-success">{{$q->type}}</span> </p>
                                        <p class="card-text">Start at : <span class="font-weight-bold text-success">{{$q->start_at->format('M Y')}} </span> </p>
                                        <p class="card-text">End at : <span class="font-weight-bold text-success">{{$q->end_at->format('M Y')}} </span> </p>
                                        <p class="card-text">Description : <span class="font-weight-bold text-success">{{$q->desc}}</span> </p>
                                        <div style="float: right">
                                        <a href="{{route('quality.edit' , $q->id)}}" class="btn btn-inverse-success ">Edit</a>
                                        </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>

                        </div>

@endsection
