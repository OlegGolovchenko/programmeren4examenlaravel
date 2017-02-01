@extends('common.editing')

@section('title', 'Customer InsertingOne')

@section('list')
<table>
    <thead>
        <th>Select</th>
        <th>Roepnaam</th>
        <th>Voornaam</th>
        <th>Familienaam</th>
        <th>Stad</th>
        <th>Code</th>
        <th>Land</th>
    </thead>
    <tbody>
    @foreach($customers as $customer)
    <tr>
        <td>
            <a href="/customer/reading/{{ $customer->Id }}">-></a>
        </td>
        <td>{{$customer->NickName}}</td>
        <td>{{$customer->FirstName}}</td>
        <td>{{$customer->LastName}}</td>
        <td>{{$customer->City}}</td>
        <td>{{$customer->PostalCode}}</td>
        <td>{{$customer->country['Name']}}</td>
    </tr>
    @endforeach
    </tbody>
</table>
@endsection

@section('lblcls','lbl2Btn')
@section('model','Customer')

@section('ctrls')
<button form="editform" type="submit">Insert</button>
<button onclick="window.location='/customer/editing'">Annuleren</button>
@endsection

@section('content')
<form id="editform" action="/customer/insert" method="post">
    <label for="NickName" >Roepnaam: </label>
    {{ csrf_field() }}
    <input type="text" name="NickName" id="NickName" required maxlength="10"/>
    <br/>
    <label for="FirstName">Voornaam: </label>
    {{ csrf_field() }}
    <input type="text" name="FirstName" id="FirstName" required maxlength="255"/>
    <br/>
    <label for="LastName">Familienaam: </label>
    {{ csrf_field() }}
    <input type="text" name="LastName" id="LastName" required maxlength="255"/>
    <br/>
    <label for="Address1">Adres1: </label>
    {{ csrf_field() }}
    <input type="text" name="Address1" id="Address1" required maxlength="255"/>
    <br/>
    <label for="Address2">Adres2: </label>
    {{ csrf_field() }}
    <input type="text" name="Address2" id="Address2" maxlength="255"/>
    <br/>
    <label for="City">Stad: </label>
    {{ csrf_field() }}
    <input type="text" name="City" id="City" required maxlength="255"/>
    <br/>
    <label for="Region">Regio: </label>
    {{ csrf_field() }}
    <input type="text" name="Region" id="Region" maxlength="80"/>
    <br/>
    <label for="PostalCode">Postcode: </label>
    {{ csrf_field() }}
    <input type="text" name="PostalCode" id="PostalCode" required maxlength="20"/>
    <br/>
    <label for="Country">Land</label>
    {!! Form::select('Country',$countries,null) !!}
    <br/>
    <label for="Phone">Telefoon: </label>
    {{ csrf_field() }}
    <input type="text" name="Phone" id="Phone" maxlength="40"/>
    <br/>
    <label for="MobilePhone">Mobiletje: </label>
    {{ csrf_field() }}
    <input type="text" name="MobilePhone" id="MobilePhone" maxlength="40"/>
    <br/>
</form>
<p id="feedback">{{ $feedback }}</p>
@endsection

@section('footer')
@endsection