@extends('Dashboard.layout.layout')
@include('Dashboard.layout.nav')

@section('content')


<div class="row">
    <div class="col-lg-12 m-auto col-md-12">
    <div class="card mb-3 pb-3">
        <div class="row no-gutters">
          <div class="col-md-4">
            @if (Auth()->user()->avatar ==null)
            <div>You still using default image</div>
            @else
            <img src="{{Storage::disk('s3')->url(Auth()->user()->avatar)}}" class="card-img" alt="...">
            @endif
          </div>
          <div class="col-md-8">
            <div class="card-body">
                <h4 class="card-title">About Me Info</h4>
                <p class="card-text">Name : <span class="font-weight-bold text-success">{{Auth()->user()->name}}</span>  </p>
                <p class="card-text">Email : <span class="font-weight-bold text-success">{{Auth()->user()->email}}</span> </p>
                <div style="float: right">
                <a href="{{route('setting.edit' , Auth()->user()->id)}}" class="btn btn-inverse-success ">Edit</a>
                </div>
            </div>
          </div>
        </div>
      </div>
</div>

</div>


@endsection
