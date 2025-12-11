<?php

namespace Database\Seeders;

use App\Models\Feature;
use Illuminate\Database\Seeder;

class FeatureSeeder extends Seeder
{
    public function run()
    {
        $features = [
            // Web Development Features
            [
                'name_ar' => 'تصميم متجاوب',
                'name_en' => 'Responsive Design',
                'description_ar' => 'تصميم متجاوب يعمل على جميع الأجهزة',
                'description_en' => 'Responsive design that works on all devices',
                'sort_order' => 1,
            ],
            [
                'name_ar' => 'واجهة مستخدم سهلة',
                'name_en' => 'User-Friendly Interface',
                'description_ar' => 'واجهة مستخدم سهلة وبسيطة',
                'description_en' => 'Easy and simple user interface',
                'sort_order' => 2,
            ],
            [
                'name_ar' => 'لوحة تحكم',
                'name_en' => 'Admin Panel',
                'description_ar' => 'لوحة تحكم كاملة لإدارة الموقع',
                'description_en' => 'Complete admin panel for website management',
                'sort_order' => 3,
            ],
            
            // Design Features
            [
                'name_ar' => 'تصميم احترافي',
                'name_en' => 'Professional Design',
                'description_ar' => 'تصميم احترافي وعصري',
                'description_en' => 'Professional and modern design',
                'sort_order' => 4,
            ],
            [
                'name_ar' => 'ألوان مخصصة',
                'name_en' => 'Custom Colors',
                'description_ar' => 'تخصيص الألوان حسب الهوية البصرية',
                'description_en' => 'Custom colors based on brand identity',
                'sort_order' => 5,
            ],
            
            // Marketing Features
            [
                'name_ar' => 'تحسين محركات البحث',
                'name_en' => 'SEO Optimization',
                'description_ar' => 'تحسين الموقع لمحركات البحث',
                'description_en' => 'Search engine optimization',
                'sort_order' => 6,
            ],
            [
                'name_ar' => 'إدارة وسائل التواصل',
                'name_en' => 'Social Media Management',
                'description_ar' => 'إدارة حسابات التواصل الاجتماعي',
                'description_en' => 'Social media accounts management',
                'sort_order' => 7,
            ],
            
            // General Features
            [
                'name_ar' => 'دعم فني',
                'name_en' => 'Technical Support',
                'description_ar' => 'دعم فني على مدار الساعة',
                'description_en' => '24/7 technical support',
                'sort_order' => 8,
            ],
            [
                'name_ar' => 'تحديثات مجانية',
                'name_en' => 'Free Updates',
                'description_ar' => 'تحديثات مجانية لفترة محددة',
                'description_en' => 'Free updates for a limited period',
                'sort_order' => 9,
            ],
            [
                'name_ar' => 'ضمان الجودة',
                'name_en' => 'Quality Assurance',
                'description_ar' => 'فحص وضمان الجودة',
                'description_en' => 'Quality testing and assurance',
                'sort_order' => 10,
            ],
        ];

        foreach ($features as $feature) {
            Feature::updateOrCreate(
                ['name_ar' => $feature['name_ar']],
                $feature
            );
        }
    }
}
