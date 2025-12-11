<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        // Create parent categories
        $categories = [
            [
                'name_ar' => 'البرمجة والتطوير',
                'name_en' => 'Programming & Development',
                'slug' => 'programming-development',
                'description_ar' => 'خدمات البرمجة والتطوير',
                'description_en' => 'Programming and development services',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'name_ar' => 'التصميم والفنون',
                'name_en' => 'Design & Creative',
                'slug' => 'design-creative',
                'description_ar' => 'خدمات التصميم والفنون الإبداعية',
                'description_en' => 'Design and creative services',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'name_ar' => 'التسويق الرقمي',
                'name_en' => 'Digital Marketing',
                'slug' => 'digital-marketing',
                'description_ar' => 'خدمات التسويق الرقمي',
                'description_en' => 'Digital marketing services',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'name_ar' => 'الكتابة والترجمة',
                'name_en' => 'Writing & Translation',
                'slug' => 'writing-translation',
                'description_ar' => 'خدمات الكتابة والترجمة',
                'description_en' => 'Writing and translation services',
                'sort_order' => 4,
                'is_active' => true,
            ],
            [
                'name_ar' => 'الأعمال وريادة الأعمال',
                'name_en' => 'Business & Entrepreneurship',
                'slug' => 'business-entrepreneurship',
                'description_ar' => 'خدمات الأعمال وريادة الأعمال',
                'description_en' => 'Business and entrepreneurship services',
                'sort_order' => 5,
                'is_active' => true,
            ],
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate(
                ['name_ar' => $category['name_ar']],
                $category
            );
        }

        // Create some subcategories
        $subcategories = [
            // Programming subcategories
            [
                'parent_id' => 1,
                'name_ar' => 'تطوير الويب',
                'name_en' => 'Web Development',
                'slug' => 'web-development',
                'description_ar' => 'خدمات تطوير المواقع الإلكترونية',
                'description_en' => 'Website development services',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'parent_id' => 1,
                'name_ar' => 'تطبيقات الموبايل',
                'name_en' => 'Mobile Apps',
                'slug' => 'mobile-apps',
                'description_ar' => 'تطوير تطبيقات الموبايل',
                'description_en' => 'Mobile application development',
                'sort_order' => 2,
                'is_active' => true,
            ],
            // Design subcategories
            [
                'parent_id' => 2,
                'name_ar' => 'تصميم الشعارات',
                'name_en' => 'Logo Design',
                'slug' => 'logo-design',
                'description_ar' => 'تصميم شعارات احترافية',
                'description_en' => 'Professional logo design',
                'sort_order' => 1,
                'is_active' => true,
            ],
            // Marketing subcategories
            [
                'parent_id' => 3,
                'name_ar' => 'التسويق عبر وسائل التواصل الاجتماعي',
                'name_en' => 'Social Media Marketing',
                'slug' => 'social-media-marketing',
                'description_ar' => 'إدارة الحملات التسويقية على وسائل التواصل',
                'description_en' => 'Social media marketing campaigns',
                'sort_order' => 1,
                'is_active' => true,
            ],
        ];

        foreach ($subcategories as $subcategory) {
            Category::updateOrCreate(
                ['name_ar' => $subcategory['name_ar']],
                $subcategory
            );
        }
    }
}
