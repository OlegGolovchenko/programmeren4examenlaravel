@extends('common.editing')

@section('title', 'Country Editing')

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

@section('lblcls','lblBtn')
@section('model','Country')

@section('ctrls')
<button onclick="window.location='/country/inserting'">Inserting</button>
@endsection

@section('content')
@endsection

@section('footer')
@endsection