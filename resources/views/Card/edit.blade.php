@extends('layouts.app')

@section("content")
    <h2 id="navbar-brand">Paramètres de la carte {{ $card->name }}</h2>
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
                <label for="description">Description :</label><br>
                <textarea class="form-control-textarea" name="description">{{ $card->description }}</textarea>
            </div>
            
            <div class="form-group">
            <label for="num_list">Liste :</label>
                <select name="num_list" class="form-control-select">
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