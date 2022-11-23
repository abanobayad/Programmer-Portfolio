@extends('Dashboard.layout.layout')


@include('Dashboard.layout.nav')
@section('css')
    <style>
        .containerm {
            /* min-height: 100vh; */
            overflow: hidden;
            width: 100%;
            padding: 2rem;
            display: flex;
            justify-content: center;
            align-items: center
        }

        .imagee {
            overflow: hidden;
            height: 300px;
            width: 300px;
            position: relative;
            cursor: pointer;
            /* margin: 0 15px; */
            box-shadow: 0 0 25px 1px rgba(0, 0, 0, .3);
            transition: .5s;
            background-color: #555
        }

        .imagee:after {
            content: '';
            position: absolute;
            z-index: 1;
            top: 50%;
            left: 50%;
            width: 500px;
            height: 500px;
            transform: translate(-140%, -50%);
            background-color: blue;
            opacity: 0.8;
            border-radius: 50%;
            transition: .8s
        }

        .imagee:hover:after {
            transform: translate(-50%, -50%)
        }

        .imagee:hover img {
            transform: translate(-50%, -50%) scale(1.3) rotate(20deg)
        }

        .imge {
            position: absolute;
            height: 110%;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            transition: .8s
        }

        #ss {
            position: absolute;
            z-index: 2;
            top: 50%;
            left: 50%;
            transform: translate(-2000px, -50%);
            color: #fff;
            transition: .8s;
            transition-timing-function: ease-in
        }

        #ss:hover {
            transform: translate(-50%, -50%);
            transition-timing-function: ease
        }
    </style>
@endsection
@section('content')
    <div class="col-lg-12 col-md-12 grid-margin stretch-card m-auto">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit / Project / {{ $project->title }} </h4>
                <p class="card-description"> Enter New Data</p>
                <form class="forms-sample" method="POST" action="{{ route('project.doedit') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $project->id }}">
                    <div class="form-group">
                        <label for="exampleInputName1">Title</label>
                        <input type="text" name="title" value="{{ $project->title }}" class="form-control">
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="m-0">
                        <label class="form-label text-bold">Current Images</label>
                        <div class="row">
                            @foreach ($images as $image)
                                <div class="col-4">
                                    <div class="containerm">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <a href="{{ route('imagep.show', $image->id) }}">
                                                    <div class="imagee">
                                                        <img class="imge" style="object-fit: cover"
                                                            alt="{{ $project->name }}"
                                                            src="{{ Storage::disk('s3')->url($image->image) }}">
                                                        <i id="ss" class="fa fa-search fa-3x"></i>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            @endforeach
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button style="float: right" id="hireme" type="button" class="btn btn-outline-primary mr-4" data-toggle="modal"
                                    data-target="#exampleModal" data-whatever="@mdo">Add Images</button>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleTextarea1">Description</label>
                        <textarea name="desc" class="form-control" id="exampleTextarea1" rows="4">{{ $project->desc }}</textarea>
                        @error('desc')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-inverse-primary me-2" style="float: right">Submit</button>
                </form>



                {{-- Modal start --}}
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add New Images</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('imagep.doadd') }}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{$project->id}}">
                                <div class="mb-3">
                                    <div class="col-12  mb-2">
                                        <div><input class="form-control" type="file" name="images[]"
                                                multiple accept="image/png, image/jpg, image/jpeg"></div>
                                        @error('images')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Add</button>
                                </div>
                            </form>
                        </div>

                    </div>
                    </div>
                </div>
                {{-- Modal End --}}
            </div>
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
@endsection
