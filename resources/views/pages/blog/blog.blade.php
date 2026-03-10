<?php

use Livewire\Component;
use App\Models\Post;
use App\Models\BlogCategory;
use Livewire\WithPagination;
use Livewire\Attributes\Title;

#[Title('Blog - Grevx Consulting')]
new class extends Component
{
    use WithPagination;

    public $search = '';
    public $selectedCategory = null;

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function selectCategory($categoryId)
    {
        $this->selectedCategory = $categoryId;
        $this->resetPage();
    }

    public function render()
    {
        $query = Post::query()
            ->where('is_active', true)
            ->with('category')
            ->latest();

        if ($this->search) {
            $query->where(function ($q) {
                $q->where('title', 'like', '%' . $this->search . '%')
                    ->orWhere('content', 'like', '%' . $this->search . '%');
            });
        }

        if ($this->selectedCategory) {
            $query->where('category_id', $this->selectedCategory);
        }

        return view('pages.blog.blog', [
            'posts' => $query->paginate(9),
            'categories' => BlogCategory::where('is_active', true)->get()
        ]);
    }
};
?>

<div class="bg-white">
    <!-- Hero Section -->
    <section class="relative py-24 bg-blue-50/20 overflow-hidden">
        <div class="absolute inset-0 opacity-30 pointer-events-none">
            <div class="absolute w-[500px] h-[500px] bg-secondary/10 rounded-full blur-3xl -top-40 -left-40"></div>
            <div class="absolute w-[400px] h-[400px] bg-accent/10 rounded-full blur-3xl bottom-0 right-0"></div>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 text-center">
            <p class="text-sm font-semibold text-secondary tracking-wider uppercase">Insights & Strategy</p>
            <h1 class="mt-4 text-4xl sm:text-5xl font-extrabold text-text-primary tracking-tight">
                The <span class="text-secondary">Grevx</span> Blog
            </h1>
            <p class="mt-6 text-lg text-zinc-600 max-w-2xl mx-auto">
                Discover the latest trends in financial consulting, corporate training, and business strategy to help your organization scale with confidence.
            </p>
        </div>
    </section>

    <!-- Filters Section -->
    <section class="py-12 border-b border-border">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
                <!-- Categories -->
                <div class="flex flex-wrap gap-2">
                    <button
                        wire:click="selectCategory(null)"
                        class="px-5 py-2 text-sm font-medium rounded-full transition {{ is_null($selectedCategory) ? 'bg-secondary text-white shadow-md' : 'bg-muted text-zinc-600 hover:bg-zinc-200' }}">
                        All Posts
                    </button>
                    @foreach($categories as $category)
                    <button
                        wire:click="selectCategory({{ $category->id }})"
                        class="px-5 py-2 text-sm font-medium rounded-full transition {{ $selectedCategory == $category->id ? 'bg-secondary text-white shadow-md' : 'bg-muted text-zinc-600 hover:bg-zinc-200' }}">
                        {{ $category->name }}
                    </button>
                    @endforeach
                </div>

                <!-- Search -->
                <div class="relative max-w-md w-full">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <i class="ri-search-line text-zinc-400"></i>
                    </div>
                    <input
                        wire:model.live.debounce.300ms="search"
                        type="search"
                        class="w-full pl-11 pr-4 py-3 bg-muted border-none rounded-xl text-sm focus:ring-2 focus:ring-secondary/20 transition"
                        placeholder="Search articles...">
                </div>
            </div>
        </div>
    </section>

    <!-- Blog Grid -->
    <section class="py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            @if($posts->isEmpty())
            <div class="text-center py-20 bg-muted rounded-2xl border border-dashed border-border">
                <i class="ri-article-line text-4xl text-zinc-300"></i>
                <p class="mt-4 text-zinc-500 font-medium">No articles found matching your criteria.</p>
            </div>
            @else
            <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
                @foreach($posts as $post)
                <article class="group relative flex flex-col bg-white rounded-2xl border border-border overflow-hidden transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                    <!-- Image container -->
                    <div class="relative h-56 overflow-hidden">
                        <img
                            src="{{ $post->image ? Storage::url($post->image) : 'https://placehold.co/800x600/f1f5f9/0b1f33?text=Grevx+Consulting' }}"
                            alt="{{ $post->title }}"
                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">

                        @if($post->category)
                        <div class="absolute top-4 left-4">
                            <span class="px-3 py-1 bg-white/90 backdrop-blur-sm text-[10px] font-bold uppercase tracking-wider text-secondary rounded-lg shadow-sm">
                                {{ $post->category->name }}
                            </span>
                        </div>
                        @endif
                    </div>

                    <!-- Content -->
                    <div class="flex-1 p-6 flex flex-col">
                        <div class="flex items-center gap-3 text-xs text-zinc-400 mb-3">
                            <span class="flex items-center gap-1">
                                <i class="ri-calendar-line"></i>
                                {{ $post->created_at->format('M d, Y') }}
                            </span>
                            <span>•</span>
                            <span class="flex items-center gap-1">
                                <i class="ri-time-line"></i>
                                5 min read
                            </span>
                        </div>

                        <h3 class="text-xl font-bold text-text-primary group-hover:text-secondary transition-colors line-clamp-2 leading-tight">
                            <a href="{{ route('pages::blog-view', $post->slug) }}" wire:navigate>
                                {{ $post->title }}
                            </a>
                        </h3>

                        <p class="mt-3 text-sm text-zinc-600 line-clamp-3 leading-relaxed">
                            {{ Str::limit(strip_tags($post->content), 120) }}
                        </p>

                        <div class="mt-auto pt-6 border-t border-border/50 flex items-center justify-between">
                            <a href="{{ route('pages::blog-view', $post->slug) }}"
                                wire:navigate
                                class="text-sm font-bold text-secondary flex items-center gap-1 transition-all group-hover:gap-2">
                                Read Article
                                <i class="ri-arrow-right-line"></i>
                            </a>
                        </div>
                    </div>
                </article>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-16">
                {{ $posts->links() }}
            </div>
            @endif
        </div>
    </section>

    <!-- Newsletter CTA -->
    <section class="pb-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <div class="bg-secondary rounded-3xl p-8 md:p-16 text-center text-white relative overflow-hidden shadow-2xl shadow-secondary/20">
                <div class="absolute inset-0 opacity-10 pointer-events-none">
                    <div class="absolute w-[800px] h-[800px] bg-white rounded-full blur-3xl -top-1/2 -left-1/4"></div>
                </div>

                <h2 class="relative z-10 text-3xl md:text-4xl font-bold">Stay Ahead of the Curve</h2>
                <p class="relative z-10 mt-4 text-white/80 max-w-xl mx-auto">
                    Subscribe to our monthly briefing for the latest financial strategies and leadership insights delivered straight to your inbox.
                </p>

                <form class="relative z-10 mt-10 flex flex-col sm:flex-row gap-3 max-w-md mx-auto">
                    <input
                        type="email"
                        placeholder="Enter your email"
                        class="flex-1 px-5 py-3 rounded-xl bg-white/10 border border-white/20 text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-white/30 backdrop-blur-sm transition">
                    <button class="px-7 py-3 bg-white text-secondary font-bold rounded-xl hover:bg-zinc-100 transition shadow-lg">
                        Subscribe
                    </button>
                </form>
            </div>
        </div>
    </section>
</div>