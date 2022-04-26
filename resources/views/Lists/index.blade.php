@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header-workplace">
                    <h1 id="title">Vos Listes</h1>
                    <td>
                        <a class="navbar-list"  href="{{ route('lists.create') }}">
                            <p id="btnAddWorkplace">Ajoutez une liste</p>
                        </a>
                        
                    </td>
                </div>
                <div class="card-body-listes">
                    @foreach($listes as $liste)
                    <div id="listes">
                        <tr>
                            <td>
                                <a class="linkDashboardShow" href="{{ route('dashboards.index') }}">
                                    {{ $liste->name }}
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('lists.destroy', $liste->num_list)}}" method="post">
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