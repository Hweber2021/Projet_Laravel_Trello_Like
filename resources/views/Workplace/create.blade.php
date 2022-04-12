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
                                <input type="text" class="form-control" name="name" placeholder="Nom de votre espace"/>
                            </div>
                            <div class="field">
                                <div class="select"> 
                                 <label for="user_id" class="label-user">Propriétaire :</label><br>
                                    <select name="user_id">
                                        @foreach($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->email }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        <button type="submit" class="btn btn-primary" id="submitButton">Confirmation</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection