@extends('Dashboard.layout.layout')
@include('Dashboard.layout.nav')
@section('content')
    <div class=" d-felx justify-content-between mb-2">
        <h4 style="display: inline-block">Qualities</h4>
        <a class="btn btn-inverse-success" style="float: right" href="{{ route('quality.add') }}">Add New</a>
    </div>


    <div class="row">
        <div class="col-6  mb-1">
            <input class="form-control opacity-50" id="myInput" type="text" placeholder="Search Table">
        </div>
        <div class="col-6 " >
            <div class="text-center pb-2 px-0 " >
                <form action="{{ route('quality') }}" method="POST" class="m-auto px-0 pb-2">
                    @csrf
                    <div class="row">
                        <div class="col-4">
                            <select name="qs" class="form-control text-center " style="font-size: 14px">
                                <option value="all">All Qualities</option>
                                <option value="exp" @if ($selected_qs == 'exp') selected @endif>
                                    Expericence</option>
                                <option value="edu" @if ($selected_qs == 'edu') selected @endif>
                                    Education</option>
                            </select>
                        </div>
                        <div class="col-lg-2 col-md-3 form-group">
                            <button type="submit" class="btn-inverse-warning form-control mb-2">Show</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
</div>

    <div class="table-responsive">
        <table class="table text-center">
            <thead >
                <tr >
                    <th class=" font-weight-bold text-success" scope="col">#</th>
                    <th class=" font-weight-bold text-success" scope="col">Title</th>
                    <th class=" font-weight-bold text-success" scope="col">Organization</th>
                    <th class=" font-weight-bold text-success" scope="col">Type</th>
                    <th class=" font-weight-bold text-success" scope="col">Actions</th>
                </tr>
            </thead>
            <tbody id="tableData">
                {{-- Start Fetch Data --}}
                @foreach ($qs as $q)
                    {{-- {{dd($q->admin)}} --}}
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $q->title }}</td>
                        <td>{{ $q->org }}</td>
                        <td>{{ $q->type }}</td>

                        <td>
                            <a href="{{ route('quality.edit', $q->id) }}" class="btn text-warning"><i
                                class="menu-icon mdi mdi-border-color"></i></a>
                        <a href="{{ route('quality.delete', $q->id) }}" class="btn text-danger"><i
                                class="menu-icon mdi mdi-delete-sweep"></i></a>
                        <a href="{{ route('quality.show', $q->id) }}" class="btn text-primary"><i
                                    class="menu-icon mdi mdi-eye"></i></a>
                        </td>
                    </tr>
                @endforeach
                {{-- End Fetch Data --}}
                <div class="d-flex justify-content-center">
                    {{ $qs->appends(request()->input())->links() }}
                </div>
            </tbody>
        </table>
    </div>
@endsection
