{{--Form section--}}
<form action="{{ route('dashboard.update', $article->id) }}" method="POST">
    @csrf
    @method('PUT')
    
    <input type="text" name="titre" value="{{ $article->titre }}">
    <textarea name="description">{{ $article->description  }}</textarea>
    
    <button type="submit">
        Mofifier
    </button>
</form>