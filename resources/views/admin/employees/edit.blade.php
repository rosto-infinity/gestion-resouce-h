@extends('layouts.application')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h3>Modifier l'employé</h3>
                    </div>
                    <div class="text-right col-sm-6">
                        <a href="{{ route('admin.employees') }}" class="btn btn-secondary">Retour à la liste</a>
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
                                <h3 class="card-title">Informations sur l'employé</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form method="POST" action="{{ route('admin.employees.update', $employee->id) }}">
                                @csrf <!-- Protection CSRF -->
                                
                                @method('patch')
                                <!-- Affichage des erreurs globales -->
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

                                        {{-- First Name --}}
                                        <div class="form-group col-md-6">
                                            <label for="first_name">First Name<span class="text-red-600">*</span> </label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                value="{{ old('name', $employee->name) }}" id="first_name" name="name"
                                                placeholder="First Name">

                                            <!-- Affichage de l'erreur pour name -->
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- Last Name --}}
                                        <div class="form-group col-md-6">
                                            <label for="last_name">Last Name <span class="text-red-600">*</span> </label>
                                            <input type="text" class="form-control @error('last_name') is-invalid @enderror"
                                                value="{{ old('last_name', $employee->last_name) }}" id="last_name" name="last_name"
                                                placeholder="Entrez Last Name">

                                            <!-- Affichage de l'erreur pour last_name -->
                                            @error('last_name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- Email --}}
                                        <div class="form-group col-md-6">
                                            <label for="email">Email <span class="text-red-600">*</span> </label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                                value="{{ old('email', $employee->email) }}" id="email" name="email"
                                                placeholder="Entrez Email">

                                            <!-- Affichage de l'erreur pour email -->
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- Phone Number --}}
                                        <div class="form-group col-md-6">
                                            <label for="phone_number">Phone number <span class="text-red-600">*</span></label>
                                            <input type="text"
                                                class="form-control @error('phone_number') is-invalid @enderror"
                                                value="{{ old('phone_number', $employee->phone_number) }}" id="phone_number" name="phone_number"
                                                placeholder="Phone number">

                                            <!-- Affichage de l'erreur pour phone_number -->
                                            @error('phone_number')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- Hire Date --}}
                                        <div class="form-group col-md-6">
                                            <label for="hire_date">Hire Date <span class="text-red-600">*</span> </label>
                                            <input type="date" class="form-control @error('hire_date') is-invalid @enderror"
                                                value="{{ old('hire_date', $employee->hire_date) }}" id="hire_date" name="hire_date"
                                                placeholder="Entrez Hire Date">

                                            <!-- Affichage de l'erreur pour hire_date -->
                                            @error('hire_date')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- Job Title --}}
                                        <div class="form-group col-md-6">
                                            <label for="emploi_id">Job Title <span class="text-red-600">*</span></label>
                                            <select class="form-control @error('emploi_id') is-invalid @enderror" name="emploi_id"
                                                id="emploi_id">
                                                  <option value="">Sélectionnez un poste</option>
                                                  @foreach ($commonData['emplois'] as $emploi)
                                                  <option value="{{ $emploi->id }}" @selected(old('emploi_id', $emploi->emploi_title) == $emploi->id)>
                                                      {{-- <option value="{{ $emploi->id }}" {{ old('emploi_title ') == $emploi->emploi_title ? 'selected' : '' }}> --}}
                                                          {{ $emploi->emploi_title }}   
                                                      </option>
                                                  @endforeach
                                                  {{-- @foreach ($emplois as $emploi)
                                                  <option value="{{ $emploi->id }}" @selected(old('emploi_id') == $emploi->id)>
                                                      {{ $emploi->emploi_title }}   
                                                  </option>
                                                 @endforeach --}}
                                              </select>
      
                                            <!-- Affichage de l'erreur pour job_id -->
                                            @error('emploi_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- Salary --}}
                                        <div class="form-group col-md-6">
                                            <label for="salary">Salary <span class="text-red-600">*</span></label>
                                            <input type="text" class="form-control @error('salary') is-invalid @enderror"
                                                value="{{ old('salary', $employee->salary) }}" id="salary" name="salary"
                                                placeholder="Entrez Salary">

                                            <!-- Affichage de l'erreur pour salary -->
                                            @error('salary')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- Commission PCT --}}
                                        <div class="form-group col-md-6">
                                            <label for="commission_pct">Commission PCT <span
                                                    class="text-red-600">*</span></label>
                                            <input type="text"
                                                class="form-control @error('commission_pct') is-invalid @enderror"
                                                value="{{ old('commission_pct', $employee->commission_pct) }}" id="commission_pct"
                                                name="commission_pct" placeholder="Entrez Commission PCT">

                                            <!-- Affichage de l'erreur pour commission_pct -->
                                            @error('commission_pct')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- Manager Name --}}
                                        {{-- <div class="form-group col-md-6">
                                            <label for="manager_id">Manager Name <span class="text-red-600">*</span></label>
                                            <select class="form-control @error('manager_id') is-invalid @enderror"
                                                name="manager_id" id="manager_id">
                                                <option value="">Sélectionnez Manager Name</option>
                                                <option value="Manager 1" {{ old('manager_id', $employee->manager_id) == '1' ? 'selected' : '' }}>
                                                    Manager 1</option>
                                                <option value="Manager 2" {{ old('manager_id', $employee->manager_id) == 'Manager 2' ? 'selected' : '' }}>Manager 2</option>
                                                <option value="Manager 3" {{ old('manager_id', $employee->manager_id) == 'Manager 3' ? 'selected' : '' }}>Manager 3</option>
                                                <option value="Manager 4" {{ old('manager_id', $employee->manager_id) == 'Manager 4' ? 'selected' : '' }}>Manager 4</option>
                                            </select>

                                            <!-- Affichage de l'erreur pour manager_id -->
                                            @error('manager_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div> --}}

                                        {{-- Department Name --}}
                                        {{-- <div class="form-group col-md-6">
                                            <label for="departement_id">Department Name <span
                                                    class="text-red-600">*</span></label>
                                            <select class="form-control @error('departement_id') is-invalid @enderror"
                                                name="departement_id" id="departement_id">
                                                <option value="">Sélectionnez Department Name</option>
                                                <option value="Département 1" {{ old('departement_id', $employee->departement_id) == 'Département 1' ? 'selected' : '' }}>Département 1</option>
                                                <option value="Département 2" {{ old('departement_id', $employee->departement_id) == 'Département 2' ? 'selected' : '' }}>Département 2</option>
                                                <option value="Département 3" {{ old('departement_id', $employee->departement_id) == 'Département 3' ? 'selected' : '' }}>Département 3</option>
                                                <option value="Département 4" {{ old('departement_id', $employee->departement_id) == 'Département 4' ? 'selected' : '' }}>Département 4</option>
                                            </select>

                                            <!-- Affichage de l'erreur pour departement_id -->
                                            @error('departement_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div> --}}

                                    </div>
                                </div>

                                <div class="card-footer">
                                    <a href="{{ route('admin.employees') }}" class="btn btn-secondary">Annuler</a>
                                    <button type="submit" class="btn btn-primary float-right">Mettre à jour</button>
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
