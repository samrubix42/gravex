<?php

use Livewire\Component;
use App\Models\Post;
use App\Models\BlogCategory;
use Livewire\WithPagination;
use Livewire\Attributes\Title;


new #[Title('Blog - Grevx Consulting')] class extends Component
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

    <!-- HERO -->
    <section class="relative pt-32 pb-20 bg-blue-50/20 overflow-hidden">

        <div class="absolute inset-0 opacity-30 pointer-events-none">
            <div class="absolute w-[500px] h-[500px] bg-secondary/10 rounded-full blur-3xl -top-40 -left-40"></div>
            <div class="absolute w-[400px] h-[400px] bg-accent/10 rounded-full blur-3xl bottom-0 right-0"></div>
        </div>

        <div class="relative max-w-5xl mx-auto px-6 text-center">

            <p class="text-xs font-semibold tracking-[0.25em] text-secondary uppercase">
                Insights & Strategy
            </p>

            <h1 class="mt-4 text-4xl md:text-5xl font-bold text-text-primary leading-tight">
                Grevx <span class="text-secondary">Insights</span>
            </h1>

            <p class="mt-6 text-lg text-zinc-600 max-w-2xl mx-auto">
                Perspectives on financial strategy, leadership capability,
                and operational discipline for growing organizations.
            </p>

        </div>
    </section>



    <!-- FILTERS -->
    <section class="py-12 border-b border-zinc-100">

        <div class="max-w-7xl mx-auto px-6">

            <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">

                <!-- CATEGORY FILTER -->
                <div class="flex flex-wrap gap-2">

                    <button
                        wire:click="selectCategory(null)"
                        class="px-4 py-2 text-sm rounded-full transition
                    {{ is_null($selectedCategory) ? 'bg-secondary text-white' : 'text-zinc-600 hover:text-secondary' }}">
                        All
                    </button>

                    @foreach($categories as $category)

                    <button
                        wire:click="selectCategory({{ $category->id }})"
                        class="px-4 py-2 text-sm rounded-full transition
                    {{ $selectedCategory == $category->id ? 'bg-secondary text-white' : 'text-zinc-600 hover:text-secondary' }}">

                        {{ $category->name }}

                    </button>

                    @endforeach

                </div>


                <!-- SEARCH -->
                <div class="relative max-w-sm w-full">

                    <input
                        wire:model.live.debounce.300ms="search"
                        type="search"
                        placeholder="Search articles..."
                        class="w-full pl-10 pr-4 py-2.5 text-sm rounded-lg bg-zinc-50 focus:outline-none focus:ring-2 focus:ring-secondary/20">

                    <i class="ri-search-line absolute left-3 top-3 text-zinc-400"></i>

                </div>

            </div>

        </div>

    </section>



    <!-- BLOG GRID -->
    <section class="py-20">

        <div class="max-w-7xl mx-auto px-6">

            @if($posts->isEmpty())

            <div class="text-center py-20">

                <p class="text-zinc-500">
                    No articles found.
                </p>

            </div>

            @else

            <div class="grid gap-x-10 gap-y-14 md:grid-cols-2 lg:grid-cols-3">

                @foreach($posts as $post)

                <article class="group">

                    <!-- IMAGE -->
                    <div class="aspect-[16/10] rounded-xl overflow-hidden mb-5">

                        <img
                            src="{{ $post->image ? Storage::url($post->image) : 'https://placehold.co/800x600' }}"
                            class="w-full h-full object-cover transition duration-500 group-hover:scale-105">

                    </div>


                    <!-- CATEGORY -->
                    @if($post->category)

                    <p class="text-xs font-semibold uppercase tracking-widest text-secondary mb-2">

                        {{ $post->category->name }}

                    </p>

                    @endif


                    <!-- TITLE -->
                    <h3 class="text-xl font-semibold text-text-primary leading-snug">

                        <a href="{{ route('pages::blog-view',$post->slug) }}"
                            wire:navigate
                            class="hover:text-secondary transition">

                            {{ $post->title }}

                        </a>

                    </h3>


                    <!-- META -->
                    <p class="mt-2 text-sm text-zinc-500">

                        {{ $post->created_at->format('M d, Y') }}

                    </p>


                    <!-- EXCERPT -->
                    <p class="mt-3 text-sm text-zinc-600 leading-relaxed line-clamp-3">

                        {{ Str::limit(strip_tags($post->content),120) }}

                    </p>


                    <!-- READ MORE -->
                    <a href="{{ route('pages::blog-view',$post->slug) }}"
                        wire:navigate
                        class="inline-flex items-center gap-2 mt-4 text-sm font-medium text-secondary hover:gap-3 transition-all">

                        Read article
                        <i class="ri-arrow-right-line"></i>

                    </a>

                </article>

                @endforeach

            </div>



            <!-- PAGINATION -->
            <div class="mt-20">

                {{ $posts->links() }}

            </div>

            @endif

        </div>

    </section>



    <!-- NEWSLETTER -->
    <section class="pb-24">

        <div class="max-w-6xl mx-auto px-6">

            <div class="bg-secondary rounded-3xl p-10 md:p-16 text-center text-white relative overflow-hidden">

                <h2 class="text-3xl font-semibold">

                    Get Strategy Insights Monthly

                </h2>

                <p class="mt-4 text-white/80 max-w-xl mx-auto">

                    Join our monthly briefing on financial strategy,
                    leadership development, and business performance.

                </p>


                <form class="mt-8 flex flex-col sm:flex-row gap-3 max-w-md mx-auto">

                    <input
                        type="email"
                        placeholder="Enter your email"
                        class="flex-1 px-5 py-3 rounded-lg bg-white/10 border border-white/20 text-white placeholder-white/60 focus:outline-none">

                    <button class="px-6 py-3 bg-white text-secondary font-semibold rounded-lg hover:bg-zinc-100">

                        Subscribe

                    </button>

                </form>

            </div>

        </div>

    </section>

</div>