@extends('layouts.application')
@section('title', 'Modifier un grade emploi')
@section('content')

<div class="content-wrapper">
    <!-- En-tête de page -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Modifier le grade emploi</h1>
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
                            <h3 class="card-title">Détails du grade</h3>
                        </div>

                        <!-- Formulaire -->
                        <form method="POST" action="{{ route('emploi_grade.update', $grade->id) }}">
                            @csrf
                            @method('PUT')

                            <!-- Affichage des erreurs -->
                            @if($errors->any())
                            <div class="alert alert-danger mx-3 mt-3">
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

                            <div class="card-body">
                                <div class="row">
                                    <!-- Niveau de grade -->
                                    <div class="form-group col-md-6">
                                        <label for="grade_level">
                                            Niveau de grade <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" 
                                               class="form-control @error('grade_level') is-invalid @enderror" 
                                               id="grade_level" 
                                               name="grade_level" 
                                               value="{{ old('grade_level', $grade->grade_level) }}"
                                               placeholder="Ex: Cadre A, Agent B..."
                                               required>
                                        @error('grade_level')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Salaire minimum -->
                                    <div class="form-group col-md-6">
                                        <label for="lowest_salary">
                                            Salaire minimum (€) <span class="text-danger">*</span>
                                        </label>
                                        <input type="number" 
                                               step="0.01"
                                               class="form-control @error('lowest_salary') is-invalid @enderror" 
                                               id="lowest_salary" 
                                               name="lowest_salary" 
                                               value="{{ old('lowest_salary', $grade->lowest_salary) }}"
                                               placeholder="Ex: 2500.50"
                                               required>
                                        @error('lowest_salary')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Salaire maximum -->
                                    <div class="form-group col-md-6">
                                        <label for="highest_salary">
                                            Salaire maximum (€) <span class="text-danger">*</span>
                                        </label>
                                        <input type="number" 
                                               step="0.01"
                                               class="form-control @error('highest_salary') is-invalid @enderror" 
                                               id="highest_salary" 
                                               name="highest_salary" 
                                               value="{{ old('highest_salary', $grade->highest_salary) }}"
                                               placeholder="Ex: 4500.75"
                                               required>
                                        @error('highest_salary')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="reset" class="btn btn-secondary">
                                    <i class="fas fa-undo"></i> Réinitialiser
                                </button>
                                <button type="submit" class="btn btn-primary float-right">
                                    <i class="fas fa-save"></i> Mettre à jour
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
