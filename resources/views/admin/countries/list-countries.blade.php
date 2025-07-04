@extends('layouts.application')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3>Liste des pays (Total : 
                        <span class="badge bg-success">
                            {{ $countries->total() }}
                        </span>)
                    </h3>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('countries.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Ajouter un pays
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
                        <h3 class="card-title">Rechercher un pays</h3>
                    </div>
                    <form method="GET" action="{{ route('countries.index') }}">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Nom du pays</label>
                                    <input type="text" class="form-control" name="country_name" 
                                        value="{{ request('country_name') }}" placeholder="Rechercher...">
                                </div>
                                <div class="form-group col-md-6 align-self-end">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-search"></i> Rechercher
                                    </button>
                                    <a href="{{ route('countries.index') }}" class="btn btn-secondary">
                                        <i class="fas fa-sync-alt"></i> Réinitialiser
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Liste des pays</h3>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="bg-success">Nom</th>
                                    <th>Région</th>
                                    <th>Créé le</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($countries as $country)
                                <tr>
                                    <td>{{ $country->country_name }}</td>
                                    <td>{{ $country->region->region_name ?? 'N/A' }}</td>
                                    <td>{{ $country->created_at->translatedFormat('d/m/Y H:i') }}</td>
                                    <td>
                                        <a href="{{ route('countries.show', $country->id) }}" 
                                           class="btn btn-info btn-sm" title="Voir">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('countries.edit', $country->id) }}" 
                                           class="btn btn-warning btn-sm" title="Modifier">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('countries.destroy', $country->id) }}" 
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
                                    <td colspan="4" class="text-center">Aucun pays trouvé</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer clearfix">
                        {{ $countries->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
