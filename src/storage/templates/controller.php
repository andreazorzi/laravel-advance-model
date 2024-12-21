<?php

namespace App\Http\Controllers;

use App\Models\:MODEL_NAME:;
use Illuminate\Http\Request;
use App\Models\PasswordReset;
use AdvanceModel\Traits\AlertResponse;
use AdvanceModel\Traits\BaseController;
use SearchTable\Traits\SearchController;

class :MODEL_NAME:Controller extends Controller
{
    use BaseController, SearchController, AlertResponse;
    
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
        $response = :MODEL_NAME:::createFromRequest($request);
        return $this->alert($response);
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
        $response = $:MODEL_NAME_LOWER:->updateFromRequest($request);
        return $this->alert($response);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(:MODEL_NAME: $:MODEL_NAME_LOWER:){
        $name = $:MODEL_NAME_LOWER:->name;
        $:MODEL_NAME_LOWER:->delete();
        return view("components.alert", ["status" => "success", "message" => ":MODEL_NAME: ".$name." eliminato", "beforeshow" => 'modal.hide(); htmx.trigger("#page", "change");']);
    }
}
