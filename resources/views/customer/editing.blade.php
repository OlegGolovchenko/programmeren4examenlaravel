@extends('common.editing')

@section('title', 'Customer Editing')

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

@section('lblcls','lblBtn')
@section('model','Customer')

@section('ctrls')
<button onclick="window.location='/customer/inserting'">Inserting</button>
@endsection

@section('content')
@endsection

@section('footer')
@endsection