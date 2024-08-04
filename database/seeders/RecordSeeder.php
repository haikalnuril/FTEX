<?php

namespace Database\Seeders;

use App\Models\Record;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data1 = Record::create([
            'date' => '2024-08-02',
            'umur' => '48',
            'populasi' => '2561',
            'mati' => '0',
            'afkir' => '0',
            'pakan' => '197',
            'produksi' => '30',
            'berat' => '1.4',
            'butir' => '22',
            'retakKg' => '0',
        ]);

        $data2 = Record::create([
            'date' => '2024-08-03',
            'umur' => '49',
            'populasi' => '2561',
            'mati' => '0',
            'afkir' => '0',
            'pakan' => '197',
            'produksi' => '30',
            'berat' => '92',
            'butir' => '22',
            'retakKg' => '1',
        ]);

        $data3 = Record::create([
            'date' => '2024-08-04',
            'umur' => '50',
            'populasi' => '2561',
            'mati' => '0',
            'afkir' => '0',
            'pakan' => '197',
            'produksi' => '30',
            'berat' => '114',
            'butir' => '22',
            'retakKg' => '1.5',
        ]);
    }
}
