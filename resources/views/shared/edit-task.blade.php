@extends('app')
@include('layouts.nav')
@section('editTask')
    <x-task-form :task="$task" :categories="$categories"/>
@endsection