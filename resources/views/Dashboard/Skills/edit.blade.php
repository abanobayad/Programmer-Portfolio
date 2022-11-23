@extends('Dashboard.layout.layout')


@include('Dashboard.layout.nav')
@section('content')


                    <div class="col-lg-6 col-md-12 grid-margin stretch-card m-auto">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Edit / Skill / {{$skill->title}} </h4>
                                <p class="card-description"> Enter New Data</p>
                                <form class="forms-sample" method="POST" action="{{route('skill.doedit')}}" >
                                    @csrf
                                    <input type="hidden" name="id" value="{{$skill->id}}">
                                    <div class="form-group">
                                        <label for="exampleInputName1">Title</label>
                                        <input type="text" name="title" value="{{ $skill->title }}"
                                            class="form-control">
                                            @error('title')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>


                                    <div class="form-group">
                                        <label for="exampleInputName1">Value</label>
                                        <input type="number" name="value" value="{{ $skill->value }}"
                                            class="form-control">
                                            @error('value')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>


                                    <button type="submit" class="btn btn-inverse-primary me-2" style="float: right">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>




    @endsection

