@extends('templates.template')

@section('content')

	 <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Solicitar Visita
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashborard</a></li>
        <li class="active">Formulário Visita</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
		<div class="col-md-12 col-sm-12 ">
			<div class="col-md-6">
					<div class="box box-widget widget-user">
		            <!-- Add the bg color to the header using any of the bg-* classes -->
		            <div class="widget-user-header bg-black" style="background: url('http://lorempixel.com/400/200/city/') center center; background-size: cover;  filter: grayscale(100%);">
		              <h3 class="widget-user-username">{{$dadosEmpresa->name}}</h3>
		              <h5 class="widget-user-desc">Ti / Telecomunicacoes</h5>
		            </div>
		            <div class="widget-user-image">
		            <img class="img-circle" src="{{ asset('/img/clientesLogos/' . $dadosEmpresa->id.'/avatar/' . $dadosEmpresa->id.'.jpg') }}">
		              
		            </div>
		            <div class="box-footer">
		              <div class="row">
		                <div class="col-sm-4 border-right">
		                  <div class="description-block">
		                    <h5 class="description-header">Região</h5>
		                    <span class="description-text">SALES</span>
		                  </div>
		                  <!-- /.description-block -->
		                </div>
		                <!-- /.col -->
		                <div class="col-sm-4 border-right">
		                  <div class="description-block">
		                    <h5 class="description-header">Telefone </h5>
		                    <span class="description-text">+55 00 0 0000-0000</span>
		                  </div>
		                  <!-- /.description-block -->
		                </div>
		                <!-- /.col -->
		                <div class="col-sm-4">
		                  <div class="description-block">
		                    <h5 class="description-header">Origem</h5>
		                    <span class="description-text">Marketing</span>
		                  </div>
		                  <!-- /.description-block -->
		                </div>
		                <!-- /.col -->
		              </div>
		              <!-- /.row -->
		            </div>
		          </div>


		          <div class="box box-default " >
					 <div class="box-header with-border">
		              	<h3 class="box-title">Detalhes</h3>
		              	<div class="box-tools pull-right">
			                <button type="button" class="btn btn-box-tool""><i class="fa fa-pencil"></i></button>
			              </div>
		            </div>
		             <div class="box-body">
						<div class="col-md-4">
							<div class="form-group">
			                  <label>Razão Social</label>
			                  <input type="text" class="form-control" placeholder="" >
			                </div>

						</div>
						<div class="col-md-4">
							<div class="form-group">
			                  <label>CNPJ</label>
			                  <input type="text" class="form-control" placeholder="" >
			                </div>

						</div>
						<div class="col-md-4">
							<div class="form-group">
			                  <label>I.E</label>
			                  <input type="text" class="form-control" placeholder="" >
			                </div>

						</div>
						<div class="col-md-4">
							<div class="form-group">
			                  <label>Telefone Principal</label>
			                  <input type="text" class="form-control" placeholder="" >
			                </div>

						</div>
						<div class="col-md-4">
							<div class="form-group">
				                <label>Classificação</label>
				                <select class="form-control select2" style="width: 100%;" >
				                <option selected="selected">Selecione...</option>
				                  <option selected="selected"></option>
				                  
				                </select>
				              </div>

						</div>
						<div class="col-md-4">
							<div class="form-group">
			                  <label>Site</label>
			                  <input type="text" class="form-control" placeholder="" >
			                </div>

						</div>
						<div class="col-md-4">
							<div class="form-group">
			                  <label>Nº Funcionários</label>
			                  <input type="text" class="form-control" placeholder="" >
			                </div>

						</div>
						<div class="col-md-4">
							<div class="form-group">
				                <label>Segmentos</label>
				                <select class="form-control select2" style="width: 100%;" >
				                <option selected="selected">Selecione...</option>
				                  <option selected="selected"></option>
				                  
				                </select>
				              </div>

						</div>
						<div class="col-md-4">
							<div class="form-group">
				                <label>Região</label>
				                <select class="form-control select2" style="width: 100%;" >
				                <option selected="selected">Selecione...</option>
				                  <option selected="selected"></option>
				                  
				                </select>
				              </div>

						</div>
						<div class="col-md-4">
							<div class="form-group">
				                <label>Endereço</label>
				                <input type="text" class="form-control" placeholder="" >
				              </div>

						</div>
		              
		              </div>
		              <div class="box-footer">
		              	
		              </div>


				</div>
			</div>
			<div class="col-md-7">
				
			</div>

			
		</div>
		<div class="clearfix"></div>
 </section>
    <!-- /.content -->
@endsection

@section('pos-script')

@endsection
