@extends("layouts.app")

@section("content")
<div class="min-h-screen bg-slate-50/50 py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
        <div class="bg-slate-900 rounded-3xl p-6 sm:p-8 text-white shadow-xl flex justify-between items-center relative overflow-hidden">
            <div class="space-y-2 z-10">
                <div class="flex items-center gap-3">
                    <a href="{{ url()->previous() }}" class="inline-flex items-center justify-center p-2 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-300 hover:text-white transition-all border border-slate-700">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                    </a>
                    <span class="inline-flex items-center px-3 py-1 bg-indigo-500/20 text-indigo-300 text-xs font-semibold rounded-full border border-indigo-500/30">
                        Mes Réservations
                    </span>
                </div>
                <h1 class="text-2xl sm:text-4xl font-black tracking-tight">
                    Mes Places Réservées
                </h1>
            </div>
            <div class="z-10 bg-slate-800/80 backdrop-blur-md px-5 py-3 rounded-2xl border border-slate-700/60 flex items-center gap-3">
                <div class="w-3 h-3 rounded-full bg-emerald-500 animate-pulse"></div>
                <span class="text-xs font-medium text-slate-300">
                    <strong class="text-white text-base font-bold">{{ $reservations->count() }}</strong> Réservation(s)
                </span>
            </div>
        </div>
        <div class="flex flex-wrap gap-6 items-start">
            @forelse ($reservations as $reservation)
                @php
                    $isReserved = \App\Models\Reservation::where('user_id', auth()->id())
                        ->where('event_id', $reservation->event->id)
                        ->exists();
                @endphp
                <x-eventplace
                    :isReserved="$isReserved"
                    :event_id="$reservation->event->id"
                    date="{{ $reservation->event->date }}"
                    place="{{ $reservation->event->place }}"
                    description="{{ $reservation->event->description }}"
                    title="{{ $reservation->event->title }}"
                    heure="{{ $reservation->event->heure }}"
                    price="{{ $reservation->event->price }}"
                    places_limite="{{ $reservation->event->places_limite }}"
                    created_by="{{ $reservation->event->user?->name }}"
                    created_at="{{ $reservation->event->created_at }}"
                />
            @empty
                <div class="w-full py-16 text-center bg-white rounded-3xl border border-dashed border-slate-200">
                    <div class="w-12 h-12 mx-auto mb-3 bg-indigo-50 text-indigo-600 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                    </div>
                    <h3 class="text-base font-bold text-slate-800">Aucun événement disponible</h3>
                    <p class="text-xs text-slate-500 mt-1">Revenez plus tard pour voir les nouveaux événements.</p>
                </div>
            @endforelse
        </div>

    </div>
</div>
@endsection
