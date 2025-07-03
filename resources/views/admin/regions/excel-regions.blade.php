<table>
  <thead>
  <tr>
    <th width='20' align='center'>Job title</th>
    <th width='20' align='center'>Min Salary</th>
    <th width='20' align='center'>Max Salary</th>

    <th>Date de création</th>
  </tr>
  </thead>
  <tbody>

    @foreach ($emplois as $emploi)
    <tr> 
        <td width='40'>{{ $emploi->emploi_title }}</td>
        <td width='20' align='center'>{{ $emploi->min_salary }}</td>
        <td width='20' align='center'>{{ $emploi->max_salary }}</td>
        <td width='20' align='center'>{{ $emploi->created_at}}</td>
    </tr>
    @endforeach

  </tbody>
</table>