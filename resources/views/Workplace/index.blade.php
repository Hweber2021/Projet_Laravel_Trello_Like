@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a class="navbar-brand" href="{{ url('/dashboard') }}">
                        <h2 id="workplaceTittle">Vos espaces de travail</h2>
                    </a>
                    <td>
                        <a class="navbar-brand"  href="{{ route('dashboards.create') }}">
                            <p id="btnAddDashboard"> + </p>
                        </a>
                        <p>Nouvel espace</p>
                    </td>
                </div>
                <div class="card-body">
                    @foreach($workplaces as $workplace)
                    <tr>
                        <td>{{ $workplace->name }}</td>
                        <td>{{ $workplace->created_at }}</td>
                        <td>
                            <form action="{{ route('workplaces.delete', $workplace->workplace_id)}}" method="post">
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