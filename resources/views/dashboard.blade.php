<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                    <!-- Punten:-->
                    @if (Auth::check())
                        <p class="text-lg mb-2">Points: {{ $points }} / {{ $target }}</p>
                    @endif
                    <!-- Progress bar: -->
                    <div class="w-full bg-gray-200 rounded-full h-6">
                        <div
                            class="h-6 rounded-full text-center text-red-500"
                            style="width: {{ $progress }}%;">

                            {{ intval($progress) }}%
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</x-app-layout>
