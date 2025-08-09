@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-gray-100 to-blue-100">
  <div class="bg-white shadow-xl rounded-2xl px-8 py-10 max-w-md w-full text-center animate__animated animate__fadeIn">
    <div class="flex justify-center mb-6">
      <!-- SVG Ilustrasi Kunci (Unauthorized) -->
      <svg width="80" height="80" fill="none" viewBox="0 0 24 24">
        <rect x="5" y="11" width="14" height="8" rx="4" fill="#F59E42"/>
        <rect x="10" y="14" width="4" height="3" rx="2" fill="#fff"/>
        <rect x="9" y="7" width="6" height="6" rx="3" fill="#fff"/>
        <rect x="11" y="9" width="2" height="4" rx="1" fill="#F59E42"/>
      </svg>
    </div>
    <h1 class="text-5xl font-extrabold text-yellow-500 mb-2 drop-shadow-lg">401</h1>
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Tidak Diizinkan</h2>
    <p class="mb-6 text-gray-600">Maaf, kamu tidak diizinkan untuk mengakses halaman ini.<br>Silakan login atau hubungi admin jika perlu.</p>
    <a href="{{ url('/') }}"
      class="inline-block bg-blue-500 text-white px-6 py-3 rounded-lg shadow hover:bg-blue-600 transition-all duration-200 hover:scale-105 font-semibold">
      Kembali ke Beranda
    </a>
  </div>
</div>
@endsection
