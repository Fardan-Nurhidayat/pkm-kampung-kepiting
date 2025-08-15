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
            @if ($emailSentMessage)
                <div class="rounded-md bg-green-50 p-4">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm leading-5 font-medium text-green-800">
                                {{ $emailSentMessage }}
                            </p>
                        </div>
                    </div>
                </div>
            @else
                <form wire:submit.prevent="sendResetPasswordLink">
                    <div>
                        <label for="email" class="block text-sm font-medium text-third leading-5">
                            Alamat Email
                        </label>
                        <div class="mt-1 rounded-md shadow-sm">
                            <input wire:model.lazy="email" id="email" name="email" type="email" required autofocus class="appearance-none block w-full px-3 py-2 border border-primary rounded-md placeholder-gray-400 focus:outline-none focus:ring-primary focus:border-primaryLight transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('email') border-negative-500 text-negative-700 placeholder-negative-300 focus:border-negative-500 focus:ring-negative @enderror" />
                        </div>
                        @error('email')
                            <p class="mt-2 text-sm text-negative-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mt-6">
                        <span class="block w-full rounded-md shadow-sm">
                            <button type="submit" class="flex justify-center w-full px-4 py-2 text-sm font-medium text-white bg-primary border border-transparent rounded-md hover:bg-primaryLight focus:outline-none focus:border-primaryLight focus:ring-primary active:bg-primaryLight transition duration-150 ease-in-out">
                                Kirim link reset password
                            </button>
                        </span>
                    </div>
                </form>
            @endif
        </div>
    </div>
</div>
