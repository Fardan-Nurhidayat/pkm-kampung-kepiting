@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-gray-100 to-blue-100">
  <div class="bg-white shadow-xl rounded-2xl px-8 py-10 max-w-md w-full text-center animate__animated animate__fadeIn">
    <div class="flex justify-center mb-6">
      <!-- SVG Ilustrasi Kaca Pembesar (Not Found) -->
      <svg width="80" height="80" fill="none" viewBox="0 0 24 24">
        <circle cx="11" cy="11" r="7" fill="#6366F1"/>
        <rect x="16" y="16" width="5" height="2" rx="1" fill="#6366F1" transform="rotate(45 16 16)" />
        <circle cx="11" cy="11" r="4" fill="#fff"/>
      </svg>
    </div>
    <h1 class="text-5xl font-extrabold text-indigo-500 mb-2 drop-shadow-lg">404</h1>
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Halaman Tidak Ditemukan</h2>
    <p class="mb-6 text-gray-600">Maaf, halaman yang kamu cari tidak ditemukan.<br>Silakan kembali ke beranda atau hubungi admin jika perlu.</p>
    <a href="{{ url('/') }}"
      class="inline-block bg-blue-500 text-white px-6 py-3 rounded-lg shadow hover:bg-blue-600 transition-all duration-200 hover:scale-105 font-semibold">
      Kembali ke Beranda
    </a>
  </div>
</div>
@endsection
