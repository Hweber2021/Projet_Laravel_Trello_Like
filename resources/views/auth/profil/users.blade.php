@extends('layouts.app')

@section('content')
  <div class="container">
      <div class="centerInterface_profile">
 
        <div class="myaccount-header-img">
          <img class="rounded-circle" src="/image/{{ $user->profiledp }}" style="width:100px; height:100px; float:left; border-radius:50%; margin-right:25px;"/>
        </div>
        <br><br><br><br>

        <div class="card-body-profile" id="user_baseInfo">
          <div id="user_baseInfo_name">
            <label for="name_user" id="name_label">Nom :</label><br>
            <input type="text" id="name_user" name="name_user" value="{{ Auth::user()->name }}" disabled>
          </div>
          <div id="user_baseInfo_surname">
            <label for="surname_user" id="surname_label">Prénom :</label><br>
            <input type="text" id="surname_user" name="surname_user" value="{{ Auth::user()->surname }}" disabled>
          </div>
        </div>       

        <div class="card-body-profile" id="user_username">
          <label for="username_user" id="username_label">Nom d'utilisateur :</label><br>
          <input type="text" id="username_user" name="username_user" value="{{ Auth::user()->username }}" disabled>
        </div>

        <div class="card-body-profile" id="user_email">
          <label for="email_user" id="email_label">Adresse mail :</label><br>
          <input type="text" id="email_user" name="email_user" value="{{ Auth::user()->email }}" disabled>
        </div>

        <div class="card-body-profile" id="user_workplaces">
          <a id="workplaceIndexLink" href="{{ route('workplaces.index') }}">Mes Espaces</a>
        </div>

        <div class="card-body-profile" id="user_cards">
          <a id="cardIndexLink" href="{{ route('cards.index') }}">Mes Cartes</a>
        </div>
      </div>
  </div>
@endsection