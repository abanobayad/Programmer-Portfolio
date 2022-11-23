@extends('Dashboard.layout.layout')


@include('Dashboard.layout.nav')
@section('content')
    <div class="row">
        <div class="col-lg-6 col-md-12 grid-margin stretch-card m-auto">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add New Service </h4>
                    <p class="card-description"> Enter info of the new Service</p>
                    <form class="forms-sample" method="POST" action="{{ route('service.doadd') }}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputName1">Title</label>
                            <input type="text" name="title" class="form-control" value="{{ old('title') }}"
                                placeholder="like: Web Design">
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="exampleInputName1">Icon <span class="text-muted">(fontawsome 5)
                                    <object data="FontAwsomeIcons.pdf" type="application/pdf" width="300" height="200">
                                            <a class="text-warning" style="text-decoration: none" href="{{ asset('pdfs/fa.pdf') }}">FontAwsome Icons.pdf</a>
                                    </object>
                                </span> </label>
                            <input type="text" name="fontaws" class="form-control" value="{{ old('fontaws') }}"
                                placeholder="like: fa fa-2x fa-laptop-code">
                            @error('fontaws')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="exampleTextarea1">Description</label>
                            <textarea name="desc" class="form-control" id="exampleTextarea1" rows="4">{{ old('desc') }}</textarea>
                            @error('desc')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-inverse-success  me-2" style="float: right">Submit</button>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 grid-margin stretch-card m-auto">
            {{-- <embed src="{{asset('pdfs/fasheet.pdf')}}" width="800px" height="2100px" /> --}}
            {{-- <iframe src="https://drive.google.com/file/d/1PPf0W98S0KOlAYt9U2L3ZcPzDm7Huce4/view?usp=sharing" style="width:600px; height:500px;" frameborder="0"></iframe> --}}
            {{-- <iframe
            src="{{ asset('pdfs/fasheet.pdf') }}"
            frameBorder="0"
            scrolling="auto"
            height="100%"
            width="100%"
        ></iframe> --}}


            {{-- <object width="400px" height="400px" data="{{asset('pdfs/fasheet.pdf')}}"></object> --}}



        </div>

    </div>
@endsection
