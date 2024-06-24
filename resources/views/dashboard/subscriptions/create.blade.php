@extends('dashboard/layouts/template')

@section('content')

<!-- Content -->
<h3 class="mb-4">{{ $pagetitle }}</h3>
<hr>
<!-- /content -->

<form action="{{ route('subscriptions.store') }}" method="post" class="col-md-4">
    @csrf
    <div class="form-group">
        <input type="text" name="name" id="name" placeholder="Nom de l'abonnement" require class="form-control">
    </div>
    <div class="form-group">
        <input type="number" name="price" id="price" placeholder="Prix de l'abonnement (en Dh)" require class="form-control">
    </div>
    <div class="form-group">
        <input type="number" name="duration" id="duration" placeholder="Durée de l'abonnement (en mois)" require class="form-control">
    </div>
    <div class="form-group">
        <button class="btn btn-success">Ajouter</button>
    </div>
</form>

@endsection