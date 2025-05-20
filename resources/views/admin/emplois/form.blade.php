@extends('layouts.application')
@section('title')
@section('content')

 <!-- 2Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="container-fluid">
          <div class="row mb-2">
              <div class="col-sm-6">
                  <h3>Ajouter une nouvelle emplois</h3>
              </div>
              <div class="text-right col-sm-6">
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
                          <h3 class="card-title">Informations sur l'emplois</h3>
                      </div>
                      <!-- /.card-header -->
                      <!-- form start -->
                      <form method="POST" action="">
                          @csrf <!-- Protection CSRF -->

                          <!--2-Affichage des erreurs globales -->
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

                                  {{-- 32 First Name --}}
                                  <div class="form-group col-md-6">
                                      <label for="emploi_title">Job<span class="text-red-600">*</span> </label>
                                      <input type="text" class="form-control @error('emploi_title') is-invalid @enderror"
                                          value="{{ old('emploi_title')}}" id="emploi_title" name="emploi_title"
                                          placeholder="emploi_title">

                                      <!-- Affichage de l'erreur pour name -->
                                      @error('emploi_title')
                                          <div class="text-red-600">{{ $message }}</div>
                                      @enderror
                                  </div>

                                  {{-- 4-Last Name --}}
                                  <div class="form-group col-md-6">
                                      <label for="min_salary">Min Salary <span class="text-red-600">*</span> </label>
                                      <input type="number" class="form-control @error('min_salary') is-invalid @enderror"
                                          value="{{ old('min_salary')}}" id="min_salary" name="min_salary"
                                          placeholder="Entrez min_salary">

                                      <!-- Affichage de l'erreur pour min_salary -->
                                      @error('min_salary')
                                          <div class="invalid-feedback">{{ $message }}</div>
                                      @enderror
                                  </div>

                                  {{-- 2--Email--}}
                                  <div class="form-group col-md-6">
                                      <label for="max_salary">Max Salary <span class="text-red-600">*</span> </label>
                                      <input type="number" class="form-control @error('max_salary') is-invalid @enderror"
                                          value="{{ old('max_salary')}}" id="max_salary" name="max_salary"
                                          placeholder="Entrez max_salary">

                                      <!-- Affichage de l'erreur pour max_salary -->
                                      @error('max_salary')
                                          <div class="invalid-feedback">{{ $message }}</div>
                                      @enderror
                                  </div>

                              
                              </div>
                          </div>

                          <div class="card-footer">
                              <a href="{{ route('admin.emplois') }}" class="btn btn-secondary">Annuler</a>
                              <button type="submit" class="btn btn-primary float-right">Ajouter</button>
                          </div>
                      </form>
                  </div>
                  <!-- /.card -->
              </div>
          </div>
      </div>
  </section>
</div>
<!-- /.content-wrapper -->
@endsection