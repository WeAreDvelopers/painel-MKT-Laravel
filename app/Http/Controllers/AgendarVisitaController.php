<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Devio\Pipedrive\Pipedrive;
use DB;
use App\User;


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
    public function camposEmpresa($pipedrive){
          $OrganizationFields = $pipedrive->OrganizationFields->all()->getData();  
          return $OrganizationFields;
    }
    public function proprietarioPipedrive($idProprietario, $pipedrive){
       return $pipedrive->users->find($idProprietario)->getData();
    }
    public function contatosEmpresa($idEmpresa, $pipedrive){
        return $pipedrive->organizations->persons($idEmpresa)->getData();
    }
    public function linhaProdutos($pipedrive){
        //12458 = Linha de  Campos Pipedrive Produto Pipedrive
        $linhaProdutos = $pipedrive->dealFields->find('12458')->getData();
        $arrayLinha = array();
        foreach ($linhaProdutos->options as $key => $value) {
            $explode = explode("/", $value->label);
            $arrayLinha[] = trim($explode[0]);
        }
        return array_unique($arrayLinha);
    }
   
    public function dadosEmpresa($idEmpresa,Pipedrive $pipedrive){
       
        $campos = $this->camposEmpresa($pipedrive);
        
        foreach ($campos as $key => $value) {
            $str = $value->name;
            $str = strtolower(trim($str));
            $str = preg_replace('/[^a-z0-9-]/', '-', $str);
            $str = preg_replace('/-+/', "-", $str);
            $nameCampos[$key] = array("slug"=>$str);
            
        }
        
         dd($nameCampos);
    	$response = $pipedrive->organizations->find($idEmpresa);    	
        $dadosEmpresa =  $response->getData();  
        $idProprietario = $dadosEmpresa->owner_id->id;
        $proprietario = $this->proprietarioPipedrive($idProprietario,$pipedrive);
        $contatosEmpresa = $this->contatosEmpresa($idEmpresa,$pipedrive);
        $linhaProdutos = $this->linhaProdutos($pipedrive);
        asort($linhaProdutos);
        
       

        $vendedores = DB::table('users')->where('unidade','SJC')->where('role','vendedor')->get();
  
       /*foreach ( $vendedores as $key => $value) {
            $vendedor = \App\User::where('id',$value->id)->get();
            $u = $pipedrive->users->find($value->id_pipedrive)->getData();
            $icon = $u->icon_url;
            if($icon != "null"){
               User::where('id',$value->id)->update(['icon_url'=>$icon]);
           }
       }*/
    	return view("SolicitarVisita.form_visita",compact('dadosEmpresa','campos','proprietario','contatosEmpresa','linhaProdutos','vendedores'));
    }
}
