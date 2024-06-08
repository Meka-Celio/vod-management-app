@extends('dashboard/layouts/template')

@section('content')

<!-- Content -->
<h3 class="mb-4">{{ $pagetitle }}</h3>
<hr>
<!-- /content -->

<div class="row">
    <!-- Operations table -->
    <div class="col-md-4">
        <div class="card shadow mb-4">
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
        <div class="card shadow mb-4">
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
        <div class="card shadow mb-4">
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

@endsection