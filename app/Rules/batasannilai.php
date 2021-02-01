<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class batasannilai implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $cek = false;
        if($value >= 0 && $value <= 100){
            $cek = true;
        }
        return $cek;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'nilai harus kurang dari 100 dan lebih atau sama dengan 0';
    }
}
