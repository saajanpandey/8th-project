<?php

namespace Database\Seeders;

use App\Models\JobCategories;
use Illuminate\Database\Seeder;

class JobCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JobCategories::truncate();
        $categories = array(
            "IT & Telecommunication",
            "Marketing / Advertising / Customer Service",
            "Teaching / Education",
            "Accounting / Finance",
            "Others",
            "General Mgmt. / Administration/Operations",
            "Sales / Public Relations",
            "Construction / Engineering /Architects",
            "NGO / INGO / Social work",
            "Human Resource /Org. Development",
            "Secretarial / Front Office / Data Entry",
            "Healthcare / Pharma / Biotech/Medical/R&D",
            "Journalism / Editor / Media",
            "Creative / Graphics / Designing",
            "Hospitality",
            "Architecture / Interior Designing",
            "Commercial / Logistics / Supply Chain",
            "Research and Development",
            "Banking / Insurance /Financial Services",
            "Production / Maintenance / Quality",
            "Protective / Security Services",
        );
        foreach ($categories as $category) {
            $data['name'] = $category;
            JobCategories::create($data);
        }
    }
}
