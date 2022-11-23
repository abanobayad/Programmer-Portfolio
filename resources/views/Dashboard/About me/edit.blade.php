@extends('Dashboard.layout.layout')


@include('Dashboard.layout.nav')
@section('content')


                    <div class="col-lg-6 col-md-12 grid-margin stretch-card m-auto">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Edit About Me Info</h4>
                                <p class="card-description"> Edit About information </p>
                                <form class="forms-sample" method="POST" action="{{route('about.doedit')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$about->id}}">

                                    <div class="form-group">
                                        <label for="exampleInputName1">Name</label>
                                        <input type="text" name="name" value="{{ $about->name }}"
                                            class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail3">Email address</label>
                                        <input type="email" name="email" value="{{ $about->email }}"
                                            class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="text" name="phone" value="{{ $about->phone }}"
                                            class="form-control">
                                            @error('phone')<span class="text-danger">{{ $message }}</span>@enderror

                                    </div>

                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" name="address" value="{{ $about->address }}"
                                            class="form-control">
                                            @error('address')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>


                                    <div class="form-group">
                                        <label>Degree</label>
                                        <input type="text" name="degree" value="{{ $about->degree }}"
                                            class="form-control">
                                            @error('degree')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Expericence</label>
                                        <input type="text" name="exp" value="{{ $about->exp }}"
                                            class="form-control">
                                            @error('exp')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Freelance</label>
                                        <select name="freelance" class="form-control">
                                            <option >Available</option>
                                            <option @if($about->freelance == "Unavailable") selected @endif >Unavailable</option>
                                        </select>
                                            @error('freelance')<span class="text-danger">{{ $message }}</span>@enderror

                                    </div>

                                    <div class="form-group">
                                        <label>Job Title</label>
                                        <input type="text" name="JobTitle" value="{{ $about->JobTitle }}"
                                            class="form-control">
                                            @error('freelance')<span class="text-danger">{{ $message }}</span>@enderror

                                    </div>


                                    <div class="form-group">
                                        <label>Date of Birth <span class="text-muted"> ( current: {{ $about->date_of_birth->format('j M Y') }} ) </span></label>
                                        <input type="date" name="birth"
                                            class="form-control">
                                            @error('date')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>


                                    <div class="mb-3">
                                        <label  class="form-label">Current Image</label>
                                        <div class="col-12  mb-2">
                                            <img  style="object-fit:cover ;width: 100px ; height: 100px;" src="{{Storage::disk('s3')->url($about->image)}}" alt="{{$about->name}}" class="mb-3 col-12">
                                            <div><input class="form-control"  type="file" name="image" accept="image/png, image/jpg, image/jpeg" value="{{$about->name}}"></div>
                                            @error('image')<span class="text-danger">{{ $message }}</span>@enderror
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="exampleTextarea1">Description</label>
                                        <textarea name="description" class="form-control" id="exampleTextarea1" rows="4">{{$about->desc}}</textarea>
                                        @error('description')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>


                                    <button type="submit" class="btn btn-dark me-2" style="float: right">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>




    @endsection

