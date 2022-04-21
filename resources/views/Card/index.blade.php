@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header-workplace">
                    <h1 id="title">Vos Cartes</h1>
                    <td>
                        <label for="btnAddWorkplace" id="labelWorkplaceCreate">Nouvelle carte</label>
                        <a class="navbar-workplace"  href="{{ route('cards.create') }}">
                            <p id="btnAddWorkplace"> + </p>
                        </a>
                        
                    </td>
                </div>
                <div class="card-body-workplace">
                    @foreach($cards as $card)
                    <div id="workplaces">
                        <tr>
                            <td>{{ $card->label }}</td>
                            <td>
                                <a class="linkIndex" href="{{ route('cards.show', $card->card_id) }}">
                                    {{ $card->name }}
                                </a>
                            </td>
                            <td>
                                <a class="linkEdit" href="{{ route('cards.edit', $card->card_id) }}">
                                    Paramètres
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('cards.destroy', $card->card_id)}}" method="post">
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