<?php


namespace App\Modules\PhoneValidation\Countries;


use App\Modules\PhoneValidation\PhoneNumberFormat;

/**
 * Class Cameron
 * @package App\Modules\PhoneValidation\Countries
 */
class Egypt extends PhoneNumberFormat
{

    /**
     * @return bool|mixed
     */
    public function validateNumber() :bool
    {
        return true;
    }
}
