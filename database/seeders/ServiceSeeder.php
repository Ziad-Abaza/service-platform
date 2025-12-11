<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Feature;
use App\Models\Service;
use App\Models\ServiceFeature;
use App\Models\ServicePricingPlan;
use App\Models\BillingCycle;
use App\Models\ServiceReview;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    public function run()
    {
        // Get categories
        $webDevCategory = Category::where('name_ar', 'تطوير الويب')->first();
        $mobileCategory = Category::where('name_ar', 'تطبيقات الموبايل')->first();
        $logoCategory = Category::where('name_ar', 'تصميم الشعارات')->first();
        $marketingCategory = Category::where('name_ar', 'التسويق عبر وسائل التواصل الاجتماعي')->first();

        // Get billing cycles
        $monthlyCycle = BillingCycle::firstOrCreate(['name' => 'monthly']);
        $quarterlyCycle = BillingCycle::firstOrCreate(['name' => 'quarterly']);
        $annuallyCycle = BillingCycle::firstOrCreate(['name' => 'annually']);
        $semiAnnuallyCycle = BillingCycle::firstOrCreate(['name' => 'semi_annually']);
        $oneTimeCycle = BillingCycle::firstOrCreate(['name' => 'one_time']);

        // Get features
        $responsiveDesign = Feature::where('name_ar', 'تصميم متجاوب')->first();
        $userFriendly = Feature::where('name_ar', 'واجهة مستخدم سهلة')->first();
        $adminPanel = Feature::where('name_ar', 'لوحة تحكم')->first();
        $professionalDesign = Feature::where('name_ar', 'تصميم احترافي')->first();
        $seo = Feature::where('name_ar', 'تحسين محركات البحث')->first();
        $support = Feature::where('name_ar', 'دعم فني')->first();

        // Create sample services
        $services = [
            // Web Development Service
            [
                'category_id' => $webDevCategory->id,
                'name_ar' => 'تصميم موقع إلكتروني احترافي',
                'name_en' => 'Professional Website Design',
                'slug' => 'professional-website-design',
                'description_ar' => 'تصميم موقع إلكتروني احترافي متجاوب مع جميع الأجهزة',
                'description_en' => 'Professional responsive website design',
                'short_description_ar' => 'تصميم موقع احترافي',
                'short_description_en' => 'Professional website design',
                'featured' => true,
                'is_active' => true,
                'sort_order' => 1,
                'features' => [$responsiveDesign->id, $userFriendly->id, $adminPanel->id],
                'pricing_plans' => [
                    [
                        'name_ar' => 'الاساسية', 
                        'name_en' => 'Basic', 
                        'description_ar' => 'حزمة أساسية لموقع ويب بسيط',
                        'description_en' => 'Basic package for a simple website',
                        'price' => 500, 
                        'billing_cycle_id' => $monthlyCycle->id,
                        'billing_period_ar' => 'شهري',
                        'billing_period_en' => 'Monthly',
                        'badge_ar' => 'الأكثر طلباً',
                        'badge_en' => 'Most Popular',
                        'button_text_ar' => 'اشترك الآن',
                        'button_text_en' => 'Subscribe Now',
                        'button_link' => '#pricing',
                        'highlight_text_ar' => 'خصم 10% للدفع السنوي',
                        'highlight_text_en' => '10% off annual billing',
                        'is_featured' => false,
                        'sort_order' => 1
                    ],
                    [
                        'name_ar' => 'المتقدمة', 
                        'name_en' => 'Advanced', 
                        'description_ar' => 'حزمة متقدمة مع ميزات إضافية',
                        'description_en' => 'Advanced package with additional features',
                        'price' => 1000, 
                        'billing_cycle_id' => $monthlyCycle->id,
                        'billing_period_ar' => 'شهري',
                        'billing_period_en' => 'Monthly',
                        'badge_ar' => 'الأفضل قيمة',
                        'badge_en' => 'Best Value',
                        'button_text_ar' => 'ابدأ الآن',
                        'button_text_en' => 'Get Started',
                        'button_link' => '#pricing',
                        'highlight_text_ar' => 'خصم 15% للدفع السنوي',
                        'highlight_text_en' => '15% off annual billing',
                        'is_featured' => true,
                        'popular' => true, 
                        'sort_order' => 2
                    ],
                ]
            ],
            
            // Mobile App Development
            [
                'category_id' => $mobileCategory->id,
                'name_ar' => 'تطبيق جوال',
                'name_en' => 'Mobile App Development',
                'slug' => 'mobile-app-development',
                'description_ar' => 'تطوير تطبيقات الجوال لأنظمة iOS و Android',
                'description_en' => 'Mobile app development for iOS and Android',
                'short_description_ar' => 'تطوير تطبيقات الجوال',
                'short_description_en' => 'Mobile app development',
                'featured' => true,
                'is_active' => true,
                'sort_order' => 2,
                'features' => [$responsiveDesign->id, $userFriendly->id, $adminPanel->id, $support->id],
                'pricing_plans' => [
                    [
                        'name_ar' => 'الاساسية', 
                        'name_en' => 'Basic', 
                        'description_ar' => 'حزمة تطوير تطبيق أساسي',
                        'description_en' => 'Basic mobile app development package',
                        'price' => 1500, 
                        'billing_cycle_id' => $monthlyCycle->id,
                        'billing_period_ar' => 'شهري',
                        'billing_period_en' => 'Monthly',
                        'button_text_ar' => 'ابدأ مشروعك',
                        'button_text_en' => 'Start Your Project',
                        'button_link' => '#contact',
                        'is_featured' => false,
                        'sort_order' => 1
                    ],
                    [
                        'name_ar' => 'المتقدمة', 
                        'name_en' => 'Advanced', 
                        'description_ar' => 'حزمة تطوير تطبيق متكاملة',
                        'description_en' => 'Complete mobile app development package',
                        'price' => 2500, 
                        'billing_cycle_id' => $monthlyCycle->id,
                        'billing_period_ar' => 'شهري',
                        'billing_period_en' => 'Monthly',
                        'badge_ar' => 'الأفضل مبيعاً',
                        'badge_en' => 'Best Seller',
                        'button_text_ar' => 'ابدأ مشروعك',
                        'button_text_en' => 'Start Your Project',
                        'button_link' => '#contact',
                        'highlight_text_ar' => 'شهر مجاني',
                        'highlight_text_en' => '1 Month Free',
                        'is_featured' => true,
                        'sort_order' => 2
                    ],
                ]
            ],
            
            // Logo Design
            [
                'category_id' => $logoCategory->id,
                'name_ar' => 'تصميم شعار احترافي',
                'name_en' => 'Professional Logo Design',
                'slug' => 'professional-logo-design',
                'description_ar' => 'تصميم شعار احترافي يعبر عن هوية علامتك التجارية',
                'description_en' => 'Professional logo design that represents your brand identity',
                'short_description_ar' => 'تصميم شعار احترافي',
                'short_description_en' => 'Professional logo design',
                'featured' => false,
                'is_active' => true,
                'sort_order' => 3,
                'features' => [$professionalDesign->id],
                'pricing_plans' => [
                    [
                        'name_ar' => 'باقة واحدة', 
                        'name_en' => 'Single Package', 
                        'description_ar' => 'تصميم شعار احترافي فريد',
                        'description_en' => 'Professional unique logo design',
                        'price' => 100, 
                        'billing_cycle_id' => $oneTimeCycle->id,
                        'billing_period_ar' => 'مرة واحدة',
                        'billing_period_en' => 'One Time',
                        'button_text_ar' => 'اطلب الآن',
                        'button_text_en' => 'Order Now',
                        'button_link' => '#order',
                        'is_featured' => true,
                        'sort_order' => 1
                    ],
                ]
            ],
            
            // Social Media Marketing
            [
                'category_id' => $marketingCategory->id,
                'name_ar' => 'إدارة حسابات التواصل الاجتماعي',
                'name_en' => 'Social Media Management',
                'slug' => 'social-media-management',
                'description_ar' => 'إدارة احترافية لوسائل التواصل الاجتماعي لعلامتك التجارية',
                'description_en' => 'Professional social media management for your brand',
                'short_description_ar' => 'إدارة وسائل التواصل',
                'short_description_en' => 'Social media management',
                'featured' => true,
                'is_active' => true,
                'sort_order' => 4,
                'features' => [$seo->id, $support->id],
                'pricing_plans' => [
                    [
                        'name_ar' => 'الاساسية', 
                        'name_en' => 'Basic', 
                        'description_ar' => 'إدارة حسابات التواصل الأساسية',
                        'description_en' => 'Basic social media management',
                        'price' => 300, 
                        'billing_cycle_id' => $monthlyCycle->id,
                        'billing_period_ar' => 'شهري',
                        'billing_period_en' => 'Monthly',
                        'button_text_ar' => 'اشترك الآن',
                        'button_text_en' => 'Subscribe Now',
                        'button_link' => '#pricing',
                        'is_featured' => false,
                        'sort_order' => 1
                    ],
                    [
                        'name_ar' => 'المتقدمة', 
                        'name_en' => 'Advanced', 
                        'description_ar' => 'إدارة متكاملة لوسائل التواصل',
                        'description_en' => 'Comprehensive social media management',
                        'price' => 600, 
                        'billing_cycle_id' => $monthlyCycle->id,
                        'billing_period_ar' => 'شهري',
                        'billing_period_en' => 'Monthly',
                        'badge_ar' => 'الأكثر طلباً',
                        'badge_en' => 'Most Popular',
                        'button_text_ar' => 'اشترك الآن',
                        'button_text_en' => 'Subscribe Now',
                        'button_link' => '#pricing',
                        'highlight_text_ar' => 'الأفضل للشركات الناشئة',
                        'highlight_text_en' => 'Best for Startups',
                        'is_featured' => true,
                        'popular' => true,
                        'sort_order' => 2
                    ],
                    [
                        'name_ar' => 'الاحترافية', 
                        'name_en' => 'Professional', 
                        'description_ar' => 'حلول احترافية متكاملة',
                        'description_en' => 'Professional integrated solutions',
                        'price' => 1000, 
                        'billing_cycle_id' => $monthlyCycle->id,
                        'billing_period_ar' => 'شهري',
                        'billing_period_en' => 'Monthly',
                        'badge_ar' => 'متميز',
                        'badge_en' => 'Premium',
                        'button_text_ar' => 'تواصل معنا',
                        'button_text_en' => 'Contact Us',
                        'button_link' => '#contact',
                        'highlight_text_ar' => 'خصم خاص للشركات الكبرى',
                        'highlight_text_en' => 'Special discount for enterprises',
                        'is_featured' => true,
                        'sort_order' => 3
                    ],
                ]
            ],
        ];

        // Create a test user for reviews
        $user = User::firstOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Test User',
                'password' => bcrypt('password'),
                'email_verified_at' => now(),
            ]
        );

        // Create services with their relationships
        foreach ($services as $serviceData) {
            // Extract pricing plans and features
            $pricingPlans = $serviceData['pricing_plans'];
            $featureIds = $serviceData['features'];
            unset($serviceData['pricing_plans'], $serviceData['features']);

            // Create or update the service
            $service = Service::updateOrCreate(
                ['name_ar' => $serviceData['name_ar']],
                $serviceData
            );

            // Attach features to the service
            foreach ($featureIds as $featureId) {
                ServiceFeature::firstOrCreate([
                    'service_id' => $service->id,
                    'feature_id' => $featureId,
                ]);
            }

            // Create pricing plans for the service
            foreach ($pricingPlans as $planData) {
                $isPopular = $planData['popular'] ?? false;
                unset($planData['popular']);
                
                ServicePricingPlan::updateOrCreate(
                    [
                        'service_id' => $service->id,
                        'name_ar' => $planData['name_ar']
                    ],
                    array_merge($planData, ['popular' => $isPopular])
                );
            }

            // Create some reviews for the service
            $this->createServiceReviews($service, $user);
        }
    }

    /**
     * Create sample reviews for a service
     */
    private function createServiceReviews($service, $user)
    {
        // Create main reviews
        $reviews = [
            [
                'user_id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'rating' => 5,
                'comment' => 'خدمة ممتازة وجهد مشكور',
                'status' => 'approved',
                'created_at' => now()->subDays(10),
            ],
            [
                'user_id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'rating' => 4,
                'comment' => 'جيدة جداً مع بعض الملاحظات البسيطة',
                'status' => 'approved',
                'created_at' => now()->subDays(5),
            ],
            [
                'user_id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'rating' => 3,
                'comment' => 'متوسطة، تحتاج لبعض التحسينات',
                'status' => 'approved',
                'created_at' => now()->subDays(2),
            ],
        ];

        foreach ($reviews as $reviewData) {
            $review = $service->reviews()->create($reviewData);
            
            // Create a reply for some reviews
            if (in_array($review->rating, [3, 4])) {
                $adminUser = User::find(1);
                if ($adminUser) {
                    $service->reviews()->create([
                        'user_id' => $adminUser->id,
                        'name' => $adminUser->name,
                        'email' => $adminUser->email,
                        'parent_id' => $review->id,
                        'rating' => 0,
                        'comment' => 'شكراً لملاحظاتك القيمة. سنعمل على تحسين الخدمة بناءً على ملاحظاتك.',
                        'status' => 'approved',
                        'created_at' => $review->created_at->addHour(),
                    ]);
                }
            }
        }
    }
}
