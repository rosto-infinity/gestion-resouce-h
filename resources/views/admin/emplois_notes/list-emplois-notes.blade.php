@extends('layouts.application')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3>Liste des grades (Total : 
                        <span class="badge bg-success">
                            {{ $emploisGrades->total() }}
                        </span>)
                    </h3>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('emploi_grade.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Ajouter un grade
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
                        <h3 class="card-title">Rechercher un grade</h3>
                    </div>
                    <form method="GET" action="{{ route('emploi_grade.index') }}">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label>Niveau de grade</label>
                                    <input type="text" class="form-control" name="grade_level" 
                                        value="{{ request('grade_level') }}" placeholder="Rechercher...">
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Salaire minimum</label>
                                    <input type="number" class="form-control" name="min_salary" 
                                        value="{{ request('min_salary') }}" placeholder="Minimum">
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Salaire maximum</label>
                                    <input type="number" class="form-control" name="max_salary" 
                                        value="{{ request('max_salary') }}" placeholder="Maximum">
                                </div>
                                <div class="form-group col-md-3 align-self-end">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-search"></i> Rechercher
                                    </button>
                                    <a href="{{ route('emploi_grade.index') }}" class="btn btn-secondary">
                                        <i class="fas fa-sync-alt"></i> Réinitialiser
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Liste des grades</h3>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="bg-success">Niveau</th>
                                    <th>Salaire min</th>
                                    <th>Salaire max</th>
                                    <th>Créé le</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($emploisGrades as $grade)
                                <tr>
                                    <td>{{ $grade->grade_level }}</td>
                                    <td>{{ number_format($grade->lowest_salary, 2) }} €</td>
                                    <td>{{ number_format($grade->highest_salary, 2) }} €</td>
                                    <td>{{ $grade->created_at->translatedFormat('d/m/Y H:i') }}</td>
                                    <td>
                                        <a href="{{ route('emploi_grade.show', $grade->id) }}" 
                                           class="btn btn-info btn-sm" title="Voir">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('emploi_grade.edit', $grade->id) }}" 
                                           class="btn btn-warning btn-sm" title="Modifier">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('emploi_grade.destroy', $grade->id) }}" 
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
                                    <td colspan="5" class="text-center">Aucun grade trouvé</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer clearfix">
                        {{ $emploisGrades->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
