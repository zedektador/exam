<?php
/**
 * Otp Middleware
 */
namespace App\Version1\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Contracts\Foundation\Application;

/**
 * Class OtpMiddleware
 * @package App\Http\Middleware
 */
class LanguageMiddleware
{
    private $user;

    private $customer;

    private $employee;

    private $merchant;

    private $request;


    public function __construct(Request $request) {
        $this->request = $request;
    }

    /**
     * Run the request filter.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        app('translator')->setLocale($this->getMerchantUuid());

        return $next($request);

    }

    /**
     * @return mixed
     */
    protected function getMerchantUuid()
    {
        if ($this->user != null) {
            return $this->user->merchant_uuid;
        }

        if ($this->customer != null) {
            return $this->customer->merchant_uuid;
        }

        if ($this->employee != null) {
            return $this->employee->merchant_uuid;
        }

        if ($this->merchant != null) {
            return $this->merchant->uuid;
        }

        if ( $this->request->post('merchant_uuid') != null ) {
            return $this->request->post('merchant_uuid');
        }

        return null;
    }

}