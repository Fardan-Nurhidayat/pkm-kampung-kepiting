<div>
    <div class="h-16"></div>
    <section class="max-w-screen-2xl mx-auto px-4 py-16">
        <h1 class="text-4xl font-extrabold text-center mb-10 text-primary drop-shadow-lg">Silahkan Lihat Produk Kami</h1>

        <!-- Search and Filter Section -->
        <div class="bg-white rounded-2xl shadow-lg p-6 mb-8">
            <div class="flex flex-col lg:flex-row gap-4 items-center">
                <!-- Search Bar -->
                <div class="flex-1 w-full">
                    <div class="relative">
                        <input wire:model.live="searchInput" type="text" id="searchInput" placeholder="Cari produk favorit Anda..."
                            class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-full focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all">
                        <svg class="absolute left-4 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                </div>

                <!-- Category Filter -->
                <div class="w-full lg:w-auto">
                    <select wire:model.live="categoryFilter" id="categoryFilter" class="w-full lg:w-48 px-4 py-3 border border-gray-300 rounded-full focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all">
                        <option value="">Semua Kategori</option>
                        <option value="makanan">Makanan</option>
                        <option value="snack">Snack</option>
                        <option value="souvenir">Souvenir</option>
                        <option value="baju">Baju</option>
                        <option value="minuman">Minuman</option>
                    </select>
                </div>

                <!-- Price Filter -->
                <div class="w-full lg:w-auto">
                    <select wire:model.live="priceFilter" id="priceFilter" class="w-full lg:w-48 px-4 py-3 border border-gray-300 rounded-full focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all">
                        <option value="">Semua Harga</option>
                        <option value="0-50000">Di bawah Rp 50.000</option>
                        <option value="50000-100000">Rp 50.000 - Rp 100.000</option>
                        <option value="100000-200000">Rp 100.000 - Rp 200.000</option>
                        <option value="200000-999999">Di atas Rp 200.000</option>
                    </select>
                </div>

                <!-- Sort Filter -->
                <div class="w-full lg:w-auto">
                    <select wire:model.live="sortFilter" id="sortFilter" class="w-full lg:w-48 px-4 py-3 border border-gray-300 rounded-full focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all">
                        <option value="">Urutkan</option>
                        <option value="name-asc">Nama A-Z</option>
                        <option value="name-desc">Nama Z-A</option>
                        <option value="price-asc">Harga Terendah</option>
                        <option value="price-desc">Harga Tertinggi</option>
                        <option value="rating-desc">Rating Tertinggi</option>
                        <option value="newest">Terbaru</option>
                    </select>
                </div>

                <!-- Clear Filters Button -->
                <button wire:click="clearFilters" id="clearFilters" class="w-full lg:w-auto bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-full font-semibold transition-all">
                    Reset Filter
                </button>
            </div>
        </div>

        <div id="productsGrid" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            <!-- Sample Product 1 -->
            @forelse ($products as $product)
            @php
            $userHasLiked = $product->product_likes->contains('user_id', auth()->id());
            $avgRating = $product->product_ratings->avg('rating');
            $fullStars = floor($avgRating);
            $halfStar = $avgRating - $fullStars >= 0.5;
            $emptyStars = 5 - $fullStars - ($halfStar ? 1 : 0);
            $price = 'Rp ' . number_format($product->price, 0, ',', '.');
            @endphp
            <div class="product-card bg-white shadow-lg hover:shadow-2xl transition flex flex-col hover:scale-105" wire:key="product-{{ $product->id }}"
                data-category="{{ $product->category }}" data-price="{{ $product->price }}" data-name="{{ $product->name }}" data-rating="{{ $avgRating }}">
                <div class="relative">
                    <span class="absolute top-3 left-3 z-10 bg-green-100 text-green-700 text-xs font-bold px-3 py-1 rounded-full shadow-sm">
                        Stok: {{ $product->stock }}
                    </span>
                    <img src="{{ $product->images ? asset('storage/' . $product->images[0]) : asset('assets/images/crab.jpg') }}"
                        class="h-56 w-full object-cover transition-transform duration-300 rounded-t-lg">
                    <!-- Like Button -->
                    @auth
                    <button wire:click="toggleLike({{ $product->id }})"
                        class="absolute top-3 right-3 p-2 rounded-full shadow-md transition-all
                                        {{ $userHasLiked ? 'bg-red-100 text-red-500' : 'bg-white hover:bg-red-50 text-gray-400' }}">
                        <svg class="w-5 h-5" fill="{{ $userHasLiked ? 'currentColor' : 'none' }}"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                    </button>

                    @else
                    <a href="{{ route('login') }}" class="flex items-center gap-2 like-btn absolute top-3 right-3 bg-gray-100 text-gray-700 hover:bg-gray-200 p-2 rounded-full shadow-md transition-all group">
                        <svg class="w-5 h-5 transition-colors like-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                        <span class="text-sm font-semibold">Login to like</span>
                    </a>
                    @endauth
                </div>
                <div class="p-5 flex-1 flex flex-col">
                    <h2 class="font-bold text-xl mb-2 text-third">{{ $product->name }}</h2>
                    <span class="text-xs text-gray-500 mb-2 block">Penjual: {{ $product->user->name }}</span>
                    <span class="bg-primary text-white w-fit px-3 py-1 rounded-full text-xs mb-2 inline-block">
                        {{ $product->category }}
                    </span>

                    <!-- Rating Stars -->
                    <div class="flex items-center mb-3">
                        <div class="flex space-x-1 rating-stars">
                            @for ($i = 0; $i < $fullStars; $i++)
                                <svg class="w-4 h-4 text-yellow-400 fill-current" viewBox="0 0 24 24">
                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
                                </svg>
                                @endfor

                                @if ($halfStar)
                                <svg class="w-4 h-4 text-yellow-400 fill-current" viewBox="0 0 24 24">
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
                                    <svg class="w-4 h-4 text-gray-300 fill-current" viewBox="0 0 24 24">
                                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
                                    </svg>
                                    @endfor
                        </div>
                        <span class="text-sm text-gray-500 ml-2">({{ number_format($avgRating, 1) }})</span>
                    </div>

                    <p class="text-gray-400 mb-4 flex-1">{{ $product->excerpt }}</p>
                    <div class="flex items-center justify-between mt-auto">
                        <span class="text-lg font-bold text-primary">{{ $price }}</span>
                    </div>
                    <div class="flex w-full justify-between gap-2">
                        <a href="{{'https://wa.me/' . $product->user->no_hp . '?text=saya ingin memesan ' . $product->name}}" target="_blank" class="w-full text-center bg-primary hover:bg-primaryLight text-white text-sm px-4 py-2 rounded-md font-semibold shadow transition-all">Pesan</=>
                        <a href="{{ route('products.show', $product->slug) }}" class="w-full text-center bg-secondary hover:bg-secondary/10 text-primary text-sm px-4 py-2 rounded-md font-semibold shadow transition-all">Detail</a>
                    </div>
                </div>
            </div>
            @empty
            <!-- No Results Message -->
            <div id="noResults" class="hidden text-center py-16">
                <div class="max-w-md mx-auto">
                    <svg class="mx-auto h-24 w-24 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9.172 16.172a4 4 0 015.656 0M9 12h6m-6 4h6m-3-16v3m-4 2l1.5 1.5M7 12h3m6-6v3m-1.5-1.5L16 9" />
                    </svg>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">Tidak ada produk ditemukan</h3>
                    <p class="text-gray-500">Coba ubah filter pencarian atau kata kunci Anda.</p>
                </div>
            </div>
            @endforelse
        </div>
    </section>
</div>