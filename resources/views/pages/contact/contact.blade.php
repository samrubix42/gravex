<?php

use Livewire\Component;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;

new class extends Component
{
    public string $name = '';
    public ?string $phone = null;
    public ?string $email = null;
    public string $subject = '';
    public string $message = '';

    protected function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:2', 'max:100'],
            'phone' => ['nullable', 'regex:/^[0-9+\-\s()]{7,20}$/'],
            'email' => ['nullable', 'email', 'max:255'],
            'subject' => ['required', 'string', 'min:3', 'max:150'],
            'message' => ['required', 'string', 'min:10', 'max:5000'],
        ];
    }

    protected function messages(): array
    {
        return [
            'name.required' => 'Please enter your full name.',
            'name.min' => 'Name must be at least 2 characters.',
            'phone.regex' => 'Please enter a valid phone number.',
            'email.email' => 'Please enter a valid email address.',
            'subject.required' => 'Please enter a subject.',
            'subject.min' => 'Subject must be at least 3 characters.',
            'message.required' => 'Please enter your message.',
            'message.min' => 'Message must be at least 10 characters.',
        ];
    }

    public function updated($property): void
    {
        if (in_array($property, ['phone', 'email'], true) && blank($this->{$property})) {
            $this->resetErrorBag($property);
            return;
        }

        $this->resetErrorBag('contact');
        $this->validateOnly($property);
    }

    public function submit(): void
    {
        $this->name = trim($this->name);
        $this->phone = blank($this->phone) ? null : trim($this->phone);
        $this->email = blank($this->email) ? null : trim($this->email);
        $this->subject = trim($this->subject);
        $this->message = trim($this->message);

        $validated = $this->validate();
        if (empty($validated['phone']) && empty($validated['email'])) {
            $this->addError('contact', 'Please provide at least a phone number or email address.');
            return;
        }

        $contact = Contact::create([
            'name' => $validated['name'],
            'phone' => $validated['phone'] ?: null,
            'email' => $validated['email'] ?: null,
            'subject' => $validated['subject'],
            'message' => $validated['message'],
            'is_read' => false,
        ]);

        Mail::to('samcool3203@gmail.com')->send(new \App\Mail\ContactSubmissionMail($contact));

        $this->reset(['name', 'phone', 'email', 'subject', 'message']);
        $this->resetErrorBag();
        session()->flash('success', 'Thank you. Your message has been submitted successfully.');
    }
};
?>

@section('title', 'Contact Grevx Consulting')
@section('meta_description', 'Get in touch with Grevx for consulting, training, or advisory support. Share your goals and our team will respond.')

<div>

    <!-- HERO -->
    <section class="relative pt-24 sm:pt-28 md:pt-32 pb-16 sm:pb-20 bg-blue-50/20 overflow-hidden border-b border-border">
        <div class="absolute inset-0 opacity-30 pointer-events-none">
            <div class="absolute w-[420px] h-[420px] bg-secondary/10 rounded-full blur-3xl -top-28 -left-28"></div>
            <div class="absolute w-[320px] h-[320px] bg-accent/10 rounded-full blur-3xl bottom-0 right-0"></div>
        </div>

        <div class="relative max-w-5xl mx-auto px-4 sm:px-6 text-center">

            <p class="text-sm font-semibold tracking-widest text-secondary uppercase">
                Contact Us
            </p>

            <h1 class="mt-4 text-3xl sm:text-4xl md:text-5xl font-bold text-text-primary leading-tight">
                Let's Talk About Your <span class="text-secondary">Business</span>
            </h1>

            <p class="mt-5 sm:mt-6 text-base sm:text-lg text-zinc-700 max-w-2xl mx-auto">
                Whether you have a question, project idea, or partnership opportunity,
                our team is ready to help.
            </p>

        </div>

    </section>



    <section class="py-20 sm:py-24 bg-background">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 grid lg:grid-cols-2 gap-10 sm:gap-14 lg:gap-16">

        <!-- LEFT SIDE INFO -->
        <div>

            <h2 class="text-xl sm:text-2xl font-semibold text-text-primary">
                Contact <span class="text-secondary">Information</span>
            </h2>

            <p class="mt-4 text-zinc-700">
                Reach out to us directly using the information below or send
                a message using the form.
            </p>


            <!-- EMAIL -->
            <div class="mt-8 sm:mt-10 flex items-start gap-4">

                <div class="w-12 h-12 rounded-lg border border-border bg-secondary/10 text-secondary flex items-center justify-center text-lg">
                    <i class="ri-mail-line"></i>
                </div>

                <div>
                    <p class="font-semibold text-text-primary">Email</p>
                    <p class="text-zinc-700">grevxconsulting@gmail.com</p>
                </div>

            </div>


            <!-- PHONE -->
            <div class="mt-8 flex items-start gap-4">

                <div class="w-12 h-12 rounded-lg border border-border bg-secondary/10 text-secondary flex items-center justify-center text-lg">
                    <i class="ri-phone-line"></i>
                </div>

                <div>
                    <p class="font-semibold text-text-primary">Phone</p>

                    <div class="text-zinc-700 space-y-2 mt-1">

                        <p class="flex items-center gap-2">
                            <i class="ri-map-pin-2-line text-secondary"></i>
                            India: +91-8376059410
                        </p>

                        <p class="flex items-center gap-2">
                            <i class="ri-map-pin-2-line text-secondary"></i>
                            UAE: +971588440121
                        </p>

                    </div>
                </div>

            </div>


            <!-- LOCATION -->
            <div class="mt-8 flex items-start gap-4">

                <div class="w-12 h-12 rounded-lg border border-border bg-secondary/10 text-secondary flex items-center justify-center text-lg">
                    <i class="ri-map-pin-line"></i>
                </div>

                <div>
                    <p class="font-semibold text-text-primary">Location</p>
                    <p class="text-zinc-700">UAE | USA | India</p>
                </div>

            </div>

        </div>



        <!-- CONTACT FORM -->
        <div class="border border-border bg-white rounded-xl p-6 sm:p-8 shadow-sm">

            <h3 class="text-lg sm:text-xl font-semibold text-text-primary">
                Send a <span class="text-secondary">Message</span>
            </h3>

            <p class="mt-2 text-zinc-700">
                Fill  the form  and our team will contact to you within 48 hours.
            </p>


            @if (session('success'))
            <div class="mt-6 rounded-md bg-secondary/10 text-secondary px-4 py-3 text-sm">
                {{ session('success') }}
            </div>
            @endif

            @error('contact')
            <div class="mt-6 rounded-md bg-red-50 text-red-700 px-4 py-3 text-sm">
                {{ $message }}
            </div>
            @enderror

            <form wire:submit.prevent="submit" class="mt-6 sm:mt-8 grid gap-5 sm:gap-6">

                <div>
                    <label class="text-sm font-medium text-text-primary">
                        Full Name
                    </label>

                    <input
                        type="text"
                        wire:model.live.debounce.300ms="name"
                        class="mt-2 w-full border border-border rounded-md px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-secondary/30"
                        placeholder="Your name">

                    @error('name')
                    <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>


                <div>
                    <label class="text-sm font-medium text-text-primary">
                        Phone Number
                    </label>

                    <input
                        type="text"
                        wire:model.live.debounce.300ms="phone"
                        class="mt-2 w-full border border-border rounded-md px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-secondary/30"
                        placeholder="+91 98XX XX XX XX">

                    @error('phone')
                    <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>


                <div>
                    <label class="text-sm font-medium text-text-primary">
                        Email Address
                    </label>

                    <input
                        type="email"
                        wire:model.live.debounce.300ms="email"
                        class="mt-2 w-full border border-border rounded-md px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-secondary/30"
                        placeholder="you@company.com">

                    @error('email')
                    <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>


                <div>
                    <label class="text-sm font-medium text-text-primary">
                        Subject
                    </label>

                    <input
                        type="text"
                        wire:model.live.debounce.300ms="subject"
                        class="mt-2 w-full border border-border rounded-md px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-secondary/30"
                        placeholder="Subject">

                    @error('subject')
                    <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>


                <div>
                    <label class="text-sm font-medium text-text-primary">
                        Message
                    </label>

                    <textarea
                        rows="5"
                        wire:model.live.debounce.300ms="message"
                        class="mt-2 w-full border border-border rounded-md px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-secondary/30"
                        placeholder="Write your message"></textarea>

                    @error('message')
                    <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>


                <button
                    type="submit"
                    class="mt-2 w-full bg-secondary text-white py-3 rounded-md font-medium hover:bg-secondary/90 transition">

                    <span wire:loading.remove wire:target="submit">
                        Submit Message
                    </span>

                    <span wire:loading wire:target="submit">
                        Submitting...
                    </span>

                </button>

            </form>

        </div>

    </div>

</section>





</div>
