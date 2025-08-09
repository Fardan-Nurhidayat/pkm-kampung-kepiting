@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-gray-100 to-blue-100">
  <div class="bg-white shadow-xl rounded-2xl px-8 py-10 max-w-md w-full text-center animate__animated animate__fadeIn">
    <div class="flex justify-center mb-6">
      <!-- SVG Ilustrasi Stopwatch (Too Many Requests) -->
      <svg width="80" height="80" fill="none" viewBox="0 0 24 24">
        <circle cx="12" cy="14" r="7" fill="#A78BFA"/>
        <rect x="11" y="7" width="2" height="4" rx="1" fill="#A78BFA"/>
        <rect x="9" y="3" width="6" height="2" rx="1" fill="#A78BFA"/>
        <rect x="12" y="14" width="4" height="2" rx="1" fill="#fff" transform="rotate(-45 12 14)" />
        <circle cx="12" cy="14" r="3" fill="#fff"/>
      </svg>
    </div>
    <h1 class="text-5xl font-extrabold text-purple-400 mb-2 drop-shadow-lg">429</h1>
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Terlalu Banyak Permintaan</h2>
    <p class="mb-6 text-gray-600">Maaf, kamu telah melakukan terlalu banyak permintaan dalam waktu singkat.<br>Silakan tunggu beberapa saat sebelum mencoba lagi.</p>
    <a href="{{ url('/') }}"
      class="inline-block bg-blue-500 text-white px-6 py-3 rounded-lg shadow hover:bg-blue-600 transition-all duration-200 hover:scale-105 font-semibold">
      Kembali ke Beranda
    </a>
  </div>
</div>
@endsection
