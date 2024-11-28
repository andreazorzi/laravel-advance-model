<?php

namespace App\Http\Controllers;

use App\Models\:MODEL_NAME:;
use Illuminate\Http\Request;
use App\Models\PasswordReset;
use App\Traits\ControllerBase;
use SearchTable\Traits\SearchController;

class :MODEL_NAME:Controller extends Controller
{
    use ControllerBase, SearchController;
    
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request){
        return self::search_table($request, new :MODEL_NAME:);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        return self::modal_data(":MODEL_NAME_LOWER:");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        return :MODEL_NAME:::createFromRequest($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(:MODEL_NAME: $:MODEL_NAME_LOWER:){
        return self::modal_data(":MODEL_NAME_LOWER:", [":MODEL_NAME_LOWER:" => $:MODEL_NAME_LOWER:]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, :MODEL_NAME: $:MODEL_NAME_LOWER:){
        return $:MODEL_NAME_LOWER:->updateFromRequest($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(:MODEL_NAME: $:MODEL_NAME_LOWER:){
        $name = $:MODEL_NAME_LOWER:->name;
        $:MODEL_NAME_LOWER:->delete();
        return view("components.alert", ["status" => "success", "message" => ":MODEL_NAME: ".$name." eliminato", "beforeshow" => 'modal.hide(); htmx.trigger("#page", "change");']);
    }
    
    public function impersonate(Request $request, :MODEL_NAME: $:MODEL_NAME_LOWER:){
        session(["auth.impersonate" => $:MODEL_NAME_LOWER:->name]);
        
        return response(headers: ["HX-Redirect" => route("backoffice.index")]);
    }
    
    function stop_impersonate(Request $request){
        session()->forget("auth.impersonate");
        
        return response(headers: ["HX-Redirect" => route("backoffice.index")]);
    }
    
    function send_reset_password(Request $request, :MODEL_NAME: $:MODEL_NAME_LOWER:){
        $send_email = $:MODEL_NAME_LOWER:->sendResetPasswordEmail();
        
        return view("components.alert", ["status" => $send_email ? "success" : "danger", "message" => "Email ".($send_email ? "inviata" : "non inviata")]);
    }
    
    public function change_password(Request $request, PasswordReset $reset_link){
        return $reset_link->changePassword($request);
    }
}
