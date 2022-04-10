@extends("layouts.app")

@section("content")
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a class="navbar-brand" href="{{ route('workplaces.index') }}">
                        <img src="/image/logo.png" alt="logo">
                    </a>
                </div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div><br/>
                    @endif

                    <form method="POST" action="{{ route('workplaces.store') }}">
                        <div class="form-group">
                            @csrf

                            <div class="fields">
                                <label for="name">Donnee un nom à votre Espace de travail:</label>
                                <input type="text" class="form-control" name="name"/>
                            </div>
                            <div class="fields">
                                <label for="user_id">Donnee le numéro de l'utilisateur:</label>
                                <input type="number" class="form-control" name="user_id"/>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Créer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection