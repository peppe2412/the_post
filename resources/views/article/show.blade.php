<x-layout>

    <header class="container">
        <div class="row">
            <div class="col-12 col-md-6">
                <h1>{{$article->title}}</h1>
                <h3>{{ $article->subtitle }}</h3>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6">
                <img src="{{ Storage::url($article->image) }}" alt="">
                <div>
                    <p>Redatto da: {{$article->user->name}}</p>
                    <p>Del: {{$article->created_at->format('d-m-Y') }}</p>
                </div>
                <div>
                    <p>Categoria: <a href="">{{ $article->category->name }}</a></p>
                </div>
                <hr>
                <p>{{ $article->body }}</p>
            </div>
        </div>
    </div>

</x-layout>