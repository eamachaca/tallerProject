@extends('type-products.create')
@section('tittle','Editar Producto')

@section('form',route('type-products.update',$typeProduct->id))
@section('method','put')
@section('name',$typeProduct->name)
@section('description',$typeProduct->description)