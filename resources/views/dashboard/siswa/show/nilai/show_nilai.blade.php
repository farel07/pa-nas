
@foreach ($guru_mapel($mapel->id, auth()->user()->kelas_user->id)->nama_nilai as $nn)
<tr>
    <td>{{ $nn->nama }}</td>

    @if($nilai_siswa(auth()->user()->id, $nn->id)->isEmpty())

    <td>0</td>

    @else

    <td>
    @foreach ($nilai_siswa(auth()->user()->id, $nn->id) as $ns)
    
    {{ $ns->nilai }} <br>

    @endforeach
    </td>

    @endif
</tr>
@endforeach