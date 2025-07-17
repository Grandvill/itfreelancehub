@extends('layouts.app')

@section('title', 'ITFreelanceHub - Professional IT Services')

@section('content')

<!-- Success Message -->
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

@if(request()->get('success'))
<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mx-4 mt-4 alert" role="alert">
    <span class="block sm:inline">{{ request()->get('success') }}</span>
    <span class="absolute top-0 bottom-0 right-0 px-4 py-3 alert-close cursor-pointer">
        <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
            <title>Close</title>
            <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
        </svg>
    </span>
</div>
@endif

<!-- Hero Section -->
<section class="bg-gradient-to-br from-blue-600 via-blue-700 to-blue-800 text-white py-20">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div class="space-y-8">
                <div class="space-y-4">
                    <h1 class="text-4xl md:text-6xl font-bold leading-tight">
                        Welcome to <span class="text-yellow-400">ITFreelanceHub</span>
                    </h1>
                    <p class="text-xl text-blue-100 leading-relaxed">
                        Connect with top IT freelancers for your technology projects. From web development to
                        cybersecurity, we bring your digital vision to life.
                    </p>
                </div>

                <div class="space-y-4">
                    <div class="flex items-center space-x-3">
                        <i class="fas fa-check-circle text-green-400 text-xl"></i>
                        <span class="text-lg">Expert IT Professionals</span>
                    </div>
                    <div class="flex items-center space-x-3">
                        <i class="fas fa-check-circle text-green-400 text-xl"></i>
                        <span class="text-lg">Quality Guaranteed</span>
                    </div>
                    <div class="flex items-center space-x-3">
                        <i class="fas fa-check-circle text-green-400 text-xl"></i>
                        <span class="text-lg">24/7 Support</span>
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('services') }}"
                        class="bg-yellow-400 text-blue-900 px-8 py-3 rounded-lg font-semibold hover:bg-yellow-300 transition-colors text-center">
                        <i class="fas fa-briefcase mr-2"></i>
                        View Services
                    </a>
                    <a href="{{ route('booking') }}"
                        class="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-blue-900 transition-colors text-center">
                        <i class="fas fa-calendar-alt mr-2"></i>
                        Get Started
                    </a>
                </div>
            </div>

            <div class="relative">
                <div class="bg-white bg-opacity-10 backdrop-blur-lg rounded-2xl p-8 shadow-2xl">
                    <div class="grid grid-cols-2 gap-4">
                        <div class="bg-white bg-opacity-20 rounded-lg p-4 text-center">
                            <i class="fas fa-code text-3xl text-yellow-400 mb-2"></i>
                            <div class="text-2xl font-bold">500+</div>
                            <div class="text-sm text-blue-100">Projects</div>
                        </div>
                        <div class="bg-white bg-opacity-20 rounded-lg p-4 text-center">
                            <i class="fas fa-users text-3xl text-yellow-400 mb-2"></i>
                            <div class="text-2xl font-bold">100+</div>
                            <div class="text-sm text-blue-100">Clients</div>
                        </div>
                        <div class="bg-white bg-opacity-20 rounded-lg p-4 text-center">
                            <i class="fas fa-star text-3xl text-yellow-400 mb-2"></i>
                            <div class="text-2xl font-bold">4.9</div>
                            <div class="text-sm text-blue-100">Rating</div>
                        </div>
                        <div class="bg-white bg-opacity-20 rounded-lg p-4 text-center">
                            <i class="fas fa-clock text-3xl text-yellow-400 mb-2"></i>
                            <div class="text-2xl font-bold">24/7</div>
                            <div class="text-sm text-blue-100">Support</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Why Choose ITFreelanceHub?</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                We combine technical expertise with creative innovation to deliver exceptional IT solutions that help
                your business grow and succeed in the digital landscape.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="text-center group hover:transform hover:scale-105 transition-all duration-300">
                <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-blue-200 transition-colors">
                    <i class="fas fa-code text-2xl text-blue-600"></i>
                </div>
                <h3 class="text-xl font-semibold mb-2">Clean Code</h3>
                <p class="text-gray-600">We write maintainable, scalable code following industry best practices and standards.</p>
            </div>

            <div class="text-center group hover:transform hover:scale-105 transition-all duration-300">
                <div class="bg-green-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-green-200 transition-colors">
                    <i class="fas fa-mobile-alt text-2xl text-green-600"></i>
                </div>
                <h3 class="text-xl font-semibold mb-2">Responsive Design</h3>
                <p class="text-gray-600">Beautiful, responsive designs that work perfectly on all devices and screen sizes.</p>
            </div>

            <div class="text-center group hover:transform hover:scale-105 transition-all duration-300">
                <div class="bg-yellow-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-yellow-200 transition-colors">
                    <i class="fas fa-bolt text-2xl text-yellow-600"></i>
                </div>
                <h3 class="text-xl font-semibold mb-2">Fast Performance</h3>
                <p class="text-gray-600">Optimized applications that load quickly and provide excellent user experience.</p>
            </div>

            <div class="text-center group hover:transform hover:scale-105 transition-all duration-300">
                <div class="bg-red-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-red-200 transition-colors">
                    <i class="fas fa-shield-alt text-2xl text-red-600"></i>
                </div>
                <h3 class="text-xl font-semibold mb-2">Secure & Reliable</h3>
                <p class="text-gray-600">Built with security in mind and hosted on reliable, scalable infrastructure.</p>
            </div>
        </div>

        <!-- CTA Section -->
        <div class="mt-16 bg-gradient-to-r from-blue-600 to-blue-800 rounded-2xl p-8 md:p-12 text-white text-center">
            <h3 class="text-2xl md:text-3xl font-bold mb-4">Ready to Start Your Project?</h3>
            <p class="text-blue-100 mb-8 max-w-2xl mx-auto">
                Let's discuss your requirements and create something amazing together. We're here to help bring your
                vision to life with cutting-edge technology.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('services') }}"
                    class="bg-white text-blue-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-colors">
                    <i class="fas fa-eye mr-2"></i>
                    View Our Services
                </a>
                <a href="{{ route('booking') }}"
                    class="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-blue-600 transition-colors">
                    <i class="fas fa-rocket mr-2"></i>
                    Start Your Project
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
