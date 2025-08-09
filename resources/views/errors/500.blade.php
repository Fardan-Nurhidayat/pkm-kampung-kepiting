@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-gray-100 to-blue-100">
  <div class="bg-white shadow-xl rounded-2xl px-8 py-10 max-w-md w-full text-center animate__animated animate__fadeIn">
    <div class="flex justify-center mb-6">
      <!-- SVG Ilustrasi Server Error -->
      <svg width="80" height="80" fill="none" viewBox="0 0 24 24">
        <rect x="4" y="8" width="16" height="8" rx="3" fill="#6B7280"/>
        <rect x="8" y="10" width="8" height="2" rx="1" fill="#fff"/>
        <rect x="8" y="14" width="8" height="2" rx="1" fill="#fff"/>
        <circle cx="8" cy="12" r="1" fill="#EF4444"/>
        <circle cx="16" cy="12" r="1" fill="#F59E42"/>
      </svg>
    </div>
    <h1 class="text-5xl font-extrabold text-gray-700 mb-2 drop-shadow-lg">500</h1>
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Kesalahan Server</h2>
    <p class="mb-6 text-gray-600">Maaf, terjadi kesalahan pada server.<br>Silakan coba beberapa saat lagi atau hubungi admin.</p>
    <a href="{{ url('/') }}"
      class="inline-block bg-blue-500 text-white px-6 py-3 rounded-lg shadow hover:bg-blue-600 transition-all duration-200 hover:scale-105 font-semibold">
      Kembali ke Beranda
    </a>
  </div>
</div>
@endsection
