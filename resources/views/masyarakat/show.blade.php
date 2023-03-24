@extends('layouts.masyarakat')

@php
    use App\Models\Tanggapan;
@endphp

@section('main')
    <main class="h-full pb-16 overflow-y-auto">
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">Daftar Pengaduan</h2>
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">Judul</th>
                            <th class="px-4 py-3">Kategori</th>
                            <th class="px-4 py-3">Tanggal</th>
                            <th class="px-4 py-3">Isi Laporan</th>
                            <th class="px-4 py-3">Foto</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3">Tanggapan</th>

                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @foreach ($pengaduan as $item)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3 text-sm">
                                {{ $item->judul }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $item->kategori }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                               {{ $item->tgl_pengaduan }}
                            </td>
                            <td class="px-4 py-3 text-sm">

                                    {!! $item->isi_laporan  !!}


                            </td>
                            <td class="px-4 py-3 text-sm">
                                <img src="{{ asset('storage/' . $item->foto) }}" alt="" class="w-20">
                            </td>
                            <td class="px-4 py-3 text-xs">
                                @switch($item->status)
                                    @case("0")
                                    <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700">Belum di-verifikasi  </span>
                                    @break
                                    @case("proses")
                                        <span class="px-2 py-1 font-semibold leading-tight text-yellow-700 bg-yellow-100 rounded-full dark:text-yellow-100 dark:bg-yellow-700">Sudah di-verifikasi  </span>
                                        @break
                                    @case("selesai")
                                        <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">Sudah ditanggapi</span>
                                        @break
                                    @default
                                @endswitch
                            </td>
                            <td>
                            @php
                                $tanggapan = Tanggapan::where('id_pengaduan', $item->id_pengaduan)->get();
                                // dd($tanggapan->tanggapan);
                            @endphp
                            @foreach ($tanggapan as $t)
                                {!! $t->tanggapan !!}
                            @endforeach
                            </td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
@endsection
