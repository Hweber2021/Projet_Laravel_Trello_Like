@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body-dashboard-content">
                    <div class="card-menu-dashboard">
                        <td>{{ $dashboard->name }}</td>
                        <td><a class="navbar-list"  href="{{ route('lists.create') }}">Ajoutez une liste</a></td>
                        <td><a class="navbar-workplace-list" href="{{ route('workplaces.index') }}">Retour à vos espace</a></td>
                    </div>
                    <br>
                    <div class="dashboard-body">
                        @foreach ($dashboard->lists as $lists)
                        <div id="dashboard-content">
                            <tr>
                                <div id="listHeader">
                                    <td><a class="btnEditList" href="{{ route('lists.edit', $lists->num_list) }}">{{$lists->name}}</a></td>
                                    <td>   
                                        <form action="{{ route('lists.destroy', $lists->num_list)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" id="btnDeleteCards" type="submit">-</button>
                                        </form>
                                    </td>
                                </div>
                                <td>
                                    @foreach ($lists->cards as $card)
                                        <div id="cards">
                                            <tr>
                                                <td>{{ $card->label }}</td>
                                                <td><a class="linkEditCard" href="{{ route('cards.edit', $card->card_id) }}">{{ $card->name }}</a></td>
                                                <td>
                                                    <form action="{{ route('cards.destroy', $card->card_id)}}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger" id="btnDeleteCards" type="submit">-</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        </div>
                                    @endforeach
                                </td>
                                <td><a class="navbar-list-carte" href="{{ route('cards.create') }}">+ Ajouter une carte</a><td>
                            </tr>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection