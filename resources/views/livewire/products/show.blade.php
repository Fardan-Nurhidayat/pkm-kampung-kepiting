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
                <img :src="'{{ asset('storage') }}/' + images[activeImage]"
                    alt="{{ $product->name }}"
                    class="w-full h-96 object-cover transition-all duration-300">
            </div>

            {{-- Thumbnails --}}
            <div class="flex gap-2 mt-4 overflow-x-auto pb-2">
                <template x-for="(image, index) in images" :key="index">
                    <img :src="'{{ asset('storage') }}/' + image"
                        :alt="'Thumb ' + index"
                        class="w-20 h-20 object-cover rounded border cursor-pointer hover:opacity-80 transition"
                        :class="{ 'ring-2 ring-primary': activeImage === index }"
                        @click="activeImage = index">
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
                        @for ($i = 0; $i < $fullStars; $i++)
                            <svg class="w-5 h-5 text-yellow-400 fill-current" viewBox="0 0 24 24">
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
                                <path fill="url(#halfGrad)" d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
                            </svg>
                            @endif

                            @for ($i = 0; $i < $emptyStars; $i++)
                                <svg class="w-5 h-5 text-gray-300 fill-current" viewBox="0 0 24 24">
                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
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
                    <a href="{{'https://wa.me/'. $product->user->no_hp . '?text=Saya Ingin memesan ' . $product->name}}" target="_blank" class="bg-primary text-white px-6 py-3 rounded-lg hover:bg-primaryDark">Beli Sekarang</a>
                </div>
            </div>
        </div>

        {{-- Bagian Rating & Review --}}
        <div class="mt-12 border-t pt-6">
            <h3 class="text-xl font-semibold mb-3">Beri Penilaian</h3>

            @auth
                <div class="flex items-center space-x-1 mb-3">
                    @for ($i = 1; $i <= 5; $i++)
                        <svg wire:click="$set('userRating', {{ $i }})"
                            class="w-8 h-8 cursor-pointer transition-colors {{ $i <= $userRating ? 'text-yellow-400' : 'text-gray-300' }}"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.27 3.9a1 1 0 00.95.69h4.1c.969 0 1.371 1.24.588 1.81l-3.32 2.41a1 1 0 00-.364 1.118l1.27 3.9c.3.921-.755 1.688-1.54 1.118l-3.32-2.41a1 1 0 00-1.176 0l-3.32 2.41c-.784.57-1.838-.197-1.54-1.118l1.27-3.9a1 1 0 00-.364-1.118l-3.32-2.41c-.783-.57-.38-1.81.588-1.81h4.1a1 1 0 00.95-.69l1.27-3.9z" />
                        </svg>
                    @endfor
                </div>

                <textarea wire:model.defer="review" rows="3"
                    class="w-full border rounded p-3 mb-3 focus:outline-primary"
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
                                        @for ($i = 1; $i <= 5; $i++)
                                            <svg class="w-4 h-4 {{ $i <= $rating->rating ? 'text-yellow-400' : 'text-gray-300' }}"
                                                fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.27 3.9a1 1 0 00.95.69h4.1c.969 0 1.371 1.24.588 1.81l-3.32 2.41a1 1 0 00-.364 1.118l1.27 3.9c.3.921-.755 1.688-1.54 1.118l-3.32-2.41a1 1 0 00-1.176 0l-3.32 2.41c-.784.57-1.838-.197-1.54-1.118l1.27-3.9a1 1 0 00-.364-1.118l-3.32-2.41c-.783-.57-.38-1.81.588-1.81h4.1a1 1 0 00.95-.69l1.27-3.9z" />
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
                            <img src="{{ $related->images && count($related->images) > 0 ? asset('storage/' . $related->images[0]) : asset('assets/images/crab.jpg') }}" alt="Related Product" class="h-48 w-full object-cover">
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
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 12h6m-3-3v6m-6-9h12a2 2 0 012 2v10a2 2 0 01-2 2H6a2 2 0 01-2-2V5a2 2 0 012-2z" />
                        </svg>
                        <h3 class="text-lg font-medium text-gray-900 mb-2">Tidak ada produk terkait ditemukan</h3>
                        <p class="text-gray-500">Belum ada produk lain yang relevan.</p>
                    </div>
                @endif
            </div>
        </section>

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




    {{-- Hero Section with Image --}}
    {{-- <section class="relative">
        <div class="h-96 md:h-[500px] overflow-hidden">
            <img src="{{ $product->image ? asset('storage/' . $product->image) : asset('assets/images/crab.jpg') }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent"></div>
        </div>

        {{-- product Title Overlay
        <div class="absolute bottom-0 left-0 right-0 p-8">
            <div class="max-w-4xl mx-auto">
            <span class="inline-block bg-primary text-white text-sm px-4 py-2 rounded-full font-semibold mb-4">
                {{ $product->category }}
            </span>
            <h1 class="text-4xl md:text-5xl font-extrabold text-white mb-4 leading-tight drop-shadow-lg">
                {{ $product->name }}
            </h1>
            </div>
        </div>
    </section> --}}

    {{-- product Content --}}
    {{-- <section class="max-w-4xl mx-auto px-4 py-12">
        {{-- product Content 
        <div class="prose prose-lg max-w-none">
            <div class="text-gray-700 leading-relaxed text-justify">
            {!! $product->description !!}
            </div>
        </div>

        <div class="mt-8 pt-6 border-t border-gray-200">
            <div class="flex items-center justify-between">
            <div class="flex items-center gap-4">
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

            </div>

            <div class="text-gray-600">
                <span id="likes-count-{{ $product->id }}">{{ $product->likes_count }}</span>
                {{ Str::plural('like', $product->likes_count) }}
            </div>
            </div>
        </div>

        {{-- Rating dan Review 
        <div class="mt-8 border-t pt-6">
            <h3 class="text-xl font-semibold mb-2 text-third">Beri Penilaian</h3>
            
            @auth
                <div class="flex items-center space-x-1 mb-3">
                    @for ($i = 1; $i <= 5; $i++)
                        <svg wire:click="$set('userRating', {{ $i }})"
                            class="w-8 h-8 cursor-pointer transition-colors {{ $i <= $userRating ? 'text-yellow-400' : 'text-gray-300' }}"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.27 3.9a1 1 0 00.95.69h4.1c.969 0 1.371 1.24.588 1.81l-3.32 2.41a1 1 0 00-.364 1.118l1.27 3.9c.3.921-.755 1.688-1.54 1.118l-3.32-2.41a1 1 0 00-1.176 0l-3.32 2.41c-.784.57-1.838-.197-1.54-1.118l1.27-3.9a1 1 0 00-.364-1.118l-3.32-2.41c-.783-.57-.38-1.81.588-1.81h4.1a1 1 0 00.95-.69l1.27-3.9z" />
                        </svg>
                    @endfor
                </div>

                <textarea wire:model.defer="review" rows="3"
                    class="w-full border rounded p-3 mb-3 focus:outline-primary"
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
        </div>

        @if ($product->product_ratings->count() > 0)
            <div class="mt-10">
                <h4 class="text-lg font-semibold text-third mb-4">Ulasan Pengguna</h4>
                <div class="space-y-4">
                    @foreach ($product->product_ratings as $rating)
                        <div class="border rounded-lg p-4 bg-gray-50">
                            <div class="flex items-center justify-between">
                                <div class="text-sm font-semibold text-gray-700">{{ $rating->user->name }}</div>
                                <div class="flex">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <svg class="w-4 h-4 {{ $i <= $rating->rating ? 'text-yellow-400' : 'text-gray-300' }}"
                                            fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.27 3.9a1 1 0 00.95.69h4.1c.969 0 1.371 1.24.588 1.81l-3.32 2.41a1 1 0 00-.364 1.118l1.27 3.9c.3.921-.755 1.688-1.54 1.118l-3.32-2.41a1 1 0 00-1.176 0l-3.32 2.41c-.784.57-1.838-.197-1.54-1.118l1.27-3.9a1 1 0 00-.364-1.118l-3.32-2.41c-.783-.57-.38-1.81.588-1.81h4.1a1 1 0 00.95-.69l1.27-3.9z" />
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

        {{-- Share Section 
        <div class="mt-12 pt-8 border-t border-gray-200">
            <h3 class="text-xl font-semibold text-third mb-4">Bagikan Produk Ini</h3>
            <div class="flex gap-3">
            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" target="_blank"
                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-full font-medium transition-all flex items-center gap-2">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                <path
                    d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                </svg>
                Facebook
            </a>
            <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($product->title) }}"
                target="_blank"
                class="bg-sky-500 hover:bg-sky-600 text-white px-4 py-2 rounded-full font-medium transition-all flex items-center gap-2">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                <path
                    d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" />
                </svg>
                Twitter
            </a>
            <a href="https://wa.me/?text={{ urlencode($product->title . ' - ' . request()->url()) }}" target="_blank"
                class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-full font-medium transition-all flex items-center gap-2">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                <path
                    d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488" />
                </svg>
                WhatsApp
            </a>
            </div>
        </div>
    </section> --}}

    {{-- Back to product List --}}
    {{-- <section class="py-8">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <a href="{{ route('products') }}"
            class="inline-flex items-center gap-2 bg-third hover:bg-opacity-90 text-white px-6 py-3 rounded-full font-semibold transition-all">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
            Kembali ke Semua Produk
            </a>
        </div>
    </section> --}}
    
</div>