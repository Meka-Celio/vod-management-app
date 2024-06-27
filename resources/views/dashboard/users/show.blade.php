@extends('dashboard/layouts/template')

@section('content')

<!-- Content -->
<h3 class="mb-4">{{ $pagetitle }}</h3>
<hr>
<!-- /content -->

<!-- USer info -->
<div class="row">
    <!-- user profil -->
    <div class="col-md-2 user">
        <div class="card bg-vod-dark-mode shadow mb-4">
            <div class="user-profil">
                <div class="userface">
                    <img src="{{ asset('dashboard/img/user.png') }}" alt="">
                </div>
                <div class="usertext">
                    <h5 class="text-warning">Nom Utilisateur</h5>
                    <p>
                        {{ $user->name }}
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- /user profil -->

    <!-- user informations -->
    <div class="col-md-10">
        <div class="card bg-vod-dark-mode shadow mb-4">
            <div class="card-header">
                <h6 class="text-warning">User Informations</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <h5 class="text-warning">Email : </h5>
                        <p>{{ $user->email }}</p>
                    </div>
                    <div class="col-md-3">
                        <h5 class="text-warning">Type User : </h5>
                        <p>{{ $usertype->name }}</p>
                    </div>
                    <div class="col-md-3"></div>
                    <div class="col-md-3">
                        @if (!isset($account->num_account))
                        <form action="{{ route('accounts.store') }}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                            <button class="btn btn-success">Ajouter un compte</button>
                        </form>
                        @endif
                    </div>
                </div>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Illo neque ipsam perferendis dolorem,
                    eaque et est, ipsum sunt dicta quaerat ab consequatur vero beatae exercitationem, cum corporis sit. Sint, quis.
                </p>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Illo neque ipsam perferendis dolorem,
                    eaque et est, ipsum sunt dicta quaerat ab consequatur vero beatae exercitationem, cum corporis sit. Sint, quis.
                </p>
            </div>
        </div>
    </div>
    <!-- user informations -->
</div>
<!-- / user info -->

<hr>
<p>{{ $msg }}</p>
<!-- Account info -->
<div class="row">
    <div class="col-md-8">
        <div class="card bg-vod-dark-mode shadow mb-4">
            <div class="card-header">
                <h6 class="text-warning">Mes films loués</h6>
                @if (isset($account->num_account))
                <a href="{{ route('rentalmovies.create', $account->id) }}" class="btn btn-info">Ajouter une location</a>
                @endif
            </div>
            @if (!isset($account->num_account))
            <div class="card-body">
                <p>Merci d'activer uncompte VOD pour cet utilisateur</p>
            </div>
            @else
            <div class="card-body">
                @if (!isset($account_rental->id))
                <p>Ce compte n'a pas effectué de location.</p>
                @else
                <div class="table">
                    <table class="table-database">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nom du film</th>
                                <th>Début location</th>
                                <th>Fin de location</th>
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
                @endif
            </div>
            @endif
        </div>
    </div>
    <div class="col-md-4">
        <div class="card bg-vod-dark-mode shadow mb-4">
            <div class="card-header">
                <h6 class="text-warning">Mon Compte</h6>
            </div>
            <div class="card-body">
                <h4 class="text-warning">Numéro de compte : </h4>
                @if (!isset($account->num_account))
                <p>Cet utilisateur n'a pas encore de compte VOD actif</p>
                @else
                <p>{{ $account->num_account }}</p>
                @endif
            </div>
        </div>
    </div>
</div>
<!-- / Account info -->

<!-- Subscriptions account -->
<div class="row">
    <div class="col-md-8">
        <div class="card bg-vod-dark-mode shadow mb-4">
            <div class="card-header">
                <h6 class="text-warning">Mes souscriptions</h6>
            </div>
            @if (!isset($account->num_account))
            <div class="card-body">
                <p>Merci d'activer un compte VOD pour cet utilisateur</p>
            </div>
            @else
            <div class="card-body">
                @if (!isset($account_subscription->id))
                <p>Ce compte n'a souscrit à aucun abonnement.</p>
                @else
                <div class="table">
                    <table class="table-database">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nom du film</th>
                                <th>Début location</th>
                                <th>Fin de location</th>
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
                @endif
            </div>
            @endif
        </div>
    </div>
</div>
<!-- /subscriptions account -->

@endsection