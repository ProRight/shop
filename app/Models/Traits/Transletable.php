<?php

namespace App\Models\Traits;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;

trait Transletable
{

    public function __($fieldName)
    {
        $fieldOriginal = $fieldName;
        if (!is_null(App::getLocale())) {
            $fieldName .= '_' . App::getLocale();
        }
        return $this->$fieldName;
    }
}
