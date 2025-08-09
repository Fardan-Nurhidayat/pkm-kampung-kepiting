@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-gray-100 to-blue-100">
  <div class="bg-white shadow-xl rounded-2xl px-8 py-10 max-w-md w-full text-center animate__animated animate__fadeIn">
    <div class="flex justify-center mb-6">
      <!-- SVG Ilustrasi Kartu/Uang (Payment Required) -->
      <svg width="80" height="80" fill="none" viewBox="0 0 24 24">
        <rect x="4" y="8" width="16" height="10" rx="3" fill="#60A5FA"/>
        <rect x="7" y="13" width="5" height="2" rx="1" fill="#fff"/>
        <circle cx="17" cy="15" r="1.5" fill="#fff"/>
        <rect x="4" y="10" width="16" height="2" fill="#3B82F6"/>
      </svg>
    </div>
    <h1 class="text-5xl font-extrabold text-blue-500 mb-2 drop-shadow-lg">402</h1>
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Pembayaran Diperlukan</h2>
    <p class="mb-6 text-gray-600">Maaf, akses ke halaman ini memerlukan pembayaran.<br>Silakan lakukan pembayaran atau hubungi admin jika perlu.</p>
    <a href="{{ url('/') }}"
      class="inline-block bg-blue-500 text-white px-6 py-3 rounded-lg shadow hover:bg-blue-600 transition-all duration-200 hover:scale-105 font-semibold">
      Kembali ke Beranda
    </a>
  </div>
</div>
@endsection
