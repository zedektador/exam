<?php

abstract class TestCase extends Laravel\Lumen\Testing\TestCase {

    private $admin = null;
    private $service = null;
    private $merchant = null;
    private $customer = null;
    private $employee = null;
    private $merchant_token = null;
    private $otp_token = null;

    /**
     * Creates the application.
     *
     * @return \Laravel\Lumen\Application
     */
    public function createApplication() {
        return require __DIR__ . '/../bootstrap/app.php';
    }

    public function debug($response, $flag = true) {
        $string = $response->response->getContent();
        if ($flag) {
            $string = preg_replace('/\s+/', ' ', trim($response->response->getContent()));
        }

        dd($string);
    }

    public function decode($response) {
        return json_decode($response->response->getContent());
    }

}
