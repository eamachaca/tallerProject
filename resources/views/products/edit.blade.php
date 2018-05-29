@extends('products.create')
@section('tittle','Editar Producto')

@section('form',route('products.update',$product->id))
@section('method','put')
@section('selected',$product->type_product_id)
@section('name',$product->name)
@section('price',$product->price)
@section('description',$product->description)