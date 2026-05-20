@extends('layouts.provider')
@section('content')
    @livewire('admin.edit-profesor', ['id' => $id])
@endsection
