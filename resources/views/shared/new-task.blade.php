@extends('app')
@include('layouts.nav')
@section('newTask')
    <x-task-form :categories="$categories"/>
@endsection
