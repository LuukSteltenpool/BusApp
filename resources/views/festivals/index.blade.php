
<x-app-layout>


    <h1 class="text-white">Festivals:</h1>
    <ul>
        @foreach ($festivals as $festival)
            <li class="text-white">
                <p class="text-gray-400" href="{{ route('festivals.show', $festival->id) }}">
                     {{ $festival->Festival_Name }}: <br> Starts at {{ $festival->Start_Time }} | Ends at {{ $festival->End_Time }}
                </p>
                <a href="{{ route('festivals.show', $festival->id) }}" class="bg-gray-500 text-white px-3 py-1 mt-2 ms-3"> To buses <a/>
            </li>
            <br>
        @endforeach
    </ul>


</x-app-layout>
