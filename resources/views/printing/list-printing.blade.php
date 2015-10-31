@extends('orchestra/foundation::layouts.page')

@section('navbar')
    @include('blupl/management::widgets.header')
@endsection

@section('content')
    {!! Form::open(['url'=>handles('blupl/management::printing/pdf/batch'), 'id'=>'batch-form']) !!}

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>#</th>
            <th>Date / Time</th>
            <th class="text-center">Batch Printing<br/><input type="checkbox" id="select_all"></th>
            <th>Name</th>
            <th>Organization</th>
            <th>Role</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($members as $member)
        <tr>
            <td>{{ $member->id }}</td>
            <td>{{ $member->created_at }}</td>
            <td><input type="checkbox" class="checkbox" style="margin: 0 auto;" name="member[]" value="{{ $member->id }}"></td>
            <td>{{ $member->name }}</td>
            <td>{{ $member->organization }}</td>
            <td>{{ $member->role }}</td>
            <td>{{ ($member->status = true ? 'Approved' : 'Pending') }}</td>
            <td><a href="{{ handles('blupl/management::printing/'.$member->id) }}">Print</a> </td>
        </tr>
        @endforeach

        </tbody>
    </table>

    {!! Form::close() !!}
    {!! $members->render() !!}

@stop

