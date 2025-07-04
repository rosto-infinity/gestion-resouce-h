@extends('layouts.application')
@section('title', 'Détails du pays')
@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Détails du pays: {{ $country->country_name }}</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('countries.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Retour à la liste
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Informations</h3>
                        </div>
                        <div class="card-body">
                            <dl class="row">
                                <dt class="col-sm-3">Nom du pays:</dt>
                                <dd class="col-sm-9">{{ $country->country_name }}</dd>

                                <dt class="col-sm-3">Région associée:</dt>
                                <dd class="col-sm-9">{{ $country->region->region_name ?? 'Aucune région associée' }}</dd>

                                <dt class="col-sm-3">Date de création:</dt>
                                <dd class="col-sm-9">{{ $country->created_at->translatedFormat('d/m/Y H:i') }}</dd>

                                <dt class="col-sm-3">Dernière modification:</dt>
                                <dd class="col-sm-9">{{ $country->updated_at->translatedFormat('d/m/Y H:i') }}</dd>
                            </dl>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('countries.edit', $country->id) }}" class="btn btn-warning">
                                <i class="fas fa-edit"></i> Modifier
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
