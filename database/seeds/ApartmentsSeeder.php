<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Apartment;
use App\ApartmentPic;
use App\User;
use App\Message;

class ApartmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($k = 0; $k < 10; $k++) {

            $user = new User();
            $user->name = $faker->firstName();
            $user->surname = $faker->lastName();
            $user->date_birth = $faker->dateTime();
            $user->password = bcrypt('12345678');
            $user->email = $faker->email();
            $user->save();


            for($i = 0; $i < rand(0, 3); $i++){

                $apartment = new Apartment();
                $apartment->title = $faker->name();
                $apartment->description = $faker->text(1000);
                $apartment->rooms = rand(1, 20);
                $apartment->beds = rand(1, 80);
                $apartment->baths = rand(1, 10);
                $apartment->sq_meters = rand(25, 1000);
                $apartment->price = rand(100, 2000);
                $apartment->visible = 'true';
                $apartment->check_in = $faker->text(100);
                $apartment->check_out = $faker->text(100);
                $apartment->max_guests = rand(1, 20);
                $apartment->view_count = rand(25, 1000);
                $apartment->profile_pic = '';
                $apartment->address = $faker->streetAddress();
                $apartment->latitude = $faker->latitude($min = -90, $max = 90);
                $apartment->longitude = $faker->longitude($min = -180, $max = 180);
                $user->apartments()->save($apartment);



                for($z = 0; $z < rand(1, 10); $z++){
                    $message = new Message();
                    $message->message_title = $faker->text(20);
                    $message->body_message = $faker->text(1000);
                    $message->message_email = $faker->email();
                    $apartment->messages()->save($message);

                  }




                for($y = 0; $y < rand(0, 4); $y++)  {
                    $apartmentPics = new ApartmentPic();
                    $apartmentPics->path = 'https://picsum.photos/seed/' . rand(0, 1000) . '/200/300';
                    $apartment->apartmentPics()->save($apartmentPics);

                }

            }
        }
    }
}
