@extends('Dashboard.layout.layout')


@include('Dashboard.layout.nav')
@section('content')


                    <div class="col-lg-6 col-md-12 grid-margin stretch-card m-auto">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Edit / Certificate / {{$cert->title}} </h4>
                                <p class="card-description"> Enter New Data</p>
                                <form class="forms-sample" method="POST" action="{{route('certificate.doedit')}}"  enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$cert->id}}">

                                    <div class="form-group">
                                        <label for="exampleInputName1">Title</label>
                                        <input type="text" name="title" value="{{ $cert->title }}"
                                            class="form-control">
                                            @error('title')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>

                                    <div class="mb-3">
                                        <label  class="form-label">Current Image</label>
                                            <img  style="object-fit:cover; width: 200px ; height: 175px;" src="{{Storage::disk('s3')->url($cert->image)}}" alt="{{$cert->title}}" class="mb-3 col-12">
                                        <div class="col-12  mb-2">
                                            <div><input class="form-control"  type="file" name="image" accept="image/png, image/jpg, image/jpeg" ></div>
                                            @error('image')<span class="text-danger">{{ $message }}</span>@enderror
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-inverse-primary me-2" style="float: right">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>




    @endsection

