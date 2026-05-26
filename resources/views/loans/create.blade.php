<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah Peminjaman') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form method="post" action="{{ route('loans.store') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
                    @csrf

                    <div class="max-w-xl">
                        <x-input-label for="user_npm" value="Peminjam"/>
                        <x-text-input id="user_npm" type="text" name="user_npm" class="mt-1 block w-full" value="{{ old('user_npm')}}" required/>
                        <x-input-error class="mt-2" :messages="$errors->get('user_npm')" />
                    </div>

                    <div class="max-w-xl">
                        <x-input-label for="loan_at" value="Tanggal Pinjam"/>
                        <x-text-input id="loan_at" type="date" name="loan_at" class="mt-1 block w-full" value="{{ old('loan_at')}}" required/>
                        <x-input-error class="mt-2" :messages="$errors->get('loan_at')" />
                    </div>

                    <div class="max-w-xl">
                        <x-input-label for="return_at" value="Taggal Kembali"/>
                        <x-text-input id="return_at" type="date" name="return_at" class="mt-1 block w-full" value="{{ old('return_at')}}" required/>
                        <x-input-error class="mt-2" :messages="$errors->get('return_at')" />
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
