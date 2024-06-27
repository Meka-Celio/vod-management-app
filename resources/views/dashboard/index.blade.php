@extends('dashboard/layouts/template')

@section('content')

<!-- Content -->
<h3 class="mb-4">{{ $pagetitle }}</h3>
<hr>
<!-- /content -->

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
    <!-- /movies tables -->
    <!-- users table -->
    <div class="col-md-6">
        <div class="card bg-vod-dark-mode shadow mb-4">
            <div class="card-header">
                <h6 class="text-warning">Users</h6>
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
                            </tr>
                            @endforeach
                        </tbody>
                        <!-- Script pour la suppression -->
                        <script>
                            let delete_item_forms = document.querySelectorAll('form')
                            for (let i = 0; i < delete_item_forms.length; i++) {
                                delete_item_forms[i].addEventListener('submit', (event) => {
                                    let confirm_delete = confirm("Voulez-vous supprimer cet élément ?")
                                    if (!confirm_delete) {
                                        event.preventDefault()
                                    }
                                })
                            }
                        </script>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /users table -->
</div>

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