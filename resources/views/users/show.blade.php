@extends('layouts.index')


@section('title', 'login')

@section('body')

    <h1>  {{$user->name}} </h1>
    <ul>
        <li> {{$user->email}} </li>
        <li> {{$user->street}} </li>
        <li> {{$user->number}} </li>
        <li> {{$user->city}} </li>
        <li> {{$user->district}} </li>
    </ul>  
    
@endsection