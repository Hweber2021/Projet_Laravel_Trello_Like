@extends("layouts.app")

@section("content")
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a class="navbar-brand" href="{{ route('dashboards.index') }}">
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

                    <form method="POST" action="{{ route('dashboards.store') }}">
                        <div class="form-group">
                            @csrf
                            <div class="fields">
                                <input type="text" class="form-control" name="name" placeholder="Nom de votre nouveau tableau"/>
                            </div>
                            <div class="field">
                                <label class="label">Espace de travail</label>
                                <div class="select">
                                    <select name="workplace_id">
                                        @foreach($workplaces as $workplace)
                                            <option value="{{ $workplace->workplace_id }}">{{ $workplace->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Créer le tableau</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection