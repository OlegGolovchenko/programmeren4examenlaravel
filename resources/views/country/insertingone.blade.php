@extends('common.editing')

@section('title', 'Country InsertingOne')

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

@section('lblcls','lbl2Btn')
@section('model','Country')

@section('ctrls')
<button form="editform" type="submit">Insert</button>
<button onclick="window.location='/country/editing'">Annuleren</button>
@endsection

@section('content')
<form id="editform" action="/country/insert" method="post">
    <label for="Name" >Naam: </label>
    {{ csrf_field() }}
    <input type="text" name="Name" id="Name" required maxlength="255"/>
    <br/>
    <label for="Latitude">Breedtegraad: </label>
    {{ csrf_field() }}
    <input name="Latitude" id="Latitude" type="number" step="0.01"/>
    <br/>
    <label for="Longitude">Lengtegraad: </label>
    {{ csrf_field() }}
    <input name="Longitude" id="Longitude" type="number" step="0.01"/>
    <br/>
    <label for="Code">Code: </label>
    {{ csrf_field() }}
    <input type="text" name="Code" id="Code" required pattern="[A-Z]{2}"/>
    <br/>
    <label for="ShippingCostMultiplier">Verzendkosten: </label>
    {{ csrf_field() }}
    <input name="ShippingCostMultiplier" id="ShippingCostMultiplier" type="number" step="0.01"/>
    <br/>
</form>
<p id="feedback">{{ $feedback }}</p>
@endsection

@section('footer')
@endsection