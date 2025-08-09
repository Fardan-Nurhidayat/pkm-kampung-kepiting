<nav class="w-full bg-white shadow fixed top-0 left-0 z-50">
  <div class="max-w-6xl mx-auto px-4 flex justify-between items-center h-16">
    <div class="font-bold text-xl text-red-600 flex items-center gap-2">
      <span class="text-2xl">🦀</span> Kampoeng Kepiting Kutawaru
    </div>

    <div class="flex items-center space-x-8">
      <ul class="flex space-x-8 font-semibold">
        <li><a href="{{ route('home') }}" class="hover:text-primaryLight transition">Home</a></li>
        <li><a href="{{ route('products') }}" class="hover:text-primaryLight transition">Produk</a></li>
        <li><a href="{{ route('blogs.index') }}" class="hover:text-primaryLight transition">Blog</a></li>
      </ul>

      @if(auth()->check())
      <div class="relative" x-data="{ open: false }" @click.outside="open = false">
        <button @click="open = !open" class="flex items-center gap-2 hover:bg-gray-50 p-2 rounded-lg transition">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
          </svg>
          <span class="font-medium">{{ auth()->user()->name }}</span>
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 transition-transform" :class="{ 'rotate-180': open }">
            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
          </svg>
        </button>

        <!-- Dropdown Modal -->
        <div x-show="open"
          x-transition:enter="transition ease-out duration-200"
          x-transition:enter-start="opacity-0 scale-95"
          x-transition:enter-end="opacity-100 scale-100"
          x-transition:leave="transition ease-in duration-150"
          x-transition:leave-start="opacity-100 scale-100"
          x-transition:leave-end="opacity-0 scale-95"
          class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border z-10">
          <div class="py-2">
            <div class="px-4 py-2 text-sm text-gray-500 border-b">
              Masuk sebagai <strong>{{ auth()->user()->name }}</strong>
            </div>
            @if(auth()->user()->getRoleNames() != 'user')
            <a href="/admin" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition">
              <div class="flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275Z" />
                </svg>
                Admin Dashboard
              </div>
            </a>
            @endif
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50 transition">
                <div class="flex items-center gap-2">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9" />
                  </svg>
                  Logout
                </div>
              </button>
            </form>
          </div>
        </div>
      </div>
      @else
      <div class="flex items-center space-x-4">
        <a href="{{ route('login') }}" class="hover:text-primaryLight transition font-medium">Login</a>
        <a href="{{ route('register') }}" class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition font-medium">Register</a>
      </div>
      @endif
    </div>
  </div>
</nav>