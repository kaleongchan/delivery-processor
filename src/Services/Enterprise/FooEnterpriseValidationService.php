<?php

namespace App\Services\Enterprise;

use App\Contracts\Enterprise\Validator;

class FooEnterpriseValidationService implements Validator
{
    public function validate($enterprise) : bool
    {
        // @todo implementation

        return true;
    }
}