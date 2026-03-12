<?php

use App\Models\BlogCategory;
use Livewire\Component;
use Livewire\Attributes\Title;
use App\Models\Post;

new #[Title('Blog Details - Grevx Consulting')] class extends Component
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

        $categories = BlogCategory::where('is_active', true)->get();

        return view('pages.blog.blog-view', [
            'recentPosts' => $recentPosts,
            'categories' => $categories
        ]);
    }
};
?>

<div class="bg-white">

<!-- Reading Progress Bar -->
<div
x-data="{ progress:0 }"
x-init="window.addEventListener('scroll', () => {
let h = document.documentElement;
progress = (h.scrollTop) / (h.scrollHeight - h.clientHeight) * 100;
})"
class="fixed top-0 left-0 w-full h-1 bg-zinc-200 z-50">

<div
class="h-1 bg-secondary transition-all duration-200"
:style="'width:' + progress + '%'">
</div>

</div>



<!-- HERO HEADER -->
<header class="pt-36 pb-24 bg-gradient-to-b from-zinc-50 to-white">

<div class="max-w-4xl mx-auto px-6 text-center">

<nav class="text-sm text-zinc-500 mb-6">

<a href="{{ route('pages::blog') }}"
wire:navigate
class="hover:text-secondary">
Blog
</a>

/

<span>Article</span>

</nav>


@if($post->category)

<span class="inline-block text-xs uppercase tracking-widest text-secondary font-semibold bg-secondary/10 px-3 py-1 rounded-full">
{{ $post->category->name }}
</span>

@endif


<h1 class="mt-6 text-4xl md:text-5xl font-bold text-text-primary leading-tight">
{{ $post->title }}
</h1>


<div class="mt-6 flex justify-center items-center gap-4 text-sm text-zinc-500">

<span>{{ $post->created_at->format('M d, Y') }}</span>

<span class="w-1 h-1 bg-zinc-400 rounded-full"></span>

<span>5 min read</span>

</div>

</div>

</header>



<!-- MAIN CONTENT -->
<section class="pb-28">

<div class="max-w-7xl mx-auto px-6">

<div class="grid lg:grid-cols-12 gap-16">




<!-- ARTICLE -->
<article class="lg:col-span-8">

<!-- Featured Image -->

<div class="rounded-3xl overflow-hidden mb-14 shadow-lg">

<img
src="{{ $post->image ? Storage::url($post->image) : 'https://placehold.co/1200x600' }}"
class="w-full h-auto object-cover hover:scale-105 transition duration-700"
alt="{{ $post->title }}">

</div>



<!-- Blog Content -->

<div class="prose prose-lg max-w-none
prose-headings:text-text-primary
prose-headings:font-semibold
prose-p:text-zinc-700
prose-p:leading-relaxed
prose-a:text-secondary
prose-a:no-underline hover:prose-a:underline
prose-img:rounded-2xl
prose-blockquote:border-secondary
prose-blockquote:bg-zinc-50
prose-blockquote:px-6
prose-blockquote:py-4
prose-blockquote:rounded-lg">

{!! $post->content !!}

</div>



<!-- Tags -->

@if($post->meta_keywords)

<div class="mt-12 pt-8 border-t border-zinc-100 flex flex-wrap gap-3">

<span class="text-sm font-medium text-zinc-700">
Tags:
</span>

@foreach(explode(',', $post->meta_keywords) as $tag)

<span class="px-3 py-1 text-xs bg-zinc-100 rounded-full text-zinc-600 hover:bg-secondary hover:text-white transition cursor-pointer">
#{{ trim($tag) }}
</span>

@endforeach

</div>

@endif




<!-- CTA CARD -->

<div class="mt-14">

<div class="bg-gradient-to-br from-secondary/10 to-secondary/5 border border-secondary/20 rounded-2xl p-8">

<h3 class="text-xl font-semibold text-text-primary">
Need help applying this insight?
</h3>

<p class="mt-2 text-zinc-600">
Our consulting team helps businesses translate strategy into practical action.
</p>

<a
href="{{ route('pages::contact') }}"
wire:navigate
class="inline-flex items-center mt-5 px-5 py-2.5 bg-secondary text-white rounded-lg hover:opacity-90 transition">

Talk to our team →

</a>

</div>

</div>


</article>




<!-- SIDEBAR -->

<aside class="lg:col-span-4">

<div class="sticky top-32 space-y-10">



<!-- Categories -->

<div class="bg-white border border-zinc-100 rounded-2xl p-6 shadow-sm">

<h3 class="text-sm font-semibold uppercase tracking-widest text-zinc-500 mb-5">
Categories
</h3>

<ul class="space-y-3">

@foreach($categories as $cat)

<li>

<a
href="{{ route('pages::blog') }}?category={{ $cat->id }}"
class="flex justify-between text-zinc-700 hover:text-secondary transition">

{{ $cat->name }}

<span class="text-zinc-400 text-sm">
{{ $cat->posts()->count() }}
</span>

</a>

</li>

@endforeach

</ul>

</div>




<!-- Recent Posts -->

<div class="bg-white border border-zinc-100 rounded-2xl p-6 shadow-sm">

<h3 class="text-sm font-semibold uppercase tracking-widest text-zinc-500 mb-6">
Recent Articles
</h3>

<div class="space-y-6">

@foreach($recentPosts as $recent)

<a
href="{{ route('pages::blog-view', $recent->slug) }}"
wire:navigate
class="flex gap-4 group">

<div class="w-16 h-16 rounded-lg overflow-hidden flex-shrink-0">

<img
src="{{ $recent->image ? Storage::url($recent->image) : 'https://placehold.co/200x200' }}"
class="w-full h-full object-cover group-hover:scale-110 transition">

</div>

<div>

<p class="text-xs text-zinc-400">
{{ $recent->created_at->format('M d, Y') }}
</p>

<h4 class="text-sm font-semibold text-text-primary leading-snug group-hover:text-secondary transition">
{{ Str::limit($recent->title, 60) }}
</h4>

</div>

</a>

@endforeach

</div>

</div>




<!-- Work With Us -->

<div class="bg-white border border-zinc-100 rounded-2xl p-6 shadow-sm">

<h3 class="text-lg font-semibold text-text-primary">
Work with Grevx
</h3>

<p class="mt-2 text-sm text-zinc-600">
We help founders and leadership teams improve financial strategy and operational clarity.
</p>

<a
href="{{ route('pages::contact') }}"
wire:navigate
class="inline-block mt-4 text-secondary font-semibold hover:underline">

Start a conversation →

</a>

</div>



</div>

</aside>



</div>

</div>

</section>




<!-- RELATED ARTICLES -->

@if($recentPosts->isNotEmpty())

<section class="py-24 bg-zinc-50">

<div class="max-w-7xl mx-auto px-6">

<h2 class="text-2xl font-semibold text-text-primary mb-12">
Related Articles
</h2>

<div class="grid gap-10 md:grid-cols-3">

@foreach($recentPosts as $related)

<article class="group">

<div class="aspect-[16/10] rounded-xl overflow-hidden mb-5">

<img
src="{{ $related->image ? Storage::url($related->image) : 'https://placehold.co/800x600' }}"
class="w-full h-full object-cover group-hover:scale-105 transition duration-500">

</div>

<p class="text-xs text-zinc-500 mb-2">
{{ $related->created_at->format('M d, Y') }}
</p>

<h3 class="font-semibold text-text-primary leading-snug">

<a
href="{{ route('pages::blog-view', $related->slug) }}"
wire:navigate
class="hover:text-secondary">

{{ $related->title }}

</a>

</h3>

</article>

@endforeach

</div>

</div>

</section>

@endif


</div>