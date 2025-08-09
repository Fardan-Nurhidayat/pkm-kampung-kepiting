<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Blogs as BlogModel;
use App\Models\BlogsLikes;
use Livewire\WithPagination;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;

use WireUi\Traits\WireUiActions;

#[Title('Blogs')]
class Blogs extends Component
{
    use WireUiActions;
    use WithPagination;

    public $categories;

    #[Url(as: 'search')]
    public $searchQuery = '';

    #[Url(as: 'category')]
    public $selectedCategory = '';

    #[Url(as: 'sort')]
    public $sortBy = 'newest';

    public function mount()
    {
        $this->categories = BlogModel::select('category')
            ->distinct()
            ->pluck('category')
            ->toArray();
    }

    #[Computed(true, 600, false , 'blogs')]
    public function blogs()
    {
        $query = BlogModel::with(['author', 'likes']);

        // Apply search filter
        if ($this->searchQuery) {
            $query->where(function ($q) {
                $q->where('title', 'like', '%' . $this->searchQuery . '%')
                    ->orWhere('content', 'like', '%' . $this->searchQuery . '%')
                    ->orWhere('excerpt', 'like', '%' . $this->searchQuery . '%');
            });
        }

        // Apply category filter
        if ($this->selectedCategory) {
            $query->where('category', $this->selectedCategory);
        }

        // Apply sorting
        switch ($this->sortBy) {
            case 'newest':
                $query->orderBy('created_at', 'desc');
                break;
            case 'oldest':
                $query->orderBy('created_at', 'asc');
                break;
            case 'popular':
                $query->withCount('likes')->orderBy('likes_count', 'desc');
                break;
            case 'az':
                $query->orderBy('title', 'asc');
                break;
            case 'za':
                $query->orderBy('title', 'desc');
                break;
        }

        return $query->paginate(12);
    }

    public function clearFilters()
    {
        $this->reset(['searchQuery', 'selectedCategory', 'sortBy']);
        $this->resetPage();
    }

    // Hapus method search() karena sudah menggunakan computed property

    public function toggleLike($blogId)
    {
        if (!auth()->check()) {
            session()->flash('error', 'Please login first to like articles');
            return redirect()->route('login');
        }

        $userId = auth()->id();

        $existingLike = BlogsLikes::where('blog_id', $blogId)
            ->where('user_id', $userId)
            ->first();

        if ($existingLike) {
            $existingLike->delete();
            $this->dialog()->show([
                'title' => 'Blogs Tidak Disukai',
                'description' => 'Kamu telah membatalkan suka pada artikel ini.',
                'icon' => 'info',
            ]);
        } else {
            BlogsLikes::create([
                'blog_id' => $blogId,
                'user_id' => $userId
            ]);
            $this->dialog()->show([
                'title' => 'Blogs Disukai',
                'description' => 'Kamu telah menyukai artikel ini.',
                'icon' => 'success',
            ]);
        }
    }

    // Method untuk reset pagination saat filter berubah
    public function updatedSearchQuery()
    {
        $this->resetPage();
    }

    public function updatedSelectedCategory()
    {
        $this->resetPage();
    }

    public function updatedSortBy()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.blogs', [
            'blogs' => $this->blogs,
            'categories' => $this->categories,
        ]);
    }
}
