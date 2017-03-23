@extends('layouts.admin')

@section('contenido')
@include('errors.alerts.errorUsers')
    <h2 class="text-center text-uppercase">Formulario de registro de usuarios</h2>
    {!!Form::open(['route'=>'admin.store','method'=>'POST','files'=>true]) !!}
       @include('admin.userForm.form')
       
    {!! Form::close() !!}
@endsection	
