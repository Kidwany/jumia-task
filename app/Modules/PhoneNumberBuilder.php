<?php


namespace App\Modules;


use App\Models\PhoneNumber;
use App\Traits\ClassName;
use Illuminate\Support\Facades\Log;

/**
 * Class PhoneNumberBuilder
 * The class building the filtration and retrieving data
 * @package App\Modules
 */
class PhoneNumberBuilder
{
    use ClassName;

    /**
     * @var
     */
    public $phone_numbers;

    /**
     *
     */
    public function reset()
    {
        $this->phone_numbers = new \stdClass();
    }

    /**
     * @return $this
     */
    public function getPhoneNumbers()
    {
        $this->reset();
        $this->phone_numbers = PhoneNumber::all();
        return $this;
    }

    /**
     * @return $this
     */
    public function checkState()
    {
        if ($this->phone_numbers->count())
        {
            foreach ($this->phone_numbers as $phone_number)
            {
                try {
                    $class = $this->getClassName($phone_number->country);
                    $country_validation = (new $class($phone_number->phone))->validateNumber();
                    if ($country_validation)
                        $phone_number["state"] = "OK";
                    else
                        $phone_number["state"] = "NOK";
                } catch (\Exception $e) {
                    Log::error($e->getMessage());
                }
            }
        }
        return $this;
    }

    /**
     * @param $country
     * @return $this
     */
    public function filterByCountry($country)
    {
        if (isset($country))
        {
            $this->phone_numbers = $this->phone_numbers->where('country', "==", $country);
        }
        return $this;
    }

    /**
     * @param $state
     * @return $this
     */
    public function filterByState($state)
    {
        $filtered_numbers = array();
        if (isset($state) && !empty($state))
        {
            foreach ($this->phone_numbers as $phone_number)
            {
                if ($phone_number['state'] == $state)
                {
                    array_push($filtered_numbers, $phone_number);
                }
            }
            $this->phone_numbers = $filtered_numbers;
        }
        return $this;
    }
}
