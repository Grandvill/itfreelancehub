@extends('layouts.app')

@section('title', 'Book a Service - ITFreelanceHub')

@section('content')

@php
    $selectedService = $selectedService ?? old('service_id');
    $selectedServiceData = $selectedServiceData ?? null;
@endphp


<!-- Booking Header -->
<section class="bg-gradient-to-r from-blue-600 to-blue-800 text-white py-16">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">Book Our Services</h1>
        <p class="text-xl text-blue-100 max-w-2xl mx-auto">
            Fill out the form below and we'll get back to you within 24 hours to discuss your project
        </p>
    </div>
</section>

<!-- Success/Error Messages -->
@if(session('success'))
<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mx-4 mt-4 alert" role="alert">
    <span class="block sm:inline">{{ session('success') }}</span>
    <span class="absolute top-0 bottom-0 right-0 px-4 py-3 alert-close cursor-pointer">
        <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
            <title>Close</title>
            <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
        </svg>
    </span>
</div>
@endif

@if($errors->any())
<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mx-4 mt-4 alert" role="alert">
    <ul class="list-disc list-inside">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    <span class="absolute top-0 bottom-0 right-0 px-4 py-3 alert-close cursor-pointer">
        <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
            <title>Close</title>
            <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
        </svg>
    </span>
</div>
@endif

<!-- Booking Form -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                <div class="md:flex">
                    <!-- Form Section -->
                    <div class="md:w-2/3 p-8">
                        <div class="mb-8">
                            <h2 class="text-2xl font-bold text-gray-900 mb-2">Project Details</h2>
                            <p class="text-gray-600">Tell us about your project requirements and we'll create a custom
                                solution for you.</p>
                        </div>

                        <form action="{{ route('booking.store') }}" method="POST" class="space-y-6">
                            @csrf

                            <!-- Personal Information -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">
                                        <i class="fas fa-user mr-1"></i> Full Name *
                                    </label>
                                    <input type="text" id="name" name="name" required
                                        value="{{ old('name') }}"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all @error('name') border-red-500 @enderror"
                                        placeholder="Your full name">
                                    @error('name')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                                        <i class="fas fa-envelope mr-1"></i> Email Address *
                                    </label>
                                    <input type="email" id="email" name="email" required
                                        value="{{ old('email') }}"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all @error('email') border-red-500 @enderror"
                                        placeholder="your@email.com">
                                    @error('email')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="phone" class="block text-sm font-semibold text-gray-700 mb-2">
                                        <i class="fas fa-phone mr-1"></i> Phone Number
                                    </label>
                                    <input type="tel" id="phone" name="phone"
                                        value="{{ old('phone') }}"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all @error('phone') border-red-500 @enderror"
                                        placeholder="+62 812 3456 7890">
                                    @error('phone')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="company" class="block text-sm font-semibold text-gray-700 mb-2">
                                        <i class="fas fa-building mr-1"></i> Company Name
                                    </label>
                                    <input type="text" id="company" name="company"
                                        value="{{ old('company') }}"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all @error('company') border-red-500 @enderror"
                                        placeholder="Your company name">
                                    @error('company')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <!-- Service Selection -->
                            <div>
                                <label for="service" class="block text-sm font-semibold text-gray-700 mb-2">
                                    <i class="fas fa-briefcase mr-1"></i> Select Service *
                                </label>
                                <select id="service" name="service_id" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all @error('service_id') border-red-500 @enderror"
                                    onchange="updateServicePrice()">
                                    <option value="">Choose a service...</option>
                                    @if($services && $services->count() > 0)
                                        @foreach($services as $service)
                                            <option value="{{ $service->id }}"
                                                {{ (old('service_id') == $service->id || $selectedService == $service->id) ? 'selected' : '' }}
                                                data-price="{{ $service->price }}">
                                                {{ $service->title }} (Rp {{ number_format($service->price, 0, ',', '.') }})
                                            </option>

                                        @endforeach
                                    @endif
                                </select>
                                @error('service_id')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Service Price (auto-filled) -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    <i class="fas fa-money-bill-wave mr-1"></i> Service Price
                                </label>
                                <div class="w-full px-4 py-3 border border-gray-300 rounded-lg bg-gray-50">
                                    <span id="servicePriceDisplay">
                                        @if(isset($selectedServiceData) && $selectedServiceData)
                                            Rp {{ number_format($selectedServiceData->price, 0, ',', '.') }}
                                        @else
                                            Please select a service first
                                        @endif
                                    </span>
                                    <input type="hidden" id="servicePrice" name="service_price"
                                        value="{{ $selectedServiceData ? $selectedServiceData->price : old('service_price') }}">
                                </div>
                            </div>

                            <!-- Project Timeline -->
                            <div>
                                <label for="timeline" class="block text-sm font-semibold text-gray-700 mb-2">
                                    <i class="fas fa-calendar mr-1"></i> Project Timeline
                                </label>
                                <select id="timeline" name="timeline"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all @error('timeline') border-red-500 @enderror">
                                    <option value="">Select timeline</option>
                                    <option value="asap" {{ old('timeline') == 'asap' ? 'selected' : '' }}>ASAP</option>
                                    <option value="1-2-weeks" {{ old('timeline') == '1-2-weeks' ? 'selected' : '' }}>1-2 weeks</option>
                                    <option value="1-month" {{ old('timeline') == '1-month' ? 'selected' : '' }}>1 month</option>
                                    <option value="2-3-months" {{ old('timeline') == '2-3-months' ? 'selected' : '' }}>2-3 months</option>
                                    <option value="flexible" {{ old('timeline') == 'flexible' ? 'selected' : '' }}>Flexible</option>
                                </select>
                                @error('timeline')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="message" class="block text-sm font-semibold text-gray-700 mb-2">
                                    <i class="fas fa-comment-alt mr-1"></i> Project Description *
                                </label>
                                <textarea id="message" name="message" rows="5" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all @error('message') border-red-500 @enderror"
                                    placeholder="Please describe your project requirements, goals, and any specific features you need...">{{ old('message') }}</textarea>
                                @error('message')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <button type="submit"
                                class="w-full bg-blue-600 text-white py-4 px-6 rounded-lg hover:bg-blue-700 transition-colors font-semibold text-lg">
                                <i class="fas fa-paper-plane mr-2"></i>
                                Submit Booking Request
                            </button>
                        </form>
                    </div>

                    <!-- Info Section -->
                    <div class="md:w-1/3 bg-blue-600 text-white p-8">
                        <h3 class="text-xl font-bold mb-6">What Happens Next?</h3>

                        <div class="space-y-6">
                            <div class="flex items-start space-x-3">
                                <div class="bg-white bg-opacity-20 rounded-full p-2 mt-1">
                                    <i class="fas fa-check text-sm"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold mb-1">1. Review</h4>
                                    <p class="text-blue-100 text-sm">We'll review your requirements within 24 hours</p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-3">
                                <div class="bg-white bg-opacity-20 rounded-full p-2 mt-1">
                                    <i class="fas fa-phone text-sm"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold mb-1">2. Consultation</h4>
                                    <p class="text-blue-100 text-sm">Free consultation call to discuss your project</p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-3">
                                <div class="bg-white bg-opacity-20 rounded-full p-2 mt-1">
                                    <i class="fas fa-file-alt text-sm"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold mb-1">3. Proposal</h4>
                                    <p class="text-blue-100 text-sm">Detailed proposal with timeline and pricing</p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-3">
                                <div class="bg-white bg-opacity-20 rounded-full p-2 mt-1">
                                    <i class="fas fa-rocket text-sm"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold mb-1">4. Start</h4>
                                    <p class="text-blue-100 text-sm">Project kickoff and development begins</p>
                                </div>
                            </div>
                        </div>

                        <div class="mt-8 p-4 bg-white bg-opacity-10 rounded-lg">
                            <h4 class="font-semibold mb-2">Need Help?</h4>
                            <p class="text-blue-100 text-sm mb-3">Contact us directly for immediate assistance</p>
                            <div class="space-y-2 text-sm">
                                <div class="flex items-center space-x-2">
                                    <i class="fas fa-envelope"></i>
                                    <span>info@itfreelancehub.com</span>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <i class="fas fa-phone"></i>
                                    <span>+62 812 3456 7890</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
// Function to update service price when service is selected
function updateServicePrice() {
    const serviceSelect = document.getElementById('service');
    const priceDisplay = document.getElementById('servicePriceDisplay');
    const priceInput = document.getElementById('servicePrice');

    if (serviceSelect.value) {
        const selectedOption = serviceSelect.options[serviceSelect.selectedIndex];
        const price = selectedOption.getAttribute('data-price');

        // Format the price as Rupiah
        const formattedPrice = new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0
        }).format(price);

        priceDisplay.textContent = formattedPrice;
        priceInput.value = price;
    } else {
        priceDisplay.textContent = 'Please select a service first';
        priceInput.value = '';
    }
}

// Initialize price when page loads
document.addEventListener('DOMContentLoaded', function() {
    updateServicePrice();

    // Close alert messages
    const closeButtons = document.querySelectorAll('.alert-close');
    closeButtons.forEach(button => {
        button.addEventListener('click', function() {
            this.closest('.alert').style.display = 'none';
        });
    });
});
</script>

@endsection
