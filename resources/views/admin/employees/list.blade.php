@extends('layouts.application')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h3>Listes des Employees(Total :
                            <span class="bg-green-600 rounded-full text-white">
                                {{ $employees->total() }}
                            </span>)
                        </h3>
                    </div>
                    <div class="text-right col-sm-6">
                        <a href="{{ route('admin.employees.excel') }}" class='btn btn-success'>
                            <i class="fas fa-file-excel"></i> Export Exel
                        </a>
                        <a href="{{ route('admin.employees.add') }}" class="btn btn-primary">Ajouter une nouvelle Employees</a>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        @include('_message')
        <!-- /.container-fluid -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mr-2 card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Rechercher une Employees</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form method="get" action="{{ route('admin.employees') }}">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="form-group col-md-3">
                                                <label for="last_name">Last name</label>
                                
                                                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Entrez votre last_name" value="{{ Request::get('last_name') }}">
                                            </div>
                                
                                            <div class="form-group col-md-3">
                                                <label for="name">Nom</label>
                                                <input type="text" class="form-control" id="name" name="name" placeholder="Entrez votre nom" value="{{ Request::get('name') }}">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="emploi_id">Job Title <span class="text-red-600">*</span></label>
                                                <select class="form-control @error('emploi_id') is-invalid @enderror" name="emploi_id"
                                                    id="emploi_id">
                                                      <option value="">Sélectionnez un poste</option>
                                                      @foreach ($commonData['emplois'] as $emploi)
                                                      <option value="{{ $emploi->id }}" @selected(old('emploi_id') == $emploi->id)>
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
          
                                            <div class="form-group col-md-3">
                                                <label for="email">Email</label>
                                                <input type="text" class="form-control" id="email" name="email" placeholder="rosto@gmail.com" value="{{ Request::get('email') }}">
                                            </div>
                                
                                            <div class="form-group col-md-3">
                                                <label for="date">Date de création</label>
                                                <input type="date" class="form-control" id="date" name="date" value="{{ Request::get('date') }}">
                                            </div>
                                
                                            <div class="form-group col-md-3">
                                                <button type="submit" class="mt-8 mr-2 btn btn-primary">
                                                    <i class="nav-icon fas fa-search"></i> Recherche
                                                </button>
                                                <a href="{{ route('admin.employees') }}" class='mt-8 btn btn-success'>
                                                    <i class="fas fa-refresh" aria-hidden="true"></i> Réinitialiser
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                

                            </div>
                        </div>
                    </div>

                    
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Listes des Employees</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th class="bg-green-400 ">First Name</th>
                                            <th>Last Name</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Poste</th>
                                            <th>Date de création</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody> 
                                        @if ($employees->isEmpty()) 
                                        <tr>
                                            <td  colspan="6" class="text-center"> 
                                                 Aucun employé ne correspond à votre recherche... 
                                         </td>
                                        </tr>
                                    @else
                                        @foreach ($employees as $employee)
                                            <tr> 
                                                <td>{{ $employee->name }}</td>
                                                <td>{{ $employee->last_name }}</td>
                                                <td>{{ $employee->email }}</td>
                                                <td>{{ (!empty($employee->usertype === 'admin') ? 'Employees' : "HR") }}</td>
                                                <td>{{ $employee->emploi ? $employee->emploi->emploi_title : 'N/A' }}</td> <!-- Vérification si emploi existe -->
                                                <td>{{ $employee->created_at->translatedFormat('l d/m/Y \à H\h:i') }}</td>
                                                <td class="e">
                                                    <a href="{{ route('admin.employees.view', $employee->id) }}" class="btn btn-info btn-sm">
                                                        <i class="nav-icon fas fa-eye mr-1"></i> 
                                                    </a>
                                                    <a href="{{ route('admin.employees.edit', $employee->id) }}" class="btn btn-warning btn-sm">
                                                        <i class="nav-icon fas fa-pencil-alt mr-1"></i> 
                                                    </a>
                                                    
                                                    <!-- 5-Formulaire pour la suppression -->
                                                    <form action="{{ route('admin.employees.destroy', $employee->id) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet employé ?');">
                                                            <i class="nav-icon fas fa-trash-alt mr-1"></i> 
                                                        </button>
                                                    </form>
                                                 </td>
                                            </tr>
                                         @endforeach
                                           
                                     @endif
                                    </tbody>
                                </table>
                                <div class="pr-5 py-5 flex float-right">
                                    {{ $employees->links() }}
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>

        <!-- /.row -->
    </div><!-- /.container-fluid -->
    </div>
    </div>
@endsection