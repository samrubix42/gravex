<?php
use App\Models\Contact;
use App\Models\Post;
use App\Models\Testimonial;
use Livewire\Attributes\Layout;
use Livewire\Component;

new #[Layout('layouts.admin')] class extends Component
{
    public function with(): array
    {
        return [
            'userName' => auth()->user()?->name ?? 'Admin',
            'totalContacts' => Contact::count(),
            'unreadContacts' => Contact::where('is_read', false)->count(),
            'postsCount' => Post::count(),
            'testimonialsCount' => Testimonial::count(),
            'recentContacts' => Contact::latest()->take(5)->get(),
        ];
    }
};
?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 space-y-8">

    <div class="space-y-2">
        <h1 class="text-2xl sm:text-3xl font-semibold text-slate-900">
            Welcome back, <span class="text-secondary font-semibold">{{ $userName }}</span>
        </h1>
        <p class="text-sm text-slate-500">
            Here is a quick snapshot of your activity across Grevx Consulting.
        </p>
    </div>

    <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
        <div class="rounded-xl border border-slate-200 bg-white p-4">
            <div class="flex items-center justify-between">
                <p class="text-xs text-slate-500">Total Enquiries</p>
                <span class="h-9 w-9 rounded-lg bg-secondary/10 text-secondary flex items-center justify-center">
                    <i class="ri-mail-line"></i>
                </span>
            </div>
            <p class="mt-2 text-2xl font-semibold text-slate-900">{{ $totalContacts }}</p>
        </div>

        <div class="rounded-xl border border-slate-200 bg-white p-4">
            <div class="flex items-center justify-between">
                <p class="text-xs text-slate-500">Unread Enquiries</p>
                <span class="h-9 w-9 rounded-lg bg-rose-50 text-rose-600 flex items-center justify-center">
                    <i class="ri-mail-unread-line"></i>
                </span>
            </div>
            <p class="mt-2 text-2xl font-semibold text-rose-600">{{ $unreadContacts }}</p>
        </div>

        <div class="rounded-xl border border-slate-200 bg-white p-4">
            <div class="flex items-center justify-between">
                <p class="text-xs text-slate-500">Blog Posts</p>
                <span class="h-9 w-9 rounded-lg bg-indigo-50 text-indigo-600 flex items-center justify-center">
                    <i class="ri-article-line"></i>
                </span>
            </div>
            <p class="mt-2 text-2xl font-semibold text-slate-900">{{ $postsCount }}</p>
        </div>

        <div class="rounded-xl border border-slate-200 bg-white p-4">
            <div class="flex items-center justify-between">
                <p class="text-xs text-slate-500">Testimonials</p>
                <span class="h-9 w-9 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center">
                    <i class="ri-message-3-line"></i>
                </span>
            </div>
            <p class="mt-2 text-2xl font-semibold text-slate-900">{{ $testimonialsCount }}</p>
        </div>
    </div>

    <div class="grid gap-6 lg:grid-cols-3">
        <div class="lg:col-span-2">
            <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">
                <div class="flex items-center justify-between border-b border-slate-100 px-6 py-4">
                    <h3 class="text-base font-semibold text-slate-900">Recent Enquiries</h3>
                    <a
                        href="{{ route('admin.contact-list') }}"
                        wire:navigate
                        class="text-xs font-semibold text-secondary hover:text-secondary/80">
                        View all
                    </a>
                </div>

                <div class="hidden sm:block overflow-x-auto">
                    <table class="min-w-full divide-y divide-slate-200 text-sm">
                        <thead class="bg-slate-50">
                            <tr class="text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                                <th class="px-4 py-3 w-12">#</th>
                                <th class="px-4 py-3">Contact</th>
                                <th class="px-4 py-3">Subject</th>
                                <th class="px-4 py-3">Date</th>
                                <th class="px-4 py-3">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 bg-white">
                            @forelse($recentContacts as $contact)
                            <tr class="hover:bg-slate-50/70 transition-colors">
                                <td class="px-4 py-3 text-slate-500">{{ $loop->iteration }}</td>
                                <td class="px-4 py-3">
                                    <p class="font-medium text-slate-800">{{ $contact->name }}</p>
                                    <p class="text-xs text-slate-500">{{ $contact->email ?: 'No email' }}</p>
                                </td>
                                <td class="px-4 py-3 text-slate-700">
                                    {{ $contact->subject ?: 'No subject' }}
                                </td>
                                <td class="px-4 py-3 text-slate-500">
                                    {{ $contact->created_at?->format('d M Y, h:i A') }}
                                </td>
                                <td class="px-4 py-3">
                                    <span class="inline-flex items-center gap-1 rounded-full px-2.5 py-1 text-xs font-semibold {{ $contact->is_read ? 'bg-emerald-100 text-emerald-700' : 'bg-rose-100 text-rose-700' }}">
                                        <span class="h-1.5 w-1.5 rounded-full {{ $contact->is_read ? 'bg-emerald-500' : 'bg-rose-500' }}"></span>
                                        {{ $contact->is_read ? 'Read' : 'Unread' }}
                                    </span>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="px-4 py-8 text-center text-sm text-slate-500">
                                    No recent enquiries.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="space-y-3 p-4 sm:hidden">
                    @forelse($recentContacts as $contact)
                    <div class="rounded-lg border border-slate-200 bg-white p-4">
                        <div class="flex items-start justify-between">
                            <div>
                                <p class="text-sm font-semibold text-slate-900">{{ $contact->name }}</p>
                                <p class="text-xs text-slate-500">{{ $contact->email ?: 'No email' }}</p>
                            </div>
                            <span class="inline-flex items-center gap-1 rounded-full px-2 py-0.5 text-[11px] font-semibold {{ $contact->is_read ? 'bg-emerald-100 text-emerald-700' : 'bg-rose-100 text-rose-700' }}">
                                {{ $contact->is_read ? 'Read' : 'Unread' }}
                            </span>
                        </div>
                        <p class="mt-2 text-xs font-semibold text-slate-700">{{ $contact->subject ?: 'No subject' }}</p>
                        <p class="mt-1 text-[11px] text-slate-500">{{ $contact->created_at?->format('d M Y, h:i A') }}</p>
                    </div>
                    @empty
                    <div class="rounded-lg border border-dashed border-slate-200 bg-slate-50 px-4 py-8 text-center text-sm text-slate-500">
                        No recent enquiries.
                    </div>
                    @endforelse
                </div>
            </div>
        </div>

        <div class="space-y-4">
            <div class="rounded-xl border border-slate-200 bg-white p-5">
                <h3 class="text-sm font-semibold text-slate-900">Quick Actions</h3>
                <p class="mt-1 text-xs text-slate-500">Jump to commonly used admin pages.</p>
                <div class="mt-4 space-y-2">
                    <a href="{{ route('admin.contact-list') }}" wire:navigate class="flex items-center justify-between rounded-md border border-slate-200 px-3 py-2 text-xs font-semibold text-slate-700 hover:bg-slate-50">
                        Contact enquiries
                        <i class="ri-arrow-right-line"></i>
                    </a>
                    <a href="{{ route('admin.blog.list') }}" wire:navigate class="flex items-center justify-between rounded-md border border-slate-200 px-3 py-2 text-xs font-semibold text-slate-700 hover:bg-slate-50">
                        Blog posts
                        <i class="ri-arrow-right-line"></i>
                    </a>
                    <a href="{{ route('admin.testimonial') }}" wire:navigate class="flex items-center justify-between rounded-md border border-slate-200 px-3 py-2 text-xs font-semibold text-slate-700 hover:bg-slate-50">
                        Testimonials
                        <i class="ri-arrow-right-line"></i>
                    </a>
                </div>
            </div>

            <div class="rounded-xl border border-slate-200 bg-secondary/10 p-5">
                <h3 class="text-sm font-semibold text-secondary">Unread Enquiries</h3>
                <p class="mt-2 text-3xl font-semibold text-slate-900">{{ $unreadContacts }}</p>
                <p class="mt-1 text-xs text-slate-600">Follow up on unread messages to keep response times tight.</p>
            </div>
        </div>
    </div>

</div>