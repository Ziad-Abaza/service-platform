<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\ServiceWebinar;
use App\Models\WebinarRecurringPattern;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ServiceWebinarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get services and patterns
        $services = Service::take(3)->get();
        $patterns = WebinarRecurringPattern::all();
        
        if ($services->isEmpty() || $patterns->isEmpty()) {
            $this->command->warn('Need services and recurring patterns to create webinars. Please run ServiceSeeder and WebinarRecurringPatternSeeder first.');
            return;
        }

        $webinars = [
            [
                'service_id' => $services[0]->id,
                'title_ar' => 'مقدمة في تصميم المواقع',
                'title_en' => 'Introduction to Web Design',
                'description_ar' => 'جلسة تعريفية شاملة عن أساسيات تصميم المواقع',
                'description_en' => 'Comprehensive introductory session on web design basics',
                'schedule_date' => Carbon::now()->addDays(7)->setTime(19, 0, 0),
                'duration' => 60, // minutes
                'registration_url' => 'https://example.com/webinar/web-design-intro',
                'is_recurring' => true,
                'recurring_pattern_id' => $patterns[0]->id,
                'max_attendees' => 100,
                'is_active' => true,
            ],
            [
                'service_id' => $services[1]->id,
                'title_ar' => 'تحسين محركات البحث SEO',
                'title_en' => 'Search Engine Optimization (SEO)',
                'description_ar' => 'تعلم أساسيات تحسين محركات البحث',
                'description_en' => 'Learn the basics of search engine optimization',
                'schedule_date' => Carbon::now()->addDays(14)->setTime(20, 0, 0),
                'duration' => 90,
                'registration_url' => 'https://example.com/webinar/seo-basics',
                'is_recurring' => false,
                'recurring_pattern_id' => null,
                'max_attendees' => 50,
                'is_active' => true,
            ],
            [
                'service_id' => $services[2]->id,
                'title_ar' => 'التسويق الرقمي للمبتدئين',
                'title_en' => 'Digital Marketing for Beginners',
                'description_ar' => 'تعلم أساسيات التسويق الرقمي',
                'description_en' => 'Learn the basics of digital marketing',
                'schedule_date' => Carbon::now()->addDays(21)->setTime(18, 30, 0),
                'duration' => 120,
                'registration_url' => 'https://example.com/webinar/digital-marketing',
                'is_recurring' => true,
                'recurring_pattern_id' => $patterns[1]->id,
                'max_attendees' => 200,
                'is_active' => true,
            ],
        ];

        foreach ($webinars as $webinar) {
            ServiceWebinar::updateOrCreate(
                [
                    'service_id' => $webinar['service_id'],
                    'title_ar' => $webinar['title_ar']
                ],
                $webinar
            );
        }
    }
}
