<?php

use App\Models\Post;
use App\Models\BlogCategory;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

new #[Layout('layouts.admin')] class extends Component {
    use WithFileUploads;

    public $post_id;
    public $title, $slug, $content, $category_id, $is_active;
    public $image;
    public $old_image;
    public $meta_title, $meta_description, $meta_keywords;

    public function mount($id)
    {
        $post = Post::findOrFail($id);
        $this->post_id = $post->id;
        $this->title = $post->title;
        $this->slug = $post->slug;
        $this->content = $post->content;
        $this->category_id = $post->category_id;
        $this->is_active = $post->is_active;
        $this->old_image = $post->image;
        $this->meta_title = $post->meta_title;
        $this->meta_description = $post->meta_description;
        $this->meta_keywords = $post->meta_keywords;
    }

    protected function rules()
    {
        return [
            'title' => 'required|min:5',
            'slug' => 'required|unique:posts,slug,' . $this->post_id,
            'category_id' => 'required|exists:blog_categories,id',
            'content' => 'required',
            'image' => 'nullable|image|max:2048',
        ];
    }

    public function updatedTitle()
    {
        $this->slug = Str::slug($this->title);
    }

    public function save()
    {
        $this->validate();

        $post = Post::findOrFail($this->post_id);

        $data = [
            'title' => $this->title,
            'slug' => $this->slug,
            'content' => $this->content,
            'category_id' => $this->category_id,
            'is_active' => $this->is_active,
            'meta_title' => $this->meta_title,
            'meta_description' => $this->meta_description,
            'meta_keywords' => $this->meta_keywords,
        ];

        if ($this->image) {
            // Delete old image if exists
            if ($post->image) {
                Storage::disk('public')->delete($post->image);
            }
            $data['image'] = $this->image->store('posts', 'public');
        }

        $post->update($data);

        $this->dispatch('toast-show', [
            'message' => 'Post updated successfully!',
            'type' => 'success',
            'position' => 'top-right',
        ]);

        return $this->redirect(route('admin.blog.list'), navigate: true);
    }

    public function with()
    {
        return [
            'categories' => BlogCategory::where('is_active', true)->get(),
        ];
    }
};
?>

<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-6">

    <div class="mb-6 flex items-center justify-between">
        <div>
            <h1 class="text-xl font-semibold text-slate-900">Update Post</h1>
            <p class="text-xs text-slate-500 mt-1">Make changes to your published article.</p>
        </div>
        <a href="{{ route('admin.blog.list') }}" wire:navigate class="text-sm font-medium text-slate-600 hover:text-slate-900 flex items-center gap-1">
            <i class="ri-arrow-left-line"></i>
            Back to List
        </a>
    </div>

    <form wire:submit.prevent="save" class="space-y-6">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            <!-- Left Column -->
            <div class="lg:col-span-2 space-y-6">

                <div class="bg-white rounded-xl border border-slate-200 p-6 shadow-sm">
                    <div class="space-y-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Post Title</label>
                            <input
                                wire:model.live="title"
                                type="text"
                                class="w-full rounded-lg border border-slate-300 px-4 py-2.5 text-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 outline-none">
                            @error('title') <span class="text-rose-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Slug</label>
                            <input
                                wire:model="slug"
                                type="text"
                                class="w-full rounded-lg border border-slate-300 bg-slate-50 px-4 py-2 text-sm focus:border-blue-500 outline-none">
                            @error('slug') <span class="text-rose-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <div wire:ignore>
                            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Post Content</label>
                            <div
                                x-data="{
                                    value: @entangle('content'),
                                    instance: null,
                                    init() {
                                        if (this.instance) { tinymce.remove(this.instance); }
                                        tinymce.init({
                                            target: this.$refs.editor,
                                            height: 400,
                                            menubar: false,
                                            plugins: 'advlist autolink lists link image charmap preview anchor searchreplace visualblocks code fullscreen insertdatetime media table code help wordcount',
                                            toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | code help',
                                            setup: (editor) => {
                                                this.instance = editor;
                                                editor.on('change', () => {
                                                    this.value = editor.getContent();
                                                });
                                                editor.on('init', () => {
                                                    editor.setContent(this.value || '');
                                                });
                                            }
                                        });
                                    }
                                }">
                                <textarea x-ref="editor"></textarea>
                            </div>
                        </div>
                        @error('content') <span class="text-rose-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>
                </div>

                <!-- SEO -->
                <div class="bg-white rounded-xl border border-slate-200 p-6 shadow-sm">
                    <h3 class="text-sm font-bold text-slate-800 mb-4 flex items-center gap-2">
                        <i class="ri-search-eye-line text-blue-500"></i>
                        Search Engine Optimization (SEO)
                    </h3>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-xs font-medium text-slate-600 mb-1">Meta Title</label>
                            <input wire:model="meta_title" type="text" class="w-full rounded-md border border-slate-300 px-3 py-2 text-sm outline-none focus:border-blue-500">
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-slate-600 mb-1">Meta Description</label>
                            <textarea wire:model="meta_description" rows="2" class="w-full rounded-md border border-slate-300 px-3 py-2 text-sm outline-none focus:border-blue-500"></textarea>
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-slate-600 mb-1">Keywords</label>
                            <input wire:model="meta_keywords" type="text" class="w-full rounded-md border border-slate-300 px-3 py-2 text-sm outline-none focus:border-blue-500">
                        </div>
                    </div>
                </div>

            </div>

            <!-- Right Column -->
            <div class="space-y-6">

                <div class="bg-white rounded-xl border border-slate-200 p-6 shadow-sm">
                    <div class="space-y-6">

                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Category</label>
                            <select
                                wire:model="category_id"
                                class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:border-blue-500 outline-none">
                                <option value="">Select Category</option>
                                @foreach($categories as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Featured Image</label>
                            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-slate-300 border-dashed rounded-lg hover:border-blue-400 transition-colors">
                                <div class="space-y-1 text-center">
                                    @if ($image)
                                    <div class="mb-2 text-center">
                                        <p class="text-[10px] text-blue-600 font-bold mb-1">NEW IMAGE PREVIEW</p>
                                        <img src="{{ $image->temporaryUrl() }}" class="mx-auto h-32 w-auto rounded-lg object-cover ring-2 ring-blue-500">
                                    </div>
                                    @elseif ($old_image)
                                    <div class="mb-2 text-center">
                                        <p class="text-[10px] text-slate-400 font-bold mb-1">CURRENT IMAGE</p>
                                        <img src="{{ asset('storage/' . $old_image) }}" class="mx-auto h-32 w-auto rounded-lg object-cover ring-1 ring-slate-200">
                                    </div>
                                    @else
                                    <i class="ri-image-add-line text-3xl text-slate-400"></i>
                                    @endif
                                    <div class="flex text-sm text-slate-600 justify-center">
                                        <label class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none">
                                            <span>Change Photo</span>
                                            <input wire:model="image" type="file" class="sr-only">
                                        </label>
                                    </div>
                                    <p class="text-xs text-slate-500">Keep it under 2MB</p>
                                </div>
                            </div>
                        </div>

                        <div class="pt-4 border-t border-slate-100">
                            <label class="flex items-center gap-3 cursor-pointer group">
                                <div class="relative inline-flex items-center">
                                    <input type="checkbox" wire:model="is_active" class="sr-only peer">
                                    <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                                </div>
                                <span class="text-sm font-medium text-slate-700">Active / Published</span>
                            </label>
                        </div>

                    </div>
                </div>

                <div class="sticky top-24">
                    <button
                        type="submit"
                        class="w-full inline-flex items-center justify-center gap-2 rounded-xl bg-blue-600 px-6 py-3.5 text-sm font-bold text-white shadow-lg shadow-blue-100 hover:bg-blue-500 transition-all">
                        <i class="ri-save-line text-lg"></i>
                        Update Post
                    </button>
                    <p class="text-center text-[10px] text-slate-400 mt-3 italic">
                        Last updated at: {{ Post::find($post_id)->updated_at->format('M d, Y H:i') }}
                    </p>
                </div>

            </div>
        </div>
    </form>
</div>