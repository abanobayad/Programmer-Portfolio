@extends('Dashboard.layout.layout')
@include('Dashboard.layout.nav')
@section('content')
    <div class="row">
        <div class="col-lg-6 m-auto col-md-12">
            <div class="card mb-3 pb-3">
                <div class="row no-gutters">
                    <div class="col-md-12">
                        <div class="card-body m-auto">
                            <h4 class="card-title">Show / {{ $hire->email }} hire</h4>
                            <div class="row ">
                                <div class="col-12">
                                    <p class="card-text">Email :

                                        <a class="font-weight-bold text-primary" href="mailto:{{ $hire->email }}">
                                            {{ $hire->email }}
                                        </a>
                                    </p>
                                    <p class="card-text">Message : <span
                                            class="font-weight-bold text-primary">{{ $hire->message }}</span> </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
