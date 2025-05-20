@extends('layouts.application')

@section('content')

<!-- 01-Wrapper de contenu principal -->
<div class="content-wrapper">
    <!-- 2-En-tête de contenu (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <!-- 3-Titre de l'emploi affiché -->
                    <h3>Emploi : {{ $emploi->emploi_title }}</h3>
                </div>
                <div class="text-right col-sm-6">
                    <!-- 4-Bouton pour revenir à la liste des emplois -->
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
                            <!-- 5-Titre de la carte d'informations -->
                            <h3 class="card-title">Informations sur l'emploi</h3>
                        </div>
                        <!-- 6-Fin de l'en-tête de carte -->
                        <h1>Détails de l'emploi</h1>

                        <!-- 7-Tableau affichant les détails de l'emploi -->
                        <table class="table table-bordered">
                            <tr>
                                <th>Titre du poste</th>
                                <td>{{ $emploi->emploi_title }}</td>
                            </tr>
                            <tr>
                                <th>Salaire Minimum</th>
                                <td>{{ $emploi->min_salary }} FCFA</td>
                            </tr>
                            <tr>
                                <th>Salaire Maximum</th>
                                <td>{{ $emploi->max_salary }} FCFA</td>
                            </tr>
                            <tr>
                                <th>Date de création</th>
                                <td>{{ $emploi->created_at->translatedFormat('l d/m/Y \à H\h:i') }}</td>
                            </tr>
                            <tr>
                                <th>Date de mise à jour</th>
                                <td>{{ $emploi->updated_at->translatedFormat('l d/m/Y \à H\h:i') }}</td>
                            </tr>
                        </table>

                        <!--8-Bouton pour retourner à la liste des emplois -->
                        <a href="{{ route('admin.emplois') }}" class="btn btn-primary">Retour à la liste des emplois</a>
                    </div>
                    <!-- Fin de la carte -->
                </div>
            </div>
        </div>
    </section>
</div>
<!-- Fin du wrapper de contenu principal -->

@endsection
