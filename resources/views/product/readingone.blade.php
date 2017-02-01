@extends('common.editing')

@section('title', 'Product ReadingOne')

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

@section('lblcls','lbl4Btn')
@section('model','Product')

@section('ctrls')
<button onclick="window.location='/product/updating/{{$prod -> Id}}'">Updating</button>
<button onclick="window.location='/product/inserting'">Inserting</button>
<button form="editform" type="submit">Delete</button>
<button onclick="window.location='/product/editing'">Annuleren</button>
@endsection

@section('content')
<form id="editform" action="/product/delete/{{$prod->Id}}" method="post">
    <label for="Name" >Naam: </label>
    {{ csrf_field() }}
    <input type="text" name="Name" id="Name" readonly value="{{$prod->Name}}"/>
    <br/>
    <label for="Description">Beschrijving: </label>
    {{ csrf_field() }}
    <input type="text" name="Description" id="Description" readonly value="{{$prod->Description}}"/>
    <br/>
    <label for="Price">Prijs: </label>
    {{ csrf_field() }}
    <input type="text" name="Price" id="Price" readonly value="{{$prod->Price}}"/>
    <br/>
    <label for="ShippingCost">Verzendkosten: </label>
    {{ csrf_field() }}
    <input type="text" name="ShippingCost" id="ShippingCost" readonly value="{{$prod->ShippingCost}}"/>
    <br/>
    <label for="TotalRating">Totaal rating: </label>
    {{ csrf_field() }}
    <input type="text" name="TotalRating" id="TotalRating" readonly value="{{$prod->TotalRating}}"/>
    <br/>
    <label for="Thumbnail">Miniatuur: </label>
    {{ csrf_field() }}
    <input type="text" name="Thumbnail" id="Thumbnail" readonly value="{{$prod->Thumbnail}}"/>
    <br/>
    <label for="Image">Afbeelding: </label>
    {{ csrf_field() }}
    <input type="text" name="Image" id="Image" readonly value="{{$prod->Image}}"/>
    <br/>
    <label for="DiscountPercentage">Aanbiedingspercent: </label>
    {{ csrf_field() }}
    <input type="text" name="DiscountPercentage" id="DiscountPercentage" readonly value="{{$prod->DiscountPercentage}}"/>
    <br/>
    <label for="Category">Categorie:</label>
    {!! Form::select('Category',$categories,$prod->category->Id,['disabled']) !!}
    <br/>
    <label for="Votes">Stemmen: </label>
    {{ csrf_field() }}
    <input type="text" name="Votes" id="Votes" readonly value="{{$prod->Votes}}"/>
    <br/>
    <label for="Supplier">Leverancier: </label>
    {{ csrf_field() }}
    <input type="text" name="Supplier" id="Supplier" readonly value="{{$prod->Supplier}}"/>
    <br/>
</form>
<p id="feedback">{{ $feedback }}</p>
@endsection

@section('footer')
@endsection