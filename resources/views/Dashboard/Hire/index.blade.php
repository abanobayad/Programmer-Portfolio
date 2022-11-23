@extends('Dashboard.layout.layout')
@include('Dashboard.layout.nav')
@section('content')
    <div class=" d-felx justify-content-between mb-2">
        <h4 style="display: inline-block">Contacts</h4>
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
                    <th class=" font-weight-bold text-success" scope="col">Email</th>
                    <th class=" font-weight-bold text-success" scope="col">Time</th>
                    <th class=" font-weight-bold text-success" scope="col">Actions</th>
                </tr>
            </thead>
            <tbody id="tableData">
                {{-- Start Fetch Data --}}
                @foreach ($hires as $hire)
                    {{-- {{dd($hire->admin)}} --}}
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $hire->email }}</td>
                        <td>{{ $hire->created_at->diffForHumans()}} <i class="mdi mdi-timer"></i></td>
                        <td>
                        <a href="{{ route('hire.delete', $hire->id) }}" class="btn text-danger"><i
                                class="menu-icon mdi mdi-delete-sweep"></i></a>
                        <a href="{{ route('hire.show', $hire->id) }}" class="btn text-primary"><i
                                    class="menu-icon mdi mdi-eye"></i></a>
                        </td>
                    </tr>
                @endforeach
                {{-- End Fetch Data --}}
                <div class="d-flex mt-2 justify-content-center">
                    {{ $hires->appends(request()->input())->links() }}
                </div>
            </tbody>
        </table>
    </div>
@endsection
