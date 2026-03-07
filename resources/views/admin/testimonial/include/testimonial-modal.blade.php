<div
    x-data="{ modalOpen: false }"
    x-on:open-modal.window="modalOpen = true"
    x-on:close-modal.window="modalOpen = false"
    x-cloak>
    <template x-teleport="body">
        <div x-show="modalOpen" class="fixed inset-0 z-[99] flex items-center justify-center px-4">
            <div @click="modalOpen=false" class="absolute inset-0 bg-black/40"></div>

            <div
                x-show="modalOpen"
                x-transition
                x-trap.inert.noscroll="modalOpen"
                class="relative w-full max-w-xl rounded-xl bg-white p-6 shadow-xl">

                <h3 class="text-lg font-semibold text-slate-900 mb-4">
                    {{ $testimonial_id ? 'Edit Testimonial' : 'Add Testimonial' }}
                </h3>

                <form wire:submit.prevent="save">
                    <div class="space-y-4">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-medium text-slate-600 mb-1">Client Name</label>
                                <input
                                    wire:model="name"
                                    placeholder="e.g. Aayush Bajaj"
                                    class="w-full rounded-md border border-slate-300 px-3 py-2 text-sm text-slate-800
                                            focus:border-blue-500 focus:ring-2 focus:ring-blue-500/40 outline-none">
                                @error('name') <span class="text-red-500 text-[10px] mt-1 block">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label class="block text-xs font-medium text-slate-600 mb-1">Company / Role</label>
                                <input
                                    wire:model="company"
                                    placeholder="e.g. Grevx Inc."
                                    class="w-full rounded-md border border-slate-300 px-3 py-2 text-sm text-slate-800
                                            focus:border-blue-500 focus:ring-2 focus:ring-blue-500/40 outline-none">
                                @error('company') <span class="text-red-500 text-[10px] mt-1 block">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-medium text-slate-600 mb-1">The Shoutout (Description)</label>
                            <textarea
                                wire:model="description"
                                placeholder="What did they say about you?"
                                class="w-full rounded-md border border-slate-300 px-3 py-2 text-sm text-slate-800
                                       focus:border-blue-500 focus:ring-2 focus:ring-blue-500/40 outline-none"
                                rows="4"></textarea>
                            @error('description') <span class="text-red-500 text-[10px] mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <label class="inline-flex items-center gap-2 text-sm text-slate-700 cursor-pointer">
                            <input type="checkbox" wire:model="is_active" class="rounded border-slate-300 text-blue-600 focus:ring-blue-500">
                            <span>Active and visible on website</span>
                        </label>
                    </div>

                    <div class="mt-6 flex justify-end gap-3">
                        <button
                            type="button"
                            @click="modalOpen=false"
                            class="rounded-md border border-slate-200 px-4 py-2 text-sm font-medium text-slate-700 hover:bg-slate-50 transition-colors">
                            Cancel
                        </button>
                        <button
                            type="submit"
                            class="inline-flex items-center gap-1 rounded-md bg-blue-600 px-4 py-2 text-sm font-medium text-white
                                    hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/60 focus:ring-offset-1 transition-colors">
                            <i class="ri-save-3-line text-base" wire:loading.remove></i>
                            <span wire:loading.remove>Save Testimonial</span>
                            <span wire:loading>Saving...</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </template>
</div>