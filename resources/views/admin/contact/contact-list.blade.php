<?php

use App\Models\Contact;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

new #[Layout('layouts.admin')] class extends Component {
    use WithPagination;

    #[Url]
    public string $search = '';

    #[Url]
    public string $status = 'all';
    public ?int $deleteId = null;

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function updatingStatus(): void
    {
        $this->resetPage();
    }

    public function markAsRead(int $id): void
    {
        $contact = Contact::findOrFail($id);
        $contact->is_read = true;
        $contact->save();

        $this->dispatch('toast-show', [
            'message' => 'Contact marked as read.',
            'type' => 'success',
            'position' => 'top-right',
        ]);
    }

    public function markAsUnread(int $id): void
    {
        $contact = Contact::findOrFail($id);
        $contact->is_read = false;
        $contact->save();

        $this->dispatch('toast-show', [
            'message' => 'Contact marked as unread.',
            'type' => 'success',
            'position' => 'top-right',
        ]);
    }

    public function confirmDelete(int $id): void
    {
        $this->deleteId = $id;
        $this->dispatch('open-delete-modal');
    }

    public function deleteConfirmed(): void
    {
        if (!$this->deleteId) {
            return;
        }

        Contact::findOrFail($this->deleteId)->delete();
        $this->reset('deleteId');
        $this->dispatch('close-delete-modal');

        $this->dispatch('toast-show', [
            'message' => 'Contact deleted successfully.',
            'type' => 'success',
            'position' => 'top-right',
        ]);
    }

    public function with(): array
    {
        $query = Contact::query()
            ->when($this->search !== '', function ($q) {
                $q->where(function ($sub) {
                    $sub->where('name', 'like', '%' . $this->search . '%')
                        ->orWhere('email', 'like', '%' . $this->search . '%')
                        ->orWhere('phone', 'like', '%' . $this->search . '%')
                        ->orWhere('subject', 'like', '%' . $this->search . '%')
                        ->orWhere('message', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->status === 'read', fn($q) => $q->where('is_read', true))
            ->when($this->status === 'unread', fn($q) => $q->where('is_read', false))
            ->latest();

        return [
            'contacts' => $query->paginate(10),
            'totalCount' => Contact::count(),
            'readCount' => Contact::where('is_read', true)->count(),
            'unreadCount' => Contact::where('is_read', false)->count(),
        ];
    }
};
?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
    <div class="mb-6">
        <h1 class="text-xl font-semibold text-slate-900">Contact Enquiries</h1>
        <p class="mt-1 text-sm text-slate-500">Manage incoming contact requests from the website.</p>
    </div>

    <div class="space-y-4">
        <div class="grid gap-3 sm:grid-cols-3">
            <div class="rounded-xl border border-slate-200 bg-white p-4">
                <p class="text-xs text-slate-500">Total</p>
                <p class="mt-1 text-2xl font-semibold text-slate-900">{{ $totalCount }}</p>
            </div>
            <div class="rounded-xl border border-slate-200 bg-white p-4">
                <p class="text-xs text-slate-500">Unread</p>
                <p class="mt-1 text-2xl font-semibold text-rose-600">{{ $unreadCount }}</p>
            </div>
            <div class="rounded-xl border border-slate-200 bg-white p-4">
                <p class="text-xs text-slate-500">Read</p>
                <p class="mt-1 text-2xl font-semibold text-emerald-600">{{ $readCount }}</p>
            </div>
        </div>

        <div class="flex flex-col gap-3 sm:flex-row sm:items-end sm:justify-between">
            <div class="w-full sm:max-w-xs">
                <label class="block text-xs font-medium text-slate-500 mb-1">Search</label>
                <div class="relative">
                    <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400 text-sm">
                        <i class="ri-search-line"></i>
                    </span>
                    <input
                        type="text"
                        wire:model.live.debounce.300ms="search"
                        placeholder="Name, email, subject..."
                        class="block w-full rounded-md border border-slate-300 bg-white pl-9 pr-3 py-2 text-sm text-slate-700 placeholder:text-slate-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/40 outline-none">
                </div>
            </div>

            <div class="w-full sm:w-56">
                <label class="block text-xs font-medium text-slate-500 mb-1">Status</label>
                <select
                    wire:model.live="status"
                    class="block w-full rounded-md border border-slate-300 bg-white px-3 py-2 text-sm text-slate-700 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/40 outline-none">
                    <option value="all">All</option>
                    <option value="unread">Unread</option>
                    <option value="read">Read</option>
                </select>
            </div>
        </div>

        <div class="hidden sm:block overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-slate-200 text-sm">
                    <thead class="bg-slate-50">
                        <tr class="text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                            <th class="px-4 py-3 w-12">#</th>
                            <th class="px-4 py-3">Contact</th>
                            <th class="px-4 py-3">Subject</th>
                            <th class="px-4 py-3">Message</th>
                            <th class="px-4 py-3">Date</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3 text-right w-52">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 bg-white">
                        @forelse($contacts as $contact)
                        <tr wire:key="contact-{{ $contact->id }}" class="hover:bg-slate-50/70 transition-colors">
                            <td class="px-4 py-3 text-slate-500">
                                {{ ($contacts->currentPage() - 1) * $contacts->perPage() + $loop->iteration }}
                            </td>
                            <td class="px-4 py-3">
                                <p class="font-medium text-slate-800">{{ $contact->name }}</p>
                                <p class="text-xs text-slate-500">{{ $contact->email ?: 'No email' }}</p>
                                <p class="text-xs text-slate-500">{{ $contact->phone ?: 'No phone' }}</p>
                            </td>
                            <td class="px-4 py-3 text-slate-700 font-medium">{{ $contact->subject }}</td>
                            <td class="px-4 py-3 text-slate-600 max-w-sm">
                                <p class="line-clamp-2">{{ $contact->message }}</p>
                            </td>
                            <td class="px-4 py-3 text-slate-500">{{ $contact->created_at->format('d M Y, h:i A') }}</td>
                            <td class="px-4 py-3">
                                <span class="inline-flex items-center gap-1 rounded-full px-2.5 py-1 text-xs font-semibold {{ $contact->is_read ? 'bg-emerald-100 text-emerald-700' : 'bg-rose-100 text-rose-700' }}">
                                    <span class="h-1.5 w-1.5 rounded-full {{ $contact->is_read ? 'bg-emerald-500' : 'bg-rose-500' }}"></span>
                                    {{ $contact->is_read ? 'Read' : 'Unread' }}
                                </span>
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center justify-end gap-2">
                                    @if($contact->is_read)
                                    <button
                                        wire:click="markAsUnread({{ $contact->id }})"
                                        class="inline-flex items-center gap-1 rounded-md border border-slate-200 px-2.5 py-1.5 text-xs font-medium text-slate-700 hover:bg-slate-100 transition-colors">
                                        Mark Unread
                                    </button>
                                    @else
                                    <button
                                        wire:click="markAsRead({{ $contact->id }})"
                                        class="inline-flex items-center gap-1 rounded-md border border-emerald-200 px-2.5 py-1.5 text-xs font-medium text-emerald-700 hover:bg-emerald-50 transition-colors">
                                        Mark Read
                                    </button>
                                    @endif

                                    <button
                                        wire:click="confirmDelete({{ $contact->id }})"
                                        class="inline-flex items-center gap-1 rounded-md border border-rose-200 px-2.5 py-1.5 text-xs font-medium text-rose-600 hover:bg-rose-50 transition-colors">
                                        <i class="ri-delete-bin-6-line text-sm"></i>
                                        Delete
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="px-4 py-8 text-center text-sm text-slate-500">No contact enquiries found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="space-y-3 sm:hidden">
            @forelse($contacts as $contact)
            <div class="rounded-xl border border-slate-200 bg-white p-4 shadow-sm">
                <div class="flex items-start justify-between gap-3">
                    <div>
                        <p class="text-sm font-semibold text-slate-900">{{ $contact->name }}</p>
                        <p class="text-xs text-slate-500">{{ $contact->email ?: 'No email' }}</p>
                        <p class="text-xs text-slate-500">{{ $contact->phone ?: 'No phone' }}</p>
                    </div>
                    <span class="inline-flex items-center gap-1 rounded-full px-2 py-0.5 text-[11px] font-semibold {{ $contact->is_read ? 'bg-emerald-100 text-emerald-700' : 'bg-rose-100 text-rose-700' }}">
                        {{ $contact->is_read ? 'Read' : 'Unread' }}
                    </span>
                </div>

                <p class="mt-3 text-xs font-semibold text-slate-700">{{ $contact->subject }}</p>
                <p class="mt-1 text-xs text-slate-600 line-clamp-3">{{ $contact->message }}</p>
                <p class="mt-2 text-[11px] text-slate-500">{{ $contact->created_at->format('d M Y, h:i A') }}</p>

                <div class="mt-4 flex items-center justify-end gap-2">
                    @if($contact->is_read)
                    <button
                        wire:click="markAsUnread({{ $contact->id }})"
                        class="inline-flex items-center rounded-md border border-slate-200 px-2.5 py-1.5 text-[11px] font-semibold text-slate-700 hover:bg-slate-100">
                        Mark Unread
                    </button>
                    @else
                    <button
                        wire:click="markAsRead({{ $contact->id }})"
                        class="inline-flex items-center rounded-md border border-emerald-200 px-2.5 py-1.5 text-[11px] font-semibold text-emerald-700 hover:bg-emerald-50">
                        Mark Read
                    </button>
                    @endif

                    <button
                        wire:click="confirmDelete({{ $contact->id }})"
                        class="inline-flex items-center rounded-md border border-rose-200 px-2.5 py-1.5 text-[11px] font-semibold text-rose-600 hover:bg-rose-50">
                        Delete
                    </button>
                </div>
            </div>
            @empty
            <div class="rounded-xl border border-dashed border-slate-200 bg-slate-50 px-4 py-8 text-center text-sm text-slate-500">
                No contact enquiries found.
            </div>
            @endforelse
        </div>

        <div class="mt-3 flex justify-end">
            {{ $contacts->links() }}
        </div>

        @include('admin.contact.include.delete')
    </div>
</div>
