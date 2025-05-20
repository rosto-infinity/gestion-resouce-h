<table>
  <thead>
      <tr>  
        <!-- En-tête du tableau avec les titres des colonnes -->
        <th width='20' align='center'>Utilisateur</th>
        <th width='20' align='center'>Emploi</th>
        <th width='20' align='center'>Date début</th>
        <th width='20' align='center'>Date fin</th>
        <th width='20' align='center'>Créé le</th> 
      </tr>
  </thead>
  <tbody>
    <!-- --Boucle à travers l'historique des emplois -->
    @foreach($emploisHistories as $emploiHistory)
      <tr>          
          <!-- --Affiche le nom de l'utilisateur ou un tiret si l'utilisateur n'existe pas -->
          <td width='20' align='center'>{{ $emploiHistory->user ? $emploiHistory->user->name : '—' }}</td>
          <!-- --Affiche le titre de l'emploi ou un tiret si l'emploi n'existe pas -->
          <td width='20' align='center'>{{ $emploiHistory->emploi ? $emploiHistory->emploi->emploi_title : '—' }}</td>
          <!-- --Affiche la date de début de l'emploi -->
          <td width='20' align='center'>{{ $emploiHistory->start_date }}</td>
          <!-- --Affiche la date de fin de l'emploi -->
          <td width='20' align='center'>{{ $emploiHistory->end_date }}</td>
          <!-- --Affiche la date de création de l'historique de l'emploi -->
          <td width='20' align='center'>{{ $emploiHistory->created_at }}</td> 
      </tr>
    @endforeach
  </tbody>
</table>
