<?php

namespace App\View\Builders;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Route;

class AdminSidebar
{
    protected $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public static function menu($user): self
    {
        return new self($user);
    }

    public function get(): Collection
    {
        $menu = collect([

            (object)[
                'title' => 'Dashboard',
                'icon' => 'ri-dashboard-3-line',
                'url' => Route::has('admin.dashboard') ? route('admin.dashboard') : '#',
                'hasSubmenu' => false,
                'submenu' => [],
            ],

            (object)[
                'title' => 'Blog',
                'icon' => 'ri-article-line',
                'url' => 'javascript:void(0)',
                'hasSubmenu' => true,
                'submenu' => [

                    (object)[
                        'title' => 'Blog Categories',
                        'icon' => 'ri-list-settings-line',
                        'url' => Route::has('admin.blog-category') ? route('admin.blog-category') : '#',
                        'hasSubmenu' => false,
                        'submenu' => [],
                    ],
                    (object)[
                        'title' => 'Blog List',
                        'icon' => 'ri-list-check-2',
                        'url' => Route::has('admin.blog-list') ? route('admin.blog-list') : '#',
                        'hasSubmenu' => false,
                        'submenu' => [],
                    ],
                ],
            ],
            (object)[
                'title' => 'Contacts',
                'icon' => 'ri-mail-line',
                'url' => Route::has('admin.contact-list') ? route('admin.contact-list') : '#',
                'hasSubmenu' => false,
                'submenu' => [],
            ],
            (object)[
                'title' => 'Portfolio',
                'icon' => 'ri-briefcase-line',
                'url' => Route::has('admin.portfolio.list') ? route('admin.portfolio.list') : '#',
                'hasSubmenu' => false,
                'submenu' => [],
            ],
            (object)[
                'title' => 'Package Enquiries',
                'icon' => 'ri-package-line',
                'url' => Route::has('admin.package-enquiry') ? route('admin.package-enquiry') : '#',
                'hasSubmenu' => false,
                'submenu' => [],
            ],
            (object)[
                'title' => 'Testimonials',
                'icon' => 'ri-message-3-line',
                'url' => Route::has('admin.testimonial') ? route('admin.testimonial') : '#',
                'hasSubmenu' => false,
                'submenu' => [],
            ],

        ]);

        return $menu;
    }
}
