<?php

namespace App\Contracts\Enterprise;

interface Validator
{
    public function validate($enterprise) : bool;
}