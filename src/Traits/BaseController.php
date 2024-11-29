<?php

namespace AdvanceModel\Traits;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;

trait BaseController
{
    private static function modal_data($model, $data = []){
        return View::make("components.backoffice.modals.$model-data", $data);
    }
}