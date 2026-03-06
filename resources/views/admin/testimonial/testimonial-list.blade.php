<?php

use App\Models\Testimonial;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

new #[Layout('layouts::admin')] class extends Component {
    use WithPagination;

    public $name, $company, $description, $is_active = true, $testimonial_id;
    public $search = '';

    protected $rules = [
        'name' => 'required',
        'company' => 'required',
        'description' => 'required',
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function resetFields()
    {
        $this->name = '';
        $this->company = '';
        $this->description = '';
        $this->is_active = true;
        $this->testimonial_id = null;
    }

    public function addTestimonial()
    {
        $this->resetFields();
        $this->dispatch('open-modal');
    }

    public function edit($id)
    {
        $this->resetFields();
        $testimonial = Testimonial::findOrFail($id);
        $this->testimonial_id = $testimonial->id;
        $this->name = $testimonial->name;
        $this->company = $testimonial->company;
        $this->description = $testimonial->description;
        $this->is_active = $testimonial->is_active;

        $this->dispatch('open-modal', ['isEdit' => true]);
    }

    public function save()
    {
        $this->validate();

        Testimonial::updateOrCreate(['id' => $this->testimonial_id], [
            'name' => $this->name,
            'company' => $this->company,
            'description' => $this->description,
            'is_active' => $this->is_active,
        ]);

        $this->dispatch('close-modal');
        $this->dispatch('notify', message: $this->testimonial_id ? 'Testimonial updated successfully' : 'Testimonial added successfully');
        $this->resetFields();
    }

    public function delete($id)
    {
        Testimonial::find($id)->delete();
        $this->dispatch('notify', message: 'Testimonial deleted successfully');
    }

    public function toggleStatus($id)
    {
        $testimonial = Testimonial::find($id);
        $testimonial->is_active = !$testimonial->is_active;
        $testimonial->save();
        $this->dispatch('notify', message: 'Status updated');
    }

    public function with()
    {
        return [
            'testimonials' => Testimonial::where('name', 'like', '%' . $this->search . '%')
                ->orWhere('company', 'like', '%' . $this->search . '%')
                ->latest()
                ->paginate(10),
        ];
    }
};
?>

<div x-data="{ 
        modalOpen: false, 
        isEdit: false,
        notification: { show: false, message: '' }
    }"
    @open-modal="modalOpen = true; isEdit = $event.detail.isEdit || false"
    @close-modal="modalOpen = false"
    @notify.window="
        notification.message = $event.detail.message;
        notification.show = true;
        setTimeout(() => notification.show = false, 3000);
    "
    class="max-w-7xl mx-auto space-y-6">
    <!-- Header Area -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-extrabold text-slate-800 tracking-tight">Testimonials</h1>
            <p class="text-sm text-slate-500 font-medium tracking-tight">Manage what your clients say about Grevx Consulting.</p>
        </div>
        <button
            wire:click="addTestimonial"
            class="inline-flex items-center gap-2 px-4 py-2.5 bg-secondary text-white text-sm font-bold rounded-xl hover:bg-secondary/90 shadow-sm shadow-secondary/20 transition-all transform hover:-translate-y-px">
            <i class="ri-add-line text-lg"></i>
            NEW TESTIMONIAL
        </button>
    </div>

    <!-- Stats / Overview (Simple) -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
        <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm flex items-center justify-between">
            <div>
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Total Reviews</p>
                <h3 class="text-2xl font-extrabold text-slate-800 mt-1">{{ \App\Models\Testimonial::count() }}</h3>
            </div>
            <div class="w-10 h-10 bg-secondary/10 rounded-xl flex items-center justify-center text-secondary">
                <i class="ri-message-3-line text-xl"></i>
            </div>
        </div>
        <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm flex items-center justify-between">
            <div>
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Active Status</p>
                <h3 class="text-2xl font-extrabold text-slate-800 mt-1">{{ \App\Models\Testimonial::where('is_active', 1)->count() }}</h3>
            </div>
            <div class="w-10 h-10 bg-emerald-50 rounded-xl flex items-center justify-center text-emerald-500">
                <i class="ri-checkbox-circle-line text-xl"></i>
            </div>
        </div>
        <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm flex items-center justify-between">
            <div>
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Recent This Week</p>
                <h3 class="text-2xl font-extrabold text-slate-800 mt-1">{{ \App\Models\Testimonial::whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->count() }}</h3>
            </div>
            <div class="w-10 h-10 bg-indigo-50 rounded-xl flex items-center justify-center text-indigo-500">
                <i class="ri-calendar-line text-xl"></i>
            </div>
        </div>
    </div>

    <!-- Search & Table Card -->
    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden transition-all duration-300">

        <!-- Toolbar -->
        <div class="p-6 border-b border-slate-100 bg-slate-50/50 flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div class="relative w-full md:w-80 group">
                <i class="ri-search-line absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-secondary transition-colors"></i>
                <input
                    type="text"
                    wire:model.live.debounce.300ms="search"
                    placeholder="Search by name or company..."
                    class="w-full pl-10 pr-4 py-2.5 bg-white border border-slate-200 rounded-xl text-sm placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-secondary/10 focus:border-secondary transition-all">
            </div>
            <div class="flex items-center gap-2">
                <button class="w-10 h-10 rounded-xl flex items-center justify-center text-slate-400 border border-slate-200 bg-white hover:text-slate-900 transition-colors">
                    <i class="ri-filter-3-line"></i>
                </button>
                <button class="w-10 h-10 rounded-xl flex items-center justify-center text-slate-400 border border-slate-200 bg-white hover:text-slate-900 transition-colors">
                    <i class="ri-download-cloud-2-line"></i>
                </button>
            </div>
        </div>

        <!-- Table Content -->
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50/20">
                        <th class="px-6 py-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest">Client Info</th>
                        <th class="px-6 py-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest w-1/3">Testimonial</th>
                        <th class="px-6 py-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest text-center">Status</th>
                        <th class="px-6 py-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($testimonials as $t)
                    <tr class="hover:bg-slate-50/50 transition-all group">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center font-bold text-slate-400 group-hover:bg-secondary/10 group-hover:text-secondary transition-colors uppercase">
                                    {{ substr($t->name, 0, 2) }}
                                </div>
                                <div>
                                    <p class="text-sm font-bold text-slate-800">{{ $t->name }}</p>
                                    <p class="text-xs text-slate-500 font-medium">{{ $t->company }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <p class="text-sm text-slate-600 line-clamp-2 italic leading-relaxed">"{{ $t->description }}"</p>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <button
                                wire:click="toggleStatus({{ $t->id }})"
                                class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[10px] font-bold tracking-wide transition-all
                                           {{ $t->is_active 
                                                ? 'bg-emerald-50 text-emerald-600 border border-emerald-100' 
                                                : 'bg-slate-100 text-slate-400 border border-slate-200' }}">
                                <span class="w-1.5 h-1.5 rounded-full {{ $t->is_active ? 'bg-emerald-500 animate-pulse' : 'bg-slate-400' }}"></span>
                                {{ $t->is_active ? 'ENABLED' : 'DISABLED' }}
                            </button>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <button
                                    wire:click="edit({{ $t->id }})"
                                    class="w-8 h-8 rounded-lg flex items-center justify-center text-slate-400 hover:bg-secondary/10 hover:text-secondary transition-all">
                                    <i class="ri-edit-box-line text-lg"></i>
                                </button>
                                <button
                                    wire:click="delete({{ $t->id }})"
                                    wire:confirm="Are you sure you want to delete this testimonial?"
                                    class="w-8 h-8 rounded-lg flex items-center justify-center text-slate-400 hover:bg-rose-50 hover:text-rose-500 transition-all">
                                    <i class="ri-delete-bin-line text-lg"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-6 py-20 text-center">
                            <div class="flex flex-col items-center gap-3">
                                <div class="w-16 h-16 bg-slate-50 rounded-full flex items-center justify-center text-slate-300">
                                    <i class="ri-message-3-line text-3xl"></i>
                                </div>
                                <p class="text-slate-400 font-bold text-sm">No testimonials discovered</p>
                                <button wire:click="addTestimonial" class="text-secondary text-xs font-bold uppercase hover:underline">Add First Now</button>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="p-6 border-t border-slate-100 bg-slate-50/30">
            {{ $testimonials->links() }}
        </div>
    </div>

    <!-- Pines UI Modal (Client-side control) -->
    <div
        x-show="modalOpen"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-[60] flex items-center justify-center bg-slate-900/60 backdrop-blur-sm p-4"
        x-cloak>
        <div
            @click.away="modalOpen = false"
            class="bg-white w-full max-w-lg rounded-2xl shadow-2xl shadow-slate-900/10 overflow-hidden transform transition-all translate-z-0"
            x-show="modalOpen"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-8 scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 scale-100">
            <!-- Modal Header -->
            <div class="px-6 py-5 border-b border-slate-100 flex items-center justify-between">
                <div>
                    <h2 class="text-xl font-bold text-slate-800 tracking-tight">
                        <span x-text="isEdit ? 'Edit Testimonial' : 'New Testimonial'"></span>
                    </h2>
                    <p class="text-[11px] text-slate-400 font-bold uppercase tracking-widest mt-0.5">Testimonial Builder</p>
                </div>
                <button @click="modalOpen = false" class="text-slate-400 hover:text-slate-800 transition-colors">
                    <i class="ri-close-circle-line text-2xl"></i>
                </button>
            </div>

            <!-- Modal Body (Livewire Sync) -->
            <form wire:submit.prevent="save">
                <div class="p-6 space-y-5">

                    <div class="grid grid-cols-2 gap-4">
                        <div class="space-y-2">
                            <label class="text-[11px] font-bold text-slate-400 uppercase tracking-widest">Client Name</label>
                            <input
                                type="text"
                                wire:model="name"
                                class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-secondary/10 focus:border-secondary transition-all"
                                placeholder="e.g. Aayush Bajaj">
                            @error('name') <span class="text-xs text-rose-500 font-bold italic">{{ $message }}</span> @enderror
                        </div>
                        <div class="space-y-2">
                            <label class="text-[11px] font-bold text-slate-400 uppercase tracking-widest">Company / Role</label>
                            <input
                                type="text"
                                wire:model="company"
                                class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-secondary/10 focus:border-secondary transition-all"
                                placeholder="e.g. Grevx Inc.">
                            @error('company') <span class="text-xs text-rose-500 font-bold italic">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label class="text-[11px] font-bold text-slate-400 uppercase tracking-widest">The Shoutout (Description)</label>
                        <textarea
                            wire:model="description"
                            rows="4"
                            class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-secondary/10 focus:border-secondary transition-all resize-none"
                            placeholder="What did they say about you?"></textarea>
                        @error('description') <span class="text-xs text-rose-500 font-bold italic">{{ $message }}</span> @enderror
                    </div>

                    <div class="flex items-center gap-3 bg-slate-50 p-4 rounded-xl border border-slate-200">
                        <div class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" wire:model="is_active" class="sr-only peer">
                            <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-secondary"></div>
                        </div>
                        <span class="text-xs font-bold text-slate-600">Active and visible on website</span>
                    </div>

                </div>

                <!-- Modal Footer -->
                <div class="p-6 bg-slate-50/50 border-t border-slate-100 flex items-center justify-end gap-3">
                    <button
                        type="button"
                        @click="modalOpen = false"
                        class="px-5 py-2 text-sm font-bold text-slate-500 hover:text-slate-800 transition-colors uppercase">
                        Back
                    </button>
                    <button
                        type="submit"
                        class="px-6 py-2.5 bg-secondary text-white text-sm font-bold rounded-xl hover:bg-secondary/90 shadow-lg shadow-secondary/10 transition-all transform hover:-translate-y-px uppercase">
                        <span wire:loading.remove>Save Testimonial</span>
                        <span wire:loading>Processing...</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Pines UI Inspired Success Notification -->
    <div
        x-show="notification.show"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="translate-y-12 opacity-0"
        x-transition:enter-end="translate-y-0 opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="translate-y-0 opacity-100"
        x-transition:leave-end="translate-y-12 opacity-0"
        class="fixed bottom-6 right-6 z-[100]"
        x-cloak>
        <div class="bg-slate-900 border border-white/10 text-white px-6 py-4 rounded-2xl shadow-2xl flex items-center gap-3">
            <div class="w-8 h-8 rounded-full bg-emerald-500 flex items-center justify-center">
                <i class="ri-check-line font-bold"></i>
            </div>
            <p class="text-sm font-bold" x-text="notification.message"></p>
        </div>
    </div>

</div>