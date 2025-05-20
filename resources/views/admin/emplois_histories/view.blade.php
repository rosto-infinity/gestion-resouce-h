@extends('layouts.application')

@section('title', 'Détail de l\'historique d\'emploi')

@section('content')
<div class="content-wrapper">
    <!-- -En-tête de page -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3>Historique #{{ $emploiHistory->id }}</h3>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('admin.emplois_histories') }}" class="btn btn-secondary">
                        Retour à la liste
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- -Contenu principal -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Détails de l'historique</h3>
                </div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>ID</th>
                            <td>{{ $emploiHistory->id }}</td>
                        </tr>
                        <tr>
                            <th>Utilisateur</th>
                            <td>
                                {{ optional($emploiHistory->user)->name ?? '—' }}
                            </td>
                        </tr>
                        <tr>
                            <th>Emploi</th>
                            <td>
                                {{ optional($emploiHistory->emploi)->emploi_title ?? '—' }}
                            </td>
                        </tr>
                        <tr>
                            <th>Date de début</th>
                            <td>
                                {{ $emploiHistory->start_date 
                                    ? \Carbon\Carbon::parse($emploiHistory->start_date)
                                        ->translatedFormat('l d/m/Y') 
                                    : '—' 
                                }}
                            </td>
                        </tr>
                        <tr>
                            <th>Date de fin</th>
                            <td>
                                {{ $emploiHistory->end_date 
                                    ? \Carbon\Carbon::parse($emploiHistory->end_date)
                                        ->translatedFormat('l d/m/Y') 
                                    : '—' 
                                }}
                            </td>
                        </tr>
                        <tr>
                            <th>Créé le</th>
                            <td>
                                {{ $emploiHistory->created_at
                                    ->translatedFormat('l d/m/Y \à H\hi') 
                                }}
                            </td>
                        </tr>
                        <tr>
                            <th>Mis à jour le</th>
                            <td>
                                {{ $emploiHistory->updated_at
                                    ->translatedFormat('l d/m/Y \à H\hi') 
                                }}
                            </td>
                        </tr>
                    </table>
                </div>

                <div class="card-footer">
                    <a href="{{ route('admin.emplois_histories') }}" class="btn btn-primary">
                        Retour à la liste
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
