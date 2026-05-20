@extends('layouts.provider')
@section('content')
    @livewire('admin.edit-question', ['id' => $id])
@endsection