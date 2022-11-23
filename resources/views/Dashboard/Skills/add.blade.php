@extends('Dashboard.layout.layout')


@include('Dashboard.layout.nav')
@section('content')


                    <div class="col-lg-6 col-md-12 grid-margin stretch-card m-auto">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Add New Skill </h4>
                                <p class="card-description"> Enter info of the new Skill</p>
                                <form class="forms-sample" method="POST" action="{{route('skill.doadd')}}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputName1">Title</label>
                                        <input type="text" name="title" class="form-control" value="{{old('title')}}" placeholder="like: HTML">
                                            @error('title')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>


                                    <div class="form-group">
                                        <label for="exampleInputName1">Value</label>
                                        <input type="number" max="100" min="0" name="value" class="form-control" value="{{old('value')}}" placeholder="like: 90" >
                                            @error('value')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>

                                    <button type="submit" class="btn btn-inverse-primary  me-2" style="float: right">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>




    @endsection

