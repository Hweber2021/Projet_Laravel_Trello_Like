@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a class="navbar-brand" href="{{ route('workplaces.index') }}">{{ $dashboard->workplace->name }}</a>
                </div>
                <div class="card-body-dashboard-content">
                    <div class="card-menu-dashboard">  
                        <td>{{ $dashboard->name }}</td>
                        <td>{{ $dashboard->workplace->user->username }}</td>
                        <td><a class="navbar-list"  href="{{ route('lists.create') }}">Ajoutez une liste</a></td>
                    </div>
                    <br>
                    <div class="dashboard-body">
                        @foreach ($dashboard->lists as $lists)
                        <div id="dashboard-content">
                            <tr>
                                <td>{{$lists->name}}<td>
                                <td>
                                    <div id="cards">
                                        @foreach ($lists->cards as $card)
                                            <td>{{ $card->name }}</td><br>
                                            <td>{{ $card->label }}</td><br>
                                            <td>
                                                <form action="{{ route('cards.destroy', $card->card_id)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger" id="btnDelete" type="submit">-</button>
                                                </form>
                                            </td>
                                        @endforeach
                                    </div>
                                </td>
                                <td><a class="navbar-list-carte" href="{{ route('cards.create') }}">Ajouter une carte</a><td>
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