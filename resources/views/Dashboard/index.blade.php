@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a class="navbar-brand"  href="{{ route('dashboards.create') }}">
                        <p id="btnAddDashboard"> + </p>
                    </a>
                </div>

                <div class="card-body">
                    @foreach($dashboards as $dashboard)
                    <tr>
                        <td>{{ $dashboard->name }}</td>
                        <td>{{ $dashboard->created_at }}</td>
                        <td>
                            <form action="{{ route('dashboards.destroy', $dashboard->dashboard_id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection