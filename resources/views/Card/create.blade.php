@extends("layouts.app")

@section("content")
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a class="navbar-brand-card-create" href="{{ route('workplaces.index') }}" disable>
                        <img src="/image/logo.png" alt="logo">
                    </a>
                </div>

                <div class="card-body-create-card">
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
                                <label for="label" class="label">Niveau de priorité :</label><br>
                                <select name="label" class="form-control-select">
                                    <option value="Faible">Faible</option>
                                    <option value="Moyen">Moyen</option>
                                    <option value="Urgent">Urgent</option>
                                </select>
                            </div>
                            <div class="fields">
                                <textarea class="form-control-textarea" name="description">Décrivez la tâche</textarea>
                            </div>
                            <div class="fields">
                                <div class="select">
                                    <label for="user_id" class="label">Attribué à :</label>
                                    <select name="user_id">
                                        @foreach($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->email }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="select">
                                    <label for="num_list" class="label">Contenu dans :</label> 
                                    <select name="num_list">
                                        @foreach ($lists as $list)
                                            <option value="{{ $list->num_list }}">{{ $list->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" id="btnCreateCard">Ajouter la tâche</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection