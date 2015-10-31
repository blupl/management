@foreach($members as $member)

    <table>
        <tr>
            <td>
                <p style="text-align: center;">
                    <img src="{{ url($member['photo']) }}" style="width: 95px;"/>
                </p>
                <p style="margin: 0; text-align: center;">{{ $member['name'] }}</p>
                {{--<p style="margin: 0; text-align: center;">{{ $member['role'] }}</p>--}}
                {{--            <p style="margin: 0; text-align: center;">{{ $member['organization'] }}</p>--}}
            </td>
            <td>
                <ul class="text-center" style="list-style-type: none; font-size: 20px; font-weight: 800;">
                    @foreach($member['zone'] as $zone)
                        <li>{{ $zone['zone'] }}</li>
                    @endforeach
                </ul>
            </td>
        </tr>
    </table>
    <img src="{{ asset('images/barcode.png') }}" style="width: 100%;">

@endforeach