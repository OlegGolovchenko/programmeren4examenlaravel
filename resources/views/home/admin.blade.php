@extends('home.index')

@section('title', 'Admin pagina')

@section('header')
@endsection

@section('content')
    <div id="tiles">
        <a href="/product/editing"><p>Product</p></a>
        <a href="/home/notdone"><p>Supplier</p></a>
        <a href=""><p></p></a>
        <a href="/category/editing"><p>Category</p></a>
        <a href="/customer/editing"><p>Customer</p></a>
        <a href=""><p></p></a>
        <a href="/home/notdone"><p>Order</p></a>
        <a href="/home/notdone"><p>Order Items</p></a>
        <a href=""><p></p></a>
        <a href="/country/editing"><p>Country</p></a>
        <a href="/home/notdone"><p>Order Status</p></a>
        <a href="/home/notdone"><p>Unit Base</p></a>
    </div>
@endsection

@section('footer')
@endsection