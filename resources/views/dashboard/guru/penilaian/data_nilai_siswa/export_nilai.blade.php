

<h1>
    Nilai siswa 
</h1>


<table style="display:inline-table;">
    <thead>
        <tr>
            
            <th><b>Nama</b></th>
            @foreach ($nama_nilai as $s)
            <th><b>{{ $s->nama }}</b></th>
            @endforeach
            <th>Rata-Rata Pengetahuan</th>
            <th>Rata-Rata Keterampilan</th>
            <th>Rata-Rata Keseluruhan</th>
        </tr>
    </thead>
    <tbody>
        
        @foreach ($kelas->user_kelas as $uk)
            <tr>
                <td>{{ $uk->user->name }}</td>
            

        @foreach ($nama_nilai as $s)

        @foreach ($nilai_siswa($uk->user->id, $s->id) as $ns)
            
        
            {{-- <td>{{ $nilai_siswa($uk->user->id, 1) }}</td> --}}
            <td>{{ $ns->nilai }}</td>
        

        @endforeach
            
        @endforeach
        
        @if ($avg_1($uk->user->id, $nama_nilai[0]->guru_mapel_id)->isEmpty())
            
        
        @else
        
        <td>{{ $avg_1($uk->user->id, $nama_nilai[0]->guru_mapel_id)[0]->avg_nilai }}</td>
        <td>{{ $avg_2($uk->user->id, $nama_nilai[0]->guru_mapel_id)[0]->avg_nilai }}</td>
        <td>{{ ($avg_1($uk->user->id, $nama_nilai[0]->guru_mapel_id)[0]->avg_nilai + $avg_2($uk->user->id, $nama_nilai[0]->guru_mapel_id)[0]->avg_nilai) / 2 }}</td>    
        @endif

        </tr>
        @endforeach

    </tbody>
</table>
