@extends('common.editing')

@section('title', 'Category Editing')

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

@section('lblcls','lblBtn')
@section('model','Category')

@section('ctrls')
<button onclick="window.location='/category/inserting'">Inserting</button>
@endsection

@section('content')
@endsection

@section('footer')
@endsection