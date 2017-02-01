@extends('common.editing')

@section('title', 'Customer ReadingOne')

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
        <td>{{$customer->country->Name}}</td>
    </tr>
    @endforeach
    </tbody>
</table>
@endsection

@section('lblcls','lbl4Btn')
@section('model','Customer')

@section('ctrls')
<button onclick="window.location='/customer/updating/{{$cust -> Id}}'">Updating</button>
<button onclick="window.location='/customer/inserting'">Inserting</button>
<button form="editform" type="submit">Delete</button>
<button onclick="window.location='/customer/editing'">Annuleren</button>
@endsection

@section('content')
<form id="editform" action="/customer/delete/{{$cust->Id}}" method="post">
   <label for="NickName" >Roepnaam: </label>
    {{ csrf_field() }}
    <input type="text" name="NickName" id="NickName" readonly value="{{$cust->NickName}}"/>
    <br/>
    <label for="FirstName">Voornaam: </label>
    {{ csrf_field() }}
    <input type="text" name="FirstName" id="FirstName" readonly value="{{$cust->FirstName}}"/>
    <br/>
    <label for="LastName">Familienaam: </label>
    {{ csrf_field() }}
    <input type="text" name="LastName" id="LastName" readonly value="{{$cust->LastName}}"/>
    <br/>
    <label for="Address1">Adres1: </label>
    {{ csrf_field() }}
    <input type="text" name="Address1" id="Address1" readonly value="{{$cust->Address1}}"/>
    <br/>
    <label for="Address2">Adres2: </label>
    {{ csrf_field() }}
    <input type="text" name="Address2" id="Address2" readonly value="{{$cust->Address2}}"/>
    <br/>
    <label for="City">Stad: </label>
    {{ csrf_field() }}
    <input type="text" name="City" id="City" readonly value="{{$cust->City}}"/>
    <br/>
    <label for="Region">Regio: </label>
    {{ csrf_field() }}
    <input type="text" name="Region" id="Region" readonly value="{{$cust->Region}}"/>
    <br/>
    <label for="PostalCode">Postcode: </label>
    {{ csrf_field() }}
    <input type="text" name="PostalCode" id="PostalCode" readonly value="{{$cust->PostalCode}}"/>
    <br/>
    <label for="Country">Land</label>
    {!! Form::select('Country',$countries,$cust->country->Id,['disabled']) !!}
    <br/>
    <label for="Phone">Telefoon: </label>
    {{ csrf_field() }}
    <input type="text" name="Phone" id="Phone" readonly value="{{$cust->Phone}}"/>
    <br/>
    <label for="MobilePhone">Mobiletje: </label>
    {{ csrf_field() }}
    <input type="text" name="MobilePhone" id="MobilePhone" readonly value="{{$cust->Mobile}}"/>
    <br/>
</form>
<p id="feedback">{{ $feedback }}</p>
@endsection

@section('footer')
@endsection