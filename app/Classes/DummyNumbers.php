<?php


namespace App\Classes;


use Illuminate\Support\Facades\DB;

class DummyNumbers
{
    public $number_of_rows;
    private $countries = ["Cameron", "Ethiopia", "Morocco", "Mozambique", "Uganda", "Egypt"];
    private $codes = ["+237", "+251", "+212", "+258", "+256"];

    public function __construct($rows)
    {
        $this->number_of_rows = $rows;
    }

    public function insertRows()
    {
        DB::beginTransaction();
        for ($i=0; $i<=$this->number_of_rows; $i++)
        {
            $rand_country =  array_rand($this->countries, 1);
            $rand_country_key = array_rand($this->codes, 1);

            DB::table('phone_numbers')->insert([
                'country' => $this->countries[$rand_country],
                'code' => $this->codes[$rand_country_key],
                "phone" =>  rand(1, 99999999),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        DB::commit();
        return true;
    }
}
