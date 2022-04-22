@extends('layouts.app')

@section("content")
    <h2 id="navbar-brand">Parametre de l'espace {{ $workplace->name }}</h2>
    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br />
        @endif
        <form action="{{ route('workplaces.update', $workplace->workplace_id) }}">
            @csrf
            @method('PATCH')

            <div class="form-group">
                <label for="workplace_name">Nom de votre espace :</label>
                <input type="text" class="form-control" name="workplace_name" value="{{ $workplace->name }}"/>
            </div>

            <div class="form-submit">
                <button type="submit" class="btn btn-primary" id="submitButton">Mise à jour</button>
            </div>        
        </form>
    </div>
@endsection