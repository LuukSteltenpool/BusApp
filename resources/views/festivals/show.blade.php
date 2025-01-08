<x-app-layout>

    <h1 class="text-white">Festival Details</h1>
    <p class="text-white">
        Start Time: {{ $festival->Start_Time }}<br>
        End Time: {{ $festival->End_Time }}<br>
        Available Buses: {{ $festival->buses->count() }}
    </p>

    <h2 class="text-white">Buses:</h2>
    @if ($festival->buses->isEmpty())
        <p>No buses available for this festival.</p>
    @else
        <ul>
            @foreach ($festival->buses as $bus)
                <li>
                    <a href="{{ route('buses.show', $bus->id) }}" class="bg-gray-500 text-white px-3 py-1 mt-2 ms-3">
                        To bus
                    </a>
                    <p class="text-blue-500"> Leaves at: {{ $bus->Leaves_at }} <br> Arrives at: {{ $bus->Arrives_at }} | Ticket Price: ${{ $bus->ticket_price }}</p>
                </li>
            @endforeach
        </ul>
    @endif
<br>
    <a href="{{ route('festivals.index') }}" class="bg-gray-500 text-white px-3 py-1 mt-2 ms-3">Back to Festival List</a>

</x-app-layout>
