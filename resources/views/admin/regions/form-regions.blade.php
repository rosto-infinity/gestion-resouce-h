@extends('layouts.application')
@section('title', 'Ajouter une région')
@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Ajouter une nouvelle région</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('regions.index') }}" class="btn btn-secondary">
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
                            <h3 class="card-title">Détails de la région</h3>
                        </div>

                        <form method="POST" action="{{ route('regions.store') }}">
                            @csrf

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
                                    <!-- Nom de la région -->
                                    <div class="form-group col-md-6">
                                        <label for="region_name">
                                            Nom de la région <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" 
                                               class="form-control @error('region_name') is-invalid @enderror" 
                                               id="region_name" 
                                               name="region_name" 
                                               value="{{ old('region_name') }}"
                                               placeholder="Ex: Île-de-France, Bretagne..."
                                               required>
                                        @error('region_name')
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
                                    <i class="fas fa-save"></i> Enregistrer
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
