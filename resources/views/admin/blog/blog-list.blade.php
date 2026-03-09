<?php

use App\Models\Post;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Url;

new #[Layout('layouts.admin')] class extends Component {
    use WithPagination;

    #[Url]
    public $search = '';

    public $deleteId;

    public function confirmDelete($id)
    {
        $this->deleteId = $id;
        $this->dispatch('open-delete-modal');
    }

    public function deleteConfirmed()
    {
        $post = Post::findOrFail($this->deleteId);

        // Optional: Delete physical image if exists
        // if ($post->image) {
        //     Storage::disk('public')->delete($post->image);
        // }

        $post->delete();
        $this->reset('deleteId');
        $this->dispatch('close-delete-modal');
        $this->dispatch('toast-show', [
            'message' => 'Post deleted successfully!',
            'type' => 'success',
            'position' => 'top-right',
        ]);
    }

    public function toggleStatus($id)
    {
        $post = Post::findOrFail($id);
        $post->is_active = !$post->is_active;
        $post->save();

        $this->dispatch('toast-show', [
            'message' => 'Status updated!',
            'type' => 'success',
            'position' => 'top-right',
        ]);
    }

    public function with()
    {
        return [
            'posts' => Post::with('category')
                ->where('title', 'like', '%' . $this->search . '%')
                ->latest()
                ->paginate(10),
        ];
    }
};
?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">

    <!-- Page Heading -->
    <div class="mb-4 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-lg font-semibold text-slate-900">
                Blog Posts
            </h1>
            <p class="mt-0.5 text-[11px] text-slate-500">
                Manage your articles, stories, and news updates.
            </p>
        </div>

        <div class="flex sm:justify-end">
            <a
                href="{{ route('admin.blog.add') }}"
                wire:navigate
                class="inline-flex items-center gap-2 rounded-md bg-blue-600
                       px-4 py-2 text-sm font-medium text-white shadow-sm
                       hover:bg-blue-500 focus:outline-none focus:ring-2
                       focus:ring-blue-500/60 focus:ring-offset-1 transition-colors">
                <i class="ri-add-line text-base"></i>
                <span>Create New Post</span>
            </a>
        </div>
    </div>

    <!-- Main content container -->
    <div class="space-y-4">

        <!-- Top bar: search -->
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div class="w-full sm:max-w-xs">
                <label class="block text-xs font-medium text-slate-500 mb-1">
                    Search Articles
                </label>
                <div class="relative">
                    <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400 text-sm">
                        <i class="ri-search-line"></i>
                    </span>
                    <input
                        type="text"
                        wire:model.live="search"
                        placeholder="Search by title..."
                        class="block w-full rounded-md border border-slate-300 bg-white pl-9 pr-3 py-2 text-sm
                               text-slate-700 placeholder:text-slate-400
                               focus:border-blue-500 focus:ring-2 focus:ring-blue-500/40 outline-none">
                </div>
            </div>
        </div>

        <!-- Table card (desktop & tablet) -->
        <div class="hidden sm:block overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-slate-200 text-sm">
                    <thead class="bg-slate-50">
                        <tr class="text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                            <th class="px-4 py-3 w-12">#</th>
                            <th class="px-4 py-3">Thumbnail</th>
                            <th class="px-4 py-3">Title</th>
                            <th class="px-4 py-3">Category</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3 text-right w-40">Actions</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-100 bg-white">
                        @forelse($posts as $p)
                        <tr wire:key="p-{{ $p->id }}" class="hover:bg-slate-50/80 transition-colors">
                            <td class="px-4 py-3 text-slate-500">
                                {{ ($posts->currentPage()-1) * $posts->perPage() + $loop->iteration }}
                            </td>
                            <td class="px-4 py-3">
                                <div class="w-12 h-12 rounded-lg bg-slate-100 border border-slate-200 overflow-hidden">
                                    @if($p->image)
                                    <img src="{{ asset('storage/' . $p->image) }}" class="w-full h-full object-cover">
                                    @else
                                    <div class="w-full h-full flex items-center justify-center text-slate-300">
                                        <i class="ri-image-line text-xl"></i>
                                    </div>
                                    @endif
                                </div>
                            </td>
                            <td class="px-4 py-3">
                                <div class="max-w-md">
                                    <p class="font-medium text-slate-800 line-clamp-1">{{ $p->title }}</p>
                                    <p class="text-[10px] text-slate-400 font-mono tracking-tighter">{{ $p->slug }}</p>
                                </div>
                            </td>
                            <td class="px-4 py-3">
                                <span class="px-2 py-1 rounded-md bg-slate-100 text-slate-600 text-xs font-medium">
                                    {{ $p->category->name ?? 'Uncategorized' }}
                                </span>
                            </td>
                            <td class="px-4 py-3">
                                <button
                                    wire:click="toggleStatus({{ $p->id }})"
                                    class="inline-flex items-center gap-1 rounded-full px-2.5 py-1 text-xs font-semibold transition-all
                                        {{ $p->is_active 
                                             ? 'bg-emerald-100 text-emerald-700 hover:bg-emerald-200' 
                                             : 'bg-rose-100 text-rose-700 hover:bg-rose-200' }}">
                                    <span class="h-1.5 w-1.5 rounded-full {{ $p->is_active ? 'bg-emerald-500' : 'bg-rose-500' }}"></span>
                                    {{ $p->is_active ? 'Active' : 'Inactive' }}
                                </button>
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center justify-end gap-2">
                                    <a
                                        href="{{ route('admin.blog.update', $p->id) }}"
                                        wire:navigate
                                        class="inline-flex items-center gap-1 rounded-md border border-slate-200 px-2.5 py-1.5
                                                   text-xs font-medium text-slate-700 hover:bg-slate-100 transition-colors">
                                        <i class="ri-edit-line text-sm"></i>
                                        Edit
                                    </a>

                                    <button
                                        wire:click="confirmDelete({{ $p->id }})"
                                        class="inline-flex items-center gap-1 rounded-md border border-rose-200 px-2.5 py-1.5
                                                   text-xs font-medium text-rose-600 hover:bg-rose-50 transition-colors">
                                        <i class="ri-delete-bin-6-line text-sm"></i>
                                        Delete
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="px-4 py-8 text-center text-sm text-slate-500">
                                No posts found.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Card list (mobile) -->
        <div class="space-y-3 sm:hidden">
            @forelse($posts as $p)
            <div wire:key="p-card-{{ $p->id }}" class="rounded-xl border border-slate-200 bg-white p-4 shadow-sm transition-all hover:shadow-md">
                <div class="flex items-start gap-3">
                    <div class="w-16 h-16 rounded-lg bg-slate-100 border border-slate-200 overflow-hidden flex-shrink-0">
                        @if($p->image)
                        <img src="{{ asset('storage/' . $p->image) }}" class="w-full h-full object-cover">
                        @else
                        <div class="w-full h-full flex items-center justify-center text-slate-300">
                            <i class="ri-image-line text-xl"></i>
                        </div>
                        @endif
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-semibold text-slate-900 line-clamp-2">
                            {{ $p->title }}
                        </p>
                        <p class="mt-1 text-[11px] text-blue-600 font-medium bg-blue-50 inline-block px-1.5 py-0.5 rounded">
                            {{ $p->category->name ?? 'N/A' }}
                        </p>
                    </div>
                </div>

                <div class="mt-4 flex items-center justify-between">
                    <button
                        wire:click="toggleStatus({{ $p->id }})"
                        class="inline-flex items-center gap-1 rounded-full px-2 py-0.5 text-[11px] font-bold
                            {{ $p->is_active ? 'bg-emerald-100 text-emerald-700' : 'bg-rose-100 text-rose-700' }}">
                        {{ $p->is_active ? 'Active' : 'Inactive' }}
                    </button>

                    <div class="flex gap-2">
                        <a
                            href="{{ route('admin.blog.update', $p->id) }}"
                            wire:navigate
                            class="inline-flex items-center gap-1 rounded-md border border-slate-200 px-2.5 py-1.5 text-[11px] font-bold text-slate-700 hover:bg-slate-100">
                            Edit
                        </a>

                        <button
                            wire:click="confirmDelete({{ $p->id }})"
                            class="inline-flex items-center gap-1 rounded-md border border-rose-200 px-2.5 py-1.5 text-[11px] font-bold text-rose-600 hover:bg-rose-50">
                            Delete
                        </button>
                    </div>
                </div>
            </div>
            @empty
            <div class="rounded-xl border border-dashed border-slate-200 bg-slate-50 px-4 py-8 text-center text-sm text-slate-500">
                No posts found.
            </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-3 flex justify-end">
            {{ $posts->links() }}
        </div>

        <!-- Modals (Reusing Category's Delete Modal style) -->
        @include('admin.blog.include.delete')

    </div>
</div>