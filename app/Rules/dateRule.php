<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class dateRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($tgllahir)
    {
        $this->tgllahir = $tgllahir;
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
        $date_now = date("Y-m-d");
        $min_date = strtotime("$date_now -17 year");
        $min_date = date('Y-m-d', $min_date);
        $date_your = $this->tgllahir;
        if ($date_your <= $min_date) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'minimal 17 tahun';
    }
}
