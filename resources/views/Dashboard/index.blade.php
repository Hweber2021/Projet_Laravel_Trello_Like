@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a class="navbar-brand" href="{{ url('/dashboard') }}">
                        <p id="workplaceTittle"> {{{ $workplace->name }}}</p>
                    </a>

                    <a class="navbar-brand"  href="{{ route('dashboards.create') }}">
                        <p id="btnAddDashboard"> + </p>
                    </a>
                </div>

                <div class="card-body">
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection