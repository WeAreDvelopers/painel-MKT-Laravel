<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use Devio\Pipedrive\Pipedrive;
use Illuminate\Http\Response;
class indexController extends Controller{

	private $pipedrive;

	public function __construct(Pipedrive $pipedrive){

	    $this->pipedrive = $pipedrive;
	
	}
   public function index(Pipedrive $pipedrive){
    if (!Auth::check()) {
            return view("auth.login");
    }
    
   	$response = $pipedrive->organizations->all(['start'=>2000,'limit'=>100]);

	  $organizations = $response->getData();
   		
   	


   	return  view("Dashboard.index", compact('organizations'));


   }
}
