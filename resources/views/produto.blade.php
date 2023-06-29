@extends('layouts.main')

@section('title', "Produto")

@section('style', "/css/produto/produto.css")

@section('content')
    @if($id != null)
        <h1>Exibindo produto {{$id}}</h1>
    @endif
@endsection

@section('script', "/js/produto/main.js")
