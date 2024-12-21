<?php

namespace App\Traits;

use Illuminate\Support\Facades\View;

trait AlertResponse
{
    public function alert($data){
        $alert = [
            "status" => $data["status"] ?? "info",
            "message" => $data["message"] ?? "",
            "callback" => $data["callback"] ?? null,
            "beforeshow" => $data["beforeshow"] ?? null,
            "duration" => $data["duration"] ?? null
        ];
        
        return View::make("components.alert", $alert);
    }
}