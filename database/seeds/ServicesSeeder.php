<?php

use Illuminate\Database\Seeder;
use App\Service;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services =['WiFi','Animali Ammessi','Pulizie','Posto Macchina','Piscina','Portineria','Sauna','Vista Mare'];

        foreach ($services as $service) {

            $newService = new Service();
            $newService->service_name = $service;
            $newService->save();
        }
    }
}
