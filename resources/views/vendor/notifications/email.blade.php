<x-mail::message>
    {{-- Greeting --}}
    @if (! empty($greeting))
    # {{ $greeting }}
    @else
    @if ($level === 'error')
    # Oops!
    @else
    # Halo!
    @endif
    @endif

    {{-- Intro Lines --}}
    @if(isset($actionText) && $actionText === 'Reset Password')
    Anda menerima email ini karena ada permintaan reset password untuk akun Anda.<br>
    Link reset password ini hanya berlaku selama 60 menit.<br>
    Jika Anda tidak meminta reset password, abaikan saja email ini.
    @else
    @foreach ($introLines as $line)
    {{ $line }}

    @endforeach
    @endif

    {{-- Action Button --}}
    @isset($actionText)
    <?php
    $color = match ($level) {
        'success', 'error' => $level,
        default => 'primary',
    };
    ?>
    <x-mail::button :url="$actionUrl" :color="$color">
        {{ $actionText }}
    </x-mail::button>
    @endisset

    {{-- Subcopy --}}
    @isset($actionText)
    <x-slot:subcopy>
        Jika Anda mengalami kesulitan menekan tombol "{{ $actionText }}", salin dan tempel URL berikut ke browser Anda:<br>
        <span class="break-all">[{{ $displayableActionUrl }}]({{ $actionUrl }})</span>
    </x-slot:subcopy>
    @endisset
</x-mail::message>