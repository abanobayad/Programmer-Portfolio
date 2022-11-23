@extends('Dashboard.layout.layout')


@include('Dashboard.layout.nav')
@section('content')


                    <div class="col-lg-6 col-md-12 grid-margin stretch-card m-auto">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Edit / Service / {{$service->title}} </h4>
                                <p class="card-description"> Enter New Data</p>
                                <form class="forms-sample" method="POST" action="{{route('service.doedit')}}" >
                                    @csrf
                                    <input type="hidden" name="id" value="{{$service->id}}">
                                    <div class="form-group">
                                        <label for="exampleInputName1">Title</label>
                                        <input type="text" name="title" value="{{ $service->title }}"
                                            class="form-control">
                                            @error('title')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>


                                    <div class="form-group">
                                        <label for="exampleInputName1">Icon
                                            <span class="text-muted">(fontawsome 5)
                                                <object data="FontAwsomeIcons.pdf" type="application/pdf" width="300" height="200">
                                                    <a class="text-warning" style="text-decoration: none" href="{{ asset('pdfs/fa.pdf') }}">FontAwsome Icons.pdf</a>
                                                </object>
                                            </span></label>
                                        <input type="text" name="fontaws" value="{{ $service->fontaws }}"
                                            class="form-control">
                                            @error('fontaws')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>


                                    <div class="form-group">
                                        <label for="exampleTextarea1">Description</label>
                                        <textarea name="desc" class="form-control" id="exampleTextarea1" rows="4">{{$service->desc}}</textarea>
                                        @error('desc')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>


                                    <button type="submit" class="btn btn-inverse-success me-2" style="float: right">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>




    @endsection

