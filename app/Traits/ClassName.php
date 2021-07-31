<?php


namespace App\Traits;


use Exception;

/**
 * Trait ClassName
 * The trait is used in Polymorphism classes retrieving
 * It's add the namespace of class and start searching on the directory
 * @package App\Traits
 */
trait ClassName
{
    /**
     * @param $request
     * @return string
     * @throws Exception
     */
    public function getClassName($request)
    {
        $namespace = 'App\Modules\PhoneValidation\Countries\\';
        $class = $namespace . ucfirst($request);
        if (!class_exists($class))
        {
            throw new Exception("Class Not Found");
        }
        return $class;
    }

}
