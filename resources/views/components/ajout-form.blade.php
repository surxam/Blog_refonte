{{--Form section--}}
<form action="{{ route('dashboard.store') }}" method="POST">
    @csrf

    <input type="text" name="titre" value="{{ old('titre') }}" placeholder="Titre" required>
    <textarea name="description" placeholder="Description" required>{{ old('description') }}</textarea>
    
    <button type="submit" class="bg-green-600 px-4 py-2 rounded text-white hover:bg-green-500">
        Créer
    </button>
</form>
