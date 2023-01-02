

<h1>
    Nilai siswa 
</h1>

{{-- 
<table style="display:inline-table;">
    <thead>
    <tr>
        <th><b>Nama</b></th>
        
    </tr>
    </thead>
    <tbody>
        
        @foreach ($kelas->user_kelas as $s)        
        <tr>
            <td>{{ $s->user->name }}</td>
        </tr>
            @endforeach

    </tbody>
</table> --}}



<table style="display:inline-table;">
    <thead>
        <tr>
            
            <th><b>Nama</b></th>
            @foreach ($nama_nilai as $s)
            <th><b>{{ $s->nama }}</b></th>
            @endforeach
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
        </tr>
        @endforeach

    </tbody>
</table>
