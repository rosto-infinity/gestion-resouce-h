@extends('layouts.application')

@section('content')

<!-- Wrapper de contenu principal -->
<div class="content-wrapper">
    <!-- En-tête de contenu (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <!-- 9-Titre de la page pour modifier un emploi -->
                    <h3>Modifier une nouvelle emplois</h3>
                </div>
                <div class="text-right col-sm-6">
                    <!-- 10-Bouton pour revenir à la liste des emplois -->
                    <a href="{{ route('admin.emplois') }}" class="btn btn-secondary">Retour à la liste</a>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
  
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <!-- 11-Titre de la carte d'informations -->
                            <h3 class="card-title">Informations sur l'emplois</h3>
                        </div>
                        <!-- Fin de l'en-tête de carte -->
                        <!-- 12--Début du formulaire -->
                        <form method="POST" action="{{ route('admin.emplois.update', $emploi->id) }}"
                            enctype="multipart/form-data">  
                            @csrf <!-- Protection CSRF -->
                            @method('PATCH') <!-- Méthode PATCH pour la mise à jour -->
  
                            <!-- 13-Affichage des erreurs globales -->
                            @if ($errors->any())
                                <div class="mx-10 mt-3 alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
  
                            <div class="card-body">
                                <div class="row">
  
                                    {{-- 14-Champ pour le titre du poste --}}
                                    <div class="form-group col-md-6">
                                        <label for="emploi_title">Job<span class="text-red-600">*</span> </label>
                                        <input type="text" class="form-control @error('emploi_title') is-invalid @enderror"
                                            value="{{ old('emploi_title', $emploi->emploi_title)}}" id="emploi_title" name="emploi_title"
                                            placeholder="emploi_title">
  
                                        <!-- 14-Affichage de l'erreur pour emploi_title -->
                                        @error('emploi_title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
  
                                    {{-- 16-Champ pour le salaire minimum --}}
                                    <div class="form-group col-md-6">
                                        <label for="min_salary">Min Salary <span class="text-red-600">*</span> </label>
                                        <input type="number" class="form-control @error('min_salary') is-invalid @enderror"
                                            value="{{ old('min_salary', $emploi->min_salary)}}" id="min_salary" name="min_salary"
                                            placeholder="Entrez min_salary">
  
                                        <!-- 17-Affichage de l'erreur pour min_salary -->
                                        @error('min_salary')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
  
                                    {{-- 18-Champ pour le salaire maximum --}}
                                    <div class="form-group col-md-6">
                                        <label for="max_salary">Max Salary <span class="text-red-600">*</span> </label>
                                        <input type="number" class="form-control @error('max_salary') is-invalid @enderror"
                                            value="{{ old('max_salary',$emploi->max_salary)}}" id="max_salary" name="max_salary"
                                            placeholder="Entrez max_salary">
  
                                        <!-- 19-Affichage de l'erreur pour max_salary -->
                                        @error('max_salary')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
  
                                </div>
                            </div>
  
                            <div class="card-footer">
                                <!-- 20--Bouton pour annuler la modification -->
                                <a href="{{ route('admin.emplois') }}" class="btn btn-secondary">Annuler</a>
                                <!-- 21-Bouton pour soumettre le formulaire -->
                                <button type="submit" class="btn btn-primary float-right">Modifier</button>
                            </div>
                        </form>
                    </div>
                    <!-- Fin de la carte -->
                </div>
            </div>
        </div>
    </section>
</div>
<!-- 22-Fin du wrapper de contenu principal -->
@endsection
