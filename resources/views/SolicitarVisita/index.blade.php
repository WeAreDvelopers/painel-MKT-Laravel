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
		<div class="col-md-8 col-sm-12 ">
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
		                <button type="button" class="btn btn-primary pull-right  btn-flat" id="btPesquisar">Pesquisar</button>
		              </div>
		           
		          </div>
			</form>

			<div class="box box-primary hidden" id="resposta">
					<div class="overlay">
		              <i class="fa "><img src="{{asset('img/Preloader_2.gif')}}" width="35px" height="35px"></i>
		            </div>
		            <div class="box-header with-border">
		              <h3 class="box-title">Resultado da busca:</h3>
		            </div>
		            <!-- /.box-header -->
		            <!-- form start -->
		           
		              <div class="box-body">

		               <table class="table table-bordered">
			                <tbody>

			                <tr>
			                  <th style="width: 100px">#id Pipedrive</th>
			                  <th>Empresa</th>
			                
			                  <th style="width: 100px"></th>
			                </tr>
			                
			              </tbody>
			              </table>
		              </div>
		             
		           
		          </div>
		</div>
		<div class="clearfix"></div>
 </section>
    <!-- /.content -->
@endsection

@section('pos-script')
	<script>
		$(document).ready(function(){
			$("#btPesquisar").click(function(){
				$("#resposta,.overlay").removeClass('hidden');
				$("#resposta .list-group").html('');
				$.post('{{ route('admin.solicitar-visita.buscaEmpresa') }}',$("#formPesquisa").serialize(),function(data){
					console.log(data);
					$("#resposta .overlay").addClass('hidden')
					$.each(data, function(key,obj){
						var html = '<tr>';
			                html +=  '<th style="">'+obj.id+'</th>';
			                html +=  '  <th>'+obj.name+'</th>';
			                //html +=  '  <th></th>';
			                html +=  '  <th><a href="/admin/formulario-visita/'+obj.id+'" class="btn btn-success btn-flat btn-xs">Selecionar</a></th>';
			                html +=  '</tr>';
						$("#resposta tbody").append(html);	
					})
					
				})
			})

		})
	</script>
@endsection
