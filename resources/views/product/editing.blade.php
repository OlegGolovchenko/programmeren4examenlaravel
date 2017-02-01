@extends('common.editing')

@section('title', 'Product Editing')

@section('list')
<table>
   <thead>
        <th>Select</th>
        <th>Naam</th>
        <th>Prijs</th>
        <th>Verzendkosten</th>
        <th>Totaal rating</th>
        <th>Aanbiedingspercent</th>
        <th>Stemmen</th>
        <th>Leverancier</th>
        <th>Categorie</th>
    </thead>
    <tbody>
    @foreach($products as $product)
    <tr>
        <td>
            <a href="/product/reading/{{ $product->Id }}">-></a>
        </td>
        <td>{{$product->Name}}</td>
        <td>{{$product->Price}}</td>
        <td>{{$product->ShippingCost}}</td>
        <td>{{$product->TotalRating}}</td>
        <td>{{$product->DiscountPercentage}}</td>
        <td>{{$product->Votes}}</td>
        <td>{{$product->Supplier}}</td>
        <td>{{$product->category->Name}}</td>
    </tr>
    @endforeach
    </tbody>
</table>
@endsection

@section('lblcls','lblBtn')
@section('model','Product')

@section('ctrls')
<button onclick="window.location='/product/inserting'">Inserting</button>
@endsection

@section('content')
@endsection

@section('footer')
@endsection