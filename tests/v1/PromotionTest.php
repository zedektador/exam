<?php
namespace v1;

use Ramsey\Uuid\Uuid;

class PromotionTest extends \TestCase {

    public function testAddPromotion() {
        $clientSlug = Uuid::uuid4()->toString();

        $response = $this->post("v1/promotion/add",[]);
        $response->assertResponseStatus(422);
        $response->seeJsonStructure([
            'client_slug',
            'required_fields',
            'mechanics_type'
        ]);
        $promotion = factory(\App\Models\Promotion::class)->make();

        $payload = [
            'client_slug' => $clientSlug,
            'required_fields' => $promotion->required_fields,
            'mechanics_type' => $promotion->mechanics_type,

        ];
        if($promotion->mechanics_type == 'winning') {
            $payload['time'] = $promotion->time;
        } else {
            $payload['probability'] = $promotion->probability;
        }
        //200
        $response = $this->post("v1/promotion/add",$payload);
        $response->assertResponseStatus(200);
        $response->seeJsonStructure([
            'message',
            'promotion'
        ]);
    }


}
