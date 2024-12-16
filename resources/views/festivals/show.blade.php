
<x-app-layout>
@extends('layouts.app')

@section('content')
    <h1>Festival Details</h1>
    <p>
        Start Time: {{ $festival->Start_Time }}<br>
        End Time: {{ $festival->End_Time }}<br>
        Available Buses: {{ $festival->buses->count() }}
    </p>

    <h2>Buses</h2>
    @if ($festival->buses->isEmpty())
        <p>No buses available for this festival.</p>
    @else
        <ul>
            @foreach ($festival->buses as $bus)
                <li>
                    Bus ID: {{ $bus->id }} | Leaves at: {{ $bus->Leaves_at }} | Arrives at: {{ $bus->Arrives_at }} | Ticket Price: ${{ $bus->ticket_price }}
                </li>
            @endforeach
        </ul>
    @endif

    <a href="{{ route('festivals.index') }}">Back to Festival List</a>
@endsection
</x-app-layout>
