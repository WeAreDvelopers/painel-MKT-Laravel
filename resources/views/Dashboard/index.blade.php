@extends('templates.template')
@section('content')

<h1>Olá Mundo</h1>


@foreach($organizations as $org)
{{$org->name}}<br>

@endforeach


@stop


