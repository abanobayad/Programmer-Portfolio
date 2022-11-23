@extends('Dashboard.layout.layout')
@include('Dashboard.layout.nav')
@section('content')

                        <div class="row">
                            <div class="col-lg-6 m-auto col-md-12">
                            <div class="card mb-3 pb-3">
                                <div class="row no-gutters">
                                  <div class="col-md-12">
                                    <div class="card-body">
                                        <h4 class="card-title">Show / {{$skill->title}}</h4>
                                        <p class="card-text">Title : <span class="font-weight-bold text-primary">{{$skill->title}}</span>  </p>
                                        <p class="card-text">Value : <span class="font-weight-bold text-primary">{{$skill->value}}</span> </p>
                                        <div style="float: right">
                                        <a href="{{route('skill.edit' , $skill->id)}}" class="btn btn-inverse-primary ">Edit</a>
                                        </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>

                        </div>

@endsection
