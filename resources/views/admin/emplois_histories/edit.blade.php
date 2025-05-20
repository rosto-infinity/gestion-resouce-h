@extends('layouts.application')

@section('title', 'Modifier un historique d\'emploi')

@section('content')
<div class="content-wrapper">
    <!--  -Header -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3>Modifier un historique d'emploi</h3>
                </div>
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

                        <form method="POST" 
                              action="{{ route('admin.emplois_histories.update', $emploiHistory->id) }}">
                            @csrf
                            @method('PATCH') {{-- -Spoof HTTP PATCH pour update :contentReference[oaicite:3]{index=3} --}}

                            @if ($errors->any())
                                <div class="alert alert-danger mx-3 mt-3">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="card-body">
                                <div class="row">
                                    {{-- - Utilisateur --}}
                                    <div class="form-group col-md-6">
                                        <label for="user_id">Utilisateur <span class="text-red-600">*</span></label>
                                        <select name="user_id" id="user_id"
                                                class="form-control @error('user_id') is-invalid @enderror">
                                            <option value="">-- Sélectionnez un utilisateur --</option>
                                            @foreach($users as $id => $name)
                                                <option value="{{ $id }}"
                                                    @selected(old('user_id', $emploiHistory->user_id) == $id)>
                                                    {{ $name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('user_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- - Emploi --}}
                                    <div class="form-group col-md-6">
                                        <label for="emploi_id">Emploi <span class="text-red-600">*</span></label>
                                        <select name="emploi_id" id="emploi_id"
                                                class="form-control @error('emploi_id') is-invalid @enderror">
                                            <option value="">-- Sélectionnez un emploi --</option>
                                            @foreach($emplois as $id => $titre)
                                                <option value="{{ $id }}"
                                                    @selected(old('emploi_id', $emploiHistory->emploi_id) == $id)>
                                                    {{ $titre }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('emploi_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- - Date de début --}}
                                    <div class="form-group col-md-6">
                                        <label for="start_date">Date de début</label>
                                        <input type="date" name="start_date" id="start_date"
                                               value="{{ old('start_date', $emploiHistory->start_date) }}"
                                               class="form-control @error('start_date') is-invalid @enderror">
                                        @error('start_date')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- --Date de fin --}}
                                    <div class="form-group col-md-6">
                                        <label for="end_date">Date de fin</label>
                                        <input type="date" name="end_date" id="end_date"
                                               value="{{ old('end_date', $emploiHistory->end_date) }}"
                                               class="form-control @error('end_date') is-invalid @enderror">
                                        @error('end_date')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <a href="{{ route('admin.emplois_histories') }}" class="btn btn-secondary">
                                    Annuler
                                </a>
                                <button type="submit" class="btn btn-primary float-right">
                                    Modifier
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
