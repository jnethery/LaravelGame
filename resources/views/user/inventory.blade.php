@extends('layouts.main')
@section('title', 'Inventory')

@section('main')
@if (count($items) == 0)
    Oh no! Your inventory is empty! :(
@else
    @include('layouts.table', ['items' => $items])
@endif
@endsection