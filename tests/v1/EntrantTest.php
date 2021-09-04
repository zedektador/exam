<?php
namespace v1;

use Carbon\Carbon;
use Ramsey\Uuid\Uuid;

class EntrantTest extends \TestCase {

    public function testEntrantWinningMoment() {

        $clientSlug = Uuid::uuid4()->toString();

        $response = $this->post("v1/entrant/winning-moment/test",[]);
        $response->assertResponseStatus(404);
//        $date = date("Y-m-d H:i:s");
//        $time = strtotime($date);
//        $time = $time - (2 * 60);
//        $date = date("H:i", $time);
        $promotion = factory(\App\Models\Promotion::class)->make();
        $promotion = factory(\App\Models\Promotion::class)->create([
            "required_fields" => json_encode($promotion->required_fields),
            "mechanics_type" => "winning",
            "client_slug" => $clientSlug,
            "time" => date("H:i")
        ]);
        $response = $this->post("v1/entrant/winning-moment/$promotion->uuid",[]);
        $response->assertResponseStatus(422);
        $response->seeJsonStructure(json_decode($promotion->required_fields));
        //200
        $response = $this->post("v1/entrant/winning-moment/$promotion->uuid",$this->getPayload($promotion));
        $response->assertResponseStatus(200);
        $response->seeJsonStructure([
            'message'
        ]);
    }

    protected function getPayload($promotion) {
        $array =[];
        foreach(json_decode($promotion->required_fields) as $field)  {
            $array[$field] = $this->getFakerFields($field);
        }
        return $array;
    }

    protected function getFakerFields($field) {
        $faker = \Faker\Factory::create();

        switch ($field) {
            case "mobile_number":
                return $faker->regexify('09[0-9]{9}');
            case "email_address":
                return "zedekyaniii.za@gmail.com";
            case "full_name":
                return $faker->name;
            default:
                return " ";
        }
    }
    public function testEntrantChance() {

        $clientSlug = Uuid::uuid4()->toString();

        $response = $this->post("v1/entrant/chance/test",[]);
        $response->assertResponseStatus(404);

        $promotion = factory(\App\Models\Promotion::class)->make();
        $promotion = factory(\App\Models\Promotion::class)->create([
            "required_fields" => json_encode($promotion->required_fields),
            "mechanics_type" => "chance",
            "client_slug" => $clientSlug,
            "probability" => 5
        ]);
        $response = $this->post("v1/entrant/chance/$promotion->uuid",[]);
        $response->assertResponseStatus(422);
        $response->seeJsonStructure(json_decode($promotion->required_fields));
        //200
        for($i =1; $i <= 10; $i++) {
            $response = $this->post("v1/entrant/chance/$promotion->uuid",$this->getPayload($promotion));
            $response->assertResponseStatus(200);
            $response->seeJsonStructure([
                'message'
            ]);
        }
    }

}
