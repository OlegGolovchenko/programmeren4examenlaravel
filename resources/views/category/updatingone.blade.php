@extends('common.editing')

@section('title', 'Category UpdatingOne')

@section('list')
<table>
    <thead>
        <th>Select</th>
        <th>Naam</th>
    </thead>
    <tbody>
    @foreach($categories as $category)
    <tr>
        <td>
            <a href="/category/reading/{{ $category->Id }}">-></a>
        </td>
        <td>
            {{ $category->Name }}
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
@endsection

@section('lblcls','lbl2Btn')
@section('model','Category')

@section('ctrls')
<button form="editform" type="submit">Update</button>
<button onclick="window.location='/category/editing'">Annuleren</button>
@endsection

@section('content')
<form id="editform" action="/category/update/{{ $cat->Id }}" method="post">
    <label for="Name" >Naam: </label>
    {{ csrf_field() }}
    <input type="text" name="Name" id="Name" required value="{{ $cat->Name }}"/>
    <br/>
    <label for="Description">Omschrijving: </label>
    {{ csrf_field() }}
    <input type="text" name="Description" id="Description" value="{{ $cat->Description }}"/>
    <br/>
</form>
<p id="feedback">{{ $feedback }}</p>
@endsection

@section('footer')