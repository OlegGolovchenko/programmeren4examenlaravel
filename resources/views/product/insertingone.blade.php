@extends('common.editing')

@section('title', 'Product InsertingOne')

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

@section('lblcls','lbl2Btn')
@section('model','Product')

@section('ctrls')
<button form="editform" type="submit">Insert</button>
<button onclick="window.location='/product/editing'">Annuleren</button>
@endsection

@section('content')
<form id="editform" action="/product/insert" method="post">
    <label for="Name" >Naam: </label>
    {{ csrf_field() }}
    <input type="text" name="Name" id="Name" required maxlength="255"/>
    <br/>
    <label for="Description">Beschrijving: </label>
    {{ csrf_field() }}
    <input type="text" name="Description" id="Description" maxlength="1024"/>
    <br/>
    <label for="Price">Prijs: </label>
    {{ csrf_field() }}
    <input name="Price" id="Price" type="number" step="0.01"/>
    <br/>
    <label for="ShippingCost">Verzendkosten: </label>
    {{ csrf_field() }}
    <input type="number" step="0.01" name="ShippingCost" id="ShippingCost"/>
    <br/>
    <label for="TotalRating">Totaal rating: </label>
    {{ csrf_field() }}
    <input type="number" name="TotalRating" id="TotalRating"/>
    <br/>
    <label for="Thumbnail">Miniatuur: </label>
    {{ csrf_field() }}
    <input type="text" name="Thumbnail" id="Thumbnail" maxlength="255"/>
    <br/>
    <label for="Image">Afbeelding: </label>
    {{ csrf_field() }}
    <input type="text" name="Image" id="Image" maxlength="255"/>
    <br/>
    <label for="DiscountPercentage">Aanbiedingspercent: </label>
    {{ csrf_field() }}
    <input type="number" step="0.01" name="DiscountPercentage" id="DiscountPercentage"/>
    <br/>
    <label for="Category">Categorie:</label>
    {!! Form::select('Category',$categories,null) !!}
    <br/>
    <label for="Votes">Stemmen: </label>
    {{ csrf_field() }}
    <input type="number" name="Votes" id="Votes"/>
    <br/>
    <label for="Supplier">Leverancier: </label>
    {{ csrf_field() }}
    <input type="text" name="Supplier" id="Supplier" maxlength="255"/>
    <br/>
</form>
<p id="feedback">{{ $feedback }}</p>
@endsection

@section('footer')
@endsection