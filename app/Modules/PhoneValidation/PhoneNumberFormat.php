<?php


namespace App\Modules\PhoneValidation;


/**
 * Class PhoneNumberFormat
 * Parent class of all Rex rules foreach Country
 * - PhoneNumberFormat (Parent Class)
 *      - App\Modules\PhoneValidation\Countries\Cameron
 *      - App\Modules\PhoneValidation\Countries\Egypt
 *      - App\Modules\PhoneValidation\Countries\Ethiopia
 *      - App\Modules\PhoneValidation\Countries\Morocco
 *      - App\Modules\PhoneValidation\Countries\Mozambique
 *      - App\Modules\PhoneValidation\Countries\Uganda
 * @package App\Modules\PhoneValidation
 */
abstract class PhoneNumberFormat
{
    /**
     * @var string
     */
    protected $phone;

    /**
     * PhoneNumberFormat constructor.
     * @param $phone
     */
    public function __construct(string $phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    abstract public function validateNumber();

}
