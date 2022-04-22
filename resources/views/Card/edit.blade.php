@extends('layouts.app')

@section("content")
    <h2 id="navbar-brand">Parametre de la carte {{ $card->name }}</h2>
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
        <form action="{{ route('cards.update', $card->card_id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="description">Description :</label>
                <input type="textarea" class="form-control" name="description" value="{{ $card->description }}"/>
            </div>
            
            <div class="form-group">
            <label for="num_list">Liste :</label>
                <select name="num_list">
                    @foreach ($lists as $list)
                        <option value="{{ $list->num_list }}">{{ $list->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-submit">
                <button type="submit" class="btn btn-primary" id="submitButton">Mise à jour</button>
            </div>        
        </form>
    </div>
@endsection