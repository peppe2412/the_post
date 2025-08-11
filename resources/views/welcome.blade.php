<x-layout>


    <div class="container py-5">
        @if (session('message'))
            <div class="alert alert-success mt-5 w-25" id="alert">
                {{ session('message') }}
            </div>
        @endif
        <div class="row justify-content-around">
            @foreach ($articles as $article)
                <div class="col-12 col-md-3 py-5">
                    <div class="card mt-5 card-custom">
                        <img src="{{ Storage::url($article->image) }}" class="img-fluid img-card" alt="...">
                        <div class="card-body">
                            <h4 class="card-title">{{ $article->title }}</h4>
                            <h5 class="card-title">{{ $article->subtitle }}</h5>
                            <p class="card-text">{{ $article->body }}</p>
                            <div>
                                <small>
                                    <a href="{{ route('article-category', $article->category) }}">{{ $article->category->name }}</a>
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
                                    Da: <a href="{{ route('article-user', $article->user) }}">{{ $article->user->name }}
                                @else
                                    Autore sconosciuto
                                @endif
                            </small>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</x-layout>
