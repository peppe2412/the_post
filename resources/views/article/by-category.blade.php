<x-layout>

    <header class="container py-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 py-5">
                <h1 class="my-4 display-1 text-center">{{ $category->name }}</h1>
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
                            <small>
                                @if ($article->user)
                                    Da: <a
                                        href="{{ route('article-user', $article->user) }}">{{ $article->user->name }}</a>
                                @else
                                    Autore sconosciuto
                                @endif
                            </small>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="mt-5 d-flex justify-content-center">
                {{ $articles->links() }}
            </div>
        </div>
    </div>

</x-layout>
