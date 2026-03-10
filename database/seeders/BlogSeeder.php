<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\BlogCategory;
use Illuminate\Support\Str;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Create Categories
        $categories = [
            'Financial Strategy',
            'Leadership',
            'Corporate Training',
            'Business Growth',
            'Taxation'
        ];

        $categoryModels = [];
        foreach ($categories as $cat) {
            $categoryModels[] = BlogCategory::updateOrCreate(
                ['slug' => Str::slug($cat)],
                ['name' => $cat, 'is_active' => true]
            );
        }

        // 2. Create Sample Posts
        $posts = [
            [
                'title' => 'Mastering Financial Synergy in Modern Corporations',
                'content' => '<p>Financial synergy is the essence of modern business success. In this article, we explore how organizations can align their financial goals with operational efficiency.</p><h2>The Core of Synergy</h2><p>Synergy isn\'t just a buzzword; it\'s a measurable outcome of strategic alignment. By integrating advanced financial modeling with daily decision-making, companies can unlock value that was previously hidden.</p>',
                'category_id' => $categoryModels[0]->id,
            ],
            [
                'title' => 'The Future of Leadership: Navigating Through Uncertainty',
                'content' => '<p>Leadership in 2026 requires more than just management skills. It requires adaptive thinking and emotional intelligence.</p><h3>Key Leadership Pillars</h3><ul><li>Empathy</li><li>Strategic Vision</li><li>Resilience</li></ul>',
                'category_id' => $categoryModels[1]->id,
            ],
            [
                'title' => 'How to Scale Your Startup Post-Seed Round',
                'content' => '<p>Scaling is the most difficult phase for any startup. This guide provides a roadmap for sustainable growth after securing your initial investment.</p>',
                'category_id' => $categoryModels[3]->id,
            ],
            [
                'title' => 'Tax Compliance Strategies for Global Expansion',
                'content' => '<p>Expanding internationally brings complex tax challenges. Here is how to maintain compliance while optimizing your tax footprint.</p>',
                'category_id' => $categoryModels[4]->id,
            ],
            [
                'title' => 'Building High-Performance Teams through Corporate Training',
                'content' => '<p>Invest in your people, and they will invest in your growth. Corporate training programs are the secret weapon of industry leaders.</p>',
                'category_id' => $categoryModels[2]->id,
            ],
        ];

        foreach ($posts as $postData) {
            Post::updateOrCreate(
                ['slug' => Str::slug($postData['title'])],
                array_merge($postData, [
                    'is_active' => true,
                    'meta_title' => $postData['title'],
                    'meta_description' => Str::limit(strip_tags($postData['content']), 160),
                ])
            );
        }
    }
}
