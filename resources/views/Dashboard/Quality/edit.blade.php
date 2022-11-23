@extends('Dashboard.layout.layout')


@include('Dashboard.layout.nav')
@section('content')


                    <div class="col-lg-6 col-md-12 grid-margin stretch-card m-auto">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Edit / Quality / {{$q->title}} </h4>
                                <p class="card-description"> Enter New Data</p>
                                <form class="forms-sample" method="POST" action="{{route('quality.doedit')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$q->id}}">
                                    <div class="form-group">
                                        <label for="exampleInputName1">Title</label>
                                        <input type="text" name="title" value="{{ $q->title }}"
                                            class="form-control">
                                            @error('title')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>


                                    <div class="form-group">
                                        <label for="exampleInputName1">Orgnization</label>
                                        <input type="text" name="org" value="{{ $q->org }}"
                                            class="form-control">
                                            @error('org')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>


                                    <div class="form-group">
                                        <label>Type</label>
                                        <select name="exp" class="form-control">
                                            <option >Expericence</option>
                                            <option @if($q->type == "education") selected @endif >Education</option>
                                        </select>
                                            @error('type')<span class="text-danger">{{ $message }}</span>@enderror

                                    </div>


                                    <div class="form-group">
                                        <label>Start at <span class="text-muted"> ( current: {{ $q->start_at->format('M Y') }} ) </span></label>
                                        <input type="date" name="start_at" value="{{ old('start_at', date('Y-m-d'))}}"
                                            class="form-control">
                                            @error('start_at')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>

                                    <div class="form-group">
                                        <label>End at <span class="text-muted"> ( current: {{ $q->end_at->format('j M Y') }} ) </span></label>
                                        <input type="date" name="end_at" value="{{ old('end_at', date('Y-m-d'))}}"
                                            class="form-control">
                                            @error('end_at')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>




                                    <div class="form-group">
                                        <label for="exampleTextarea1">Description</label>
                                        <textarea name="desc" class="form-control" id="exampleTextarea1" rows="4">{{$q->desc}}</textarea>
                                        @error('desc')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>


                                    <button type="submit" class="btn btn-dark me-2" style="float: right">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>




    @endsection

