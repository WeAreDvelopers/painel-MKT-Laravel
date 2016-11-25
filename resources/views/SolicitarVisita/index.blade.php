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
        <li class="active">Solicitar Visita</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
		<div class="col-md-6">
		 <form method="POST" id="formPesquisa"  action="{{ route('admin.solicitar-visita.buscaEmpresa') }}" accept-charset="UTF-8">
			
		    	<div class="box box-primary">
		            <div class="box-header with-border">
		              <h3 class="box-title">1º Passo -> Buscar Empresa</h3>
		            </div>
		            <!-- /.box-header -->
		            <!-- form start -->
		           
		              <div class="box-body">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">Empresa</label>
		                  <input type="text" name="empresa" class="form-control" id="exampleInputEmail1" placeholder="Nome cadatrado no pipedrive">
		                </div>
		              </div>
		              <!-- /.box-body -->
		              <div class="box-footer">
		                <button type="button" class="btn btn-primary pull-right" id="btPesquisar">Pesquisar</button>
		              </div>
		           
		          </div>
			</form>

			<div class="box box-primary hidden" id="resposta">
					<div class="overlay">
		              <i class="fa fa-refresh fa-spin fa-3x fa-fw "></i>
		            </div>
		            <div class="box-header with-border">
		              <h3 class="box-title">Resposta</h3>
		            </div>
		            <!-- /.box-header -->
		            <!-- form start -->
		           
		              <div class="box-body">

		                <ul class="list-group" >
						  	
						</ul>
		              </div>
		             
		           
		          </div>
		</div>
 </section>
    <!-- /.content -->
@endsection

@section('pos-script')
	<script>
		$(document).ready(function(){
			$("#btPesquisar").click(function(){
				$("#resposta").removeClass('hidden');
				$("#resposta .list-group").html('');
				$.post('{{ route('admin.solicitar-visita.buscaEmpresa') }}',$("#formPesquisa").serialize(),function(data){
					$("#resposta .overlay").addClass('hidden')
					$.each(data, function(key,obj){
						$("#resposta .list-group").append('<li class="list-group-item">'+obj.name+'</li>');	
					})
					
				})
			})

		})
	</script>
@endsection
