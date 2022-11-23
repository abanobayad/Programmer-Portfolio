@extends('Dashboard.layout.layout')


@include('Dashboard.layout.nav')
@section('content')


                    <div class="col-lg-6 col-md-12 grid-margin stretch-card m-auto">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Add New Testmonial </h4>
                                <p class="card-description"> Enter info of the new Testmonial</p>
                                <form class="forms-sample" method="POST" action="{{route('testmonial.doadd')}}" enctype="multipart/form-data">
                                    @csrf


                                    <div class="form-group">
                                        <label for="exampleInputName1">Name</label>
                                        <input type="text" name="name" class="form-control" value="{{old('name')}}" placeholder="like: Abanoub Ayad">
                                            @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputName1">Title</label>
                                        <input type="text" name="title" class="form-control" value="{{old('title')}}" placeholder="like: Software Eng.">
                                            @error('title')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>


                                    <div class="mb-3">
                                        <label  class="form-label">Image</label>
                                        <div class="col-12  mb-2">
                                            <div><input class="form-control"  type="file" name="image" accept="image/png, image/jpg, image/jpeg" ></div>
                                            @error('image')<span class="text-danger">{{ $message }}</span>@enderror
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="exampleTextarea1">Comment</label>
                                        <textarea name="comment" class="form-control" id="exampleTextarea1" rows="4">{{old('comment')}}</textarea>
                                        @error('comment')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>



                                    <button type="submit" class="btn btn-inverse-primary  me-2" style="float: right">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>




    @endsection

