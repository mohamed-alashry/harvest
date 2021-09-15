<?php

namespace Database\Seeders;

use App\Models\Offer;
use App\Models\Track;
use App\Models\Interval;
use App\Models\ExtraItem;
use App\Models\Timeframe;
use App\Models\ServiceFee;
use App\Models\ItemCategory;
use App\Models\TrainingService;
use Illuminate\Database\Seeder;
use App\Models\DisciplineCategory;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $track = Track::create([
            'title' => 'Languages'
        ]);

        $course = Track::create([
            'title' => 'English',
            'parent_id' => $track->id,
            'levels' => 1,
        ]);

        $stage = $course->stages()->create([
            'name' => 'Beginner'
        ]);

        $stage->levels()->create([
            'name' => 'Level 1'
        ]);

        $stage->levels()->create([
            'name' => 'Level 2'
        ]);

        $stage->levels()->create([
            'name' => 'Level 3'
        ]);

        $interval = Interval::create([
            'name' => '9-11 Fresh Morning',
            'time_from' => '09:00',
            'time_to' => '11:00',
            'pattern' => 'AM',
            'sort' => 1,
        ]);

        $timeframe = Timeframe::create([
            'title' => 'Friday Timeframe',
            'total_hours' => 12,
            'session_hours' => 4,
            'week_session' => 1,
            'days' => [1],
        ]);

        $timeframe->intervals()->sync([$interval->id]);

        $trainingService = TrainingService::create([
            'track_id' => $track->id,
            'course_id' => $course->id,
            'title' => 'English Diploma',
            'pattern' => 'AM',
        ]);

        $serviceFee = ServiceFee::create([
            'training_service_id' => $trainingService->id,
            'timeframe_id' => $timeframe->id,
            'payment_plan_id' => 2,
            'fees' => 750
        ]);

        $disciplineCategory = DisciplineCategory::create([
            'name' => 'smart',
            'max_student' => 15,
        ]);

        $itemCategory = ItemCategory::create([
            'name' => 'Books'
        ]);

        $item = ExtraItem::create([
            'item_category_id' => $itemCategory->id,
            'payment_plan_id' => 2,
            'name' => 'Bit by Bit',
            'price' => 100
        ]);

        $offer = Offer::create([
            'title' => 'New Year Offer',
            'fees' => 1000,
            'start_date' => '2021-12-01',
            'end_date' => '2021-12-31',
            'track_id' => $track->id,
            'course_id' => $course->id,
            'timeframe_id' => $timeframe->id,
            'payment_plan_id' => 2,
        ]);

        $offer->disciplines()->sync([$disciplineCategory->id]);
        $offer->items()->sync([$item->id]);
        $offer->services()->sync([$serviceFee->id]);
    }
}
