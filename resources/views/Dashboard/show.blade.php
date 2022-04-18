@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a class="navbar-brand" href="{{ route('dashboards.index') }}">
                        <p id="btnDashboardIndex"> <- </p>
                    </a>
                </div>
                <div class="card-menu-dashboard">  
                    <td>{{ $dashboard->name }}</td>
                </div>
                <br>
                <div class="card-body-dashboard">
                    <tr id="listBody">
                        <td>
                            <a href="{{ route('lists.index') }}">Listes</a>
                        <td>
                    </tr>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection