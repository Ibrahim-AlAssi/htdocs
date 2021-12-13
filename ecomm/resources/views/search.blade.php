@extends('master')
@section('content')
<div class="trending-wrapper">
    <h3>Result</h3>
    @foreach ($data as $item)
    <div class="trending-item">
        <a href="detail/{{$item['id']}}">
      <img class="trending-image"src="{{$item['gallery'] }}" >
      <div class="text">
        <h3>{{$item['name']}}</h3>
        <h3>{{$item['description']}}</h3>
      </a>
      </div>
    </div>
        
    @endforeach
    
    @endsection