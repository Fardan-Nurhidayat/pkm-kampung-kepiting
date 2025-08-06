<div>
    <div class="h-16"></div>
    <section class="max-w-screen-2xl mx-auto px-4 py-16">
        <h1 class="text-4xl font-extrabold text-center mb-10 text-primary drop-shadow-lg">Silahkan Lihat Kegiatan Kami</h1>

        {{-- Search and Filter Section --}}
        <div class="bg-white rounded-2xl shadow-lg p-6 mb-10">
            <div class="flex flex-col md:flex-row gap-4 items-center">
                {{-- Search Bar --}}
                <div class="flex-1 w-full">
                    <div class="relative">
                        <input type="text" wire:model.live.debounce.300ms="searchQuery" placeholder="Cari artikel atau kegiatan..."
                            class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-full focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all">
                        <svg class="absolute left-4 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        {{-- Loading Indicator for Search --}}
                        <div wire:loading wire:target="searchQuery" class="absolute right-4 top-1/2 transform -translate-y-1/2">
                            <svg class="animate-spin h-5 w-5 text-primary" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor"
                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                </path>
                            </svg>
                        </div>
                    </div>
                </div>

                {{-- Category Filter --}}
                <div class="w-full md:w-auto">
                    <select wire:model.live="selectedCategory"
                        class="w-full md:w-48 px-4 py-3 border border-gray-300 rounded-full focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all">
                        <option value="">Semua Kategori</option>
                        @foreach($categories as $category)
                        <option value="{{ $category }}">
                            {{ ucfirst($category) }}
                        </option>
                        @endforeach
                    </select>
                </div>

                {{-- Sort Filter --}}
                <div class="w-full md:w-auto">
                    <select wire:model.live="sortBy"
                        class="w-full md:w-48 px-4 py-3 border border-gray-300 rounded-full focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all">
                        <option value="newest">Terbaru</option>
                        <option value="oldest">Terlama</option>
                        <option value="popular">Terpopuler</option>
                        <option value="az">Judul A-Z</option>
                        <option value="za">Judul Z-A</option>
                    </select>
                </div>

                {{-- Clear Filters Button --}}
                <button wire:click="clearFilters"
                    class="w-full md:w-auto bg-third hover:bg-opacity-70 text-white px-6 py-3 rounded-full font-semibold transition-all flex items-center justify-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                    </svg>
                    Reset Filter
                </button>
            </div>

            {{-- Active Filters Display --}}
            @if($searchQuery || $selectedCategory || $sortBy !== 'newest')
            <div class="mt-4 flex flex-wrap gap-2">
                <span class="text-sm text-gray-600">Filter aktif:</span>
                @if($searchQuery)
                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-primary text-white">
                    Pencarian: "{{ $searchQuery }}"
                    <button wire:click="$set('searchQuery', '')" class="ml-2 hover:text-gray-200">
                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </span>
                @endif
                @if($selectedCategory)
                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-secondary text-white">
                    Kategori: {{ ucfirst($selectedCategory) }}
                    <button wire:click="$set('selectedCategory', '')" class="ml-2 hover:text-gray-200">
                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </span>
                @endif
                @if($sortBy !== 'newest')
                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-third text-white">
                    Urutan:
                    {{ $sortBy === 'oldest' ? 'Terlama' : ($sortBy === 'popular' ? 'Terpopuler' : ($sortBy === 'az' ? 'A-Z' : 'Z-A')) }}
                    <button wire:click="$set('sortBy', 'newest')" class="ml-2 hover:text-gray-200">
                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </span>
                @endif
            </div>
            @endif
        </div>

        {{-- Results Count --}}
        <div class="mb-6">
            <p class="text-gray-600">
                Menampilkan {{ $blogs->count() }} dari {{ $blogs->total() }} artikel
                @if($searchQuery)
                untuk pencarian "<strong>{{ $searchQuery }}</strong>"
                @endif
                @if($selectedCategory)
                dalam kategori "<strong>{{ ucfirst($selectedCategory) }}</strong>"
                @endif
            </p>
        </div>

        {{-- Loading State --}}
        <div wire:loading.delay wire:target="searchQuery,selectedCategory,sortBy" class="w-full mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            @for($i = 0; $i < 6; $i++) 
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden animate-pulse mb-5">
                    <div class="h-56 bg-gray-300"></div>
                    <div class="p-6">
                        <div class="h-4 bg-gray-300 rounded mb-4"></div>
                        <div class="h-6 bg-gray-300 rounded mb-2"></div>
                        <div class="h-4 bg-gray-300 rounded mb-4"></div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <div class="w-14 h-14 bg-gray-300 rounded-full"></div>
                                <div class="h-4 bg-gray-300 rounded w-20"></div>
                            </div>
                            <div class="h-4 bg-gray-300 rounded w-16"></div>
                        </div>
                    </div>
                </div>
            @endfor
        </div>

{{-- Blog Grid --}}
<div wire:loading.remove wire:target="searchQuery,selectedCategory,sortBy"
    class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
    @forelse($blogs as $blog)
    <div wire:key="{{$blog->id}}"
        class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition flex flex-col overflow-hidden group">
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
            <p class="text-gray-600 flex-1">{!! $blog->excerpt !!}</p>

            {{-- Like Section --}}
            <div class="flex items-center justify-between mb-4 mt-2">
                <div class="flex items-center gap-2">
                    @auth
                    <button wire:click="toggleLike({{ $blog->id }})" wire:loading.attr="disabled"
                        class="flex items-center gap-1 px-3 py-1 rounded-full text-sm font-medium transition-all
                                               {{ $blog->isLikedByUser() ? 'bg-primary text-white' : 'bg-primaryBg text-primary hover:bg-primary hover:text-white' }}">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />
                        </svg>
                        <span wire:loading.remove wire:target="toggleLike({{ $blog->id }})">
                            {{ $blog->isLikedByUser() ? 'Menyukai' : 'Sukai' }}
                        </span>
                        <span wire:loading wire:target="toggleLike({{ $blog->id }})">
                            ...
                        </span>
                    </button>
                    @else
                    <a href="{{ route('login') }}"
                        class="flex items-center gap-1 bg-primaryBg text-primary px-3 py-1 rounded-full text-sm font-medium hover:bg-primary hover:text-white transition-all">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />
                        </svg>
                        Login to Like
                    </a>
                    @endauth
                </div>

                <div class="text-gray-500 text-sm">
                    {{ $blog->likes_count }} {{ Str::plural('like', $blog->likes_count) }}
                </div>
            </div>

            <div class="flex items-center justify-between mt-2">
                <div class="flex items-center gap-2">
                    <img src="{{ $blog->author->profile_photo_url }}" alt="{{ $blog->author->name }}"
                        class="w-14 h-14 rounded-full border-2 border-primary">
                    <span class="text-sm text-gray-500">{{ $blog->author->name }}</span>
                </div>
                <span
                    class="text-xs text-gray-400">{{ \Carbon\Carbon::parse($blog->published_at)->translatedFormat('d F Y') }}</span>
            </div>
        </div>
    </div>
    @empty
    <x-no-results
        :message="$searchQuery ? 'Tidak ada artikel yang sesuai dengan pencarian' : 'Belum ada artikel tersedia'"
        :description="$searchQuery ? 'Coba gunakan kata kunci yang berbeda atau kurangi filter yang digunakan.' : 'Silakan kembali lagi nanti untuk melihat artikel terbaru.'" />
    @endforelse
</div>

{{-- Pagination --}}
<div class="mt-8" wire:loading.remove wire:target="searchQuery,selectedCategory,sortBy">
    {{ $blogs->links() }}
</div>
</section>
</div>