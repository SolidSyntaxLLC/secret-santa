<?php

namespace Database\Seeders;

use App\Models\Attendee;
use App\Models\Event;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $events = Event::factory()->count(12)->create([
            'owner' => 1,
        ]);

        foreach($events as $event) {
            Attendee::factory()->count(6)->create([
                'event_id' => $event->id,
            ]);
        }
    }
}
