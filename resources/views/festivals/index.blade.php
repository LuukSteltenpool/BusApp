
<x-app-layout>
@extends('layouts.app')

@section('content')
    <h1>Festivals</h1>
    <ul>
        @foreach ($festivals as $festival)
            <li>
                <a href="{{ route('festivals.show', $festival->id) }}">
                    Festival {{ $festival->id }}: Starts at {{ $festival->Start_Time }} | Ends at {{ $festival->End_Time }}
                </a>
            </li>
        @endforeach
    </ul>
@endsection

</x-app-layout>
