@extends('layouts.application')
@section('title', 'Modifier un pays')
@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Modifier le pays: {{ $country->country_name }}</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('countries.index') }}" class="btn btn-secondary">
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
                            <h3 class="card-title">Détails du pays</h3>
                        </div>

                        <form method="POST" action="{{ route('countries.update', $country->id) }}">
                            @csrf
                            @method('PUT')

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
                                    <!-- Nom du pays -->
                                    <div class="form-group col-md-6">
                                        <label for="country_name">
                                            Nom du pays <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" 
                                               class="form-control @error('country_name') is-invalid @enderror" 
                                               id="country_name" 
                                               name="country_name" 
                                               value="{{ old('country_name', $country->country_name) }}"
                                               required>
                                        @error('country_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Sélection de la région -->
                                    <div class="form-group col-md-6">
                                        <label for="region_id">Région associée</label>
                                        <select class="form-control @error('region_id') is-invalid @enderror" 
                                                id="region_id" 
                                                name="region_id">
                                            <option value="">-- Sélectionnez une région --</option>
                                            @foreach($regions as $region)
                                                <option value="{{ $region->id }}" {{ (old('region_id', $country->region_id) == $region->id) ? 'selected' : '' }}>
                                                    {{ $region->region_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('region_id')
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
