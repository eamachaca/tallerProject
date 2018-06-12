@extends('zones.create')
@section('sub-title','Editar Zonas')

@section('form',route('zones.update',$zone->id))
@section('method','put')
@section('name',$zone->name)
@section('geo-json',$zone->geo_json)
@section('description',$zone->description)
@section('color',$zone->color)
@section('edit',false)