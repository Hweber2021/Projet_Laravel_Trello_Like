@extends('layouts.app')

@section("content")
    <h2>Parametre de l'espace {{ $workplace->name }}</h2>
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
        <form method="post" action="{{ route('workplaces.update', $workplace->workplace_id) }}">
            <div class="form-group">
                @csrf
                @method('PATCH')
                <label for="workplace_name">Nom de votre espace :</label>
                <input type="text" class="form-control" name="workplace_name" value="{{ $workplace->name }}"/>
            </div>
            <button type="submit" class="btn btn-primary">Mise à jour de votre espace</button>
        </form>
    </div>
@endsection