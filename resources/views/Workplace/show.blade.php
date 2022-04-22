@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header-workplace">
                    <h1 id="title">{{ $workplace->name }}</h1>
                    <a class="navbar-brand" href='{{ route('workplaces.index') }}' >Retour à vos espace</a>
                    <label for="btnAddDashboard" id="labelDashboardCreate">Nouveau Tableau</label>
                    <a class="navbar-brand"  href="{{ route('dashboards.create') }}">
                        <p id="btnAddDashboard"> + </p>
                    </a>
                </div>
                <div class="card-body-workplace-dashboard">  
                    @foreach ($workplace->dashboard as $dashboard)
                        <div id="dashboards">
                            <tr>
                                <td>
                                    <a class="linkIndex" href="{{ route('dashboards.show', $dashboard->dashboard_id) }}">
                                        {{ $dashboard->name }}
                                    </a>
                                </td><br>
                                <td>{{ $dashboard->updated_at }}</td>
                                <br>
                                <td>
                                    <form action="{{ route('dashboards.destroy', $dashboard->dashboard_id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit" id="btnDelete">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection