@extends('layouts.application')

@section('content')
<div class="content-wrapper">
    <!-- En‑tête -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3>
                        Historique des emplois 
                        <span class="bg-green-600 text-white rounded-full px-2">
                            {{ $emploisHistories->total()}}
                        </span>
                    </h3>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('admin.emplois_histories.excel') }}" class='btn btn-success'>
                        <i class="fas fa-file-excel"></i> Export Exel
                    </a>
                    <a href="{{ route('admin.emplois_histories.create') }}" class="btn btn-primary">
                        Ajouter un historique
                    </a>
                </div>
            </div>
        </div>
    </section>

    @include('_message')

    <!-- Tableau des historiques -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="mr-2 card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Rechercher une emplois</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="GET" action="{{ route('admin.emplois_histories') }}">
                        <div class="card-body">
                        <div class="row">
                          {{-- Filtrer par utilisateur --}}
                          <div class="form-group col-md-3">
                            <label for="user_id">Utilisateur</label>
                            <select name="user_id" id="user_id"
                                    class="form-control @error('user_id') is-invalid @enderror">
                              <option value="">-- Tous les utilisateurs --</option>
                              @foreach($users as $id => $name)
                                <option value="{{ $id }}" @selected(request('user_id') == $id)>
                                  {{ $name }}
                                </option>
                              @endforeach
                            </select>
                          </div>
                      
                          {{-- Filtrer par emploi --}}
                          <div class="form-group col-md-3">
                            <label for="emploi_id">Emploi</label>
                            <select name="emploi_id" id="emploi_id"
                                    class="form-control @error('emploi_id') is-invalid @enderror">
                              <option value="">-- Tous les emplois --</option>
                              @foreach($emplois as $id => $titre)
                                <option value="{{ $id }}" @selected(request('emploi_id') == $id)>
                                  {{ $titre }}
                                </option>
                              @endforeach
                            </select>
                          </div>
                      
                          {{-- Filtrer par date début --}}
                          <div class="form-group col-md-3">
                            <label for="start_date">Date début</label>
                            <input type="date" name="start_date" id="start_date"
                                   value="{{ request('start_date') }}"
                                   class="form-control @error('start_date') is-invalid @enderror">
                          </div>
                      
                          {{-- Filtrer par date fin --}}
                          <div class="form-group col-md-3">
                            <label for="end_date">Date fin</label>
                            <input type="date" name="end_date" id="end_date"
                                   value="{{ request('end_date') }}"
                                   class="form-control @error('end_date') is-invalid @enderror">
                          </div>
                      
                          {{-- Boutons --}}
                          <div class="form-group col-md-4 mt-4">
                            <button type="submit" class="btn btn-primary">
                              <i class="fas fa-search"></i> Rechercher
                            </button>
                            <a href="{{ route('admin.emplois_histories') }}" class="btn btn-secondary">
                              <i class="fas fa-sync-alt"></i> Réinitialiser
                            </a>
                          </div>
                        </div>
                        </div>
                      </form>
                      
                    

                </div>
            </div>
        </div>
        <div class="card mt-3">
            <div class="card-header">
                <h3 class="card-title">Liste des historiques</h3>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Utilisateur</th>
                            <th>Emploi</th>
                            <th>Date début</th>
                            <th>Date fin</th>
                            <th>Créé le</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($emploisHistories as $emploiHistory)
                            <tr>
                                <td>{{ $emploiHistory->id }}</td>
                                <td>{{ $emploiHistory->user ? $emploiHistory->user->name : '—' }}</td>
                                <td>{{ $emploiHistory->emploi ? $emploiHistory->emploi->emploi_title : '—' }}</td>
                                <td>{{ $emploiHistory->start_date}}</td>
                                <td>{{ $emploiHistory->end_date }}</td>
                                <td>{{ $emploiHistory->created_at }}</td>
                                <td>
                                    <a href="{{ route('admin.emplois_histories.show', $emploiHistory->id) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.emplois_histories.edit', $emploiHistory->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <form action="{{ route('admin.emplois_histories.destroy', $emploiHistory->id) }}"
                                          method="POST" class="d-inline"
                                          onsubmit="return confirm('Confirmer la suppression ?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-gray-500">
                                    Aucun historique d’emploi.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="py-3 px-4 float-right">
                    {{ $emploisHistories->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
