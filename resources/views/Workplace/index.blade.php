@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1 id="title">Vos espaces de travail</h1>
                    <td id="btnNewWorkplace">
                        <a class="navbar-workplace"  href="{{ route('workplaces.create') }}">
                            <p id="btnAddWorkplace"> + </p>
                        </a>
                        <p>Nouvel Espace de travail</p>
                    </td>
                </div>
                <div class="card-body">
                    @foreach($workplaces as $workplace)
                    <tr>
                        <td>{{ $workplace->name }}</td>
                        <td>{{ $workplace->updated_at  }}</td>
                        <td>
                            <form action="{{ route('workplaces.destroy', $workplace->workplace_id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Suppression</button>
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