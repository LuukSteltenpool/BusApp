
<x-app-layout>


    <h1>Festivals:</h1>
    <ul>
        @foreach ($festivals as $festival)
            <li>
                <p href="{{ route('festivals.show', $festival->id) }}">
                     {{ $festival->Festival_Name }}: <br> Starts at {{ $festival->Start_Time }} | Ends at {{ $festival->End_Time }}
                </p>
                <a href="{{ route('festivals.show', $festival->id) }}" class="text-blue-500 underline"> To buses <a/>
            </li>
            <br>
        @endforeach
    </ul>
    @if (Auth::check())
        <div class="text-white">
            Points: {{ Auth::user()->points }}
        </div>
    @endif

</x-app-layout>
