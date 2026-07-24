@extends("layouts.app")
@section("content")
<div class="min-h-screen bg-slate-50/50 py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
        <div class="bg-slate-900 rounded-3xl p-6 sm:p-8 text-white shadow-xl flex flex-col md:flex-row justify-between items-start md:items-center gap-6 relative overflow-hidden">
            <div class="space-y-2 z-10">
                <div class="flex items-center gap-3">
                    <span class="inline-flex items-center px-3 py-1 bg-red-500/20 text-red-300 text-xs font-semibold rounded-full border border-red-500/30">
                        Espace Admin
                    </span>
                </div>
                <h1 class="text-2xl sm:text-4xl font-black tracking-tight">
                    Welcome Admin, {{ Auth::user()->name }}
                </h1>
                <p class="text-slate-400 text-sm max-w-xl">
                    Gérez vos événements, suivez les réservations et contrôlez la plateforme.
                </p>
            </div>
            <div class="z-10 flex flex-wrap items-center gap-3 w-full md:w-auto justify-start md:justify-end">

                <a href="{{ route("displayForm") }}" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-indigo-600 hover:bg-indigo-500 text-white text-xs font-semibold transition-all shadow-md hover:shadow-lg">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    <span>Ajouter Événement</span>
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
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm flex items-center justify-between">
                <div>
                    <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Total Événements</p>
                    <h3 class="text-2xl font-black text-slate-900 mt-1">{{ $totalEvents ?? 0 }}</h3>
                </div>
            </div>
            <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm flex items-center justify-between">
                <div>
                    <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Réservations</p>
                    <h3 class="text-2xl font-black text-slate-900 mt-1">{{ $totalReservations ?? 0 }}</h3>
                </div>
            </div>

        </div>
        <div class="bg-white rounded-3xl border border-slate-200/80 shadow-sm overflow-hidden">
            <div class="p-6 border-b border-slate-100 flex justify-between items-center">
                <div>
                    <h2 class="text-lg font-bold text-slate-900">Gestion des Événements</h2>
                    <p class="text-xs text-slate-500">Liste globale de tous les événements créés.</p>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-slate-600">
                    <thead class="bg-slate-50 text-xs text-slate-400 uppercase font-semibold">
                        <tr>
                            <th class="px-6 py-4">Titre</th>
                            <th class="px-6 py-4">Lieu</th>
                            <th class="px-6 py-4">Date & Heure</th>
                            <th class="px-6 py-4">Prix</th>
                            <th class="px-6 py-4">Places</th>
                            <th class="px-6 py-4 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse ($events as $event)
                            <tr class="hover:bg-slate-50/50 transition-colors">
                                <td class="px-6 py-4 font-semibold text-slate-900">{{ $event->title }}</td>
                                <td class="px-6 py-4">{{ $event->place }}</td>
                                <td class="px-6 py-4">{{ $event->date }} à {{ $event->heure }}</td>
                                <td class="px-6 py-4 font-bold text-indigo-600">{{ $event->price }} DH</td>
                                <td class="px-6 py-4">
                                    <span class="px-2.5 py-1 rounded-full bg-slate-100 text-slate-700 text-xs font-semibold">
                                        {{ $event->places_limite }} places
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <div class="flex items-center justify-end gap-2">
                                        <a href="{{ route("updateES",$event->id) }}" class="p-2 text-slate-500 hover:text-indigo-600 hover:bg-indigo-50 rounded-lg transition-all">
                                            update
                                        </a>
                                        <form method="POST" action="{{ route("deleteE",$event->id) }}" class="inline" >
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-2 text-slate-500 hover:text-red-600 hover:bg-red-50 rounded-lg transition-all">
                                               delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-8 text-center text-slate-400 text-sm">
                                    Aucun événement n'a été trouvé.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
@endsection
