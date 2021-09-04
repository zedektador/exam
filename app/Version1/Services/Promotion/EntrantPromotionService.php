<?php

namespace App\Version1\Services\Promotion;

use App\Mail\SendMail;
use App\Version1\Repositories\EntrantPromotionRepository;
use Illuminate\Support\Facades\Mail;
use App\AbstractBases\AbstractBaseService;

use Illuminate\Http\Request;

class EntrantPromotionService extends AbstractBaseService implements EntrantPromotionInterface {

    protected $module = 'entrant_promotion';
    protected $version = 'v1';
    protected $repository;
    const OBJECTNAME = "entrant_promotion";

    public function __construct(Request $request, EntrantPromotionRepository $repository) {
        $this->repository = $repository;
        parent::__construct($request);
    }

    public function saveEntrants($promotion, Request $request) {
        $entrant = $this->repository->create([
            "email" => $request->email_address,
            "promotion_id" => $promotion->id,
            "entrant_fields" => json_encode($request->all()),
            "created_at" => date("Y-m-d H:i:s")
        ]);

        //winning moment logic if created at time is equal to promotion time then it is winnner
        if((date("H:i", strtotime($promotion->time)) == date("H:i", strtotime($entrant->created_at))) && $promotion->mechanics_type == "winning") {
            $this->repository->update($entrant, ["winner" => true]);
            //send email
            $this->sendEmail($request->email_address);
        }
        //chance logic if count of joined in promotions is divisible by probability then it is winnner
        if($promotion->mechanics_type == "chance") {
            $countJoinedEntrants = $this->repository->countEntrants($promotion->id, $entrant->id);
            if($countJoinedEntrants % $promotion->probability == 0) {

                $this->repository->update($entrant, ["winner" => true]);
                //send email
                $this->sendEmail($request->email_address);
            }
        }

        $this->response = $this->makeResponse(200, '200');
        return $this->response();

    }

    protected function sendEmail($email) {
        $details = [
            "title" => "Congratulations",
            "body" => "You are a winner of the promotion"
        ];

        Mail::to($email)->send(new SendMail($details));
    }
}
