@extends('layouts.application')

@section('title', 'Ajouter un historique d\'emploi')

@section('content')
<div class="content-wrapper">
    <!-- 4-En-tête de la page -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <!-- 5-Titre -->
                <div class="col-sm-6">
                    <h3>Ajouter un historique d'emploi</h3>
                </div>
                <!-- 6--Bouton retour -->
                <div class="col-sm-6 text-right">
                    <a href="{{ route('admin.emplois_histories') }}" class="btn btn-secondary">
                        Retour à la liste
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Formulaire -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Détails de l'historique</h3>
                        </div>
                        <form method="POST" action="{{ route('admin.emplois_histories.store') }}">
                            @csrf  {{-- Protection CSRF — Laravel fournit ce token automatiquement :contentReference[oaicite:5]{index=5} --}}
                            
                            {{-- Affichage des erreurs globales --}}
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
                                    {{-- Utilisateur --}}
                                    <div class="form-group col-md-6">
                                        <label for="user_id">Utilisateur <span class="text-red-600">*</span></label>
                                        <select name="user_id" id="user_id" class="form-control @error('user_id') is-invalid @enderror">
                                            <option value="">-- Sélectionnez un utilisateur --</option>
                                             
                                            {{-- $users   = User::all(); --}}

                                            {{-- @foreach($users as $user)
                                                <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                                    {{ $user->email }}
                                                </option>
                                            @endforeach --}}
                                            @foreach($users as $id => $name)
                                                <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>
                                                    {{ $name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        
                                        @error('user_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Emploi --}}
                                    <div class="form-group col-md-6">
                                        <label for="emploi_id">Emploi <span class="text-red-600">*</span></label>
                                        <select id="emploi_id" name="emploi_id"
                                                class="form-control @error('emploi_id') is-invalid @enderror">
                                            <option value="">-- Sélectionnez un emploi --</option>
                                            @foreach($emplois as $id =>$emploi_title)
                                                <option value="{{ $id }}"
                                                    {{ old('emploi_id') == $id ? 'selected' : '' }}>
                                                    {{ $emploi_title }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('emploi_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Date de début --}}
                                    <div class="form-group col-md-6">
                                        <label for="start_date">Date de début</label>
                                        <input type="date" id="start_date" name="start_date"
                                               value="{{ old('start_date') }}"
                                               class="form-control @error('start_date') is-invalid @enderror">
                                        @error('start_date')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Date de fin --}}
                                    <div class="form-group col-md-6">
                                        <label for="end_date">Date de fin</label>
                                        <input type="date" id="end_date" name="end_date"
                                               value="{{ old('end_date') }}"
                                               class="form-control @error('end_date') is-invalid @enderror">
                                        @error('end_date')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            {{-- Footer du formulaire --}}
                            <div class="card-footer">
                                <a href="{{ route('admin.emplois_histories') }}" class="btn btn-secondary">
                                    Annuler
                                </a>
                                <button type="submit" class="btn btn-primary float-right">
                                    Enregistrer
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
