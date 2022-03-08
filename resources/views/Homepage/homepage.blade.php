@extends('layouts.app')

@section('title', 'Homepage')

@section('style')

    <style>

        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

    </style>

@endsection

@section('content')

    <div class='title'>
        <h1>Bienvenu sur BookYourWork l'environnement Kanban frendly du net</h1>
    </div>

    <div class='text-center'>
        <p>
        Vous trouverez au sein de ce site web toutes les fonctionnalités vous permettant la création de tableau de type Kanban.<br>
        Au sein de ce logiciel, une interface de creation de tableau type Trello vous attend. Ces tableaux permettront à n'importe quel groupe de travail d'organiser la mise en place de mleur projet.<br>
        Les non-initiés ne sont pas oublié. Notre manuel intégré vous permettra de faire vos premier pas dans le monde de la gestion de projet<br>
        Afin de bénéficié des fonctionnalitées de notre application, la création d'un compte est néscéssaire. Une fois votre compte créer un message de confirmation vous sera envoyé.<br>
        </p>
    </div>

    <div class="image-center">
        <img src="../components/image_center.jfif" />
    </div>

@endsection

