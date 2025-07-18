@extends('layouts.app')

@section('title', 'Company Profile - ITFreelanceHub')

@section('content')

<!-- Company Profile Header -->
<section class="bg-gradient-to-r from-blue-600 to-blue-800 text-white py-16">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">About ITFreelanceHub</h1>
        <p class="text-xl text-blue-100 max-w-2xl mx-auto">
            Discover our story, meet our team, and learn about the values that drive our commitment to excellence in delivering world-class IT solutions.
        </p>
    </div>
</section>

<!-- Company Story Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center mb-16">
            <div class="space-y-6">
                <div>
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">Our Story</h2>
                    <div class="text-gray-600 leading-relaxed">
                        <p class="mb-4">
                            Founded in 2021, ITFreelanceHub began as a vision to bridge the gap between talented IT professionals and businesses seeking innovative digital solutions. What started as a small team of passionate developers has grown into a comprehensive platform serving clients worldwide.
                        </p>
                        <p class="mb-4">
                            Our journey has been marked by continuous learning, adaptation, and an unwavering commitment to quality. We've successfully delivered over 500 projects, ranging from simple websites to complex enterprise applications, always maintaining our core values of excellence, integrity, and innovation.
                        </p>
                        <p>
                            Today, we stand as a trusted partner for businesses looking to leverage technology for growth, offering a curated network of skilled freelancers and comprehensive project management services.
                        </p>
                    </div>
                </div>

                <!-- Statistics Grid -->
                <div class="grid grid-cols-2 gap-4">
                    <div class="text-center p-4 bg-blue-100 rounded-lg">
                        <i class="fas fa-project-diagram text-2xl text-blue-600 mb-2"></i>
                        <div class="text-2xl font-bold">500+</div>
                        <div class="text-sm">Projects Completed</div>
                    </div>
                    <div class="text-center p-4 bg-green-100 rounded-lg">
                        <i class="fas fa-users text-2xl text-green-600 mb-2"></i>
                        <div class="text-2xl font-bold">150+</div>
                        <div class="text-sm">Happy Clients</div>
                    </div>
                    <div class="text-center p-4 bg-yellow-100 rounded-lg">
                        <i class="fas fa-star text-2xl text-yellow-600 mb-2"></i>
                        <div class="text-2xl font-bold">4.9</div>
                        <div class="text-sm">Average Rating</div>
                    </div>
                    <div class="text-center p-4 bg-purple-100 rounded-lg">
                        <i class="fas fa-globe text-2xl text-purple-600 mb-2"></i>
                        <div class="text-2xl font-bold">25+</div>
                        <div class="text-sm">Countries Served</div>
                    </div>
                </div>
            </div>

            <div class="relative">
                <img src="images/company.jpg"
                     alt="Our Team Working" class="rounded-2xl shadow-2xl w-full h-96 object-cover">
                <div class="absolute -bottom-6 -left-6 bg-blue-600 text-white p-6 rounded-xl shadow-xl">
                    <div class="text-2xl font-bold">4+ Years</div>
                    <div class="text-blue-100">of Excellence</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Mission & Vision Section -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Mission -->
            <div class="bg-white rounded-2xl p-8 shadow-lg">
                <div class="flex items-center mb-6">
                    <div class="bg-blue-100 w-12 h-12 rounded-full flex items-center justify-center mr-4">
                        <i class="fas fa-bullseye text-2xl text-blue-600"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900">Our Mission</h3>
                </div>
                <div class="text-gray-600 leading-relaxed">
                    <p class="mb-4">
                        To empower businesses worldwide by connecting them with exceptional IT talent and providing comprehensive digital solutions that drive growth, innovation, and success.
                    </p>
                    <p>
                        We strive to create a seamless ecosystem where clients can access top-tier freelance professionals while ensuring quality, reliability, and outstanding results in every project we undertake.
                    </p>
                </div>
            </div>

            <!-- Vision -->
            <div class="bg-white rounded-2xl p-8 shadow-lg">
                <div class="flex items-center mb-6">
                    <div class="bg-green-100 w-12 h-12 rounded-full flex items-center justify-center mr-4">
                        <i class="fas fa-eye text-2xl text-green-600"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900">Our Vision</h3>
                </div>
                <div class="text-gray-600 leading-relaxed">
                    <p class="mb-4">
                        To become the world's leading platform for IT freelance services, recognized for our commitment to excellence, innovation, and the transformative impact we create for businesses globally.
                    </p>
                    <p>
                        We envision a future where every business, regardless of size or location, has access to world-class IT expertise that enables them to thrive in the digital economy.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Values Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Our Core Values</h2>
            <div class="text-xl text-gray-600 max-w-3xl mx-auto">
                <p class="mb-4">
                    Our values are the foundation of everything we do. They guide our decisions, shape our culture, and define how we interact with our clients, freelancers, and each other.
                </p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="text-center group hover:transform hover:scale-105 transition-all duration-300">
                <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-blue-200 transition-colors">
                    <i class="fas fa-award text-2xl text-blue-600"></i>
                </div>
                <h3 class="text-xl font-semibold mb-2">Excellence</h3>
                <p class="text-gray-600">We strive for perfection in every project, delivering solutions that exceed expectations and set new standards in the industry.</p>
            </div>

            <div class="text-center group hover:transform hover:scale-105 transition-all duration-300">
                <div class="bg-green-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-green-200 transition-colors">
                    <i class="fas fa-handshake text-2xl text-green-600"></i>
                </div>
                <h3 class="text-xl font-semibold mb-2">Integrity</h3>
                <p class="text-gray-600">Honesty, transparency, and ethical practices are at the core of all our business relationships and operations.</p>
            </div>

            <div class="text-center group hover:transform hover:scale-105 transition-all duration-300">
                <div class="bg-yellow-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-yellow-200 transition-colors">
                    <i class="fas fa-lightbulb text-2xl text-yellow-600"></i>
                </div>
                <h3 class="text-xl font-semibold mb-2">Innovation</h3>
                <p class="text-gray-600">We embrace cutting-edge technologies and creative solutions to solve complex challenges and drive digital transformation.</p>
            </div>

            <div class="text-center group hover:transform hover:scale-105 transition-all duration-300">
                <div class="bg-purple-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-purple-200 transition-colors">
                    <i class="fas fa-heart text-2xl text-purple-600"></i>
                </div>
                <h3 class="text-xl font-semibold mb-2">Passion</h3>
                <p class="text-gray-600">Our love for technology and commitment to client success drives us to go above and beyond in everything we do.</p>
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Meet Our Team</h2>
            <div class="text-xl text-gray-600 max-w-3xl mx-auto">
                <p class="mb-4">
                    Behind ITFreelanceHub is a dedicated team of professionals who are passionate about technology and committed to your success. Our diverse team brings together expertise from various fields to ensure comprehensive support for all your IT needs.
                </p>
                <p>
                    From project managers to technical specialists, our team works tirelessly to maintain the highest standards of service and ensure every client receives personalized attention and exceptional results.
                </p>
            </div>
        </div>

        <!-- Team Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white rounded-xl p-6 shadow-lg text-center">
                <img src="https://images.pexels.com/photos/2379004/pexels-photo-2379004.jpeg?auto=compress&cs=tinysrgb&w=300"
                     alt="CEO" class="w-24 h-24 rounded-full mx-auto mb-4 object-cover">
                <h3 class="text-xl font-semibold mb-2">Leadership Team</h3>
                <p class="text-gray-600">Experienced executives who guide our strategic vision and ensure operational excellence.</p>
            </div>

            <div class="bg-white rounded-xl p-6 shadow-lg text-center">
                <img src="https://images.pexels.com/photos/3184339/pexels-photo-3184339.jpeg?auto=compress&cs=tinysrgb&w=300"
                     alt="Development Team" class="w-24 h-24 rounded-full mx-auto mb-4 object-cover">
                <h3 class="text-xl font-semibold mb-2">Technical Experts</h3>
                <p class="text-gray-600">Skilled developers and engineers who bring innovative solutions to life with cutting-edge technology.</p>
            </div>

            <div class="bg-white rounded-xl p-6 shadow-lg text-center">
                <img src="https://images.pexels.com/photos/3184360/pexels-photo-3184360.jpeg?auto=compress&cs=tinysrgb&w=300"
                     alt="Support Team" class="w-24 h-24 rounded-full mx-auto mb-4 object-cover">
                <h3 class="text-xl font-semibold mb-2">Support Specialists</h3>
                <p class="text-gray-600">Dedicated professionals who ensure seamless project delivery and exceptional client experience.</p>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Why Choose ITFreelanceHub?</h2>
            <div class="text-xl text-gray-600 max-w-3xl mx-auto">
                <p>
                    We stand out in the competitive IT services landscape through our unique combination of expertise, reliability, and personalized service that puts your success first.
                </p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-gray-50 rounded-xl p-6 hover:shadow-lg transition-shadow duration-300">
                <div class="bg-blue-100 w-12 h-12 rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-shield-alt text-2xl text-blue-600"></i>
                </div>
                <h3 class="text-xl font-semibold mb-3">Proven Track Record</h3>
                <p class="text-gray-600">Over 4 years of successful project delivery with a 98% client satisfaction rate and numerous industry recognitions.</p>
            </div>

            <div class="bg-gray-50 rounded-xl p-6 hover:shadow-lg transition-shadow duration-300">
                <div class="bg-green-100 w-12 h-12 rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-users-cog text-2xl text-green-600"></i>
                </div>
                <h3 class="text-xl font-semibold mb-3">Expert Network</h3>
                <p class="text-gray-600">Access to a carefully vetted network of top-tier IT professionals with diverse skills and extensive experience.</p>
            </div>

            <div class="bg-gray-50 rounded-xl p-6 hover:shadow-lg transition-shadow duration-300">
                <div class="bg-yellow-100 w-12 h-12 rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-clock text-2xl text-yellow-600"></i>
                </div>
                <h3 class="text-xl font-semibold mb-3">24/7 Support</h3>
                <p class="text-gray-600">Round-the-clock support and project management to ensure your projects stay on track and meet deadlines.</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-gradient-to-r from-blue-600 to-blue-800 text-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-4">Ready to Work With Us?</h2>
        <p class="text-xl text-blue-100 mb-8 max-w-2xl mx-auto">
            Join hundreds of satisfied clients who have transformed their businesses with our expert IT services. Let's discuss how we can help you achieve your digital goals.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('services') }}"
                class="bg-white text-blue-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-colors">
                <i class="fas fa-briefcase mr-2"></i>
                View Our Services
            </a>
            <a href="{{ route('booking') }}"
                class="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-blue-600 transition-colors">
                <i class="fas fa-calendar-alt mr-2"></i>
                Start Your Project
            </a>
        </div>
    </div>
</section>

@endsection
