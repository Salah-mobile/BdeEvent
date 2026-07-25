@extends("layouts.app")
@section("content")
<div class="min-h-screen bg-slate-50/50 py-8">
    <div class="max-w-7xl mx-auto px-4">
        <a href="{{ url()->previous() }}"
            class="inline-flex items-center justify-center p-2 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-300 hover:text-white transition-all border border-slate-700">

            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>

        </a>
        <div class="bg-slate-900 rounded-3xl p-6 text-white mb-8">
            <h1 class="text-3xl font-black">
                Mes Tickets
            </h1>
            <p class="text-slate-300 mt-2">
                {{ $tickets->count() }} Ticket(s)
            </p>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($tickets as $ticket)
                <div class="bg-white rounded-3xl shadow p-6 border">
                    <h2 class="text-xl font-bold text-slate-900">
                        Ticket #{{ $ticket->id }}
                    </h2>
                    <div class="mt-4 space-y-2">
                        <p>
                            <strong>Event :</strong>
                            {{ $ticket->reservation->event->title }}
                        </p>
                        <p>
                            <strong>Date :</strong>
                            {{ $ticket->reservation->event->date }}
                        </p>
                        <p>
                            <strong>Place :</strong>
                            {{ $ticket->reservation->event->place }}
                        </p>
                        <p>
                            <strong>ticket code :</strong>
                            {{ $ticket->ticket_code }}
                        </p>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center bg-white rounded-3xl p-10">
                    Aucun ticket trouvé
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection
