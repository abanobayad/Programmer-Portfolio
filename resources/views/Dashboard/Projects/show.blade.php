@extends('Dashboard.layout.layout')
@include('Dashboard.layout.nav')
@section('content')

                        <div class="row">
                            <div class="col-lg-12 m-auto col-md-12">
                            <div class="card mb-3 pb-3">
                                <div class="row no-gutters">
                                    <div class="col-md-12">
                                    <div class="card-body m-auto">
                                        <h4 class="card-title">Show / {{$project->title}}</h4>
                                        <div class="row ">
                                            <div class="col-6">
                                                <p class="card-text">Title : <span class="font-weight-bold text-primary">{{$project->title}}</span>  </p>
                                                <p class="card-text">Desctription : <span class="font-weight-bold text-primary">{{$project->desc}}</span>  </p>
                                            </div>
                                            <label class="mt-5 text-bold">Images </label>
                                            <div class="row">
                                                @foreach ($images as $image)
                                                <div class="col-4">
                                                    <a target="_blank" href="{{Storage::disk('s3')->url($image->image)}}">
                                                        <img class="card-img m-2" style="max-height: 150px ; object-fit:cover" alt="{{$project->title}}" src="{{Storage::disk('s3')->url($image->image)}}">
                                                    </a>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div style="float: right">
                                        <a href="{{route('project.edit' , $project->id)}}" class="btn btn-inverse-primary ">Edit</a>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            </div>

                        </div>

@endsection
