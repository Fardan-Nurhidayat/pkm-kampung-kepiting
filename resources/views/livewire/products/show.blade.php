<div>
  <div class="h-16"></div>
  <div class="max-w-6xl mx-auto px-4 py-8" x-data="{ activeImage: 0 }">

    {{-- Grid Utama --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

      {{-- Galeri Gambar --}}
      <div x-data="{
                images: @js($product->images), 
                activeImage: 0
            }">

        {{-- Gambar Utama --}}
        <div class="rounded-lg overflow-hidden border">
          <img :src="'{{ asset('storage') }}/' + images[activeImage]" alt="{{ $product->name }}"
            class="w-full h-96 object-cover transition-all duration-300">
        </div>

        {{-- Thumbnails --}}
        <div class="flex gap-2 mt-4 overflow-x-auto pb-2">
          <template x-for="(image, index) in images" :key="index">
            <img :src="'{{ asset('storage') }}/' + image" :alt="'Thumb ' + index"
              class="w-20 h-20 object-cover rounded border cursor-pointer hover:opacity-80 transition"
              :class="{ 'ring-2 ring-primary': activeImage === index }" @click="activeImage = index">
          </template>
        </div>

      </div>


      {{-- Detail Produk --}}
      <div>
        {{-- Kategori --}}
        <span class="bg-primary text-white px-3 py-1 rounded-full text-sm mb-2 inline-block">
          {{ $product->category }}
        </span>

        {{-- Nama Produk --}}
        <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $product->name }}</h1>

        {{-- Nama Penjual --}}
        <div class="mb-2 text-gray-600 text-sm">
          Penjual: <span class="font-semibold">{{ $product->user->name }}</span>
        </div>

        {{-- Tombol Like --}}
        <div class="flex items-center gap-4 mb-4">
          @auth
          <button wire:click="toggleLike"
            class="flex items-center gap-2 px-4 py-2 rounded-full font-semibold transition-all
                                {{ $userHasLiked ? 'bg-primary text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
              <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5
                                    2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09
                                    C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5
                                    c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />
            </svg>
            <span>
              {{ $userHasLiked ? 'Liked' : 'Like' }}
            </span>
          </button>
          @else
          <a href="{{ route('login') }}"
            class="flex items-center gap-2 px-4 py-2 rounded-full font-semibold bg-gray-100 text-gray-700 hover:bg-gray-200 transition-all">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
              <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5
                                    2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09
                                    C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5
                                    c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />
            </svg>
            Login to Like
          </a>
          @endauth

          <div class="text-gray-600">
            {{ $product->likes_count }} {{ Str::plural('like', $product->likes_count) }}
          </div>
        </div>

        {{-- Rating --}}
        <!-- Rating Stars -->
        <div class="flex items-center mb-3">
          <div class="flex space-x-1 rating-stars">
            @for ($i = 0; $i < $fullStars; $i++) <svg class="w-5 h-5 text-yellow-400 fill-current" viewBox="0 0 24 24">
              <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
              </svg>
              @endfor

              @if ($halfStar)
              <svg class="w-5 h-5 text-yellow-400 fill-current" viewBox="0 0 24 24">
                <defs>
                  <linearGradient id="halfGrad">
                    <stop offset="50%" stop-color="currentColor" />
                    <stop offset="50%" stop-color="#E5E7EB" />
                  </linearGradient>
                </defs>
                <path fill="url(#halfGrad)"
                  d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
              </svg>
              @endif

              @for ($i = 0; $i < $emptyStars; $i++) <svg class="w-5 h-5 text-gray-300 fill-current" viewBox="0 0 24 24">
                <path
                  d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
                </svg>
                @endfor
          </div>
          <span class="text-sm text-gray-500 ml-2">({{ number_format($avgRating, 1) }})</span>
        </div>

        {{-- Deskripsi --}}
        <div class="prose max-w-none mb-6">
          {!! $product->description !!}
        </div>

        {{-- Tombol Aksi --}}
        <div class="flex gap-4">
          {{-- <button class="bg-third text-white px-6 py-3 rounded-lg hover:bg-opacity-90">Tambah ke Keranjang</button> --}}
          <a href="{{'https://wa.me/'. $product->user->no_hp . '?text=Saya Ingin memesan ' . $product->name}}"
            target="_blank" class="bg-primary text-white px-6 py-3 rounded-lg hover:bg-primaryDark">Beli Sekarang</a>
        </div>
      </div>
    </div>

    {{-- Bagian Rating & Review --}}
    <div class="mt-12 border-t pt-6">
      <h3 class="text-xl font-semibold mb-3">Beri Penilaian</h3>

      @auth
      <div class="flex items-center space-x-1 mb-3">
        @for ($i = 1; $i <= 5; $i++) <svg wire:click="$set('userRating', {{ $i }})"
          class="w-8 h-8 cursor-pointer transition-colors {{ $i <= $userRating ? 'text-yellow-400' : 'text-gray-300' }}"
          fill="currentColor" viewBox="0 0 20 20">
          <path
            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.27 3.9a1 1 0 00.95.69h4.1c.969 0 1.371 1.24.588 1.81l-3.32 2.41a1 1 0 00-.364 1.118l1.27 3.9c.3.921-.755 1.688-1.54 1.118l-3.32-2.41a1 1 0 00-1.176 0l-3.32 2.41c-.784.57-1.838-.197-1.54-1.118l1.27-3.9a1 1 0 00-.364-1.118l-3.32-2.41c-.783-.57-.38-1.81.588-1.81h4.1a1 1 0 00.95-.69l1.27-3.9z" />
          </svg>
          @endfor

          @if ($halfStar)
          <svg class="w-8 h-8 text-yellow-400 cursor-pointer" wire:click="$set('userRating', 0.5)"
            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <defs>
              <linearGradient id="halfGrad">
                <stop offset="50%" stop-color="currentColor" />
                <stop offset="50%" stop-color="#E5E7EB" />
              </linearGradient>
            </defs>
            <path fill="url(#halfGrad)"
              d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
          </svg>
          @endif
        </div>

        <textarea wire:model.defer="review" rows="3" class="w-full border rounded p-3 mb-3 focus:outline-primary"
          placeholder="Tulis ulasanmu di sini..."></textarea>

        <button wire:click="submitReview"
          class="bg-primary hover:bg-primaryDark text-white px-4 py-2 rounded font-semibold">
          Kirim Review
        </button>
        @else
        <a href="{{ route('login') }}"
          class="inline-block bg-gray-100 hover:bg-gray-200 px-4 py-2 rounded-full font-semibold text-gray-700">
          Login untuk memberi rating
        </a>
        @endauth

        {{-- Daftar Review --}}
        @if ($product->product_ratings->count() > 0)
        <div class="mt-8">
          <h4 class="text-lg font-semibold mb-4">Ulasan Pengguna</h4>
          <div class="space-y-4">
            @foreach ($product->product_ratings as $rating)
            <div class="border rounded-lg p-4 bg-gray-50">
              <div class="flex items-center justify-between">
                <div class="text-sm font-semibold text-gray-700">{{ $rating->user->name }}</div>
                <div class="flex">
                  @for ($i = 1; $i <= 5; $i++) <svg
                    class="w-4 h-4 {{ $i <= $rating->rating ? 'text-yellow-400' : 'text-gray-300' }}" fill="currentColor"
                    viewBox="0 0 20 20">
                    <path
                      d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.27 3.9a1 1 0 00.95.69h4.1c.969 0 1.371 1.24.588 1.81l-3.32 2.41a1 1 0 00-.364 1.118l1.27 3.9c.3.921-.755 1.688-1.54 1.118l-3.32-2.41a1 1 0 00-1.176 0l-3.32 2.41c-.784.57-1.838-.197-1.54-1.118l1.27-3.9a1 1 0 00-.364-1.118l-3.32-2.41c-.783-.57-.38-1.81.588-1.81h4.1a1 1 0 00.95-.69l1.27-3.9z" />
                    </svg>
                    @endfor
                </div>
              </div>
              @if ($rating->review)
              <p class="text-gray-600 mt-2">{{ $rating->review }}</p>
              @endif
            </div>
            @endforeach
          </div>
        </div>
        @endif
      </div>

      {{-- Related Products --}}
      <section class="bg-gray-50 py-16 mt-16">
        <div class="max-w-6xl mx-auto px-4">
          <h3 class="text-3xl font-bold text-center text-third mb-12">Produk Terkait</h3>
          @if(isset($relatedProducts) && $relatedProducts->count() > 0)
          <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($relatedProducts as $related)
            <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition">
              <img
                src="{{ $related->images && count($related->images) > 0 ? asset('storage/' . $related->images[0]) : asset('assets/images/crab.jpg') }}"
                alt="Related Product" class="h-48 w-full object-cover">
              <div class="p-6">
                <span class="text-xs text-primary font-semibold">{{ $related->category }}</span>
                <h4 class="font-bold text-lg mt-2 mb-3 text-third">{{ $related->name }}</h4>
                <p class="text-gray-600 text-sm mb-4">{{ Str::limit(strip_tags($related->description), 100, '...') }}</p>
                <a href="{{ route('products.show', $related->slug) }}"
                  class="text-primary font-semibold hover:text-primaryLight transition">Lihat Produk →</a>
              </div>
            </div>
            @endforeach
          </div>
          @else
          <div class="text-center py-16">
            <svg class="mx-auto h-16 w-16 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                d="M9 12h6m-3-3v6m-6-9h12a2 2 0 012 2v10a2 2 0 01-2 2H6a2 2 0 01-2-2V5a2 2 0 012-2z" />
            </svg>
            <h3 class="text-lg font-medium text-gray-900 mb-2">Tidak ada produk terkait ditemukan</h3>
            <p class="text-gray-500">Belum ada produk lain yang relevan.</p>
          </div>
          @endif
        </div>
      </section>
    </div>

    {{-- Tombol Kembali --}}
    <nav class="mt-10 mb-8">
      <div class="max-w-6xl mx-auto px-4">
        <a href="{{ route('products') }}"
           class="inline-flex items-center gap-2 bg-third text-white px-5 py-2.5 rounded-full font-medium shadow hover:bg-third/90
                  focus:outline-none focus:ring-2 focus:ring-third/40 focus:ring-offset-2 active:scale-[.97] transition
                  w-fit">
          <svg class="w-4 h-4 -ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M15 19l-7-7 7-7"></path>
          </svg>
          <span>Kembali ke Semua Produk</span>
        </a>
      </div>
    </nav>

    {{-- Alpine.js Images Array --}}
    <script>
    document.addEventListener('alpine:init', () => {
      Alpine.data('productGallery', () => ({
        images: @json($product->images),
        activeImage: 0
      }))
    })
    </script>
  </div>


</div>