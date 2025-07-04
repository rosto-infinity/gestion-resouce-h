@extends('layouts.application')
@section('title', 'Détails de la région')
@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Détails de la région : {{ $region->region_name }}</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('regions.index') }}" class="btn btn-secondary">
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
                            <h3 class="card-title">Informations générales</h3>
                        </div>

                        <div class="card-body">
                            <dl class="row">
                                <dt class="col-sm-3">ID :</dt>
                                <dd class="col-sm-9">{{ $region->id }}</dd>

                                <dt class="col-sm-3">Nom :</dt>
                                <dd class="col-sm-9">{{ $region->region_name }}</dd>

                                <dt class="col-sm-3">Créée le :</dt>
                                <dd class="col-sm-9">{{ $region->created_at->translatedFormat('d/m/Y à H:i') }}</dd>

                                <dt class="col-sm-3">Dernière modification :</dt>
                                <dd class="col-sm-9">{{ $region->updated_at->translatedFormat('d/m/Y à H:i') }}</dd>
                            </dl>
                        </div>

                        <div class="card-footer">
                            <a href="{{ route('regions.edit', $region->id) }}" class="btn btn-warning">
                                <i class="fas fa-edit"></i> Modifier
                            </a>
                            <form action="{{ route('regions.destroy', $region->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Confirmer la suppression ?')">
                                    <i class="fas fa-trash"></i> Supprimer
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
