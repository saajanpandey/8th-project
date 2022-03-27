<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        City::truncate();
        $districts = array(
            "achham",
            "arghakhanchi",
            "baglung",
            "baitadi",
            "bajhang",
            "bajura",
            "banke",
            "bara",
            "bardiya",
            "bhaktapur",
            "bhojpur",
            "chitwan",
            "dadeldhura",
            "dailekh",
            "dang",
            "darchula",
            "dhading",
            "dhankuta",
            "dhanusha",
            "dolakha",
            "dolpa",
            "doti",
            "eastern rukum",
            "gorkha",
            "gulmi",
            "humla",
            "ilam",
            "jajarkot",
            "jhapa",
            "jumla",
            "kailali",
            "kalikot",
            "kanchanpur",
            "kapilvastu",
            "kaski",
            "kathmandu",
            "kavrepalanchok",
            "khotang",
            "lalitpur",
            "lamjung",
            "mahottari",
            "makwanpur",
            "manang",
            "morang",
            "mugu",
            "mustang",
            "myangdi",
            "nawalpur",
            "nuwakot",
            "okhaldhunga",
            "palpa",
            "panchthar",
            "parasi",
            "parbat",
            "parsa",
            "pyuthan",
            "ramechhap",
            "rasuwa",
            "rautahat",
            "rolpa",
            "rupandehi",
            "salyan",
            "sankhuwasabha",
            "saptari",
            "sarlahi",
            "sindhuli",
            "sindhupalchok",
            "siraha",
            "solukhumbu",
            "sunsari",
            "surkhet",
            "syangja",
            "tanahun",
            "taplejung",
            "terhathum",
            "udayapur",
            "western rukum"
        );

        foreach ($districts as $district) {
            $data['name'] = ucwords($district);
            City::create($data);
        }
    }
}
