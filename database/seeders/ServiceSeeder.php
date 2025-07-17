<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'title' => 'Web Development',
                'description' => 'Custom website development using modern technologies like HTML, CSS, JavaScript, PHP, and MySQL. Responsive design and SEO optimized for better search engine ranking.',
                'image' => 'web-development.jpg',
                'price' => 1500.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'E-commerce Solutions',
                'description' => 'Complete online store development with payment integration, inventory management, shopping cart, and admin dashboard for managing products and orders.',
                'image' => 'ecommerce.jpg',
                'price' => 2500.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Mobile App Development',
                'description' => 'Native and cross-platform mobile applications for iOS and Android using modern frameworks. User-friendly interface and smooth performance.',
                'image' => 'mobile-app.jpg',
                'price' => 3000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'UI/UX Design',
                'description' => 'Professional user interface and user experience design for web and mobile applications. Modern, clean, and user-friendly designs that convert visitors into customers.',
                'image' => 'ui-ux-design.jpg',
                'price' => 800.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Digital Marketing',
                'description' => 'Comprehensive digital marketing strategies including SEO, social media marketing, content creation, and online advertising to grow your business.',
                'image' => 'digital-marketing.jpg',
                'price' => 1200.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Cloud Solutions',
                'description' => 'Cloud infrastructure setup, migration, and management. Secure, scalable, and reliable cloud hosting solutions for your business applications.',
                'image' => 'cloud-solutions.jpg',
                'price' => 2000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'WordPress Development',
                'description' => 'Custom WordPress themes and plugins development. Content management system setup with easy-to-use admin panel for managing your website content.',
                'image' => 'wordpress.jpg',
                'price' => 900.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'API Development',
                'description' => 'RESTful API development and third-party integrations. Secure and efficient APIs for connecting different systems and applications.',
                'image' => 'api-development.jpg',
                'price' => 1800.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Service::insert($services);
    }
}
