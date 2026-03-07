<?php

use App\Models\Testimonial;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

new #[Layout('layouts::admin')] class extends Component {
    use WithPagination;

    #[Url]
    public string $search = '';

    public ?int $testimonial_id = null;
    public string $name = '';
    public string $company = '';
    public string $description = '';
    public bool $is_active = true;

    public ?int $deleteId = null;

    protected function rules()
    {
        return [
            'name' => 'required|min:3',
            'company' => 'required',
            'description' => 'required|min:10',
        ];
    }

    /* -------------------------
        Modal Handlers
    --------------------------*/

    public function confirmDelete($id)
    {
        $this->deleteId = $id;
    }

    public function deleteConfirmed()
    {
        Testimonial::findOrFail($this->deleteId)->delete();
        $this->reset('deleteId');
        $this->dispatch('close-delete-modal');
        $this->dispatch('toast-show', [
            'message' => 'Testimonial deleted successfully!',
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
        $testimonial = Testimonial::findOrFail($id);
        $this->testimonial_id = $testimonial->id;
        $this->name = $testimonial->name;
        $this->company = $testimonial->company;
        $this->description = $testimonial->description;
        $this->is_active = $testimonial->is_active;
    }

    /* -------------------------
        Actions
    --------------------------*/

    public function save()
    {
        $this->validate();

        Testimonial::updateOrCreate(
            ['id' => $this->testimonial_id],
            [
                'name' => $this->name,
                'company' => $this->company,
                'description' => $this->description,
                'is_active' => $this->is_active,
            ]
        );

        $this->dispatch('toast-show', [
            'message' => $this->testimonial_id ? 'Testimonial updated successfully!' : 'Testimonial created successfully!',
            'type' => 'success',
            'position' => 'top-right',
        ]);

        $this->dispatch('close-modal');
        $this->resetForm();
    }

    public function toggleStatus($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $testimonial->is_active = !$testimonial->is_active;
        $testimonial->save();

        $this->dispatch('toast-show', [
            'message' => 'Status updated successfully!',
            'type' => 'success',
            'position' => 'top-right',
        ]);
    }

    public function resetForm()
    {
        $this->reset(['testimonial_id', 'name', 'company', 'description', 'is_active']);
        $this->is_active = true;
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

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">

    <!-- Page Heading -->
    <div class="mb-6">
        <h1 class="text-xl font-semibold text-slate-900">
            Testimonial List
        </h1>
        <p class="mt-1 text-sm text-slate-500">
            Manage client testimonials, their company details and visibility status.
        </p>
    </div>

    <!-- Main content container -->
    <div class="space-y-4">

        <!-- Top bar: search + create button -->
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div class="w-full sm:max-w-xs">
                <label class="block text-xs font-medium text-slate-500 mb-1">
                    Search Testimonials
                </label>
                <div class="relative">
                    <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400 text-sm">
                        <i class="ri-search-line"></i>
                    </span>
                    <input
                        type="text"
                        wire:model.live="search"
                        placeholder="Search by name or company..."
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
                    <span>Add Testimonial</span>
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
                            <th class="px-4 py-3">Client</th>
                            <th class="px-4 py-3">Company</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3 text-right w-40">Actions</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-100 bg-white">
                        @forelse($testimonials as $t)
                        <tr wire:key="t-{{ $t->id }}" class="hover:bg-slate-50/80 transition-colors">
                            <td class="px-4 py-3 text-slate-500">
                                {{ $loop->iteration }}
                            </td>
                            <td class="px-4 py-3 font-medium text-slate-800">
                                {{ $t->name }}
                            </td>
                            <td class="px-4 py-3 text-slate-600">
                                {{ $t->company }}
                            </td>
                            <td class="px-4 py-3">
                                <button
                                    wire:click="toggleStatus({{ $t->id }})"
                                    class="inline-flex items-center gap-1 rounded-full px-2.5 py-1 text-xs font-semibold transition-all
                                        {{ $t->is_active 
                                             ? 'bg-emerald-100 text-emerald-700 hover:bg-emerald-200' 
                                             : 'bg-rose-100 text-rose-700 hover:bg-rose-200' }}">
                                    <span class="h-1.5 w-1.5 rounded-full {{ $t->is_active ? 'bg-emerald-500' : 'bg-rose-500' }}"></span>
                                    {{ $t->is_active ? 'Active' : 'Inactive' }}
                                </button>
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center justify-end gap-2">
                                    <button
                                        @click="$dispatch('open-modal'); $wire.openEditModal({{ $t->id }})"
                                        class="inline-flex items-center gap-1 rounded-md border border-slate-200 px-2.5 py-1.5
                                                   text-xs font-medium text-slate-700 hover:bg-slate-100 transition-colors">
                                        <i class="ri-edit-line text-sm"></i>
                                        Edit
                                    </button>

                                    <button
                                        @click="$dispatch('open-delete-modal'); $wire.confirmDelete({{ $t->id }})"
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
                                No testimonials found.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Card list (mobile) -->
        <div class="space-y-3 sm:hidden">
            @forelse($testimonials as $t)
            <div wire:key="t-card-{{ $t->id }}" class="rounded-xl border border-slate-200 bg-white p-4 shadow-sm transition-all hover:shadow-md">
                <div class="flex items-start justify-between gap-3">
                    <div>
                        <p class="text-sm font-semibold text-slate-900">
                            {{ $t->name }}
                        </p>
                        <p class="mt-0.5 text-xs text-slate-500 font-medium">
                            {{ $t->company }}
                        </p>
                    </div>

                    <div class="text-right">
                        <button
                            wire:click="toggleStatus({{ $t->id }})"
                            class="inline-flex items-center gap-1 rounded-full px-2 py-0.5 text-[11px] font-bold
                                {{ $t->is_active ? 'bg-emerald-100 text-emerald-700' : 'bg-rose-100 text-rose-700' }}">
                            {{ $t->is_active ? 'Active' : 'Inactive' }}
                        </button>
                    </div>
                </div>

                <div class="mt-4 flex items-center justify-end gap-2 text-[11px]">
                    <button
                        @click="$dispatch('open-modal'); $wire.openEditModal({{ $t->id }})"
                        class="inline-flex items-center gap-1 rounded-md border border-slate-200 px-2.5 py-1.5 font-bold text-slate-700 hover:bg-slate-100 transition-colors">
                        Edit
                    </button>

                    <button
                        @click="$dispatch('open-delete-modal'); $wire.confirmDelete({{ $t->id }})"
                        class="inline-flex items-center gap-1 rounded-md border border-rose-200 px-2.5 py-1.5 font-bold text-rose-600 hover:bg-rose-50 transition-colors">
                        Delete
                    </button>
                </div>
            </div>
            @empty
            <div class="rounded-xl border border-dashed border-slate-200 bg-slate-50 px-4 py-8 text-center text-sm text-slate-500">
                No testimonials found.
            </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-3 flex justify-end">
            {{ $testimonials->links() }}
        </div>

        <!-- Modals -->
        @include('admin.testimonial.include.testimonial-modal')
        @include('admin.testimonial.include.delete')

    </div>
</div>

</div>