@extends('app')
@include('layouts.nav')
@section('assignNewTask')
    <x-task-form :users="$users" :categories="$categories"/>
@endsection