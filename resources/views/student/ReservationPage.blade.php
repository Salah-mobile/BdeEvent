@extends("layouts.app")
@section("content")
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
@endsection
