@extends('layouts.app')

@section('content')
  <div class="container">
      <h2 class="title_profile">Profile</h2>
      <div id="centerInterface_profile">

        <div class="card-body" id="user_baseInfo">
          <label for="name_user" id="name_label">Nom :</label>
          <input type="text" id="name_user" name="name_user" value="{{ Auth::user()->name }}" disabled>

          <label for="surname_user" id="surname_label">Prénom :</label>
          <input type="text" id="surname_user" name="surname_user" value="{{ Auth::user()->surname }}" disabled>
        </div>

        <div class="card-body" id="user_username">
          <label for="username_user" id="username_label">Nom d'utilisateur :</label><br>
          <input type="text" id="username_user" name="username_user" value="{{ Auth::user()->username }}" disabled>
        </div>

        <div class="card-body" id="user_email">
          <label for="email_user" id="email_label">Adresse mail :</label><br>
          <input type="text" id="email_user" name="email_user" value="{{ Auth::user()->email }}" disabled>
        </div>

      </div>
  </div>
@endsection