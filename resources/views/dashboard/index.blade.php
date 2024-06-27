@extends('dashboard/layouts/template')

@section('content')

<!-- Content -->
<h3 class="mb-4">{{ $pagetitle }}</h3>
<hr>
<!-- /content -->

<!-- First line tables -->
<div class="row">
    <!-- Operations table -->
    <div class="col-md-4">
        <div class="card bg-vod-dark-mode shadow mb-4">
            <div class="card-header">
                <h6 class="text-warning">Les opérations</h6>
            </div>
            <div class="card-body">
                <div class="table">
                    <table class="table-database">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Noms Opérations</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($operations as $ope)
                            <tr>

                                <td>
                                    {{ $ope->id }}
                                </td>
                                <td>
                                    {{ $ope->name }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- / operations tables -->

    <!-- Usertypes -->
    <div class="col-md-4">
        <div class="card bg-vod-dark-mode shadow mb-4">
            <div class="card-header">
                <h6 class="text-warning">Les Usertypes</h6>
            </div>
            <div class="card-body">
                <div class="table">
                    <table class="table-database">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Noms usertypes</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($usertypes as $ustype)
                            <tr>

                                <td>
                                    {{ $ustype->id }}
                                </td>
                                <td>
                                    {{ $ustype->name }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- / usertypes -->

    <!-- Status -->
    <div class="col-md-4">
        <div class="card bg-vod-dark-mode shadow mb-4">
            <div class="card-header">
                <h6 class="text-warning">Les Status</h6>
            </div>
            <div class="card-body">
                <div class="table">
                    <table class="table-database">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Status</th>
                                <th>Code</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($status as $stat)
                            <tr>

                                <td>
                                    {{ $stat->id }}
                                </td>
                                <td>
                                    {{ $stat->name }}
                                </td>
                                <td>
                                    {{ $stat->code_status }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- / Status -->
</div>
<!-- / first line table -->

<!-- Movies & Users tables -->
<div class="row">
    <!-- movies table -->
    <div class="col-md-6">
        <div class="card bg-vod-dark-mode shadow mb-4">
            <div class="card-header">
                <h6 class="text-warning">Liste des films</h6>
            </div>
            <div class="card-body">
                <div class="table">
                    <table class="table-database">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Affiche</th>
                                <th>Movie name code</th>
                                <th>Movie Name</th>
                                <th>Sortie le</th>
                                <th>Durée du film</th>
                                <th>Age</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($movies as $movie)
                            <tr>
                                <td>
                                    {{ $movie->id }}
                                </td>
                                <td>
                                    <img src="{{ asset($movie->cover) }}" alt="{{ $movie->name }}" width="45px">
                                </td>
                                <td>
                                    {{ $movie->name }}
                                </td>
                                <td>
                                    {{ $movie->display_name }}
                                </td>
                                <td>
                                    {{ $movie->release_date }}
                                </td>
                                <td>
                                    {{ $movie->runtime }} min
                                </td>
                                <td>
                                    PG-{{ $movie->rating }}
                                </td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /movies tables -->
    <div class="col-md-6">
        <!-- users table -->
        <div class="card shadow mb-4">
            <div class="card-header">
                <h6 class="text-warning">Les users</h6>
            </div>
            <div class="card-body">
                <div class="table">
                    <table class="table-database">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Id Type user</th>
                                <th>Type d'utilisateur</th>
                                <th>Créé le</th>
                                <th>Date de modification</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>
                                    {{ $user->id }}
                                </td>
                                <td>
                                    {{ $user->name }}
                                </td>
                                <td>
                                    {{ $user->email }}
                                </td>
                                <td>
                                    {{ $user->usertype_id }}
                                </td>
                                <td>
                                    @foreach ($usertypes as $utype)
                                    @if ($user->usertype_id == $utype->id)
                                    {{ $utype->name }}
                                    @endif
                                    @endforeach
                                </td>
                                <td>
                                    {{ $user->created_at }}
                                </td>
                                <td>
                                    {{ $user->updated_at }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- / users tables -->
    </div>
</div>

<div class="row">
    <!-- subscriptions tab -->
    <div class="col-md-8">
        <div class="card  bg-vod-dark-mode shadow mb-4">
            <div class="card-header">
                <h6 class="text-warning">Abonnements disponibles</h6>
            </div>
            <div class="card-body">
                <table class="table-database">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Type d'abonnement</th>
                            <th>Prix Abonnement</th>
                            <th>Durée de l'abonnement</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subscriptions as $sub)
                        <tr>
                            <td>
                                {{ $sub->id }}
                            </td>
                            <td>
                                {{ $sub->name }}
                            </td>
                            <td>
                                {{ $sub->price }} Dh
                            </td>
                            <td>
                                {{ $sub->duration }} mois
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /sub tab -->

    <!-- ads block -->
    <div class="col-md-4">
        <div id="ads">
            <img src="{{ asset('dashboard/img/ads-ban.jpg') }}" alt="Service de VOD">
        </div>
    </div>
    <!-- /ads block -->
</div>




@endsection