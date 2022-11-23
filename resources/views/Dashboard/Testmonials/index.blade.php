@extends('Dashboard.layout.layout')
@include('Dashboard.layout.nav')
@section('content')
    <div class=" d-felx justify-content-between mb-2">
        <h4 style="display: inline-block">Testmonials</h4>
        <a class="btn btn-inverse-success" style="float: right" href="{{ route('testmonial.add') }}">Add New</a>
    </div>


    <div class="row">
        <div class="col-12  mb-1">
            <input class="form-control opacity-50" id="myInput" type="text" placeholder="Search Table">
        </div>
    </div>

    <div class="table-responsive">
        <table class="table text-center">
            <thead >
                <tr >
                    <th class=" font-weight-bold text-success" scope="col">#</th>
                    <th class=" font-weight-bold text-success" scope="col">Name</th>
                    <th class=" font-weight-bold text-success" scope="col">Title</th>
                    <th class=" font-weight-bold text-success" scope="col">Image</th>
                    <th class=" font-weight-bold text-success" scope="col">Actions</th>
                </tr>
            </thead>
            <tbody id="tableData">
                {{-- Start Fetch Data --}}
                @foreach ($tests as $test)
                    {{-- {{dd($test->admin)}} --}}
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $test->name }}</td>
                        <td>{{ $test->title }}</td>
                        @if ($test->image== null)
                        <td>No image</td>
                        @else
                        <td><img class="rounded-circle" src="{{Storage::disk('s3')->url($test->image)}}" alt="{{$test->name}}"></td>
                        @endif

                        <td>
                            <a href="{{ route('testmonial.edit', $test->id) }}" class="btn text-warning"><i
                                class="menu-icon mdi mdi-border-color"></i></a>
                        <a href="{{ route('testmonial.delete', $test->id) }}" class="btn text-danger"><i
                                class="menu-icon mdi mdi-delete-sweep"></i></a>
                        <a href="{{ route('testmonial.show', $test->id) }}" class="btn text-primary"><i
                                    class="menu-icon mdi mdi-eye"></i></a>
                        </td>
                    </tr>
                @endforeach
                {{-- End Fetch Data --}}
                <div class="d-flex justify-content-center">
                    {{ $tests->appends(request()->input())->links() }}
                </div>
            </tbody>
        </table>
    </div>
@endsection
