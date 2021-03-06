@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header-workplace">
                    <h1 id="title">Vos espaces de travail</h1>
                    <td>
                        <label for="btnAddWorkplace" id="labelWorkplaceCreate">Nouvel espace de travail</label>
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
                                <a class="linkIndex" href="{{ route('workplaces.show', $workplace->workplace_id) }}">
                                    {{ $workplace->name }}
                                </a>
                            </td>
                            <td>
                                <a class="linkEdit" href="{{ route('workplaces.edit', $workplace->workplace_id) }}">
                                    Paramètres
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('workplaces.destroy', $workplace->workplace_id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit" id="btnDelete">Suppression</button>
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