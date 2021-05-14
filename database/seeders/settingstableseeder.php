<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\setting;

class settingstableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        setting::create([
            'site_name'=>'Laravel blog',
            'address'=>'Nairobi Karen',
            'contact_number'=> '0710916511',
            'contact_email'=>'mumo@laravel.com'
        ]);
    }
}
