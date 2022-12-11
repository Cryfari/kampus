<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width: 5%">No</th>
                                <th>Judul</th>
                                <th>Headline</th>
                                <th>pengirim</th>

                                <th style="width: 20%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($datas as $index=>$data)
                                <tr>
                                    <td> {{ $index + 1 }} </td>
                                    <td> {{ $data->judul }} </td>
                                    <td> {{ $data->headline }} </td>
                                    <td> {{ $data->pengirim }} </td>

                                    <td>
                                        <a href="{{ route('detailberita', $data->id_berita) }}"
                                            class="btn btn-warning btn-sm my-1">detail</a>
                                        <a href="{{ route('editberita', $data->id_berita) }}"
                                            class="btn btn-primary btn-sm my-1">ubah</a>
                                        <a href="{{ route('hapusberita', $data->id_berita) }}"
                                            class="btn btn-danger btn-sm my-1"
                                            onclick="return confirm('Hapus data ini?')">hapus</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="10">
                                        <center>
                                            <h5>Data tidak ditemukan</h5>
                                        </center>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
