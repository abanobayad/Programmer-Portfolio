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
                    <th class=" font-weight-bold text-success" scope="col">Name</th>
                    <th class=" font-weight-bold text-success" scope="col">Email</th>
                    <th class=" font-weight-bold text-success" scope="col">Subject</th>
                    <th class=" font-weight-bold text-success" scope="col">Time</th>
                    <th class=" font-weight-bold text-success" scope="col">Actions</th>
                </tr>
            </thead>
            <tbody id="tableData">
                {{-- Start Fetch Data --}}
                @foreach ($contacts as $contact)
                    {{-- {{dd($contact->admin)}} --}}
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->subject }}</td>
                        <td>{{ $contact->created_at->diffForHumans()}} <i class="mdi mdi-timer"></i></td>
                        <td>
                        <a href="{{ route('contact.delete', $contact->id) }}" class="btn text-danger"><i
                                class="menu-icon mdi mdi-delete-sweep"></i></a>
                        <a href="{{ route('contact.show', $contact->id) }}" class="btn text-primary"><i
                                    class="menu-icon mdi mdi-eye"></i></a>
                        </td>
                    </tr>
                @endforeach
                {{-- End Fetch Data --}}
                <div class="d-flex mt-2 justify-content-center">
                    {{ $contacts->appends(request()->input())->links() }}
                </div>
            </tbody>
        </table>
    </div>
@endsection
