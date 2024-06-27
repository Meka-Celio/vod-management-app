@extends('dashboard/layouts/template')

@section('content')

<!-- Content -->
<h3 class="mb-4">{{ $pagetitle }}</h3>
<hr>
<!-- /content -->

<form action="{{ route('subscriptions.update', $subscription->id) }}" method="post" class="col-md-4 form">
    @csrf
    @method('PUT')
    <input type="hidden" name="id" id="" value="{{ $subscription->id }}">
    <div class="form-group">
        <label for="">Nom Abonnement</label>
        <input type="text" name="name" id="name" placeholder="Nom de l'abonnement" require class="form-control" value="{{ $subscription->name }}">
    </div>
    <div class=" form-group">
        <label for="">Prix de l'abonnement (en Dh)</label>
        <input type="number" name="price" id="price" placeholder="Prix de l'abonnement (en Dh)" require class="form-control" value="{{ $subscription->price }}">
    </div>
    <div class=" form-group">
        <label for="">Durée de l'abonnement (en mois)</label>
        <input type="number" name="duration" id="duration" placeholder="Durée de l'abonnement (en mois)" require class="form-control" value="{{ $subscription->duration }}">
    </div>
    <div class=" form-group">
        <button class="btn btn-success">Ajouter</button>
    </div>
</form>

@endsection