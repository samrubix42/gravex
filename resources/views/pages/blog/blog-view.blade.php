<?php

use Livewire\Component;
use App\Models\Post;
use Livewire\Attributes\Title;

#[Title('Blog - Grevx Consulting')]
new class extends Component
{
    public $post;

    public function mount($slug)
    {
        $this->post = Post::where('slug', $slug)
            ->where('is_active', true)
            ->with('category')
            ->firstOrFail();
    }

    public function render()
    {
        $recentPosts = Post::where('is_active', true)
            ->where('id', '!=', $this->post->id)
            ->latest()
            ->take(3)
            ->get();

        return view('pages.blog.blog-view', [
            'recentPosts' => $recentPosts
        ]);
    }
};
?>

<div class="bg-white">
    <!-- Progress Bar (Top) -->
    <div class="fixed top-0 left-0 w-full h-1 z-50 pointer-events-none">
        <div id="scroll-progress" class="h-full bg-secondary w-0 transition-all duration-150"></div>
    </div>

    <!-- Article Header -->
    <header class="relative pt-32 pb-16 bg-blue-50/20 overflow-hidden text-center">
        <div class="absolute inset-0 opacity-30 pointer-events-none">
            <div class="absolute w-[500px] h-[500px] bg-secondary/10 rounded-full blur-3xl -top-40 -left-10"></div>
        </div>

        <div class="relative max-w-4xl mx-auto px-4 sm:px-6">
            @if($post->category)
            <a href="{{ route('pages::blog') }}?category={{ $post->category->id }}" class="inline-block px-4 py-1.5 bg-secondary/10 text-secondary text-xs font-bold uppercase tracking-widest rounded-full mb-6 hover:bg-secondary/20 transition">
                {{ $post->category->name }}
            </a>
            @endif

            <h1 class="text-3xl md:text-5xl font-extrabold text-text-primary tracking-tight leading-[1.15]">
                {{ $post->title }}
            </h1>

            <div class="mt-8 flex items-center justify-center gap-6 text-sm text-zinc-500 font-medium">
                <div class="flex items-center gap-2">
                    <img src="https://ui-avatars.com/api/?name=Admin&background=0b1f33&color=fff" class="w-8 h-8 rounded-full border border-border" alt="Author">
                    <span>Admin</span>
                </div>
                <div class="flex items-center gap-1.5">
                    <i class="ri-calendar-line text-secondary"></i>
                    <span>{{ $post->created_at->format('M d, Y') }}</span>
                </div>
                <div class="flex items-center gap-1.5">
                    <i class="ri-time-line text-secondary"></i>
                    <span>5 min read</span>
                </div>
            </div>
        </div>
    </header>

    <!-- Article Content -->
    <section class="pb-24">
        <div class="max-w-4xl mx-auto px-4 sm:px-6">
            <!-- Main Featured Image -->
            <div class="relative aspect-[21/9] rounded-3xl overflow-hidden shadow-2xl shadow-zinc-200 -mt-8 mb-16 z-10 border border-white/50 backdrop-blur-sm">
                <img
                    src="{{ $post->image ? Storage::url($post->image) : 'https://placehold.co/1200x600/f1f5f9/0b1f33?text=Grevx+Consulting' }}"
                    alt="{{ $post->title }}"
                    class="w-full h-full object-cover">
            </div>

            <!-- Content Area -->
            <div class="flex flex-col lg:flex-row gap-16">
                <!-- Share Sidebar (Desktop Only) -->
                <div class="hidden lg:block w-12 sticky top-32 h-fit">
                    <div class="flex flex-col gap-4 text-zinc-400">
                        <p class="text-[10px] font-bold uppercase tracking-widest mb-2 origin-left -rotate-90">Share</p>
                        <a href="#" class="w-10 h-10 flex items-center justify-center rounded-xl bg-muted hover:bg-secondary hover:text-white transition shadow-sm"><i class="ri-linkedin-fill"></i></a>
                        <a href="#" class="w-10 h-10 flex items-center justify-center rounded-xl bg-muted hover:bg-secondary hover:text-white transition shadow-sm"><i class="ri-twitter-x-fill"></i></a>
                        <a href="#" class="w-10 h-10 flex items-center justify-center rounded-xl bg-muted hover:bg-secondary hover:text-white transition shadow-sm"><i class="ri-facebook-fill"></i></a>
                        <button onclick="window.print()" class="w-10 h-10 flex items-center justify-center rounded-xl bg-muted hover:bg-secondary hover:text-white transition shadow-sm"><i class="ri-printer-line"></i></button>
                    </div>
                </div>

                <!-- Text Content -->
                <div class="flex-1 max-w-none">
                    <div class="prose prose-lg prose-slate prose-headings:text-text-primary prose-headings:font-bold prose-headings:tracking-tight prose-p:text-zinc-600 prose-p:leading-relaxed prose-a:text-secondary prose-a:no-underline hover:prose-a:underline prose-img:rounded-2xl">
                        {!! $post->content !!}
                    </div>

                    <!-- Post Footer -->
                    <div class="mt-16 pt-10 border-t border-border flex flex-wrap items-center justify-between gap-6">
                        <div class="flex items-center gap-3">
                            <span class="text-sm font-bold text-text-primary">Tags:</span>
                            @if($post->meta_keywords)
                            @foreach(explode(',', $post->meta_keywords) as $tag)
                            <span class="px-3 py-1 bg-muted rounded-full text-xs font-medium text-zinc-600">#{{ trim($tag) }}</span>
                            @endforeach
                            @else
                            <span class="px-3 py-1 bg-muted rounded-full text-xs font-medium text-zinc-600">#Consulting</span>
                            <span class="px-3 py-1 bg-muted rounded-full text-xs font-medium text-zinc-600">#Strategy</span>
                            @endif
                        </div>

                        <div class="flex items-center gap-4 lg:hidden">
                            <span class="text-sm font-bold">Share:</span>
                            <div class="flex gap-2">
                                <a href="#" class="text-zinc-400 hover:text-secondary"><i class="ri-linkedin-fill text-xl"></i></a>
                                <a href="#" class="text-zinc-400 hover:text-secondary"><i class="ri-twitter-x-fill text-xl"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Related Articles -->
    @if($recentPosts->isNotEmpty())
    <section class="py-24 bg-muted/50 border-t border-border">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <div class="flex items-end justify-between mb-12">
                <div>
                    <p class="text-xs font-bold text-secondary uppercase tracking-[0.2em] mb-3">Up next</p>
                    <h2 class="text-3xl font-bold text-text-primary">Related Articles</h2>
                </div>
                <a href="{{ route('pages::blog') }}" class="text-sm font-bold text-secondary flex items-center gap-1 group">
                    View All
                    <i class="ri-arrow-right-line transition-transform group-hover:translate-x-1"></i>
                </a>
            </div>

            <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
                @foreach($recentPosts as $related)
                <article class="group bg-white rounded-2xl border border-border overflow-hidden transition-all duration-300 hover:shadow-lg ">
                    <div class="aspect-[16/10] overflow-hidden">
                        <img src="{{ $related->image ? Storage::url($related->image) : 'https://placehold.co/800x600/f1f5f9/0b1f33?text=Related+Post' }}"
                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" alt="{{ $related->title }}">
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-text-primary group-hover:text-secondary transition-colors mb-4 leading-snug">
                            <a href="{{ route('pages::blog-view', $related->slug) }}" wire:navigate>{{ $related->title }}</a>
                        </h3>
                        <a href="{{ route('pages::blog-view', $related->slug) }}" wire:navigate class="text-xs font-bold uppercase tracking-widest text-secondary inline-flex items-center gap-2">
                            Read Now
                            <i class="ri-arrow-right-line"></i>
                        </a>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Scroll Progress Script -->
    <script>
        window.addEventListener('scroll', () => {
            const h = document.documentElement,
                b = document.body,
                st = 'scrollTop',
                sh = 'scrollHeight';
            const percent = (h[st] || b[st]) / ((h[sh] || b[sh]) - h.clientHeight) * 100;
            const progress = document.getElementById('scroll-progress');
            if (progress) progress.style.width = percent + '%';
        });
    </script>
</div>