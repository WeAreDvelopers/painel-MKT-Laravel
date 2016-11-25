<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Devio\Pipedrive\Pipedrive;


class AgendarVisitaController extends Controller
{
	
    public function index(){
    	return view("SolicitarVisita.index");
    }


    public function pesquisar(Request $request,Pipedrive $pipedrive){

    $empresa = $request->input('empresa');
    $response = $pipedrive->organizations->findByName($empresa);
	return  $response->getData();
	  	
    }

    public function dadosEmpresa($idEmpresa,Pipedrive $pipedrive){

    	
    	$response = $pipedrive->organizations->find($idEmpresa);
    	$dadosEmpresa =  $response->getData();
    	return view("SolicitarVisita.form_visita",compact('dadosEmpresa'));
    }
}
