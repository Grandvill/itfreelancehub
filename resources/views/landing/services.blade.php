@extends('layouts.app')

@section('title', 'Our Services - ITFreelanceHub')

@section('content')

<!-- Services Header -->
<section class="bg-gradient-to-r from-blue-600 to-blue-800 text-white py-16">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">Our Professional Services</h1>
        <p class="text-xl text-blue-100 max-w-2xl mx-auto">
            Comprehensive IT solutions tailored to meet your business needs and drive digital transformation
        </p>
    </div>
</section>

<!-- Services Grid -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @if($services && $services->count() > 0)
                @foreach($services as $service)
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="relative h-48 overflow-hidden">
                        <img src="{{ $service->image ? asset('storage/services/' . $service->image) : 'https://via.placeholder.com/400x250/3B82F6/FFFFFF?text=Service+Image' }}"
                            alt="{{ $service->title }}"
                            class="w-full h-full object-cover transition-transform duration-300 hover:scale-110">
                        <div class="absolute top-4 right-4">
                            <span class="bg-blue-600 text-white px-3 py-1 rounded-full text-sm font-semibold">
                                <i class="fas fa-star mr-1"></i>
                                Premium
                            </span>
                        </div>
                    </div>

                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-3">
                            {{ $service->title }}
                        </h3>
                        <p class="text-gray-600 mb-4 leading-relaxed">
                            {{ $service->description }}
                        </p>

                        <!-- Bagian Harga -->
                        <div class="mb-4">
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-500">Starting from:</span>
                                <span class="text-lg font-bold text-blue-600">
                                    Rp {{ number_format($service->price, 0, ',', '.') }}
                                </span>
                            </div>
                        </div>

                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-2 text-sm text-gray-500">
                                <i class="fas fa-clock"></i>
                                <span>2-4 weeks</span>
                            </div>
                            <a href="{{ route('booking', ['service' => $service->id]) }}"
                                class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition-colors font-semibold">
                                <i class="fas fa-calendar-plus mr-1"></i>
                                Book Now
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <div class="col-span-full text-center py-12">
                    <i class="fas fa-exclamation-circle text-4xl text-gray-400 mb-4"></i>
                    <h3 class="text-xl font-semibold text-gray-600 mb-2">No Services Available</h3>
                    <p class="text-gray-500">Please check back later for available services.</p>
                </div>
            @endif
        </div>
    </div>
</section>

<!-- Why Choose Us Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Why Choose Our Services?</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
                We deliver exceptional results through our proven methodology and commitment to excellence
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center">
                <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-users text-2xl text-blue-600"></i>
                </div>
                <h3 class="text-xl font-semibold mb-2">Expert Team</h3>
                <p class="text-gray-600">Skilled professionals with years of industry experience</p>
            </div>

            <div class="text-center">
                <div class="bg-green-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-thumbs-up text-2xl text-green-600"></i>
                </div>
                <h3 class="text-xl font-semibold mb-2">Quality Assurance</h3>
                <p class="text-gray-600">Rigorous testing and quality control processes</p>
            </div>

            <div class="text-center">
                <div class="bg-yellow-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-headset text-2xl text-yellow-600"></i>
                </div>
                <h3 class="text-xl font-semibold mb-2">24/7 Support</h3>
                <p class="text-gray-600">Round-the-clock support for all your needs</p>
            </div>
        </div>
    </div>
</section>

@endsection
