<x-layout>

    <header class="container">
        <div class="row">
            <div class="col-12 col-md-6">
                <h1>Articoli di: {{ $user->name }}</h1>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="row">
              @foreach ($articles as $article)
                <div class="col-12 col-md-6">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ Storage::url($article->image) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h4 class="card-title">{{ $article->title }}</h4>
                            <h5 class="card-title">{{ $article->subtitle }}</h5>
                            <p class="card-text">{{ $article->body }}</p>
                            <div>
                                <small>
                                    <a href="{{ route('article-category', $article->category) }}">{{ $article->category->name }}</a>
                                </small>
                            </div>
                            <div class="card-footer">
                                <p>Redatto il: {{ $article->created_at->format('d-m-Y') }}</p>
                            </div>
                            <a href="{{ route('article-show', $article) }}" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</x-layout>