@extends('layouts.guest')
@section('title', 'Produk Kami')
@section('content')
<div class="h-16"></div>
<section class="max-w-screen-2xl mx-auto px-4 py-16">
  <h1 class="text-4xl font-extrabold text-center mb-10 text-primary drop-shadow-lg">Silahkan Lihat Produk Kami</h1>

  <!-- Search and Filter Section -->
  <div class="bg-white rounded-2xl shadow-lg p-6 mb-8">
    <div class="flex flex-col lg:flex-row gap-4 items-center">
      <!-- Search Bar -->
      <div class="flex-1 w-full">
        <div class="relative">
          <input type="text" id="searchInput" placeholder="Cari produk favorit Anda..."
            class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-full focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all">
          <svg class="absolute left-4 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
          </svg>
        </div>
      </div>

      <!-- Category Filter -->
      <div class="w-full lg:w-auto">
        <select id="categoryFilter" class="w-full lg:w-48 px-4 py-3 border border-gray-300 rounded-full focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all">
          <option value="">Semua Kategori</option>
          <option value="seafood">Makanan</option>
          <option value="ayam">Snack</option>
          <option value="daging">Souvenir</option>
          <option value="vegetarian">Baju</option>
          <option value="minuman">Minuman</option>
        </select>
      </div>

      <!-- Price Filter -->
      <div class="w-full lg:w-auto">
        <select id="priceFilter" class="w-full lg:w-48 px-4 py-3 border border-gray-300 rounded-full focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all">
          <option value="">Semua Harga</option>
          <option value="0-50000">Di bawah Rp 50.000</option>
          <option value="50000-100000">Rp 50.000 - Rp 100.000</option>
          <option value="100000-200000">Rp 100.000 - Rp 200.000</option>
          <option value="200000-999999">Di atas Rp 200.000</option>
        </select>
      </div>

      <!-- Sort Filter -->
      <div class="w-full lg:w-auto">
        <select id="sortFilter" class="w-full lg:w-48 px-4 py-3 border border-gray-300 rounded-full focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all">
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
      <button id="clearFilters" class="w-full lg:w-auto bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-full font-semibold transition-all">
        Reset Filter
      </button>
    </div>
  </div>

  <!-- Products Grid -->
  <div id="productsGrid" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
    <!-- Sample Product 1 -->
    <div class="product-card bg-white rounded-2xl shadow-lg hover:shadow-2xl transition flex flex-col"
      data-category="seafood" data-price="85000" data-name="Kepiting Saus Padang" data-rating="4.5">
      <div class="relative">
        <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?auto=format&fit=crop&w=400&q=80"
          alt="Kepiting Saus Padang" class="rounded-t-2xl h-48 w-full object-cover">
        <!-- Like Button -->
        <button class="like-btn absolute top-3 right-3 bg-white hover:bg-red-50 p-2 rounded-full shadow-md transition-all group">
          <svg class="w-5 h-5 text-gray-400 group-hover:text-red-500 transition-colors like-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
          </svg>
        </button>
      </div>
      <div class="p-5 flex-1 flex flex-col">
        <h2 class="font-bold text-xl mb-2 text-third">Kepiting Saus Padang</h2>

        <!-- Rating Stars -->
        <div class="flex items-center mb-3">
          <div class="flex space-x-1 rating-stars" data-rating="4.5">
            <svg class="w-4 h-4 text-yellow-400 fill-current" viewBox="0 0 24 24">
              <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
            </svg>
            <svg class="w-4 h-4 text-yellow-400 fill-current" viewBox="0 0 24 24">
              <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
            </svg>
            <svg class="w-4 h-4 text-yellow-400 fill-current" viewBox="0 0 24 24">
              <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
            </svg>
            <svg class="w-4 h-4 text-yellow-400 fill-current" viewBox="0 0 24 24">
              <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
            </svg>
            <svg class="w-4 h-4 text-gray-300 fill-current" viewBox="0 0 24 24">
              <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
            </svg>
          </div>
          <span class="text-sm text-gray-500 ml-2">(4.5)</span>
        </div>

        <p class="text-gray-600 mb-4 flex-1">Kepiting segar dengan saus Padang khas, pedas gurih menggoda selera.</p>
        <div class="flex items-center justify-between mt-auto">
          <span class="text-lg font-bold text-primary">Rp 85.000</span>
          <div class="flex space-x-2">
            <button class="bg-primary hover:bg-primaryLight text-white text-sm px-4 py-2 rounded-full font-semibold shadow transition-all">Pesan</button>
            <button class="bg-secondary hover:bg-secondary/10 text-primary text-sm px-4 py-2 rounded-full font-semibold shadow transition-all">Detail</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Sample Product 2 -->
    <div class="product-card bg-white rounded-2xl shadow-lg hover:shadow-2xl transition flex flex-col"
      data-category="seafood" data-price="85000" data-name="Kepiting Saus Padang" data-rating="4.5">
      <div class="relative">
        <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?auto=format&fit=crop&w=400&q=80"
          alt="Kepiting Saus Padang" class="rounded-t-2xl h-48 w-full object-cover">
        <!-- Like Button -->
        <button class="like-btn absolute top-3 right-3 bg-white hover:bg-red-50 p-2 rounded-full shadow-md transition-all group">
          <svg class="w-5 h-5 text-gray-400 group-hover:text-red-500 transition-colors like-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
          </svg>
        </button>
      </div>
      <div class="p-5 flex-1 flex flex-col">
        <h2 class="font-bold text-xl mb-2 text-third">Kepiting Saus Padang</h2>

        <!-- Rating Stars -->
        <div class="flex items-center mb-3">
          <div class="flex space-x-1 rating-stars" data-rating="4.5">
            <svg class="w-4 h-4 text-yellow-400 fill-current" viewBox="0 0 24 24">
              <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
            </svg>
            <svg class="w-4 h-4 text-yellow-400 fill-current" viewBox="0 0 24 24">
              <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
            </svg>
            <svg class="w-4 h-4 text-yellow-400 fill-current" viewBox="0 0 24 24">
              <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
            </svg>
            <svg class="w-4 h-4 text-yellow-400 fill-current" viewBox="0 0 24 24">
              <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
            </svg>
            <svg class="w-4 h-4 text-gray-300 fill-current" viewBox="0 0 24 24">
              <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
            </svg>
          </div>
          <span class="text-sm text-gray-500 ml-2">(4.5)</span>
        </div>

        <p class="text-gray-600 mb-4 flex-1">Kepiting segar dengan saus Padang khas, pedas gurih menggoda selera.</p>
        <div class="flex items-center justify-between mt-auto">
          <span class="text-lg font-bold text-primary">Rp 85.000</span>
          <div class="flex space-x-2">
            <button class="bg-primary hover:bg-primaryLight text-white text-sm px-4 py-2 rounded-full font-semibold shadow transition-all">Pesan</button>
            <button class="bg-secondary hover:bg-secondary/10 text-primary text-sm px-4 py-2 rounded-full font-semibold shadow transition-all">Detail</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Sample Product 3 -->
    <div class="product-card bg-white rounded-2xl shadow-lg hover:shadow-2xl transition flex flex-col"
      data-category="seafood" data-price="85000" data-name="Kepiting Saus Padang" data-rating="4.5">
      <div class="relative">
        <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?auto=format&fit=crop&w=400&q=80"
          alt="Kepiting Saus Padang" class="rounded-t-2xl h-48 w-full object-cover">
        <!-- Like Button -->
        <button class="like-btn absolute top-3 right-3 bg-white hover:bg-red-50 p-2 rounded-full shadow-md transition-all group">
          <svg class="w-5 h-5 text-gray-400 group-hover:text-red-500 transition-colors like-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
          </svg>
        </button>
      </div>
      <div class="p-5 flex-1 flex flex-col">
        <h2 class="font-bold text-xl mb-2 text-third">Kepiting Saus Padang</h2>

        <!-- Rating Stars -->
        <div class="flex items-center mb-3">
          <div class="flex space-x-1 rating-stars" data-rating="4.5">
            <svg class="w-4 h-4 text-yellow-400 fill-current" viewBox="0 0 24 24">
              <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
            </svg>
            <svg class="w-4 h-4 text-yellow-400 fill-current" viewBox="0 0 24 24">
              <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
            </svg>
            <svg class="w-4 h-4 text-yellow-400 fill-current" viewBox="0 0 24 24">
              <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
            </svg>
            <svg class="w-4 h-4 text-yellow-400 fill-current" viewBox="0 0 24 24">
              <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
            </svg>
            <svg class="w-4 h-4 text-gray-300 fill-current" viewBox="0 0 24 24">
              <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
            </svg>
          </div>
          <span class="text-sm text-gray-500 ml-2">(4.5)</span>
        </div>

        <p class="text-gray-600 mb-4 flex-1">Kepiting segar dengan saus Padang khas, pedas gurih menggoda selera.</p>
        <div class="flex items-center justify-between mt-auto">
          <span class="text-lg font-bold text-primary">Rp 85.000</span>
          <div class="flex space-x-2">
            <button class="bg-primary hover:bg-primaryLight text-white text-sm px-4 py-2 rounded-full font-semibold shadow transition-all">Pesan</button>
            <button class="bg-secondary hover:bg-secondary/10 text-primary text-sm px-4 py-2 rounded-full font-semibold shadow transition-all">Detail</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Sample Product 4 -->
    <div class="product-card bg-white rounded-2xl shadow-lg hover:shadow-2xl transition flex flex-col"
      data-category="seafood" data-price="85000" data-name="Kepiting Saus Padang" data-rating="4.5">
      <div class="relative">
        <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?auto=format&fit=crop&w=400&q=80"
          alt="Kepiting Saus Padang" class="rounded-t-2xl h-48 w-full object-cover">
        <!-- Like Button -->
        <button class="like-btn absolute top-3 right-3 bg-white hover:bg-red-50 p-2 rounded-full shadow-md transition-all group">
          <svg class="w-5 h-5 text-gray-400 group-hover:text-red-500 transition-colors like-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
          </svg>
        </button>
      </div>
      <div class="p-5 flex-1 flex flex-col">
        <h2 class="font-bold text-xl mb-2 text-third">Kepiting Saus Padang</h2>

        <!-- Rating Stars -->
        <div class="flex items-center mb-3">
          <div class="flex space-x-1 rating-stars" data-rating="4.5">
            <svg class="w-4 h-4 text-yellow-400 fill-current" viewBox="0 0 24 24">
              <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
            </svg>
            <svg class="w-4 h-4 text-yellow-400 fill-current" viewBox="0 0 24 24">
              <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
            </svg>
            <svg class="w-4 h-4 text-yellow-400 fill-current" viewBox="0 0 24 24">
              <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
            </svg>
            <svg class="w-4 h-4 text-yellow-400 fill-current" viewBox="0 0 24 24">
              <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
            </svg>
            <svg class="w-4 h-4 text-gray-300 fill-current" viewBox="0 0 24 24">
              <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
            </svg>
          </div>
          <span class="text-sm text-gray-500 ml-2">(4.5)</span>
        </div>

        <p class="text-gray-600 mb-4 flex-1">Kepiting segar dengan saus Padang khas, pedas gurih menggoda selera.</p>
        <div class="flex items-center justify-between mt-auto">
          <span class="text-lg font-bold text-primary">Rp 85.000</span>
          <div class="flex space-x-2">
            <button class="bg-primary hover:bg-primaryLight text-white text-sm px-4 py-2 rounded-full font-semibold shadow transition-all">Pesan</button>
            <button class="bg-secondary hover:bg-secondary/10 text-primary text-sm px-4 py-2 rounded-full font-semibold shadow transition-all">Detail</button>
          </div>
        </div>
      </div>
    </div>
  </div>

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
</section>