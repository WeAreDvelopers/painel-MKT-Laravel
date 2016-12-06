@extends('templates.template')



@section('head-custom')
 <!-- Select2 -->
  <link rel="stylesheet" href="{{asset('adminLTE/plugins/select2/select2.min.css')}}">
  <!-- daterange picker -->
  <link rel="stylesheet" href="{{asset('adminLTE/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="{{asset('adminLTE/plugins/datepicker/datepicker3.css')}}">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="{{asset('adminLTE/plugins/iCheck/all.css')}}">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="{{asset('adminLTE/plugins/colorpicker/bootstrap-colorpicker.min.css')}}">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="{{asset('adminLTE/plugins/timepicker/bootstrap-timepicker.min.css')}}">

  <!-- fullCalendar 2.2.5-->
  <link rel="stylesheet" href="{{asset('adminLTE/plugins/fullcalendar/fullcalendar.min.css')}}">
  <link rel="stylesheet" href="{{asset('adminLTE/plugins/fullcalendar/fullcalendar.print.css')}}" media="print">

  
@endsection
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
		<div class="col-md-12 col-sm-12  col-lg-6">
			<div class="col-md-12">
					<div class="box box-widget widget-user">
		            <!-- Add the bg color to the header using any of the bg-* classes -->
		            <div class="widget-user-header bg-black" style="background: url('http://lorempixel.com/800/400/city/') center center; background-size: cover;  filter: grayscale(100%);">
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
		                    <span class="description-text">{{$dadosEmpresa->name}}</span>
		                  </div>
		                  <!-- /.description-block -->
		                </div>
		                <!-- /.col -->
		                <div class="col-sm-4 border-right">
		                  <div class="description-block">
		                    <h5 class="description-header">Telefone </h5>
		                    <span class="description-text">+{{$dadosEmpresa->e3a710979968da30df32bf54ac1c6e959c5de076}}</span>
		                  </div>
		                  <!-- /.description-block -->
		                </div>
		                <!-- /.col -->
		                <div class="col-sm-4">
		                  <div class="description-block">
		                    <h5 class="description-header">Proprietário</h5>
		                    <span class="description-text">{{$proprietario->name}}</span>
		                  </div>
		                  <!-- /.description-block -->
		                </div>
		                <!-- /.col -->
		              </div>
		              <!-- /.row -->
		            </div>
		          </div>

						</div>
						<div class="col-md-12">

		          <div class="box box-default collapsed-box" >
					 <div class="box-header with-border">
		              	<h3 class="box-title">Dados da Empresa</h3>
		              	<div class="box-tools pull-right">
			                <button type="button" class="btn btn-box-tool""><i class="fa fa-pencil"></i></button>
			                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
			              </div>
		            </div>
		             <div class="box-body ">
		            	
		             @foreach($campos as $campo)
						<?php 
							$campoKey = $campo->key; 
							

						?>
						@if(!isset($campo->is_subfield))
							@if($campo->field_type == "varchar" or $campo->field_type == "double" or $campo->field_type == "address")
								
							
									<div class="col-md-6"  id="">
										<div class="form-group">
						                  <label>{{$campo->name}}</label>
						                  <input type="text" class="form-control" placeholder="" value="{{$dadosEmpresa->$campoKey}}" data-ordem="" name="{{$dadosEmpresa->name}}">
						                </div>
					                </div>
					                @endif
					                @if($campo->field_type == "enum")
					                <div class="col-md-6"  id="">
									<div class="form-group"">
						                <label>{{$campo->name}}</label>
						                <select class="form-control" style="width: 100%;" >
						                <option selected="selected" data-ordem="">Selecione...</option>
						                	@foreach($campo->options as $option)
						                		<option value="{{$option->id}}" @if($dadosEmpresa->$campoKey == $option->id) selected="selected" @endif>{{$option->label}}</option>
						                	@endforeach
						                </select>

						              </div>
						              </div>
						        @endif
			                @endif

						
					@endforeach
						
		              
		              </div>
		              <div class="box-footer">
		              	<div class="col-md-4"></div>
		              	<div class="col-md-4"></div>
		              	<div class="col-md-4">
		              	</div>
		              </div>


				</div>

				<div class="box box-default collapsed-box">
		            <div class="box-header with-border">
		              <h3 class="box-title">Contatos</h3>

		              <div class="box-tools pull-right">
		                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
		                </button>
		              </div>
		              <!-- /.box-tools -->
		            </div>
		            <!-- /.box-header -->
		            <div class="box-body">
		              	<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
						
						@foreach($contatosEmpresa as $person)
						  <div class="panel panel-default">
						    <div class="panel-heading" role="tab" id="heading_{{$person->id}}">
						      <h4 class="panel-title">
						        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_{{$person->id}}" aria-expanded="true" aria-controls="collapse_{{$person->id}}">
						          {{$person->name}}
						        </a>
						        <div class="pull-right">
						        	<input type="checkbox" name="contato[]" class="minimal" id="">
						        </div>
						      </h4>
						    </div>
						    <div id="collapse_{{$person->id}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_{{$person->id}}">
						      <div class="panel-body">
									<div class="col-md-4">
										Telefone 1: 
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-phone"></i>
											</div>
												<input type="text" class="form-control "  data-inputmask="'mask': '(99) [9]9999-9999'" data-mask value="{{ isset($person->phone[0]->value) ? $person->phone[0]->value : '' }}">
											
										</div>
									</div>
								<div class="col-md-4">Telefone 2: 
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-phone"></i>
											</div>
											
											
											<input type="text" class="form-control "  data-inputmask="'mask': '(99) 9999-9999'" data-mask value="{{ isset($person->phone[1]->value) ? $person->phone[1]->value : '' }}">
											
										</div>
								</div>
								<div class="col-md-4">

								Email:
									<div class="input-group">
									<div class="input-group-addon">
										<i class="fa  fa-envelope"></i>
									</div>
									
									<input type="text" class="form-control "  value="{{ isset($person->email[0]->value) ? $person->email[0]->value : '' }}">
									
									</div>


								</div>
								<div class="col-md-4">

								Cargo:
									<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-briefcase"></i>
									</div>
									
									<input type="text" class="form-control "  value="{{ isset($person->d0742e410142596337926d3840956b01d38ad2f1) ? $person->d0742e410142596337926d3840956b01d38ad2f1 : '' }}">
									
									</div>


								</div>
										
					                <div class="clearfix"></div>  
						      </div>
						    </div>
						  </div>

						@endforeach

						
						
						</div>
		            </div><!-- /.box-body -->

		              <div class="box-footer">
		              	<div class="col-md-4"></div>
		              	<div class="col-md-4"></div>
		              	<div class="col-md-4">
		              	</div>
		              </div>
		          </div>

		          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Detalhes da Reunião</h3>
            </div>
            <div class="box-body">
            <div class="col-md-12">
            <label>Soluções de interesse</label><br>
           <!-- <ul class="list-group">
           
            	@foreach($linhaProdutos as $produto)
            	<!--<li class="list-group-item">-->
 					<div class="col-md-3">
		                  <input type="checkbox" class="minimal"> {{$produto}}
		              </div>
					
				<!--</li>-->
            	@endforeach

<!--</ul>-->
            </div>
            <br/><br/>
            <hr class="row col-md-12">
				<div class="col-md-12">
				<div class="form-group">
                <label>Vededor</label>
	                <select class="form-control select2 " multiple="multiple" name="vendedores" data-placeholder="Selecione 1 ou mais vendedores" style="width: 100%;">
	                  
	                  @foreach($vendedores as $vendedor)

	                  <option>{{$vendedor->name}}</option>
	                  @endforeach
	                  
	                </select>
              </div>
					
					
				</div>
            <hr class="row col-md-12">
            <div class="col-md-6">
	              <div class="form-group">
	                <label>Data:</label>  
	                <div class="input-group date">
	                  <div class="input-group-addon">
	                    <i class="fa fa-calendar"></i>
	                  </div>
	                  <input type="text" class="form-control pull-right" id="datepicker" value="30/11/2016">
	                </div>
	              </div>
            </div>
            <div class="col-md-6">
	              <div class="bootstrap-timepicker">
	                <div class="form-group">
	                  <label>Horário:</label>
	                  <div class="input-group">
	                    <div class="input-group-addon">
	                      <i class="fa fa-clock-o"></i>
	                    </div>
	                    <input type="text" class="form-control timepicker">
	                  </div>
	                </div>
	              </div>
            </div>
            <hr class="row col-md-12">
	            <div class="col-md-12">
	            	<label>Observações</label>
	            	<textarea class="form-control"></textarea>
	            </div>
            </div>
	 		<hr class="row col-md-12">
	        <div class="col-md-12">
	        	<label>Reunião presencial?</label>
	        	 <div class="form-group">
                <label>
                  <input type="radio" name="r1" class="minimal" checked> Sim
                </label>
                <label>
                  <input type="radio" name="r1" class="minimal"> Não
                </label>
              </div>
	        </div>
			<div class="col-md-12">
				<div class="col-md-4">
				<label>CEP:</label>
					<div class="input-group input-group-sm">

		                <input type="text" class="form-control" name="cep" id="cep">
		                    <span class="input-group-btn">
		                      <button type="button" class="btn btn-info btn-flat buscaCEP">Pesquisar!</button>
		                    </span>
		              </div>

				</div>
				<div class="col-md-4">
					<div class="form-group">
	                <label>Endereço:</label>  
	                  <input type="text" class="form-control " id="endereco" name="endereco">
	              </div>

				</div>
				<div class="col-md-4">
					<div class="form-group">
	                <label>Número:</label>  
	                  <input type="text" class="form-control " id="numero" name="numero">
	              </div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
	                <label>Complemento:</label>  
	                  <input type="text" class="form-control " id="complemento" name="complemento">
	              </div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
	                <label>Bairro:</label>  
	                  <input type="text" class="form-control " id="bairro" name="bairro">
	              </div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
	                <label>Cidade:</label>  
	                  <input type="text" class="form-control " id="cidade" name="cidade">
	              </div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
	                <label>Estado:</label>  
	                  <input type="text" class="form-control " id="estado" name="estado">
	              </div>
				</div>
			</div>
			<div class="clearfix"></div>
            <div class="box-footer">
		              
		              	<div class="col-md-4 pull-right">
		              	<button class="btn btn-success btn-block btn-flat" type="button" >Marcar Reunião</button>
		              	</div>
		    </div>
          </div>

          
			</div>


			

			
		</div>
			<div class="col-md-12 col-sm-12  col-lg-6">
          	<div class="box box-default ">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> Calendario Vendedores</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div id="calendar"></div>
            </div>
            <!-- /.box-body -->
          </div>
          </div>

		<div class="clearfix"></div>
 </section>


        <div class="example-modal">
        <div class="modal">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Default Modal</h4>
              </div>
              <div class="modal-body">
                <p>One fine body…</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
      </div>
    <!-- /.content -->
@endsection

@section('pos-script')
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="{{asset('adminLTE/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- bootstrap datepicker -->
<script src="{{asset('adminLTE/plugins/datepicker/bootstrap-datepicker.js')}}"></script>

<!-- Select2 -->
<script src="{{asset('adminLTE/plugins/select2/select2.full.min.js')}}"></script>
<!-- bootstrap color picker -->
<script src="{{asset('adminLTE/plugins/colorpicker/bootstrap-colorpicker.min.js')}}"></script>
<!-- bootstrap time picker -->
<script src="{{asset('adminLTE/plugins/timepicker/bootstrap-timepicker.min.js')}}"></script>
<!-- iCheck 1.0.1 -->
<script src="{{asset('adminLTE/plugins/iCheck/icheck.min.js')}}"></script>
<!-- fullCalendar 2.2.5 -->
<script src="{{asset('adminLTE/plugins/fullcalendar-3.0.1/lib/moment.min.js')}}"></script>
<script src="{{asset('adminLTE/plugins/fullcalendar-3.0.1/fullcalendar.min.js')}}"></script>
<script src="{{asset('adminLTE/plugins/fullcalendar-3.0.1/locale-all.js')}}"></script>
<script src="{{asset('adminLTE/plugins/datepicker/locales/bootstrap-datepicker.pt-BR.js')}}"></script>
<script src="{{asset('adminLTE/plugins/cep/cep.js')}}"></script>
<script type="text/javascript">
	
	$(document).ready(function(){
		$("[data-mask]").inputmask();
		 $('#datepicker').datepicker({
	      autoclose: true,
	      language: 'pt-BR',
	      daysOfWeekDisabled:'06',
	      format:	'dd/mm/yyyy'
	    });

	     //Timepicker
	    $(".timepicker").timepicker({
	      showInputs: false,
	      defaultTime:''
	    });	
		
	})
</script>
<script>
  $(function () {
  	//iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });
    $(".select2").select2();
    /* initialize the external events
     -----------------------------------------------------------------*/
    function ini_events(ele) {
      ele.each(function () {

        // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
        // it doesn't need to have a start or end
        var eventObject = {
          title: $.trim($(this).text()) // use the element's text as the event title
        };

        // store the Event Object in the DOM element so we can get to it later
        $(this).data('eventObject', eventObject);

        // make the event draggable using jQuery UI
        $(this).draggable({
          zIndex: 1070,
          revert: true, // will cause the event to go back to its
          revertDuration: 0  //  original position after the drag
        });

      });
    }

    ini_events($('#external-events div.external-event'));

    /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date();
    var d = date.getDate(),
        m = date.getMonth(),
        y = date.getFullYear();
    $('#calendar').fullCalendar({
    	
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay'
      },
      locale: 'pt-br',
      buttonText: {
        today: 'today',
        month: 'month',
        week: 'week',
        day: 'day'
      },
      //Random default events
      events: [
        /*{
          title: 'All Day Event',
          start: new Date(y, m, 1, 1),
          backgroundColor: "#f56954", //red
         
        },
        {
          title: 'vendedor 1',
          start: new Date(y, m, d - 5),
          end: new Date(y, m, d - 2),
          backgroundColor: "#f39c12", //yellow
         
        },
        {
          title: 'Vendedor 2',
          start: new Date(y, m, d - 5),
          end: new Date(y, m, d - 2),
          backgroundColor: "#666", //yellow
          
        },
        {
          title: 'Meeting',
          start: new Date(y, m, d, 10, 30),
          allDay: false,
          backgroundColor: "#0073b7", //Blue
        
        },
        {
          title: 'Lunch',
          start: new Date(y, m, d, 12, 0),
          end: new Date(y, m, d, 14, 0),
          allDay: false,
          backgroundColor: "#00c0ef", //Info (aqua)
         
        },
        {
          title: 'Birthday Party',
          start: new Date(y, m, d + 1, 19, 0),
          end: new Date(y, m, d + 1, 22, 30),
          allDay: false,
          backgroundColor: "#00a65a", //Success (green)
          
        },*/
        {
          title: 'Click for Google',
          start: new Date(y, m, 1, 15, 30),
          end: new Date(y, m, 1, 17, 00),
          //url: 'http://google.com/',
          backgroundColor: "#3c8dbc", //Primary (light-blue)
          
        }
      ],
      editable: true,
      droppable: true, // this allows things to be dropped onto the calendar !!!
      drop: function (date, allDay) { // this function is called when something is dropped

        // retrieve the dropped element's stored Event Object
        var originalEventObject = $(this).data('eventObject');

        // we need to copy it, so that multiple events don't have a reference to the same object
        var copiedEventObject = $.extend({}, originalEventObject);

        // assign it the date that was reported
        copiedEventObject.start = date;
        copiedEventObject.allDay = allDay;
        copiedEventObject.backgroundColor = $(this).css("background-color");
        copiedEventObject.borderColor = $(this).css("border-color");

        // render the event on the calendar
        // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
        $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

        // is the "remove after drop" checkbox checked?
        if ($('#drop-remove').is(':checked')) {
          // if so, remove the element from the "Draggable Events" list
          $(this).remove();
        }

      }
    });

    /* ADDING EVENTS */
    var currColor = "#3c8dbc"; //Red by default
    //Color chooser button
    var colorChooser = $("#color-chooser-btn");
    $("#color-chooser > li > a").click(function (e) {
      e.preventDefault();
      //Save color
      currColor = $(this).css("color");
      //Add color effect to button
      $('#add-new-event').css({"background-color": currColor, "border-color": currColor});
    });
    $("#add-new-event").click(function (e) {
      e.preventDefault();
      //Get value and make sure it is not null
      var val = $("#new-event").val();
      if (val.length == 0) {
        return;
      }

      //Create events
      var event = $("<div />");
      event.css({"background-color": currColor, "border-color": currColor, "color": "#fff"}).addClass("external-event");
      event.html(val);
      $('#external-events').prepend(event);

      //Add draggable funtionality
      ini_events(event);

      //Remove event from text input
      $("#new-event").val("");
    });
  });
</script>
@endsection
