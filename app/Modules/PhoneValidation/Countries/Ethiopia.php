<?php


namespace App\Modules\PhoneValidation\Countries;


use App\Modules\PhoneValidation\PhoneNumberFormat;

/**
 * Class Cameron
 * @package App\Modules\PhoneValidation\Countries
 */
class Ethiopia extends PhoneNumberFormat
{

    /**
     * @return bool|mixed
     */
    public function validateNumber() :bool
    {
        if (preg_match("^\+\(251\)/ ?\[1-59]\d{7,8}^", $this->phone))
            return true;
        else
            return false;
    }
}
