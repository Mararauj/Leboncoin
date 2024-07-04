<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Annonces') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="get" action="{{ route('ad.search') }}">
                        @csrf
                        <input style="color: black" type="text" id="search" name="search">
                        <select style="color: black" name="sort">
                            <option value="">Trier par :</option>
                            <option value="asc">Plus ancien</option>
                            <option value="pm">Prix moins cher</option>
                            <option value="pp">Prix plus cher</option>
                        </select>
                        <button type="submit">Rechercher</button><br><br>
                    </form>
                    @foreach($ads as $ad)
                    <h1 style="font-size: xx-large;">{{ $ad->title }}</h1>
                    <div style="display:flex">
                        @if($ad->pic1 !== "0")
                        <img style="width: 300px" src="{{ asset('img/' . $ad->pic1) }}" alt="image annonce">
                        @endif
                        @if($ad->pic2 !== "0")
                        <img style="width: 300px" src="{{ asset('img/' . $ad->pic2) }}" alt="image annonce">
                        @endif
                        @if($ad->pic3 !== "0")
                        <img style="width: 300px" src="{{ asset('img/' . $ad->pic3) }}" alt="image annonce">
                        @endif
                    </div>
                    <p>{{ $ad->description }}</p>
                    <p>{{ $ad->price }} euros</p>
                    @if($ad->user_id == auth()->id())
                        {{-- Add delete button or form --}}
                        <form action="{{ route('ads.destroy', $ad->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <br>
                            <button type="submit">Supprimer l'annonce</button> <br>
                            <a href="{{ route('ads.edit', $ad->id) }}">Éditer</a>
                        </form>
                    @endif
                    <br>
                    <br>
                    @endforeach
                    {{ $ads->links() }}
                </div>
            </div>
        </div>
    </div>

</x-app-layout>


