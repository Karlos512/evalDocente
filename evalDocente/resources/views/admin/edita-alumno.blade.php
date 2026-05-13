@extends('layouts.provider')
@section('content')
    @livewire('admin.edit-student', ['id' => $id])
@endsection