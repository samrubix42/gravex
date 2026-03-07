<?php

use App\Models\BlogCategory;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Url;
use Illuminate\Support\Str;

new #[Layout('layouts.admin')] class extends Component {
    use WithPagination;

    #[Url]
    public $search = '';

    public $name, $slug, $is_active = true, $category_id;
    public $deleteId;

    protected function rules()
    {
        return [
            'name' => 'required|min:2',
            'slug' => 'required|unique:blog_categories,slug,' . $this->category_id,
        ];
    }

    public function updatedName()
    {
        $this->slug = Str::slug($this->name);
    }

    public function confirmDelete($id)
    {
        $this->deleteId = $id;
    }

    public function deleteConfirmed()
    {
        BlogCategory::findOrFail($this->deleteId)->delete();
        $this->reset('deleteId');
        $this->dispatch('close-delete-modal');
        $this->dispatch('toast-show', [
            'message' => 'Category deleted successfully!',
            'type' => 'success',
            'position' => 'top-right',
        ]);
    }

    public function openCreateModal()
    {
        $this->resetForm();
    }

    public function openEditModal(int $id)
    {
        $category = BlogCategory::findOrFail($id);
        $this->category_id = $category->id;
        $this->name = $category->name;
        $this->slug = $category->slug;
        $this->is_active = $category->is_active;
    }

    public function save()
    {
        $this->validate();

        BlogCategory::updateOrCreate(
            ['id' => $this->category_id],
            [
                'name' => $this->name,
                'slug' => $this->slug,
                'is_active' => $this->is_active,
            ]
        );

        $this->dispatch('toast-show', [
            'message' => $this->category_id ? 'Category updated successfully!' : 'Category created successfully!',
            'type' => 'success',
            'position' => 'top-right',
        ]);

        $this->dispatch('close-modal');
        $this->resetForm();
    }

    public function toggleStatus($id)
    {
        $category = BlogCategory::findOrFail($id);
        $category->is_active = !$category->is_active;
        $category->save();

        $this->dispatch('toast-show', [
            'message' => 'Status updated successfully!',
            'type' => 'success',
            'position' => 'top-right',
        ]);
    }

    public function resetForm()
    {
        $this->reset(['category_id', 'name', 'slug', 'is_active']);
        $this->is_active = true;
    }

    public function with()
    {
        return [
            'categories' => BlogCategory::where('name', 'like', '%' . $this->search . '%')
                ->orWhere('slug', 'like', '%' . $this->search . '%')
                ->latest()
                ->paginate(10),
        ];
    }
};
?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">

    <!-- Page Heading -->
    <div class="mb-6">
        <h1 class="text-xl font-semibold text-slate-900">
            Blog Categories
        </h1>
        <p class="mt-1 text-sm text-slate-500">
            Manage your blog categories, slugs and active status.
        </p>
    </div>

    <!-- Main content container -->
    <div class="space-y-4">

        <!-- Top bar: search + create button -->
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div class="w-full sm:max-w-xs">
                <label class="block text-xs font-medium text-slate-500 mb-1">
                    Search Categories
                </label>
                <div class="relative">
                    <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400 text-sm">
                        <i class="ri-search-line"></i>
                    </span>
                    <input
                        type="text"
                        wire:model.live="search"
                        placeholder="Search by name or slug..."
                        class="block w-full rounded-md border border-slate-300 bg-white pl-9 pr-3 py-2 text-sm
                               text-slate-700 placeholder:text-slate-400
                               focus:border-blue-500 focus:ring-2 focus:ring-blue-500/40 outline-none">
                </div>
            </div>

            <div class="flex sm:justify-end">
                <button
                    @click="$dispatch('open-modal'); $wire.openCreateModal()"
                    class="inline-flex items-center gap-2 rounded-md bg-blue-600
                           px-4 py-2 text-sm font-medium text-white shadow-sm
                           hover:bg-blue-500 focus:outline-none focus:ring-2
                           focus:ring-blue-500/60 focus:ring-offset-1 transition-colors">
                    <i class="ri-add-line text-base"></i>
                    <span>Add Category</span>
                </button>
            </div>
        </div>

        <!-- Table card (desktop & tablet) -->
        <div class="hidden sm:block overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-slate-200 text-sm">
                    <thead class="bg-slate-50">
                        <tr class="text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                            <th class="px-4 py-3 w-12">#</th>
                            <th class="px-4 py-3">Name</th>
                            <th class="px-4 py-3">Slug</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3 text-right w-40">Actions</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-100 bg-white">
                        @forelse($categories as $c)
                        <tr wire:key="c-{{ $c->id }}" class="hover:bg-slate-50/80 transition-colors">
                            <td class="px-4 py-3 text-slate-500">
                                {{ ($categories->currentPage()-1) * $categories->perPage() + $loop->iteration }}
                            </td>
                            <td class="px-4 py-3 font-medium text-slate-800">
                                {{ $c->name }}
                            </td>
                            <td class="px-4 py-3 text-slate-600 font-mono text-[11px]">
                                {{ $c->slug }}
                            </td>
                            <td class="px-4 py-3">
                                <button
                                    wire:click="toggleStatus({{ $c->id }})"
                                    class="inline-flex items-center gap-1 rounded-full px-2.5 py-1 text-xs font-semibold transition-all
                                        {{ $c->is_active 
                                             ? 'bg-emerald-100 text-emerald-700 hover:bg-emerald-200' 
                                             : 'bg-rose-100 text-rose-700 hover:bg-rose-200' }}">
                                    <span class="h-1.5 w-1.5 rounded-full {{ $c->is_active ? 'bg-emerald-500' : 'bg-rose-500' }}"></span>
                                    {{ $c->is_active ? 'Active' : 'Inactive' }}
                                </button>
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center justify-end gap-2">
                                    <button
                                        @click="$dispatch('open-modal'); $wire.openEditModal({{ $c->id }})"
                                        class="inline-flex items-center gap-1 rounded-md border border-slate-200 px-2.5 py-1.5
                                                       text-xs font-medium text-slate-700 hover:bg-slate-100 transition-colors">
                                        <i class="ri-edit-line text-sm"></i>
                                        Edit
                                    </button>

                                    <button
                                        @click="$dispatch('open-delete-modal'); $wire.confirmDelete({{ $c->id }})"
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
                            <td colspan="5" class="px-4 py-8 text-center text-sm text-slate-500">
                                No categories found.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Card list (mobile) -->
        <div class="space-y-3 sm:hidden">
            @forelse($categories as $c)
            <div wire:key="c-card-{{ $c->id }}" class="rounded-xl border border-slate-200 bg-white p-4 shadow-sm transition-all hover:shadow-md">
                <div class="flex items-start justify-between gap-3">
                    <div>
                        <p class="text-sm font-semibold text-slate-900">
                            {{ $c->name }}
                        </p>
                        <p class="mt-0.5 text-[10px] text-slate-500 font-mono">
                            {{ $c->slug }}
                        </p>
                    </div>

                    <div class="text-right">
                        <button
                            wire:click="toggleStatus({{ $c->id }})"
                            class="inline-flex items-center gap-1 rounded-full px-2 py-0.5 text-[11px] font-bold
                                {{ $c->is_active ? 'bg-emerald-100 text-emerald-700' : 'bg-rose-100 text-rose-700' }}">
                            {{ $c->is_active ? 'Active' : 'Inactive' }}
                        </button>
                    </div>
                </div>

                <div class="mt-4 flex items-center justify-end gap-2 text-[11px]">
                    <button
                        @click="$dispatch('open-modal'); $wire.openEditModal({{ $c->id }})"
                        class="inline-flex items-center gap-1 rounded-md border border-slate-200 px-2.5 py-1.5 font-bold text-slate-700 hover:bg-slate-100 transition-colors">
                        Edit
                    </button>

                    <button
                        @click="$dispatch('open-delete-modal'); $wire.confirmDelete({{ $c->id }})"
                        class="inline-flex items-center gap-1 rounded-md border border-rose-200 px-2.5 py-1.5 font-bold text-rose-600 hover:bg-rose-50 transition-colors">
                        Delete
                    </button>
                </div>
            </div>
            @empty
            <div class="rounded-xl border border-dashed border-slate-200 bg-slate-50 px-4 py-8 text-center text-sm text-slate-500">
                No categories found.
            </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-3 flex justify-end">
            {{ $categories->links() }}
        </div>

        <!-- Modals -->
        @include('admin.blog.include.blog-category-modal')
        @include('admin.blog.include.delete')

    </div>
</div>