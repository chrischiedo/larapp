@extends('master')

@section('header')
  @if(isset($breed))
    {{link_to('/', 'Back to the overview')}}
  @endif
<h2>
	All @if(isset($breed)) {{$breed->name}} @endif Dogs

  <a href="{{url('dogs/create')}}" class="btn btn-primary pull-right">
  	Add a new dog
  </a>
</h2>
@stop

@section('content')
  @foreach($dogs as $dog)
    <div class="dog">
      <a href="{{url('dogs/'.$dog->id)}}">
      	<strong> {{{$dog->name}}} </strong> - {{{$dog->breed->name}}}
      </a>
    </div>
  @endforeach
@stop