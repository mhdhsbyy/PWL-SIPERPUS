<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Daftar Peminjaman') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-6">
                <x-primary-button class="mr-[10px]" tag="a" href="{{ route('loans.create') }}">Tambah Data Peminjaman Buku</x-primary-button>
                {{-- <x-primary-button class="bg-[#101010]" tag="a" href="{{ route('bookshelves.print') }}" target="blank">Print Rak Buku PDF</x-primary-button> --}}
            </div>

            <x-table>
                <x-slot name="header">
                    <tr>
                        <th>#</th>
                        <th>NPM</th>
                        <th>Nama Mahasiswa</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                    </tr>
                </x-slot>

                @php $num=1; @endphp
                @foreach($loans as $loan)
                    <tr>
                        <td>{{ $num++ }}</td>
                        <td>{{ $loan->user?->npm }}</td>
                        <td>{{ $loan->user?->first_name }}</td>
                        <td>{{ $loan->loan_at_format }}</td>
                        <td>{{ $loan->return_at_format }}</td>
                        <td>
                            <x-primary-button class="mb-[10px]" tag="a" href="{{ route('loans.edit', $loan->id) }}">Edit</x-primary-button>
                            <form action="{{ route('loans.destroy', $loan->id) }}" method="post" onsubmit="return confirm('Apakah anda yakin?');">
                                @csrf
                                @method('delete')
                                <x-danger-button type="submit">Hapus</x-danger-button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </x-table>
        </div>
    </div>
</x-app-layout>
