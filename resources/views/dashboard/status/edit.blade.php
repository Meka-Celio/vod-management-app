@extends('dashboard/layouts/template')

@section('content')

<!-- Content -->
<h3 class="mb-4">{{ $pagetitle }}</h3>
<hr>
<!-- /content -->

<form action="{{ route('status.update', $status->id) }}" method="post" class="col-md-4">
    @csrf
    @method('PUT')
    <input type="hidden" name="id" value="{{ $status->id }}">
    <div class="form-group">
        <input type="text" name="name" id="name" value="{{ $status->name }}" placeholder="Status abonnement" require class="form-control">
    </div>
    <div class="form-group">
        <input type="number" min="1" name="code_status" id="code" value="{{ $status->code_status }}" placeholder="code status abonnement" require class="form-control">
    </div>
    <div class="form-group">
        <button class="btn btn-success">Modifier</button>
    </div>
</form>

@endsection