@extends('layouts.app');


@section('content')
<div class="row">
    <h3>{{__('World Hockey Federations')}}</h3>
    <table class="table table-responsive table-hover">
        <tr>
            <th>{{__('Name')}}</th>
            <th>{{__('Country')}}</th>
            <th>{{__('President')}}</th>
            <th>{{__('Email')}}</th>
            <th>{{__('Phone')}}</th>
            <th>{{__('Established On')}}</th>
        </tr>

        @foreach($federations as $fed)
            <tr>
                <td>{{$fed->name}}</td>
                <td>{{($fed->country) ? $fed->country->name : '-'}}</td>
                <td>{{trim($fed->president_name)}}</td>
                <td>{{$fed->email}}</td>
                <td>{{$fed->phone}}</td>
                <td>{{$fed->established_date}}</td>
            </tr>
        @endforeach

    </table>
</div>
@endsection