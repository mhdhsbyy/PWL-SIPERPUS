<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah Detail Peminjaman') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form method="post" action="{{ route('loandetails.store') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
                    @csrf

                    <div class="max-w-xl">
                        <x-input-label for="loan_id" value="Peminjam"/>
                        <x-text-input id="loan_id" type="number" name="loan_id" class="mt-1 block w-full" value="{{ old('loan_id')}}" required/>
                        <x-input-error class="mt-2" :messages="$errors->get('loan_id')" />
                    </div>

                    <div class="max-w-xl">
                        <x-input-label for="book_id" value="Buku"/>
                        <x-text-input id="book_id" type="number" name="book_id" class="mt-1 block w-full" value="{{ old('book_id')}}" required/>
                        <x-input-error class="mt-2" :messages="$errors->get('book_id')" />
                    </div>

                    <div class="max-w-xl">
                        <x-input-label for="is_return" value="Status"/>
                        <x-text-input id="is_return" type="number" name="is_return" class="mt-1 block w-full" value="{{ old('is_return')}}" required/>
                        <x-input-error class="mt-2" :messages="$errors->get('is_return')" />
                    </div>

                    <div class="flex items-center gap-4">
                        <x-secondary-button tag="a" href="">Cancel</x-secondary-button>
                        <x-primary-button name="save_and_create" value="true">Save & Create Another</x-primary-button>
                        <x-primary-button name="save" value="true">Save</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
