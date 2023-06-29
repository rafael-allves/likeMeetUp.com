@extends('layouts.main')

@section('title', "Produto")

@section('style', "/css/produto/produto.css")

@section('content')
    @if($busca != '')
        <h1>Você buscou: {{$busca}}</h1>
    @endif
@endsection

@section('script', "/js/produto/main.js")
