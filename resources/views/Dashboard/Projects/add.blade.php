@extends('Dashboard.layout.layout')


@include('Dashboard.layout.nav')
@section('content')


                    <div class="col-lg-6 col-md-12 grid-margin stretch-card m-auto">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Add New Project </h4>
                                <p class="card-description"> Enter info of the new project</p>
                                <form class="forms-sample" method="POST" action="{{route('project.doadd')}}" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group">
                                        <label for="exampleInputName1">Title</label>
                                        <input type="text" name="title" class="form-control" value="{{old('title')}}" placeholder="like: School Management System">
                                            @error('title')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>


                                    <div class="mb-3">
                                        <label  class="form-label">Images</label>
                                        <div class="col-12  mb-2">
                                            <div><input class="form-control"  type="file" name="images[]" multiple accept="image/png, image/jpg, image/jpeg" ></div>
                                            @error('images')<span class="text-danger">{{ $message }}</span>@enderror
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="exampleTextarea1">Description</label>
                                        <textarea name="desc" class="form-control" id="exampleTextarea1" rows="4">{{old('desc')}}</textarea>
                                        @error('desc')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>



                                    <button type="submit" class="btn btn-inverse-primary  me-2" style="float: right">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>




    @endsection

