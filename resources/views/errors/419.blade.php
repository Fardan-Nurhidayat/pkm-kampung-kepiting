@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-gray-100 to-blue-100">
  <div class="bg-white shadow-xl rounded-2xl px-8 py-10 max-w-md w-full text-center animate__animated animate__fadeIn">
    <div class="flex justify-center mb-6">
      <!-- SVG Ilustrasi Jam/Pasir Waktu (Page Expired) -->
      <svg width="80" height="80" fill="none" viewBox="0 0 24 24">
        <rect x="8" y="4" width="8" height="3" rx="1.5" fill="#FBBF24"/>
        <rect x="8" y="17" width="8" height="3" rx="1.5" fill="#FBBF24"/>
        <polygon points="12,7 16,17 8,17" fill="#fff"/>
        <polygon points="12,17 16,7 8,7" fill="#FBBF24"/>
      </svg>
    </div>
    <h1 class="text-5xl font-extrabold text-yellow-400 mb-2 drop-shadow-lg">419</h1>
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Halaman Kedaluwarsa</h2>
    <p class="mb-6 text-gray-600">Maaf, sesi kamu telah kedaluwarsa.<br>Silakan refresh halaman atau login kembali.</p>
    <a href="{{ url('/') }}"
      class="inline-block bg-blue-500 text-white px-6 py-3 rounded-lg shadow hover:bg-blue-600 transition-all duration-200 hover:scale-105 font-semibold">
      Kembali ke Beranda
    </a>
  </div>
</div>
@endsection
