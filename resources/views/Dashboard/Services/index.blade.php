@extends('Dashboard.layout.layout')
@include('Dashboard.layout.nav')
@section('content')
    <div class=" d-felx justify-content-between mb-2">
        <h4 style="display: inline-block">Services</h4>
        <a class="btn btn-inverse-success" style="float: right" href="{{ route('service.add') }}">Add New</a>
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
                    <th class=" font-weight-bold text-success" scope="col">Title</th>
                    <th class=" font-weight-bold text-success" scope="col">Icon</th>
                    <th class=" font-weight-bold text-success" scope="col">Actions</th>
                </tr>
            </thead>
            <tbody id="tableData">
                {{-- Start Fetch Data --}}
                @foreach ($services as $service)
                    {{-- {{dd($service->admin)}} --}}
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $service->title }}</td>
                        <td>
                            <i class="{{ $service->fontaws }}"></i>
                        </td>

                        <td>
                            <a href="{{ route('service.edit', $service->id) }}" class="btn text-warning"><i
                                class="menu-icon mdi mdi-border-color"></i></a>
                        <a href="{{ route('service.delete', $service->id) }}" class="btn text-danger"><i
                                class="menu-icon mdi mdi-delete-sweep"></i></a>
                        <a href="{{ route('service.show', $service->id) }}" class="btn text-primary"><i
                                    class="menu-icon mdi mdi-eye"></i></a>
                        </td>
                    </tr>
                @endforeach
                {{-- End Fetch Data --}}
                <div class="d-flex justify-content-center">
                    {{ $services->appends(request()->input())->links() }}
                </div>
            </tbody>
        </table>
    </div>
@endsection
