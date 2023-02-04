<?php

namespace App\Rules;

use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Validation\Rule;

class uniqueRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($table, $isEdit)
    {
        $this->table = $table;
        $this->isEdit = $isEdit;
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
        if ($this->isEdit == null) {
            $list = DB::table($this->table)->where($attribute, "=", $value)->get();
            if (count($list) > 0) {
                return false;
            } else {
                return true;
            }
        } else {
            $list = DB::table($this->table)->where($attribute, "!=", $this->isEdit)->get();
            foreach ($list as $l) {
                if ($l->username == $value) {
                    return false;
                }
            }
            return true;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return "field ini harus unique";
    }
}
