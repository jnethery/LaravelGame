@extends('layouts.main')
@section('title', 'Inventory')

@section('main')
@include('layouts.table', ['items' => $items])
@endsection