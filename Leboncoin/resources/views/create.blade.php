<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Ajouter une annonce') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('ad.store') }} ">
                        @csrf
                        <input style="color: black" type="text" id="titre" name="titre" placeholder="titre"><br><br>
                        <textarea style="color: black" name="description" id="description" cols="60" rows="5" placeholder="decription"></textarea><br><br>
                        <input style="color: black" type="text" id="prix" name="prix" placeholder="prix"><br><br>
                        <input type="file" id="pic1" name="pic1" accept="image/png, image/jpeg"/><br><br>
                        <input type="file" id="pic2" name="pic2" accept="image/png, image/jpeg"/><br><br>
                        <input type="file" id="pic3" name="pic3" accept="image/png, image/jpeg"/><br><br>
                        <button type="submit">Publier</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>