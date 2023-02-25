<?php

namespace Database\Seeders;

use App\Models\CompanyModel;
use Illuminate\Database\Seeder;

class CompanyModelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CompanyModel::create([
            'company_id' => 1,
            'name' => 'eCitaro',
            'version' => 1,
        ]);
        CompanyModel::create([
            'company_id' => 2,
            'name' => 'Volvo 9700',
            'version' => 1,
        ]);
    }
}
