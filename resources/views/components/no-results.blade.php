<div class="col-span-1 md:col-span-2 lg:col-span-3 text-center py-16">
  <div class="max-w-md mx-auto">
    <svg class="mx-auto h-24 w-24 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
        d="M9.172 16.172a4 4 0 015.656 0M9 12h6m-6 4h6m-3-16v3m-4 2l1.5 1.5M7 12h3m6-6v3m-1.5-1.5L16 9" />
    </svg>
    <h3 class="text-lg font-medium text-gray-900 mb-2">{{ $message }}</h3>
    <p class="text-gray-500">{{ $description }}</p>

    @if(request()->has('search') || request()->has('category'))
    <div class="mt-4">
      <button onclick="window.location.href='{{ route('blogs.index') }}'"
        class="inline-flex items-center px-4 py-2 bg-primary hover:bg-opacity-80 text-white font-medium rounded-lg transition-all">
        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
        </svg>
        Reset Semua Filter
      </button>
    </div>
    @endif
  </div>
</div>