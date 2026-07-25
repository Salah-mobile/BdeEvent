@extends("layouts.app")
@section("content")
<div class="min-h-screen bg-slate-50/50 py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
        <div class="bg-slate-900 rounded-3xl p-6 sm:p-8 text-white shadow-xl flex flex-col md:flex-row justify-between items-start md:items-center gap-6 relative overflow-hidden">
            <div class="space-y-2 z-10">
                <span class="inline-flex items-center px-3 py-1 bg-indigo-500/20 text-indigo-300 text-xs font-semibold rounded-full border border-indigo-500/30">
                    Tableau de bord
                </span>
                <h1 class="text-2xl sm:text-4xl font-black tracking-tight">
                    Welcome, {{ Auth::user()->name }} {{ Auth::user()->lastName }}
                </h1>
                <p class="text-slate-400 text-sm max-w-xl">
                    Découvrez les événements disponibles et gérez vos places en un seul clic.
                </p>
            </div>
            <div class="z-10 flex flex-wrap items-center gap-3 w-full md:w-auto justify-start md:justify-end">
                <div class="bg-slate-800/80 backdrop-blur-md px-4 py-2.5 rounded-xl border border-slate-700/60 flex items-center gap-2.5">
                    <div class="w-2.5 h-2.5 rounded-full bg-emerald-500 animate-pulse"></div>
                    <span class="text-xs font-medium text-slate-300">
                        <strong class="text-white text-sm font-bold">{{ $events->count() }}</strong> Événements
                    </span>
                </div>
                <a href="{{ route("myTicket",auth()->user()->id)}}" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-indigo-600 hover:bg-indigo-500 text-white text-xs font-semibold transition-all shadow-md hover:shadow-lg">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    <span>Mes Événements</span>
                </a>
                <form method="POST" action="{{ route("logout") }}" class="inline">
                    @csrf
                    <button type="submit" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-slate-800 hover:bg-red-500/20 text-slate-300 hover:text-red-400 border border-slate-700 hover:border-red-500/40 text-xs font-semibold transition-all">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                        </svg>
                        <span>Déconnexion</span>
                    </button>
                </form>
            </div>
        </div>
        <div class="flex flex-wrap gap-6 items-start">
            @forelse ($events as $event)
                @php
                    $isReserved = \App\Models\Reservation::where('user_id', auth()->id())
                        ->where('event_id', $event->id)
                        ->exists();
                    
                @endphp
                <x-eventplace
                    :isReserved="$isReserved"
                    :event_id="$event->id"
                    date="{{ $event->date }}"
                    place="{{ $event->place }}"
                    description="{{ $event->description }}"
                    title="{{ $event->title }}"
                    heure="{{ $event->heure }}"
                    price="{{ $event->price }}"
                    places_limite="{{ $event->places_limite }}"
                    created_by="{{ $event->user?->name }}"
                    created_at="{{ $event->created_at }}"
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
