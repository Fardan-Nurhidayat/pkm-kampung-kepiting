@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-gray-100 to-blue-100">
  <div class="bg-white shadow-xl rounded-2xl px-8 py-10 max-w-md w-full text-center animate__animated animate__fadeIn">
    <div class="flex justify-center mb-6">
      <!-- SVG Ilustrasi Larangan (Forbidden) -->
      <svg width="80" height="80" fill="none" viewBox="0 0 24 24">
        <circle cx="12" cy="12" r="10" fill="#F87171"/>
        <rect x="7" y="11" width="10" height="2" rx="1" fill="#fff" transform="rotate(-45 12 12)" />
        <rect x="7" y="11" width="10" height="2" rx="1" fill="#fff" transform="rotate(45 12 12)" />
      </svg>
    </div>
    <h1 class="text-5xl font-extrabold text-red-500 mb-2 drop-shadow-lg">403</h1>
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Akses Ditolak</h2>
    <p class="mb-6 text-gray-600">Maaf, kamu tidak memiliki akses ke halaman ini.<br>Silakan kembali ke beranda atau
      hubungi admin jika perlu.</p>
    <a href="{{ url('/') }}"
      class="inline-block bg-blue-500 text-white px-6 py-3 rounded-lg shadow hover:bg-blue-600 transition-all duration-200 hover:scale-105 font-semibold">
      Kembali ke Beranda
    </a>
  </div>
</div>
@endsection