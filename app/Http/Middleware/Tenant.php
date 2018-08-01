<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Middleware;

use App\Models\Main\SpiceTenant;
use App\Support\TenantConnector;
use Closure;

class Tenant {

    use TenantConnector;

    /**
     * @var Company
     */
    protected $company;

    /**
     * Tenant constructor.
     * @param Company $company
     */
    public function __construct(SpiceTenant $company) {
        $this->company = $company;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        if (($request->session()->get('tenant')) === null)
            return redirect()->route('home')->withErrors(['error' => __('Please select a customer/tenant before making this request.')]);

        // Get the company object with the id stored in session
        $company = $this->company->find($request->session()->get('tenant'));

        // Connect and place the $company object in the view
        $this->reconnect($company);
        $request->session()->put('company', $company);

        return $next($request);
    }
}