<?php

namespace App\Http\Controllers;

use App\Models\PhoneNumber;
use App\Modules\PhoneNumberBuilder;
use App\Traits\ClassName;
use Illuminate\Support\Facades\Log;

/**
 * Class PhoneNumberController
 * @package App\Http\Controllers
 */
class PhoneNumberController extends Controller
{
    use ClassName;

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $country_filter = request('country');
        $state_filter = request("state");

        /**
         * We Used Builder pattern to build the process of retrieving filtered data
         * and encapsulate the business logic of retrieving process
        */
        $phone_numbers = (new PhoneNumberBuilder())
            ->getPhoneNumbers() // Get All Data
            ->checkState() // Check state of phone number
            ->filterByCountry($country_filter) // Filter by country
            ->filterByState($state_filter) // Filter by number validation
            ->phone_numbers;

        return view('welcome', compact('phone_numbers'));
    }
}
