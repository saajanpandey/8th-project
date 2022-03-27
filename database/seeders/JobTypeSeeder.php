<?php

namespace Database\Seeders;

use App\Models\JobType;
use Illuminate\Database\Seeder;

class JobTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JobType::truncate();
        $type1 = JobType::where('id', 1)->first();
        if (!isset($type1)) {
            JobType::create([
                'name' => 'Full Time'
            ]);
        }

        $type2 = JobType::where('id', 2)->first();
        if (!isset($type2)) {
            JobType::create([
                'name' => 'Part Time'
            ]);
        }

        $type3 = JobType::where('id', 3)->first();
        if (!isset($type3)) {
            JobType::create([
                'name' => 'Contract Basis'
            ]);
        }

        $type4 = JobType::where('id', 4)->first();
        if (!isset($type4)) {
            JobType::create([
                'name' => 'Internship',
            ]);
        }
    }
}
