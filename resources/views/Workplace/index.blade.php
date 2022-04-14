@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header-workplace">
                    <h1 id="title">Vos espaces de travail</h1>
                    <td>
                        <label for="btnAddWorkplace" id="labelWorkplaceCreate">Nouvel Espace de travail</label>
                        <a class="navbar-workplace"  href="{{ route('workplaces.create') }}">
                            <p id="btnAddWorkplace"> + </p>
                        </a>
                        
                    </td>
                </div>
                <div class="card-body-workplace">
                    @foreach($workplaces as $workplace)
                    <div id="workplaces">
                        <tr>
                            <td>
                                <a class="linkDashboardIndex" href="{{ route('dashboards.index') }}">
                                    {{ $workplace->name }}
                                </a>
                            </td>
                            <td>{{ $workplace->updated_at  }}</td>
                            <td>
                                <a class="linkWorkplaceEdit" href="{{ route('workplaces.edit', $workplace->workplace_id) }}">
                                    Paramètres
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('workplaces.destroy', $workplace->workplace_id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit" id="btnDeleteWorkplace">Suppression</button>
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
@endsection