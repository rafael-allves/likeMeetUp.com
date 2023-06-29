@extends('layouts.main')

@section('title', "Produto")

@section('style', "/css/produto/produto.css")

@section('content')
    <h1>Exibindo produto {{$id}}</h1>
@endsection

@section('script', "/js/produto/main.js")
