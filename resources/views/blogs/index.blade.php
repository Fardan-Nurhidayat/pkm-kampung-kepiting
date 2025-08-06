<x-guest>
  @section('title', 'Kegiatan Kami')
  <div class="h-16"></div>
  <section class="max-w-screen-2xl mx-auto px-4 py-16">
    <h1 class="text-4xl font-extrabold text-center mb-10 text-primary drop-shadow-lg">Silahkan Lihat Kegiatan Kami</h1>
    <div class="bg-white rounded-2xl shadow-lg p-6 mb-10">
      <div class="flex flex-col md:flex-row gap-4 items-center">
        {{-- Search Bar --}}
        <div class="flex-1 w-full">
          <div class="relative">
            <input type="text" id="searchBlogInput" placeholder="Cari artikel atau kegiatan..."
              class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-full focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all">
            <svg class="absolute left-4 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none"
              stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
            </svg>
          </div>
        </div>
        {{-- Category Filter --}}
        <div class="w-full md:w-auto">
          <select id="categoryBlogFilter"
            class="w-full md:w-48 px-4 py-3 border border-gray-300 rounded-full focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all">
            <option value="">Semua Kategori</option>
            <option value="tips">Tips</option>
            <option value="resep">Resep</option>
            <option value="wisata">Wisata</option>
            <option value="event">Event</option>
          </select>
        </div>
        {{-- Sort Filter --}}
        <div class="w-full md:w-auto">
          <select id="sortBlogFilter"
            class="w-full md:w-48 px-4 py-3 border border-gray-300 rounded-full focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all">
            <option value="">Urutkan</option>
            <option value="newest">Terbaru</option>
            <option value="oldest">Terlama</option>
            <option value="az">Judul A-Z</option>
            <option value="za">Judul Z-A</option>
          </select>
        </div>
        {{-- Clear Filters Button --}}
        <button id="clearBlogFilters"
          class="w-full md:w-auto bg-third hover:bg-opacity-70 text-white px-6 py-3 rounded-full font-semibold transition-all">
          Reset Filter
        </button>
      </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
      @forelse($blogs as $blog)
      <div class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition flex flex-col overflow-hidden group">
        <div class="relative">
          <img src="{{asset('storage/' . $blog->image)}}"
            class="h-56 w-full object-cover group-hover:scale-105 transition-transform duration-300">
        </div>
        <div class="p-6 flex-1 flex flex-col">
          <span class="my-4 text-md text-primary font-semibold">{{$blog->category}}</span>
          <a href="{{ route('blogs.show', $blog->slug) }}"
            class="font-bold text-xl mb-2 text-third group-hover:text-primary transition-colors cursor-pointer">
            {{ $blog->title }}
          </a>
          <p class="text-gray-600 flex-1">{{ $blog->excerpt}}</p>
          <!-- Like Badge -->
          <div class="flex items-center gap-2 mb-4 mt-2">
            <div class="flex items-center gap-1 bg-primaryBg text-primary px-3 py-1 rounded-full text-sm font-medium">
              <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />
              </svg>
              <span>{{ $blog->likes_count }} {{ Str::plural('like', $blog->likes_count) }}</span>
            </div>
          </div>

          <div class="flex items-center justify-between mt-2">
            <div class="flex items-center gap-2">
              <img src="{{ $blog->author->profile_photo_url }}" alt="{{ $blog->author->name }}"
                class="w-14 h-14 rounded-full border-2 border-primary">
              <span class="text-sm text-gray-500">{{ $blog->author->name }}</span>
            </div>
            <span class="text-xs text-gray-400">{{ \Carbon\Carbon::parse($blog->published_at)->translatedFormat('d F Y') }}</span>
          </div>
        </div>
      </div>
      @empty
      <div class="col-span-1 md:col-span-2 lg:col-span-3 text-center py-16">
        <svg class="mx-auto h-24 w-24 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M9.172 16.172a4 4 0 015.656 0M9 12h6m-6 4h6m-3-16v3m-4 2l1.5 1.5M7 12h3m6-6v3m-1.5-1.5L16 9" />
        </svg>
        <h3 class="text-lg font-medium text-gray-900 mb-2">Tidak ada artikel ditemukan</h3>
        <p class="text-gray-500">Coba ubah filter pencarian atau kata kunci Anda.</p>
      </div>
      @endforelse
    </div>

    {{-- No Results Message --}}
    <div id="noResults" class="hidden text-center py-16">
      <div class="max-w-md mx-auto">
        <svg class="mx-auto h-24 w-24 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
            d="M9.172 16.172a4 4 0 015.656 0M9 12h6m-6 4h6m-3-16v3m-4 2l1.5 1.5M7 12h3m6-6v3m-1.5-1.5L16 9" />
        </svg>
        <h3 class="text-lg font-medium text-gray-900 mb-2">Tidak ada artikel ditemukan</h3>
        <p class="text-gray-500">Coba ubah filter pencarian atau kata kunci Anda.</p>
      </div>
    </div>
  </section>
</x-guest>