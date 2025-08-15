<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>{{ $subject ?? config('app.name') }}</title>
  <link href="https://fonts.googleapis.com/css?family=Inter:400,700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Inter', Arial, sans-serif;
      background: #f9fafb;
      margin: 0;
    }

    .card {
      background: #fff;
      border-radius: 1.5rem;
      box-shadow: 0 4px 24px rgba(0, 0, 0, 0.08);
      padding: 2rem;
      max-width: 600px;
      margin: 2rem auto;
    }

    .header {
      font-size: 2rem;
      font-weight: 800;
      color: #d7263d;
      margin-bottom: 1rem;
      text-align: center;
    }

    .content {
      font-size: 1rem;
      color: #333;
      margin-bottom: 2rem;
    }

    .footer {
      font-size: 0.95rem;
      color: #888;
      text-align: center;
      margin-top: 2rem;
    }

    a.button {
      display: inline-block;
      color: #fff;
      font-weight: bold;
      padding: 0.75rem 2rem;
      border-radius: 0.75rem;
      text-decoration: none;
      margin-top: 1rem;
      font-size: 1.15rem;
      box-shadow: 0 2px 8px rgba(215, 38, 61, 0.15);
      transition: background 0.2s;
    }

    a.button:hover {
      background: #e94e77;
    }
  </style>
</head>

<body>
  <div class="card">
    <x-mail::header />
    <div class="content">
      {{-- ...existing code... --}}
      {!! $slot !!}
      {{-- ...existing code... --}}
      @isset($actionText)
      <a href="{{ $actionUrl }}" class="button">{{ $actionText }}</a>
      @endisset
    </div>
    @isset($subcopy)
    <div class="content" style="font-size:0.95rem; color:#666; border-top:1px solid #eee; padding-top:1rem;">
      {!! $subcopy !!}
    </div>
    @endisset

    <x-mail::footer />

  </div>
</body>

</html>