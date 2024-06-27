@extends('dashboard/layouts/template')

@section('content')

<!-- Content -->
<h3 class="mb-4">{{ $pagetitle }}</h3>
<hr>
<!-- /content -->

<form action="{{ route('status.store') }}" method="post" class="col-md-4 form">
    @csrf
    <div class="form-group">
        <input type="text" name="name" id="name" placeholder="Status" require class="form-control">
    </div>
    <div class="form-group">
        <input type="number" min="0" value="0" name="code_status" id="code_status" placeholder="code du status" require class="form-control">
    </div>
    <div class="form-group">
        <button class="btn btn-success">Ajouter</button>
    </div>
</form>

@endsection