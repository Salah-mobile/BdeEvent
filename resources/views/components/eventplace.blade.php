@props([
    'date',
    'place',
    'description',
    'title',
    'heure',
    'price',
    'places_limite',
    'created_by',
    'created_at',
    'event_id',
    'isReserved'
])

<div class="max-w-sm w-full bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden hover:shadow-xl transition-shadow duration-300 flex flex-col justify-between">
    <div>
        <div class="p-6 pb-4 border-b border-gray-100">
            <div class="flex justify-between items-start gap-4">
                <h3 class="text-xl font-bold text-gray-900 leading-snug line-clamp-2">
                    {{ $title }}
                </h3>
                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200 shrink-0">
                    {{ $price ? $price . ' DH' : 'Gratuit' }}
                </span>
            </div>
            <div class="flex flex-wrap items-center gap-3 mt-3 text-xs font-medium text-gray-600">
                <div class="flex items-center gap-1.5 bg-gray-50 px-2.5 py-1 rounded-md border border-gray-100">
                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    <span>{{ $date }}</span>
                </div>
                <div class="flex items-center gap-1.5 bg-gray-50 px-2.5 py-1 rounded-md border border-gray-100">
                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <span>{{ $heure }}</span>
                </div>
            </div>
        </div>
        <div class="p-6 space-y-4">
            <div class="flex items-center gap-2 text-sm text-gray-600">
                <svg class="w-4 h-4 text-indigo-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                <span class="font-medium truncate">{{ $place }}</span>
            </div>
            <p class="text-gray-600 text-sm line-clamp-3 leading-relaxed">
                {{ $description }}
            </p>
            @if($places_limite)
                <div class="flex items-center gap-2 text-xs font-semibold text-amber-700 bg-amber-50 px-3 py-1.5 rounded-lg border border-amber-200/60 w-fit">
                    <svg class="w-4 h-4 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                    <span>{{ $places_limite }} places restantes</span>
                </div>
            @endif
        </div>
    </div>
    <div>
        <div class="px-6 pb-4">
            <form action="{{ route('reserve') }}" method="POST">
                @csrf
                <input type="hidden" name="event_id" value="{{ $event_id }}">
                <button type="submit"
                        class="w-full py-2.5 px-4 rounded-xl font-semibold text-sm transition-all duration-200 shadow-sm flex items-center justify-center gap-2 {{ $isReserved ? 'bg-red-50 text-red-600 hover:bg-red-100 border border-red-200' : 'bg-indigo-600 text-white hover:bg-indigo-700 hover:shadow-md' }}">
                    @if($isReserved)
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                        <span>Annuler votre réservation</span>
                    @else
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        <span>Réserver ma place</span>
                    @endif
                </button>
            </form>
        </div>
    </div>
</div>
