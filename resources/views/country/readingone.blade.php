@extends('common.editing')

@section('title', 'Country ReadingOne')

@section('list')
<table>
    <thead>
        <th>Select</th>
        <th>Naam</th>
        <th>Code</th>
        <th>Verzendkosten</th>
    </thead>
    <tbody>
    @foreach($countries as $country)
    <tr>
        <td>
            <a href="/country/reading/{{ $country->Id }}">-></a>
        </td>
        <td>
            {{ $country->Name }}
        </td>
        <td>
            {{ $country->Code }}
        </td>
        <td>
            {{ $country->ShippingCostMultiplier }}
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
@endsection

@section('lblcls','lbl4Btn')
@section('model','Category')

@section('ctrls')
<button onclick="window.location='/country/updating/{{$cont -> Id}}'">Updating</button>
<button onclick="window.location='/country/inserting'">Inserting</button>
<button form="editform" type="submit">Delete</button>
<button onclick="window.location='/country/editing'">Annuleren</button>
@endsection

@section('content')
<form id="editform" action="/country/delete/{{$cont->Id}}" method="post">
   <label for="Name" >Naam: </label>
    {{ csrf_field() }}
    <input type="text" name="Name" id="Name" readonly value="{{$cont->Name}}"/>
    <br/>
    <label for="Latitude">Breedtegraad: </label>
    {{ csrf_field() }}
    <input type="text" name="Latitude" id="Latitude" readonly value="{{$cont->Latitude}}"/>
    <br/>
    <label for="Longitude">Lengtegraad: </label>
    {{ csrf_field() }}
    <input type="text" name="Longitude" id="Longitude" readonly value="{{$cont->Longitude}}"/>
    <br/>
    <label for="Code">Code: </label>
    {{ csrf_field() }}
    <input type="text" name="Code" id="Code" readonly value="{{$cont->Code}}"/>
    <br/>
    <label for="ShippingCostMultiplier">Verzendkosten: </label>
    {{ csrf_field() }}
    <input type="text" name="ShippingCostMultiplier" id="ShippingCostMultiplier" readonly value="{{$cont->ShippingCostMultiplier}}"/>
    <br/>
</form>
<p id="feedback">{{ $feedback }}</p>
@endsection

@section('footer')
@endsection