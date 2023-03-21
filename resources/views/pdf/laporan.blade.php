<!DOCTYPE html>
<html>
<head>
    <title>Laporan Pengaduan</title>
     @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

    @php
        use App\Models\Tanggapan;
    @endphp

    <h1 class='text-center'>Laporan-KBR {{ date('d F y') }}</h1>

    <table class="table table-bordered">
        <tr>
            <th>Judul Pengaduan</th>
            <th>Kategori Pengaduan</th>
            <th>Tanggal Pengaduan</th>
            <th>NIK Pelapor</th>
            <th>Isi Laporan</th>
            <th>Status</th>
            <th>Tanggapan</th>
        </tr>
        @foreach($pengaduan as $p)
        <tr>
            <td class="flex flex-wrap">{{ $p->judul }}</td>
            <td class="flex flex-wrap">{{ $p->kategori }}</td>
            <td class="flex flex-wrap">{{ $p->tgl_pengaduan }}</td>
            <td class="flex flex-wrap">{{ $p->nik }}</td>
            <td class="flex flex-wrap">{!! $p->isi_laporan !!}</td>
            <td class="flex flex-wrap">{{ $p->status }}</td>
            <td class="flex flex-wrap">
                @php
                    $tanggapan = Tanggapan::where('id_pengaduan', $p->id_pengaduan)->get();
                @endphp
                @foreach ($tanggapan as $t)
                    {!! $t->tanggapan !!}
                @endforeach
            </td>
            
        </tr>
        @endforeach
    </table>
  
</body>
</html>