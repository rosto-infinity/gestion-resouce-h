@extends('layouts.application')

@section('content')


    <!-- 4Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- 5-Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h3>Employee : {{ $employee->name }} {{ $employee->last_name }} </h3>
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
                                <h3 class="card-title">Informations sur l'Employees</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <h1>Détails de l'employé</h1>

                            <table class="table table-bordered">
                                <tr>
                                    <th>Nom</th>
                                    <td>{{ $employee->name }}</td>
                                </tr>
                                <tr>
                                    <th>Prénom</th>
                                    <td>{{ $employee->last_name }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $employee->email }}</td>
                                </tr>
                                <tr>
                                    <th>Téléphone</th>
                                    <td>{{ $employee->phone_number }}</td>
                                </tr>
                                <tr>
                                    <th>Date d'embauche</th>
                                    <td>{{ $employee->hire_date }}</td>
                                </tr>
                                <tr>
                                    <th>ID du poste</th>
                                    <td>{{ $employee->emploi_id }}</td>
                                </tr>
                                <tr>
                                    <th>Salaire</th>
                                    <td>{{ $employee->salary }}</td>
                                </tr>
                                <tr>
                                    <th>Pourcentage de commission</th>
                                    <td>{{ $employee->commission_pct }}</td>
                                </tr>
                                <tr>
                                    <th>ID du manager</th>
                                    <td>{{ $employee->manager_id }}</td>
                                </tr>
                                <tr>
                                    <th>ID du département</th>
                                    <td>{{ $employee->departement_id }}</td>
                                </tr>
                                <tr>
                                    <th>Date de creation</th>
                                    <td>{{ $employee->created_at->translatedFormat('l d/m/Y \à H\h:i') }}</td>
                                </tr>
                                <tr>
                                    <th>Date de mise à jours</th>
                                    <td>{{ $employee->updated_at->translatedFormat('l d/m/Y \à H\h:i') }}</td>
                                </tr>
                            </table>
                        
                            <a href="{{ route('admin.employees') }}" class="btn btn-primary">Retour à la liste des employés</a>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- /.content-wrapper -->


@endsection