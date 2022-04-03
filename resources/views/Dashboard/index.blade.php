@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a class="navbar-brand" href="{{ url('/dashboard') }}">
                        <p id="workplaceTittle"> {{{ Auth::workplace->name }}}</p>
                    </a>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('dashboards.show') }}">

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection