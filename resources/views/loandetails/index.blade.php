<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Daftar Detail Peminjaman') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-6">
                <x-primary-button class="mr-[10px]" tag="a" href="{{ route('loandetails.create') }}">Tambah Data Detail
                    Peminjaman Buku</x-primary-button>
                {{-- <x-primary-button class="bg-[#101010]" tag="a" href="{{ route('bookshelves.print') }}" target="blank">Print Rak Buku PDF</x-primary-button> --}}
            </div>

            <x-table>
                <x-slot name="header">
                    <tr>
                        <th>#</th>
                        <th>NPM</th>
                        <th>Nama Peminjam</th>
                        <th>Buku yg dipinjam</th>
                        <th>Tanggal Pinjam</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </x-slot>

                @php $num=1; @endphp
                @foreach ($loanDetails as $detail)
                    <tr>
                        <td>{{ $num++ }}</td>
                        <td>{{ $detail->loan->user?->npm }}</td>
                        <td>{{ $detail->loan->user?->first_name }}</td>
                        <td>{{ $detail->book->title }}</td>
                        <td>{{ \Carbon\Carbon::parse($detail->loan->loan_at)->translatedFormat('d F Y') }}</td>
                        <td>
                            <span class="{{ $detail->status_color }}">
                                {{ $detail->status }}
                            </span>
                        </td>
                        <td>
                            <x-primary-button class="mb-[10px]" tag="a" href="{{ route('loandetails.edit', $detail->id) }}">Edit</x-primary-button>
                            <form action="{{ route('loandetails.destroy', $detail->id) }}" method="post" onsubmit="return confirm('Apakah anda yakin?');">
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
