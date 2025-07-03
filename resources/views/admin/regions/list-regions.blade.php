@extends('layouts.application')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3>Liste des régions (Total : 
                        <span class="badge bg-success">
                            {{ $regions->total() }}
                        </span>)
                    </h3>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('regions.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Ajouter une région
                    </a>
                </div>
            </div>
        </div>
    </section>

    @include('_message')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Rechercher une région</h3>
                    </div>
                    <form method="GET" action="{{ route('regions.index') }}">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Nom de la région</label>
                                    <input type="text" class="form-control" name="region_name" 
                                        value="{{ request('region_name') }}" placeholder="Rechercher...">
                                </div>
                                <div class="form-group col-md-6 align-self-end">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-search"></i> Rechercher
                                    </button>
                                    <a href="{{ route('regions.index') }}" class="btn btn-secondary">
                                        <i class="fas fa-sync-alt"></i> Réinitialiser
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Liste des régions</h3>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="bg-success">Nom</th>
                                    <th>Créé le</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($regions as $region)
                                <tr>
                                    <td>{{ $region->region_name }}</td>
                                    <td>{{ $region->created_at->translatedFormat('d/m/Y H:i') }}</td>
                                    <td>
                                        <a href="{{ route('regions.show', $region->id) }}" 
                                           class="btn btn-info btn-sm" title="Voir">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('regions.edit', $region->id) }}" 
                                           class="btn btn-warning btn-sm" title="Modifier">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('regions.destroy', $region->id) }}" 
                                              method="POST" style="display:inline;">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" 
                                                    onclick="return confirm('Confirmer la suppression ?')" title="Supprimer">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3" class="text-center">Aucune région trouvée</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer clearfix">
                        {{ $regions->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
