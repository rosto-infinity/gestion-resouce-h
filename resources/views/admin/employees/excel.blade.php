<table>
  <thead>
    <tr>
      <th class="bg-green-400 ">First Name</th>
      <th width='20' align='center'>Last Name</th>
      <th width='20' align='center'>Email</th>
      <th width='20' align='center'>Role</th>
      <th width='20' align='center'>Poste</th>
      <th width='20' align='center'>Date de création</th>
      
  </tr>
  </thead>
  <tbody>
    <!-- --Boucle à travers l'historique des emplois -->
    @foreach ($employees as $employee)
                                            <tr> 
                                                <td width='20' align='center'>{{ $employee->name }}</td>
                                                <td width='20' align='center'>{{ $employee->last_name }}</td>
                                                <td width='35' align='center'>{{ $employee->email }}</td>
                                                <td width='20' align='center'>{{ (!empty($employee->usertype === 'admin') ? 'Employees' : "HR") }}</td>
                                                <td width='35' align='center'>{{ $employee->emploi ? $employee->emploi->emploi_title : 'N/A' }}</td> <!-- Vérification si emploi existe -->
                                                <td width='20' align='center'>{{ $employee->created_at }}</td>
                                            </tr>
                                         @endforeach
  </tbody>
</table>
