<x-layout>

    <header class="container py-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 mt-5">
                <h1 class="mt-4 text-center display-2">Articoli di: {{ $user->name }}</h1>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="row justify-content-center">
            @foreach ($articles as $article)
                <div class="col-12 col-md-4 py-5">
                    <div class="card mt-5 card-custom mb-5">
                        <img src="{{ Storage::url($article->image) }}" class="img-fluid img-card" alt="...">
                        <div class="card-body">
                            <h4 class="card-title">{{ $article->title }}</h4>
                            <h5 class="card-title">{{ $article->subtitle }}</h5>
                            <p class="card-text">{{ $article->body }}</p>
                            <div>
                                <small>
                                    <a
                                        href="{{ route('article-category', $article->category) }}">{{ $article->category->name }}</a>
                                </small>
                            </div>
                            <div class="mt-3 d-flex justify-content-center">
                                <a href="{{ route('article-show', $article) }}"
                                    class="btn-show-article text-decoration-none p-2 rounded">
                                    Leggi articolo
                                </a>
                            </div>
                        </div>
                        <div class="card-footer">
                            <p>Redatto il: {{ $article->created_at->format('d-m-Y') }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</x-layout>
