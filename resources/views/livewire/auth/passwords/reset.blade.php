@section('title', 'Reset password')

<div>
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <h2 class="mt-6 text-3xl font-extrabold text-center text-third leading-9">
            Reset password
        </h2>
        @if (Route::has('login'))
        <p class="mt-2 text-sm text-center text-text leading-5 max-w">
            Atau
            <a href="{{ route('login') }}" class="font-medium text-primary hover:text-primaryLight focus:outline-none focus:underline transition ease-in-out duration-150">
                masuk ke akun Anda
            </a>
        </p>
        @endif
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="px-4 py-8 bg-secondary shadow sm:rounded-lg sm:px-10">
            <form wire:submit.prevent="resetPassword">
                <input wire:model="token" type="hidden">

                <div>
                    <label for="email" class="block text-sm font-medium text-third leading-5">
                        Alamat Email
                    </label>
                    <div class="mt-1 rounded-md shadow-sm">
                        <input wire:model.lazy="email" id="email" type="email" required autofocus class="appearance-none block w-full px-3 py-2 border border-primary rounded-md placeholder-gray-400 focus:outline-none focus:ring-primary focus:border-primaryLight transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('email') border-negative-500 text-negative-700 placeholder-negative-300 focus:border-negative-500 focus:ring-negative @enderror" />
                    </div>
                    @error('email')
                        <p class="mt-2 text-sm text-negative-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-6">
                    <label for="password" class="block text-sm font-medium text-third leading-5">
                        Kata Sandi Baru
                    </label>
                    <div class="mt-1 rounded-md shadow-sm">
                        <input wire:model.lazy="password" id="password" type="password" required class="appearance-none block w-full px-3 py-2 border border-primary rounded-md placeholder-gray-400 focus:outline-none focus:ring-primary focus:border-primaryLight transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('password') border-negative-500 text-negative-700 placeholder-negative-300 focus:border-negative-500 focus:ring-negative @enderror" />
                    </div>
                    @error('password')
                        <p class="mt-2 text-sm text-negative-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-6">
                    <label for="password_confirmation" class="block text-sm font-medium text-third leading-5">
                        Konfirmasi Kata Sandi
                    </label>
                    <div class="mt-1 rounded-md shadow-sm">
                        <input wire:model.lazy="passwordConfirmation" id="password_confirmation" type="password" required class="block w-full px-3 py-2 placeholder-gray-400 border border-primary appearance-none rounded-md focus:outline-none focus:ring-primary focus:border-primaryLight transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                    </div>
                </div>

                <div class="mt-6">
                    <span class="block w-full rounded-md shadow-sm">
                        <button type="submit" class="flex justify-center w-full px-4 py-2 text-sm font-medium text-white bg-primary border border-transparent rounded-md hover:bg-primaryLight focus:outline-none focus:border-primaryLight focus:ring-primary active:bg-primaryLight transition duration-150 ease-in-out">
                            Reset password
                        </button>
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>
