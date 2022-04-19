@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header-workplace">
                    <h1 id="title">{{ $workplace->name }}</h1>
                    <a class="navbar-brand" href='{{ route('workplaces.index') }}' >Retour à vos espace</a>
                </div>
                <div class="card-body-workplace">
                @foreach ($dashboards as $dashboard)    
                    <div id="workplacesDashboards">
                        <tr>
                            <td>{{ $dashboard->name }}</td>
                        </tr>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection