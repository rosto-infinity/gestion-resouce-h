@extends('layouts.application')

@section('content')

    <!-- --Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- ---Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h3>Listes des emplois(Total :
                            <span class="bg-green-600 rounded-full text-white">
                                {{ $emplois->total() }}
                            </span>)
                        </h3>
                    </div>
                    <div class="text-right col-sm-6">
                        <a href="{{ route('admin.emplois.excel') }}" class='btn btn-success'>
                            <i class="fas fa-file-excel" aria-hidden="true"></i> Export Exel
                        </a>
                        <a href="{{ route('admin.emplois.add') }}" class="btn btn-primary">Ajouter une nouvelle emplois</a>
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
                                    <h3 class="card-title">Rechercher une emplois</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- --form start -->
                                <form method="get" action="{{ route('admin.emplois') }}">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="form-group col-md-3">
                                                <label for="emploi_title">Job title
                                                </label>
                                                <input type="text" class="form-control" id="emploi_title" name="emploi_title" placeholder="Entrez votre emploi_title" value="{{ Request::get('emploi_title') }}">
                                            </div>
                                 {{-- Filtrer par emploi --}}
                          <div class="form-group col-md-3">
                            <label for="emploi_title">Emploi</label>
                            <select name="emploi_title" id="emploi_title"
                                    class="form-control">
                              <option value="">-- Tous les emplois --</option>
                              @foreach($emplois as $emploi)
                                <option value="{{ $emploi->emploi_title }}" @selected(request('emploi_title'))>
                                  {{ $emploi->emploi_title }}
                                </option>
                              @endforeach
                            </select>
                          </div>
                                            <div class="form-group col-md-3">
                                                <label for="min_salary'">Min Salary</label>
                                                <input type="number" class="form-control" id="min_salary" name="min_salary" placeholder="Entrez votre min_salary" value="{{ Request::get('min_salary') }}">
                                            </div>
                                
                                            <div class="form-group col-md-3">
                                                <label for="max_salary">Max salary</label>
                                                <input type="number" class="form-control" id="max_salary" name="max_salary" placeholder="max_salary" value="{{ Request::get('max_salary') }}">
                                            </div>
                                
                                            <div class="form-group col-md-3">
                                                <label for="date">Date de création</label>
                                                <input type="date" class="form-control" id="date" name="date" value="{{ Request::get('date') }}">
                                            </div>
                                
                                            <div class="form-group col-md-4">
                                                <button type="submit" class="mt-8 mr-2 btn btn-primary">
                                                    <i class="nav-icon fas fa-search"></i> Recherche
                                                </button>
                                                <a href="{{ route('admin.emplois') }}" class='mt-8 btn btn-success'>
                                                    <i class="fas fa-sync-alt"></i> Réinitialiser
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
                                <h3 class="card-title">Listes des emplois</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th class="bg-green-400 ">Job title</th>
                                            <th>Min Salary</th>
                                            <th>Max Salary</th>
                
                                            <th>Date de création</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody> 
                                        @if ($emplois->isEmpty()) 
                                        <tr>
                                            <td  colspan="6" class="text-center"> 
                                                 Aucun emplois... 
                                         </td>
                                        </tr>
                                        @else
                                        @foreach ($emplois as $emploi)
                                            <tr> 
                                                <td>{{ $emploi->emploi_title }}</td>
                                                <td>{{ $emploi->min_salary }}</td>
                                                <td>{{ $emploi->max_salary }}</td>
                                               
                                                <td>{{ $emploi->created_at->translatedFormat('l d/m/Y \à H\h:i') }}</td>
                                                <td>
                                                    <a href="{{ route('admin.emplois.view', $emploi->id) }}" class="btn btn-info btn-sm">
                                                        <i class="nav-icon fas fa-eye mr-1"></i>
                                                    </a>
                                                    <a href="{{ route('admin.emplois.edit', $emploi->id) }}" class="btn btn-warning btn-sm">
                                                        <i class="nav-icon fas fa-pencil-alt mr-1"></i>
                                                    </a>
                                                    
                                                    <!-- 5---Formulaire pour la suppression -->
                                                    <form action="{{ route('admin.emplois.destroy', $emploi->id) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet emplois ?');">
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
                                    {{ $emplois->links() }}
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