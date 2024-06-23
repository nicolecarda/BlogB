@extends('layout.app');

@section('title', 'tags list')

@section('content')

<h1>Tags List</h1>

<ul>
    @foreach ($tags as $tag)

    <li>
        {{$tags->id}}
        {{$tags->name}}
    </li>
        
    @endforeach
</ul>
    
@endsection
    
