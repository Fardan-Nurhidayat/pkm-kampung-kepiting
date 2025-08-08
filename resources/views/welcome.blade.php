<x-guest>
  @section('title', 'Landing Page')
  <div class="h-16"></div> {{-- Spacer for fixed navbar --}}


  {{-- Hero Section --}}
  <section class="max-w-6xl mx-auto px-4 py-16 md:py-28 flex flex-col md:flex-row items-center gap-12 md:gap-20">
    <div class="md:w-1/2 flex justify-center">
      <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?auto=format&fit=crop&w=600&q=80"
        alt="Kepiting Andalan" class="rounded-3xl shadow-2xl w-full max-w-md object-cover border-4 border-red-100">
    </div>
    <div
      class="md:w-1/2 text-center md:text-left"
      x-data="{
        words: ['Belajar', 'Kuliner', 'Wisata'],
        active: 0,
        start() {
            setInterval(() => {
                this.active = (this.active + 1) % this.words.length;
            }, 2000);
        }
    }"
      x-init="start()">
      <h1 class="text-4xl font-extrabold mb-4 text-text leading-tight drop-shadow-lg">
        <span class="relative text-4xl underline-offset-1 font-extrabold text-primary leading-tight inline-block min-w-[120px] min-h-[48px] align-top">
          <template x-for="(word, i) in words" :key="i">
            <span
              x-show="active === i"
              x-transition:enter="transition transform duration-500"
              x-transition:enter-start="opacity-0 translate-y-8"
              x-transition:enter-end="opacity-100 translate-y-0"
              x-transition:leave="transition transform duration-500 absolute"
              x-transition:leave-start="opacity-100 translate-y-0"
              x-transition:leave-end="opacity-0 -translate-y-8"
              class="block absolute left-0 right-0 top-0"
              x-text="word"></span>
          </template>
        </span>
        <span>Dengan Keluarga Bersama Kampung Kepiting</span>
      </h1>
      <p class="text-[15px] md:text-[15px] mb-8 text-gray-700 max-w-xl">
        Nikmati pengalaman kuliner yang tak terlupakan dengan kepiting segar dari hutan mangrove, sambil belajar dan
        berwisata di Kampung Kepiting. Dapatkan cita rasa lokal yang autentik dan dukung pelestarian alam.
      </p>
      <a href="#contact"
        class="inline-block bg-primary hover:bg-primaryLight text-white font-bold py-2 px-6 rounded-lg shadow-lg transition-all duration-200 text-[23px]">
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
  <section class="py-20">
    <div class="max-w-4xl mx-auto px-4">
      <h2 class="text-3xl font-bold text-center mb-12">Kata Mereka</h2>
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
          <div class="mb-2"><span class="font-bold">Alamat:</span> Jl. Nusa Sejati, Sawah, Kutawaru, Kec. Cilacap Tengah, Kabupaten Cilacap, Jawa Tengah </div>
          <div class="mb-2"><span class="font-bold">Jam Buka:</span> Setiap Hari, 09:00 - 17:00.</div>
          <div class="grid grid-cols-2 items-start justify-center mb-2"><span>Kontak:
              <div class="flex items-center gap-2 mt-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="#000">
                  <path d="M24 11.7c0 6.45-5.27 11.68-11.78 11.68-2.07 0-4-.53-5.7-1.45L0 24l2.13-6.27a11.57 11.57 0 0 1-1.7-6.04C.44 5.23 5.72 0 12.23 0 18.72 0 24 5.23 24 11.7M12.22 1.85c-5.46 0-9.9 4.41-9.9 9.83 0 2.15.7 4.14 1.88 5.76L2.96 21.1l3.8-1.2a9.9 9.9 0 0 0 5.46 1.62c5.46 0 9.9-4.4 9.9-9.83a9.88 9.88 0 0 0-9.9-9.83m5.95 12.52c-.08-.12-.27-.19-.56-.33-.28-.14-1.7-.84-1.97-.93-.26-.1-.46-.15-.65.14-.2.29-.75.93-.91 1.12-.17.2-.34.22-.63.08-.29-.15-1.22-.45-2.32-1.43a8.64 8.64 0 0 1-1.6-1.98c-.18-.29-.03-.44.12-.58.13-.13.29-.34.43-.5.15-.17.2-.3.29-.48.1-.2.05-.36-.02-.5-.08-.15-.65-1.56-.9-2.13-.24-.58-.48-.48-.64-.48-.17 0-.37-.03-.56-.03-.2 0-.5.08-.77.36-.26.29-1 .98-1 2.4 0 1.4 1.03 2.76 1.17 2.96.14.19 2 3.17 4.93 4.32 2.94 1.15 2.94.77 3.47.72.53-.05 1.7-.7 1.95-1.36.24-.67.24-1.25.17-1.37" />
                </svg>
                <a href="https://wa.me/628980587679" class="text-blue-600 hover:underline">+628980587679</a>
              </div>
              <div class="flex items-center gap-2 mt-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="#000">
                  <path d="M16.98 0a6.9 6.9 0 0 1 5.08 1.98A6.94 6.94 0 0 1 24 7.02v9.96c0 2.08-.68 3.87-1.98 5.13A7.14 7.14 0 0 1 16.94 24H7.06a7.06 7.06 0 0 1-5.03-1.89A6.96 6.96 0 0 1 0 16.94V7.02C0 2.8 2.8 0 7.02 0h9.96zm.05 2.23H7.06c-1.45 0-2.7.43-3.53 1.25a4.82 4.82 0 0 0-1.3 3.54v9.92c0 1.5.43 2.7 1.3 3.58a5 5 0 0 0 3.53 1.25h9.88a5 5 0 0 0 3.53-1.25 4.73 4.73 0 0 0 1.4-3.54V7.02a5 5 0 0 0-1.3-3.49 4.82 4.82 0 0 0-3.54-1.3zM12 5.76c3.39 0 6.2 2.8 6.2 6.2a6.2 6.2 0 0 1-12.4 0 6.2 6.2 0 0 1 6.2-6.2zm0 2.22a3.99 3.99 0 0 0-3.97 3.97A3.99 3.99 0 0 0 12 15.92a3.99 3.99 0 0 0 3.97-3.97A3.99 3.99 0 0 0 12 7.98zm6.44-3.77a1.4 1.4 0 1 1 0 2.8 1.4 1.4 0 0 1 0-2.8z" />
                </svg>
                <span>@kampoengkepiting29</span>
              </div>
          </div>
          <div class="mt-8">
            <h4 class="font-semibold mb-2">FAQ</h4>
            <div class="mb-2">
              <span class="font-bold">Apakah hanya tempat makan saja?</span><br>
              <span class="text-gray-500">Tidak, Selain saung untuk tempat makan, Di Kampung Kepiting ada pojok baca dan tempat bermain untuk anak anak lalu ada tempat untuk beribadah juga untuk umat muslim</span>
            </div>
            <div>
              <span class="font-bold">Apakah tersedia jaringan internet / sinyal di Kampung Kepiting?</span><br>
              <span class="text-gray-500">Tenang saja, di Kampung Kepiting ada jaringan internet / sinyal. Jika kalian terkendala jaringan pun kami menyediakan Wi-Fi</span>
            </div>
          </div>
        </div>
        <div class="rounded-xl overflow-hidden shadow-lg">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.737746448726!2d108.97477837610263!3d-7.711264776393081!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e650d153cc94017%3A0x39f25f3222025400!2sKampoeng%20Kepiting!5e0!3m2!1sid!2sid!4v1754566048146!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>
    </div>
  </section>
</x-guest>