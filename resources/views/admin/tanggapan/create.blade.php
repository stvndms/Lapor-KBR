@extends('layouts.admin')

@section('main')

    <div class="w-full mx-auto">

            <div class="flex flex-col justify-center md:justify-start my-auto pt-8 md:pt-0 px-8 md:px-24 lg:px-32">
                <p class="text-center text-3xl">Tanggapan.</p>
                <form class="flex flex-col pt-3 md:pt-8" action="{{ route ('beriTanggapan',$pengaduan->id_pengaduan) }}" method="post">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id_pengaduan" value="{{ $pengaduan->id_pengaduan }}">
                    <input type="hidden" name="id_petugas" value="{{ Auth::guard('petugas')->user()->id_petugas }}">
                    <div class="flex flex-col pt-4">
                        <label for="date" class="text-lg">Tanggal Tanggapan</label>
                        <input type="date" id="tgl_tanggapan" name="tgl_tanggapan" class="w-full appearance-none border border-gray-300 px-3 py-2 text-dark-100 placeholder-gray-500 focus:z-10 focus:border-purple-400 focus:outline-none focus:ring-purple-400 sm:text-sm">
                    </div>

                    <div class="flex flex-col pt-4">
                         <label for="about" class="block text-sm font-medium text-gray-700">Beri Tanggapan</label>
            <trix-editor class="w-full appearance-none border border-gray-300 px-3 py-2 text-dark-100 placeholder-gray-500 focus:z-10 focus:border-purple-400 focus:outline-none focus:ring-purple-400 sm:text-sm" input="x"></trix-editor>
            <input class="" id="x" type="hidden" name="tanggapan">
                    </div>

                    <button type="submit" class="bg-black text-white font-bold text-lg hover:bg-gray-700 p-2 mt-8">Submit</button>
                </form>
            </div>

        </div>

@endsection