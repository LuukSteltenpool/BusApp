<x-app-layout>

    <h1 class="text-white">Bus Details</h1>
    <p class="text-white">

        Leaves at: {{ $bus->Leaves_at }}<br>
        Arrives at: {{ $bus->Arrives_at }}<br>

    </p>
    <p class="text-white" id="product_price" data-price="{{ $bus->ticket_price }}">Ticket Price: ${{$bus->ticket_price}}</p>

    <h2 class="text-white">Order Tickets</h2>
    <form action="{{ route('tickets.store') }}" method="POST">
        @csrf
        <input type="hidden" name="bus_id" value="{{ $bus->id }}">
        <label class="text-white" for="quantity">Number of Tickets:</label>
        <input type="number" id="quantity" name="quantity" min="1" required>
        <button type="submit" class="bg-gray-500 text-white px-4 py-2 mt-2 ms-3">Order</button>

        <!-- Button voor gratis ticket igv 100+ punten-->
        @if (Auth::check() && Auth::user()->points >= 100)
            <button class="bg-gray-500 text-white px-4 py-2 mt-2 ms-3">
                You Have 100+ Points, claim your free ticket!
            </button>
        @endif

    </form>
<p class="text-white" id="total_price"> Total: ${{$bus->ticket_price}}.00</p>
    <a href="{{ route('festivals.show', $bus->festival_id) }}" class="bg-gray-500 text-white px-3 py-1 mt-2 ms-3">Back</a> <!-- terug knop -->


    <script>
        document.addEventListener('input', (event) => {
            if (event.target.id === 'quantity') {
                const price = parseFloat(document.getElementById('product_price').dataset.price);
                const quantity = parseInt(event.target.value) || 1;
                const total = (price * quantity).toFixed(2);
                document.getElementById('total_price').textContent = `Total: $${total}`;
            }
        });

        //ik haat javascript
    </script>
</x-app-layout>
