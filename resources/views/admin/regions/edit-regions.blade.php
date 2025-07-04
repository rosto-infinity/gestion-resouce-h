@extends('layouts.application')
@section('title', 'Modifier une région')
@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Modifier la région : {{ $region->region_name }}</h1>
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
                            <h3 class="card-title">Modifier les détails</h3>
                        </div>

                        <form method="POST" action="{{ route('regions.update', $region->id) }}">
                            @csrf @method('PUT')

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
                                    <div class="form-group col-md-6">
                                        <label for="region_name">
                                            Nom de la région <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" 
                                               class="form-control @error('region_name') is-invalid @enderror" 
                                               id="region_name" 
                                               name="region_name" 
                                               value="{{ old('region_name', $region->region_name) }}"
                                               required>
                                        @error('region_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <a href="{{ route('regions.show', $region->id) }}" class="btn btn-info">
                                    <i class="fas fa-eye"></i> Voir les détails
                                </a>
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
