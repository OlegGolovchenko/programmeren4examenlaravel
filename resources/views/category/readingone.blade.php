@extends('common.editing')

@section('title', 'Category ReadingOne')

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

@section('lblcls','lbl4Btn')
@section('model','Category')

@section('ctrls')
<button onclick="window.location='/category/updating/{{$cat -> Id}}'">Updating</button>
<button onclick="window.location='/category/inserting'">Inserting</button>
<button form="editform" type="submit">Delete</button>
<button onclick="window.location='/category/editing'">Annuleren</button>
@endsection

@section('content')
<form id="editform" action="/category/delete/{{$cat->Id}}" method="post">
    <label for="Name" >Naam: </label>
    {{ csrf_field() }}
    <input type="text" name="Name" id="Name" readonly value="{{$cat->Name}}"/>
    <br/>
    <label for="Description">Omschrijving: </label>
    {{ csrf_field() }}
    <input type="text" name="Description" id="Description" readonly value="{{$cat->Description}}"/>
    <br/>
</form>
<p id="feedback">{{ $feedback }}</p>
@endsection

@section('footer')
@endsection