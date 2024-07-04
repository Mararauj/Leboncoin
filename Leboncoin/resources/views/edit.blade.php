<form action="{{ route('ads.update', $ad->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="title">Titre :</label>
    <input type="text" id="title" name="title" value="{{ $ad->title }}"><br><br>

    <label for="description">Description :</label>
    <textarea id="description" name="description">{{ $ad->description }}</textarea><br><br>

    <label for="price">Prix :</label>
    <input type="text" id="price" name="price" value="{{ $ad->price }}"><br><br>

    <button type="submit">Mettre à jour l'annonce</button>
</form>