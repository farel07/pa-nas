<h1>
    Nilai siswa 
</h1>

<table>
    <thead>
    <tr>
        <th>Nama</th>
        <th>Nilai</th>
    </tr>
    </thead>
    <tbody>
    @foreach($nilai_siswa as $nn)
        <tr>
            <td>{{ $nn->user->name }}</td>
            <td>{{ $nn->nilai }}</td>
        </tr>
    @endforeach
    </tbody>
</table>