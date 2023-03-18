@extends('layouts.admin')

@section('main')

    <main class="h-full pb-16 overflow-y-auto">
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">Pengaduan</h2>
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">Id Pengaduan</th>
                            <th class="px-4 py-3">Tanggal</th>
                            <th class="px-4 py-3">Tanggapan</th>
                            <th class="px-4 py-3">Id Petugas</th>
        

                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @foreach ($tanggapan as $item)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3 text-sm">
                                {{ $item->id_pengaduan }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $item->tgl_tanggapan }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                               {!! $item->tanggapan !!}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                
                            {{ $item->id_petugas }}
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