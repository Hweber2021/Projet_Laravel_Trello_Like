@extends('layouts.app')

@section("content")
    <h2>Parametre de votre liste</h2>
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
        <form action="{{ route('lists.update', $list->num_list) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label id="nameLabel" for="name">Nom :</label>
                <input type="textarea" class="form-control" name="name" value="{{ $list->name }}"/>
            </div>
            
            <div class="form-submit">
                <button type="submit" class="btn btn-primary" id="submitButton">Mise à jour</button>
            </div>        
        </form>
    </div>
@endsection