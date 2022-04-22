@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header-card">
                    <h1 id="title">{{ $card->name }}</h1>
                    <a class="navbar-brand" href='{{ route('cards.index') }}' >Retour à vos cartes</a>
                </div>
                <div class="card-body-card">  
                    <tr>
                        <td>{{ $card->created_at }}</td>
                        <td>{{ $card->description }}</td>
                        <td>{{ $card->num_list }}</td>
                    </tr>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection