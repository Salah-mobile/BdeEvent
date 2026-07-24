@extends("layouts.app")
@section("content")
<div class="min-h-screen bg-slate-50/50 py-8">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-slate-900 rounded-3xl p-6 sm:p-8 text-white shadow-xl flex justify-between items-center mb-8 relative overflow-hidden">
            <div class="space-y-1 z-10">
                <span class="inline-flex items-center px-3 py-1 bg-indigo-500/20 text-indigo-300 text-xs font-semibold rounded-full border border-indigo-500/30 mb-2">
                    Événements
                </span>
                <h1 class="text-2xl sm:text-3xl font-black tracking-tight">
                    {{ isset($event) ? 'Modifier l\'événement' : 'Créer un événement' }}
                </h1>
                <p class="text-slate-400 text-sm">Remplissez les détails ci-dessous pour publier votre événement.</p>
            </div>
            <a href="{{ url()->previous() }}" class="z-10 inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-300 text-xs font-semibold transition-all border border-slate-700">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                <span>Retour</span>
            </a>
        </div>
        <div class="bg-white rounded-3xl shadow-sm border border-slate-200/80 p-6 sm:p-8">
            <form action="{{ isset($event) ? route('events.update', $event->id) : route('events.store') }}" method="POST" class="space-y-6">
                @csrf
                @if(isset($event))
                    @method('PUT')
                @endif
                <div>
                    <label for="title" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">Titre de l'événement</label>
                    <input type="text" name="title" id="title" value="{{ old('title', $event->title ?? '') }}" placeholder="ex: Laravel Day" required
                        class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-sm transition-all outline-none">
                    @error('title') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="place" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">Lieu (Place)</label>
                    <input type="text" name="place" id="place" value="{{ old('place', $event->place ?? '') }}" placeholder="ex: Beni Mellal" required
                        class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-sm transition-all outline-none">
                    @error('place') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <label for="date" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">Date</label>
                        <input type="date" name="date" id="date" value="{{ old('date', $event->date ?? '') }}" required
                            class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-sm transition-all outline-none">
                        @error('date') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label for="heure" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">Heure</label>
                        <input type="time" name="heure" id="heure" value="{{ old('heure', $event->heure ?? '') }}" required
                            class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-sm transition-all outline-none">
                        @error('heure') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                    </div>
                </div>

                <!-- Prix & Places Limitées (Row) -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <label for="price" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">Prix (DH)</label>
                        <input type="number" step="0.01" name="price" id="price" value="{{ old('price', $event->price ?? '') }}" placeholder="0 pour Gratuit"
                            class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-sm transition-all outline-none">
                        @error('price') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label for="places_limite" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">Places Limitées</label>
                        <input type="number" name="places_limite" id="places_limite" value="{{ old('places_limite', $event->places_limite ?? '') }}" placeholder="ex: 100" required
                            class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-sm transition-all outline-none">
                        @error('places_limite') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                    </div>
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">Description</label>
                    <textarea name="description" id="description" rows="4" placeholder="Description de l'événement..." required
                        class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-sm transition-all outline-none resize-none">{{ old('description', $event->description ?? '') }}</textarea>
                    @error('description') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                </div>

                <!-- Submit Button -->
                <div class="pt-4 flex justify-end gap-3">
                    <a href="{{ url()->previous() }}" class="px-6 py-3 rounded-xl border border-slate-200 text-slate-600 font-semibold text-xs hover:bg-slate-50 transition-all">
                        Annuler
                    </a>
                    <button type="submit" class="px-6 py-3 rounded-xl bg-indigo-600 hover:bg-indigo-500 text-white font-semibold text-xs shadow-md hover:shadow-lg transition-all">
                        {{ isset($event) ? 'Mettre à jour' : 'Enregistrer' }}
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection
