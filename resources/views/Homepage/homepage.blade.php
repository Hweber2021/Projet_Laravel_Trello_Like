@extends('layouts.app')

@section('title', 'Homepage')


@section('content')

    <div class="flex-center position-ref full-height" id="homepage">

        <div class='title'>
            <h1>Bienvenue sur BookYourWork l'environnement Kanban frendly</h1>
        </div>

        <div class='homepage-text-center'>
            <p>
            Vous trouverez au sein de ce site web toutes les fonctionnalités vous permettant la création de tableau de type Kanban.<br><br><br>
            Une interface ludique permettra aux groupes de travail d'organiser la mise en place de leurs projets.<br><br><br>
            Afin de bénéficier des fonctionnalitées de  l'application, la création d'un compte est néscéssaire.<br><br>
            </p>
        </div>

        <div class="image_center">
            <img src="/image/image_center.png" alt="image center" width="450">
        </div>
    </div>

@endsection

