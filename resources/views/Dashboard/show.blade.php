@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a class="navbar-brand" href="{{ route('workplaces.index') }}">
                        <p id="btnDashboardIndex"> <- </p>
                    </a>
                </div>
                <div class="card-body-dashboard-content">
                    @foreach ($dashboard->lists as $lists)
                        <div class="card-menu-dashboard">  
                            <td>{{ $dashboard->name }}</td>
                            <td>{{ $dashboard->workplace->user->username }}</td>
                        </div>
                        <br>
                        <div id="dashboard-content">
                            <tr>
                                <td>{{$lists->name}}<td>
                            </tr>
                        </div>
                    @endforeach
                    <tr>
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