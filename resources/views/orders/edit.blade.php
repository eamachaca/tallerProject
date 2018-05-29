@extends('orders.create')
@section('sub-title','Editar Pedido')

@section('form',route('orders.update',$order->id))
@section('method','put')
@section('name',$order->name)
@section('description',$order->description)