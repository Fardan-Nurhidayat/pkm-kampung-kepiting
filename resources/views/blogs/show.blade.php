@extends('layouts.guest')
@section('title', $blog->title)
@section('content')
<div class="h-16"></div>

{{-- Hero Section with Image --}}
<section class="relative">
  <div class="h-96 md:h-[500px] overflow-hidden">
    <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}" class="w-full h-full object-cover">
    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent"></div>
  </div>

  {{-- Blog Title Overlay --}}
  <div class="absolute bottom-0 left-0 right-0 p-8">
    <div class="max-w-4xl mx-auto">
      <span class="inline-block bg-primary text-white text-sm px-4 py-2 rounded-full font-semibold mb-4">
        {{ $blog->category }}
      </span>
      <h1 class="text-4xl md:text-5xl font-extrabold text-white mb-4 leading-tight drop-shadow-lg">
        {{ $blog->title }}
      </h1>
    </div>
  </div>
</section>

{{-- Blog Content --}}
<section class="max-w-4xl mx-auto px-4 py-12">
  {{-- Author & Date Info --}}
  <div class="flex items-center justify-between mb-8 pb-8 border-b border-gray-200">
    <div class="flex items-center gap-4">
      <img src="{{ $blog->author->profile_photo_url }}" alt="{{ $blog->author->name }}"
        class="w-14 h-14 rounded-full border-2 border-primary">
      <div>
        <h3 class="font-semibold text-lg text-third">{{ $blog->author->name }}</h3>
        <p class="text-gray-500 text-sm">Penulis</p>
      </div>
    </div>
    <div class="text-right">
      <p class="text-gray-600 font-medium">
        {{ \Carbon\Carbon::parse($blog->published_at)->translatedFormat('d F Y') }}
      </p>
      <p class="text-gray-400 text-sm">
        {{ \Carbon\Carbon::parse($blog->published_at)->translatedFormat('H:i') }} WIB
      </p>
    </div>
  </div>

  {{-- Blog Content --}}
  <div class="prose prose-lg max-w-none">
    <div class="text-gray-700 leading-relaxed text-justify">
      {!! $blog->content !!}
    </div>
  </div>

  <div class="mt-8 pt-6 border-t border-gray-200">
    <div class="flex items-center justify-between">
      <div class="flex items-center gap-4">
        @auth
        <button onclick="toggleLike({{ $blog->id }})"
          id="like-btn-{{ $blog->id }}"
          class="flex items-center gap-2 px-4 py-2 rounded-full font-semibold transition-all
                               {{ $blog->isLikedByUser() ? 'bg-primary text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
            <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />
          </svg>
          <span id="like-text-{{ $blog->id }}">
            {{ $blog->isLikedByUser() ? 'Menyukai' : 'Sukai' }}
          </span>
        </button>
        @else
        <a href="{{ route('login') }}"
          class="flex items-center gap-2 px-4 py-2 rounded-full font-semibold bg-gray-100 text-gray-700 hover:bg-gray-200 transition-all">
          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
            <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />
          </svg>
          Login to Like
        </a>
        @endauth
      </div>

      <div class="text-gray-600">
        <span id="likes-count-{{ $blog->id }}">{{ $blog->likes_count }}</span>
        {{ Str::plural('like', $blog->likes_count) }}
      </div>
    </div>
  </div>
  {{-- Share Section --}}
  <div class="mt-12 pt-8 border-t border-gray-200">
    <h3 class="text-xl font-semibold text-third mb-4">Bagikan Artikel Ini</h3>
    <div class="flex gap-3">
      <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" target="_blank"
        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-full font-medium transition-all flex items-center gap-2">
        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
          <path
            d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
        </svg>
        Facebook
      </a>
      <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($blog->title) }}"
        target="_blank"
        class="bg-sky-500 hover:bg-sky-600 text-white px-4 py-2 rounded-full font-medium transition-all flex items-center gap-2">
        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
          <path
            d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" />
        </svg>
        Twitter
      </a>
      <a href="https://wa.me/?text={{ urlencode($blog->title . ' - ' . request()->url()) }}" target="_blank"
        class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-full font-medium transition-all flex items-center gap-2">
        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
          <path
            d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488" />
        </svg>
        WhatsApp
      </a>
    </div>
  </div>
</section>

{{-- Related Articles --}}
<section class="bg-gray-50 py-16">
  <div class="max-w-6xl mx-auto px-4">
    <h3 class="text-3xl font-bold text-center text-third mb-12">Artikel Terkait</h3>
    @if($relatedBlogs->count() > 0)
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
      @foreach($relatedBlogs as $relatedBlog)
      <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition">
        <img src="{{ asset('storage/' . $relatedBlog->image) }}" alt="Related Article" class="h-48 w-full object-cover">
        <div class="p-6">
          <span class="text-xs text-primary font-semibold">{{$relatedBlog->category}}</span>
          <h4 class="font-bold text-lg mt-2 mb-3 text-third">{{$relatedBlog->title}}</h4>
          <p class="text-gray-600 text-sm mb-4">{{ Str::limit(strip_tags($relatedBlog->content), 100, '...') }}</p>
          <a href="{{route('blogs.show', $relatedBlog->slug)}}"
            class="text-primary font-semibold hover:text-primaryLight transition">Baca Selengkapnya →</a>
        </div>
      </div>
      @endforeach
    </div>
    @else
    <div class="text-center py-16">
      <svg class="mx-auto h-16 w-16 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 12h6m-3-3v6m-6-9h12a2 2 0 012 2v10a2 2 0 01-2 2H6a2 2 0 01-2-2V5a2 2 0 012-2z" />
      </svg>
      <h3 class="text-lg font-medium text-gray-900 mb-2">Tidak ada artikel terkait ditemukan</h3>
      <p class="text-gray-500">Belum ada artikel lain dalam kategori yang sama.</p>
    </div>
    @endif
  </div>
</section>

{{-- Back to Blog List --}}
<section class="py-8">
  <div class="max-w-4xl mx-auto px-4 text-center">
    <a href="{{ route('blogs.index') }}"
      class="inline-flex items-center gap-2 bg-third hover:bg-opacity-90 text-white px-6 py-3 rounded-full font-semibold transition-all">
      <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
      </svg>
      Kembali ke Semua Artikel
    </a>
  </div>
</section>
<script>
  function toggleLike(blogId) {
    fetch(`/blogs/${blogId}/like`, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
      })
      .then(response => response.json())
      .then(data => {
        const btn = document.getElementById(`like-btn-${blogId}`);
        const text = document.getElementById(`like-text-${blogId}`);
        const count = document.getElementById(`likes-count-${blogId}`);

        if (data.liked) {
          btn.className = 'flex items-center gap-2 px-4 py-2 rounded-full font-semibold bg-primary text-white transition-all';
          text.textContent = 'Disukai';
        } else {
          btn.className = 'flex items-center gap-2 px-4 py-2 rounded-full font-semibold bg-gray-100 text-gray-700 hover:bg-gray-200 transition-all';
          text.textContent = 'Sukai';
        }

        count.textContent = data.likes_count;
      })
      .catch(error => console.error('Error:', error));
  }
</script>
@endsection