@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header-card">
                    <a class="navbar-brand-card-index" href='{{ route('cards.index') }}' >Retour à vos cartes</a>
                </div>

                <div class="card-body-card">  
                    <div class="card-body-show" id="card_name">
                        <h1 id="cardName">{{ $card->name }}</h1>
                    </div>

                    <div class="card-body-show" id="card_label">
                        <label for="label" id="card_label">Niveau de priorité :</label><br>
                        <input type="text" id="label_card" name="label" value="{{ $card->label }}" disabled>
                    </div>

                     <div class="card-body-show" id="user_email">
                        <label for="description" id="secription-labrel">Description :</label><br>
                        <textarea id="description_area" name="description" disabled>{{ $card->description }}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection