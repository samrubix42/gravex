<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $testimonials = [
            [
                'description' => 'The leadership training program from Grevx helped our team communicate better and resolve issues faster.',
                'name' => 'HR Director',
                'company' => 'Technology Company',
                'is_active' => true,
            ],
            [
                'description' => 'Their financial modeling and valuation insights helped us prepare confidently for investor conversations.',
                'name' => 'Startup Founder',
                'company' => 'Fintech Startup',
                'is_active' => true,
            ],
            [
                'description' => 'Our managers gained practical leadership skills that improved collaboration across teams.',
                'name' => 'L&D Head',
                'company' => 'Corporate Client',
                'is_active' => true,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::updateOrCreate(
                [
                    'name' => $testimonial['name'],
                    'company' => $testimonial['company'],
                ],
                $testimonial
            );
        }
    }
}
