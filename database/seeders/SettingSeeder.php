<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's settings.
     */
    public function run(): void
    {
        $settings = [
            // General Settings
            [
                'key' => 'site_name',
                'value_en' => 'Service Platform',
                'value_ar' => 'منصة الخدمات',
                'type' => 'text',
                'group' => 'general',
                'label_en' => 'Site Name',
                'label_ar' => 'اسم الموقع',
                'description_en' => 'The name of your website',
                'description_ar' => 'اسم موقعك على الويب',
                'is_public' => true,
                'sort_order' => 1,
                'is_protected' => false,
            ],
            [
                'key' => 'site_description',
                'value_en' => 'A comprehensive service platform for managing your business',
                'value_ar' => 'منصة خدمات شاملة لإدارة أعمالك',
                'type' => 'textarea',
                'group' => 'general',
                'label_en' => 'Site Description',
                'label_ar' => 'وصف الموقع',
                'description_en' => 'Brief description of your website',
                'description_ar' => 'وصف موجز لموقعك على الويب',
                'is_public' => true,
                'sort_order' => 2,
                'is_protected' => false,
            ],
            [
                'key' => 'site_logo',
                'value_en' => null,
                'value_ar' => null,
                'type' => 'image',
                'group' => 'general',
                'label_en' => 'Site Logo',
                'label_ar' => 'شعار الموقع',
                'description_en' => 'Upload your site logo',
                'description_ar' => 'تحميل شعار موقعك',
                'is_public' => true,
                'sort_order' => 3,
                'is_protected' => false,
            ],
            [
                'key' => 'site_favicon',
                'value_en' => null,
                'value_ar' => null,
                'type' => 'image',
                'group' => 'general',
                'label_en' => 'Site Favicon',
                'label_ar' => 'أيقونة الموقع',
                'description_en' => 'Upload your site favicon',
                'description_ar' => 'تحميل أيقونة موقعك',
                'is_public' => true,
                'sort_order' => 4,
                'is_protected' => false,
            ],

            // Contact Settings
            [
                'key' => 'contact_email',
                'value_en' => 'contact@example.com',
                'value_ar' => 'contact@example.com',
                'type' => 'email',
                'group' => 'contact',
                'label_en' => 'Contact Email',
                'label_ar' => 'البريد الإلكتروني للتواصل',
                'description_en' => 'Email address for customer inquiries',
                'description_ar' => 'عنوان البريد الإلكتروني لاستفسارات العملاء',
                'is_public' => true,
                'sort_order' => 5,
                'is_protected' => false,
            ],
            [
                'key' => 'contact_phone',
                'value_en' => '+1234567890',
                'value_ar' => '+1234567890',
                'type' => 'text',
                'group' => 'contact',
                'label_en' => 'Contact Phone',
                'label_ar' => 'رقم الهاتف للتواصل',
                'description_en' => 'Phone number for customer support',
                'description_ar' => 'رقم الهاتف لدعم العملاء',
                'is_public' => true,
                'sort_order' => 6,
                'is_protected' => false,
            ],
            [
                'key' => 'contact_address',
                'value_en' => '123 Business St, City, Country',
                'value_ar' => '١٢٣ شارع الأعمال، المدينة، البلد',
                'type' => 'textarea',
                'group' => 'contact',
                'label_en' => 'Contact Address',
                'label_ar' => 'عنوان التواصل',
                'description_en' => 'Physical address of your business',
                'description_ar' => 'العنوان الفيزيائي لعملك',
                'is_public' => true,
                'sort_order' => 7,
                'is_protected' => false,
            ],

            // Social Media Settings
            [
                'key' => 'facebook_url',
                'value_en' => 'https://facebook.com/yourpage',
                'value_ar' => 'https://facebook.com/yourpage',
                'type' => 'url',
                'group' => 'social',
                'label_en' => 'Facebook URL',
                'label_ar' => 'رابط فيسبوك',
                'description_en' => 'Your Facebook page URL',
                'description_ar' => 'رابط صفحتك على فيسبوك',
                'is_public' => true,
                'sort_order' => 8,
                'is_protected' => false,
            ],
            [
                'key' => 'twitter_url',
                'value_en' => 'https://twitter.com/yourhandle',
                'value_ar' => 'https://twitter.com/yourhandle',
                'type' => 'url',
                'group' => 'social',
                'label_en' => 'Twitter URL',
                'label_ar' => 'رابط تويتر',
                'description_en' => 'Your Twitter profile URL',
                'description_ar' => 'رابط ملفك الشخصي على تويتر',
                'is_public' => true,
                'sort_order' => 9,
                'is_protected' => false,
            ],
            [
                'key' => 'instagram_url',
                'value_en' => 'https://instagram.com/yourprofile',
                'value_ar' => 'https://instagram.com/yourprofile',
                'type' => 'url',
                'group' => 'social',
                'label_en' => 'Instagram URL',
                'label_ar' => 'رابط إنستغرام',
                'description_en' => 'Your Instagram profile URL',
                'description_ar' => 'رابط ملفك الشخصي على إنستغرام',
                'is_public' => true,
                'sort_order' => 10,
                'is_protected' => false,
            ],

            // SEO Settings
            [
                'key' => 'meta_keywords',
                'value_en' => 'service, platform, business, management',
                'value_ar' => 'خدمة، منصة، أعمال، إدارة',
                'type' => 'text',
                'group' => 'seo',
                'label_en' => 'Meta Keywords',
                'label_ar' => 'كلمات مفتاحية ميتا',
                'description_en' => 'SEO keywords for your website',
                'description_ar' => 'كلمات مفتاحية لتحسين محركات البحث لموقعك',
                'is_public' => true,
                'sort_order' => 11,
                'is_protected' => false,
            ],
            [
                'key' => 'google_analytics',
                'value_en' => 'UA-XXXXXXXXX-X',
                'value_ar' => 'UA-XXXXXXXXX-X',
                'type' => 'text',
                'group' => 'seo',
                'label_en' => 'Google Analytics ID',
                'label_ar' => 'معرف جوجل تحليلات',
                'description_en' => 'Your Google Analytics tracking ID',
                'description_ar' => 'معرف التتبع الخاص بك في جوجل تحليلات',
                'is_public' => false,
                'sort_order' => 12,
                'is_protected' => false,
            ],
        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(
                ['key' => $setting['key']],
                $setting
            );
        }
    }
}
