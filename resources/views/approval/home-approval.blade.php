@extends('orchestra/foundation::layouts.page')

@section('navbar')
    @include('blupl/management::widgets.header')
@endsection

@section('content')
    <table class="table table-bordered">
        <thead>
        <tr>
            <th></th>
            <th>Number Of Entries</th>
            <th>Pending</th>
            <th>Approval</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>Management Member</td>
            <td><a href="{{ handles('blupl/management::approval/list') }}"> {{ $management->all()->count() }}</a></td>
            <td>{{ $management->where('status','=', 0)->count() }}</td>
            <td>{{ $management->where('status','=', 1)->count() }}</td>
        </tr>

        </tbody>
    </table>
@stop
