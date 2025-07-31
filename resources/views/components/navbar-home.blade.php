<nav class="w-full bg-white shadow fixed top-0 left-0 z-50">
  <div class="max-w-6xl mx-auto px-4 flex justify-between items-center h-16">
    <div class="font-bold text-xl text-red-600 flex items-center gap-2">
      <span class="text-2xl">🦀</span> Kampung Kepiting Kutawaru
    </div>
    <ul class="flex space-x-8 font-semibold">
      <li><a href="{{ route('home') }}" class="hover:text-primaryLight transition">Home</a></li>
      <li><a href="{{ route('products') }}" class="hover:text-primaryLight transition">Produk</a></li>
      <li><a href="{{ route('blogs.index') }}" class="hover:text-primaryLight transition">Blog</a></li>
    </ul>
  </div>
</nav>