@extends('layouts.application')

@section('title', 'Détails du grade emploi')
@section('content')

<div class="content-wrapper">
    <!-- En-tête de page -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Détails du grade</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('emploi_grade.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Retour à la liste
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Contenu principal -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Informations sur le grade</h3>
                            <div class="card-tools">
                                <a href="{{ route('emploi_grade.edit', $grade->id) }}" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i> Modifier
                                </a>
                            </div>
                        </div>

                        <!-- Corps de la carte -->
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <tbody>
                                    <tr>
                                        <th>Niveau de grade</th>
                                        <td>{{ $grade->grade_level }}</td>
                                    </tr>
                                    <tr>
                                        <th>Salaire minimum</th>
                                        <td>{{ number_format($grade->lowest_salary, 2, ',', ' ') }} €</td>
                                    </tr>
                                    <tr>
                                        <th>Salaire maximum</th>
                                        <td>{{ number_format($grade->highest_salary, 2, ',', ' ') }} €</td>
                                    </tr>
                                    <tr>
                                        <th>Date de création</th>
                                        <td>{{ $grade->created_at->translatedFormat('l d/m/Y \à H\h:i') }}</td>
                                    </tr>
                                    <tr>
                                        <th>Dernière modification</th>
                                        <td>{{ $grade->updated_at->translatedFormat('l d/m/Y \à H\h:i') }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Pied de carte -->
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-md-6">
                                    <form action="{{ route('emploi_grade.destroy', $grade->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce grade ?')">
                                            <i class="fas fa-trash"></i> Supprimer
                                        </button>
                                    </form>
                                </div>
                                <div class="col-md-6 text-right">
                                    <a href="{{ route('emploi_grade.index') }}" class="btn btn-primary">
                                        <i class="fas fa-list"></i> Liste des grades
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
