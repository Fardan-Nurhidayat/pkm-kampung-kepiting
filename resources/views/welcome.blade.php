@extends('layouts.app')

@section('content')
{{-- Navbar --}}
<nav class="w-full bg-white shadow fixed top-0 left-0 z-50">
  <div class="max-w-6xl mx-auto px-4 flex justify-between items-center h-16">
    <div class="font-bold text-xl text-red-600 flex items-center gap-2">
      <span class="text-2xl">🦀</span> Kampung Kepiting Kutawaru
    </div>
    <ul class="flex space-x-8 font-semibold">
      <li><a href="{{ route('home') }}" class="hover:text-primaryLight transition">Home</a></li>
      <li><a href="#products" class="hover:text-primaryLight transition">Produk</a></li>
      <li><a href="#blog" class="hover:text-primaryLight transition">Blog</a></li>
    </ul>
  </div>
</nav>
<div class="h-16"></div> {{-- Spacer for fixed navbar --}}


{{-- Hero Section --}}
<section class="max-w-6xl mx-auto px-4 py-16 md:py-28 flex flex-col md:flex-row items-center gap-12 md:gap-20">
  <div class="md:w-1/2 flex justify-center">
    <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?auto=format&fit=crop&w=600&q=80"
      alt="Kepiting Andalan" class="rounded-3xl shadow-2xl w-full max-w-md object-cover border-4 border-red-100">
  </div>
  <div class="md:w-1/2 text-center md:text-left">
    <h1 class="text-4xl md:text-5xl font-extrabold mb-4 text-text leading-tight drop-shadow-lg">
      Lorem Ipsum Dolor Sit Amet
    </h1>
    <p class="text-lg md:text-2xl mb-8 text-gray-700 max-w-xl">
      Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
      veniam.
    </p>
    <a href="#contact"
      class="inline-block bg-primary hover:bg-primaryLight text-white font-bold py-3 px-8 rounded-full shadow-lg transition-all duration-200 text-lg">
      Reservasi Sekarang
    </a>
  </div>
</section>

{{-- Interest Section --}}
<section class="py-20">
  <div class="max-w-6xl mx-auto px-4">
    <h2 class="text-3xl font-bold text-center mb-12 text-text">Kenapa Harus Kampung Kepiting?</h2>
    <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
      <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col items-center text-center hover:shadow-2xl transition">
        <div class="mb-4 flex items-center justify-center bg-third/10 rounded-full w-16 h-16">
          <svg class="w-8 h-8 text-third" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <circle cx="18" cy="5" r="3"></circle>
            <circle cx="6" cy="12" r="3"></circle>
            <circle cx="18" cy="19" r="3"></circle>
            <line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line>
            <line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line>
          </svg>
        </div>
        <h3 class="font-semibold text-xl mb-2 text-third">Kesegaran Terjamin</h3>
        <p class="text-base" style="color:#333333;">Kepiting kami dibudidayakan dan ditangkap langsung dari kawasan
          mangrove, memastikan kualitas dan rasa terbaik saat dihidangkan.</p>
      </div>
      <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col items-center text-center hover:shadow-2xl transition">
        <div class="mb-4 flex items-center justify-center bg-primary/10 rounded-full w-16 h-16">
          <svg class="w-8 h-8 text-third" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">

            <circle cx="18" cy="5" r="3"></circle>
            <circle cx="6" cy="12" r="3"></circle>
            <circle cx="18" cy="19" r="3"></circle>
            <line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line>
            <line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line>
          </svg>
        </div>
        <h3 class="font-semibold text-xl mb-2 text-primary">Resep Warisan Lokal</h3>
        <p class="text-base" style="color:#333333;">Dimasak dengan bumbu rahasia khas Cilacap yang diwariskan
          turun-temurun, memberikan cita rasa yang tak akan Anda lupakan.</p>
      </div>
      <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col items-center text-center hover:shadow-2xl transition">
        <div class="mb-4 flex items-center justify-center bg-third/10 rounded-full w-16 h-16">
          <svg class="w-8 h-8 text-third" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">

            <circle cx="18" cy="5" r="3"></circle>
            <circle cx="6" cy="12" r="3"></circle>
            <circle cx="18" cy="19" r="3"></circle>
            <line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line>
            <line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line>
          </svg>
        </div>
        <h3 class="font-semibold text-xl mb-2 text-third">Wisata Edukasi Mangrove</h3>
        <p class="text-base" style="color:#333333;">Bukan hanya makan, ajak keluarga Anda berkeliling hutan mangrove,
          belajar tentang ekosistem, dan ikut serta dalam pelestarian alam.</p>
      </div>
      <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col items-center text-center hover:shadow-2xl transition">
        <div class="mb-4 flex items-center justify-center bg-primary/10 rounded-full w-16 h-16">
          <svg class="w-8 h-8 text-third" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <circle cx="18" cy="5" r="3"></circle>
            <circle cx="6" cy="12" r="3"></circle>
            <circle cx="18" cy="19" r="3"></circle>
            <line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line>
            <line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line>
          </svg>
        </div>
        <h3 class="font-semibold text-xl mb-2 text-primary">Mendukung Komunitas Lokal</h3>
        <p class="text-base" style="color:#333333;">Setiap hidangan yang Anda nikmati turut memberdayakan para nelayan
          dan masyarakat lokal di sekitar Kampung Kepiting.</p>
      </div>
    </div>
  </div>
</section>

{{-- Desire Section --}}
<section class="py-20 bg-white">
  <div class="max-w-6xl mx-auto px-4">
    <h2 class="text-3xl font-bold text-center mb-12">Galeri</h2>
    {{-- Galeri Foto --}}
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-12">
      @for($i=1; $i<=8; $i++) <div class="rounded-xl overflow-hidden shadow hover:scale-105 transition">
        <img src="{{asset('assets/images/crab.jpg')}}" alt="Galeri Food" class="w-full h-40 object-cover">
    </div>
    @endfor
  </div>
  {{-- Menu Andalan --}}
  <h3 class="text-2xl font-semibold text-center mb-8">Menu Andalan Kami</h3>
  <div class="grid md:grid-cols-3 gap-8">
    <div class="bg-gray-50 rounded-xl shadow-lg p-6 flex flex-col items-center text-center hover:shadow-2xl transition">
      <img src="https://images.unsplash.com/photo-1502741338009-cac2772e18bc?auto=format&fit=crop&w=400&q=80"
        alt="Menu 1" class="w-28 h-28 rounded-full object-cover mb-4 shadow">
      <h4 class="font-bold text-xl mb-2">Nunc Viverra Imperdiet</h4>
      <p class="text-gray-500 mb-2">Donec ac odio tempor orci dapibus ultrices in iaculis nunc. Mauris vitae ultricies
        leo integer malesuada.</p>
      <span class="text-lg font-semibold text-red-500">Lorem Ipsum</span>
    </div>
    <div class="bg-gray-50 rounded-xl shadow-lg p-6 flex flex-col items-center text-center hover:shadow-2xl transition">
      <img src="https://images.unsplash.com/photo-1502741338009-cac2772e18bc?auto=format&fit=crop&w=400&q=80"
        alt="Menu 2" class="w-28 h-28 rounded-full object-cover mb-4 shadow">
      <h4 class="font-bold text-xl mb-2">Sed Cursus Turpis</h4>
      <p class="text-gray-500 mb-2">Praesent ac massa at ligula laoreet iaculis. Fusce a quam. Etiam ut purus mattis
        mauris.</p>
      <span class="text-lg font-semibold text-red-500">Lorem Ipsum</span>
    </div>
    <div class="bg-gray-50 rounded-xl shadow-lg p-6 flex flex-col items-center text-center hover:shadow-2xl transition">
      <img src="https://images.unsplash.com/photo-1502741338009-cac2772e18bc?auto=format&fit=crop&w=400&q=80"
        alt="Menu 3" class="w-28 h-28 rounded-full object-cover mb-4 shadow">
      <h4 class="font-bold text-xl mb-2">Pellentesque Egestas</h4>
      <p class="text-gray-500 mb-2">Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio
        et ante.</p>
      <span class="text-lg font-semibold text-red-500">Lorem Ipsum</span>
    </div>
  </div>
  </div>
</section>

{{-- Testimoni Section --}}
<section class="py-20 bg-gray-50">
  <div class="max-w-4xl mx-auto px-4">
    <h2 class="text-3xl font-bold text-center mb-12">Ut Enim Ad Minima Veniam</h2>
    <div class="grid md:grid-cols-2 gap-8">
      <div class="bg-white rounded-xl shadow-lg p-8 flex flex-col items-center text-center">
        <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Pelanggan 1"
          class="w-20 h-20 rounded-full object-cover mb-4 shadow">
        <blockquote class="italic text-gray-600 mb-4">“Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer
          posuere erat a ante. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.”</blockquote>
        <div class="font-semibold text-gray-800">Nomen Nescio</div>
        <div class="text-gray-400 text-sm">Aliquam Mollis</div>
      </div>
      <div class="bg-white rounded-xl shadow-lg p-8 flex flex-col items-center text-center">
        <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Pelanggan 2"
          class="w-20 h-20 rounded-full object-cover mb-4 shadow">
        <blockquote class="italic text-gray-600 mb-4">“Duis aute irure dolor in reprehenderit in voluptate velit esse
          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident.”</blockquote>
        <div class="font-semibold text-gray-800">Jane Doe</div>
        <div class="text-gray-400 text-sm">Cras Ultricies</div>
      </div>
    </div>
  </div>
</section>

{{-- Contact Section --}}
<section id="contact" class="py-20 bg-white">
  <div class="max-w-6xl mx-auto px-4">
    <h2 class="text-3xl font-bold text-center mb-12">Kontak Kami</h2>
    <div class="grid md:grid-cols-2 gap-8">
      <div class="bg-gray-50 rounded-xl shadow-lg p-8 flex flex-col justify-center">
        <h3 class="font-semibold text-xl mb-4">Info Kontak</h3>
        <div class="mb-2"><span class="font-bold">Alamat:</span> Lorem Ipsum</div>
        <div class="mb-2"><span class="font-bold">Jam Buka:</span> Lorem - Ipsum, 10:00 - 22:00.</div>
        <div class="mb-2"><span class="font-bold">Kontak:</span> 0812-3456-7890</div>
        <div class="mt-8">
          <h4 class="font-semibold mb-2">FAQ</h4>
          <div class="mb-2">
            <span class="font-bold">Duis aute irure dolor in reprehenderit?</span><br>
            <span class="text-gray-500">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
              deserunt mollit anim id est laborum.</span>
          </div>
          <div>
            <span class="font-bold">Neque porro quisquam est, qui dolorem?</span><br>
            <span class="text-gray-500">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
              doloremque laudantium, totam rem aperiam.</span>
          </div>
        </div>
      </div>
      <div class="rounded-xl overflow-hidden shadow-lg">
        <iframe src="https://www.google.com/maps?q=-7.728055,109.013611&hl=es;z=14&amp;output=embed" width="100%"
          height="350" style="border:0;" allowfullscreen="" loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </div>
  </div>
</section>