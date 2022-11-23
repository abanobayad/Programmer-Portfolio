@extends('Dashboard.layout.layout')


@include('Dashboard.layout.nav')
@section('content')


                    <div class="col-lg-6 col-md-12 grid-margin stretch-card m-auto">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Add New Quality </h4>
                                <p class="card-description"> Enter info of the new quality</p>
                                <form class="forms-sample" method="POST" action="{{route('quality.doadd')}}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputName1">Title</label>
                                        <input type="text" name="title" class="form-control" value="{{old('title')}}">
                                            @error('title')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>


                                    <div class="form-group">
                                        <label for="exampleInputName1">Orgnization</label>
                                        <input type="text" name="org" class="form-control" value="{{old('org')}}" >
                                            @error('org')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>


                                    <div class="form-group">
                                        <label>Type</label>
                                        <select name="type" class="form-control"  >
                                            <option>expericence</option>
                                            <option  @if (old('type') == 'education')
                                                selected
                                            @endif
                                            >education</option>
                                        </select>
                                            @error('type')<span class="text-danger">{{ $message }}</span>@enderror

                                    </div>


                                    <div class="form-group">
                                        <label>Start at </label>
                                        <input type="date" name="start_at" class="form-control" value="{{old('start_at')}}" >
                                            @error('start_at')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>

                                    <div class="form-group">
                                        <label>End at </label>
                                        <input type="date" name="end_at" value="{{ old('end_at', date('Y-m-d'))}}"
                                            class="form-control" value="{{old('')}}" >
                                            @error('end_at')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>




                                    <div class="form-group">
                                        <label for="exampleTextarea1">Description</label>
                                        <textarea name="desc" class="form-control" id="exampleTextarea1" rows="4">{{old('desc')}}</textarea>
                                        @error('desc')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>


                                    <button type="submit" class="btn btn-dark me-2" style="float: right">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>




    @endsection

