<x-app-layout>

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
                    <a href="{{ route('buses.show', $bus->id) }}" class="text-blue-500 underline">
                        Leaves at: {{ $bus->Leaves_at }} | Arrives at: {{ $bus->Arrives_at }} | Ticket Price: ${{ $bus->ticket_price }}
                    </a>
                </li>
            @endforeach
        </ul>
    @endif
<br>
    <a href="{{ route('festivals.index') }}" class="text-red-500 underline">Back to Festival List</a>

</x-app-layout>
