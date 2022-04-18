@extends("layouts.app")

@section("content")
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a class="navbar-brand" href="{{ route('lists.index') }}">
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

                    <form method="POST" action="{{ route('lists.store') }}">
                        <div class="form-group">
                            @csrf
                            <div class="fields">
                                <input type="text" class="form-control" name="name" placeholder="Nom de votre nouvelle liste"/>
                            </div>
                            <div class="fields">
                                <label for="dashboard_id" class="label" >Tableau</label>
                                <div class="select">
                                    <select name="dashboard_id" class="selectDashboard">
                                        @foreach($dashboards as $dashboard)
                                            <option value="{{ $dashboard->dashboard_id }}">{{ $dashboard->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Créer la liste</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection