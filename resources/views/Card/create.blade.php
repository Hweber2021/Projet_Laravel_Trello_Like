@extends("layouts.app")

@section("content")
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a class="navbar-brand" href="{{ route('cards.index') }}">
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

                    <form method="POST" action="{{ route('cards.store') }}">
                        <div class="form-group">
                            @csrf
                            <div class="fields">
                                <input type="text" class="form-control" name="name" placeholder="Nom de la tâche"/>
                            </div>
                            <div class="fields">
                                <label for="label"></label>
                                <select name="label" class="form-control">
                                    <option value="Niveau de priorité"></option>
                                    <option value="Faible"></option>
                                    <option value="Moyen"></option>
                                    <option value="Urgent"></option>
                                </select>
                            </div>
                            <div class="fields">
                                <input type="textarea" class="form-control" name="description" placeholder="Description de la tâche">
                            </div>
                            <div class="fields">
                                <label for="user_id" class="label"></label>
                                <div class="select">
                                    <select name="user_id">
                                        @foreach($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->email }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="select">
                                    <select name="num_list">
                                        @foreach ($lists as $list)
                                            <option value="{{ $list->num_list }}">{{ $list->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Ajouter la carte</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection