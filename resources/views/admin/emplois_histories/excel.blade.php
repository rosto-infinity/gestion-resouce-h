<table>
    <thead>
        <tr>
            <th>Utilisateur</th>
            <th>Emploi</th>
            <th>Date début</th>
            <th>Date fin</th>
            <th>Créé le</th>
        </tr>
    </thead>
    <tbody>
        @foreach($emploisHistories as $emploiHistory)
        <tr>
            <td>{{ $emploiHistory->user ? $emploiHistory->user->name : '—' }}</td>
            <td>{{ $emploiHistory->emploi ? $emploiHistory->emploi->emploi_title : '—' }}</td>
            <td>{{ $emploiHistory->start_date }}</td>
            <td>{{ $emploiHistory->end_date ? $emploiHistory->end_date : '—' }}</td>
            <td>{{ $emploiHistory->created_at->format('d/m/Y H:i') }}</td> <!-- Formatage de la date -->
        </tr>
        @endforeach
    </tbody>
</table>
