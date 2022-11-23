@extends('Dashboard.layout.layout')


@include('Dashboard.layout.nav')
@section('content')


                    <div class="col-lg-6 col-md-12 grid-margin stretch-card m-auto">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Edit / Testmonial / {{$test->title}} </h4>
                                <p class="card-description"> Enter New Data</p>
                                <form class="forms-sample" method="POST" action="{{route('testmonial.doedit')}}"  enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$test->id}}">



                                    <div class="form-group">
                                        <label for="exampleInputName1">Name</label>
                                        <input type="text" name="name" class="form-control" value="{{$test->name}}" placeholder="like: Abanoub Ayad">
                                            @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>


                                    <div class="form-group">
                                        <label for="exampleInputName1">Title</label>
                                        <input type="text" name="title" value="{{ $test->title }}"
                                            class="form-control">
                                            @error('title')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>

                                    <div class="mb-3">
                                        @if ($test->image== null)
                                        <label>No image</label>
                                        @else
                                        <label  class="form-label">Current Image</label>
                                            <img  style="object-fit:cover; width: 100px ; height: 100px;" src="{{Storage::disk('s3')->url($test->image)}}" alt="{{$test->name}}" class="mb-3 col-12">
                                        @endif
                                        <div class="col-12  mb-2">
                                            <div><input class="form-control"  type="file" name="image" accept="image/png, image/jpg, image/jpeg" ></div>
                                            @error('image')<span class="text-danger">{{ $message }}</span>@enderror
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="exampleTextarea1">Comment</label>
                                        <textarea name="comment" class="form-control" id="exampleTextarea1" rows="4">{{$test->comment}}</textarea>
                                        @error('comment')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>



                                    <button type="submit" class="btn btn-inverse-primary me-2" style="float: right">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>




    @endsection

