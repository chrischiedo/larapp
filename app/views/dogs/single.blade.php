@extends('master')

@section('header')
  <a href="{{url('/')}}">Back to overview</a>
  <h2>
  	{{{$dog->name}}}
  </h2>
  <a href="{{url('dogs/'.$dog->id.'/edit')}}">
  	<span class="glyphicon glyphicon-edit"></span> Edit
  </a>
  <a href="{{url('dogs/'.$dog->id.'/delete')}}">
  	<span class="glyphicon glyphicon-trash"></span> Delete
  </a>
  Last edited: {{$dog->updated_at}}
@stop

@section('content')
  <p>Date of Birth: {{$dog->date_of_birth}} </p>
  <p>
  	  @if($dog->breed)
  	    Breed:
  	    {{link_to('dogs/breeds/' . $dog->breed->name,
  	    $dog->breed->name)}}
  	  @endif
  </p>
@stop