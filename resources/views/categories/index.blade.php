<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Daftar Kategori') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-6">
                <x-primary-button class="mr-[10px]" tag="a" href="{{ route('categories.create') }}">Tambah Data Kategori Buku</x-primary-button>
                {{-- <x-primary-button class="bg-[#101010]" tag="a" href="{{ route('bookshelves.print') }}" target="blank">Print Rak Buku PDF</x-primary-button> --}}
            </div>

            <x-table>
                <x-slot name="header">
                    <tr>
                        <th>#</th>
                        <th>Kategori</th>
                    </tr>
                </x-slot>

                @php $num=1; @endphp
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $num++ }}</td>
                        <td>{{ $category->category }}</td>
                        <td>
                            <x-primary-button class="mb-[10px]" tag="a" href="{{ route('categories.edit', $category->id) }}">Edit</x-primary-button>
                            <form action="{{ route('categories.destroy', $category->id) }}" method="post" onsubmit="return confirm('Apakah anda yakin?');">
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
