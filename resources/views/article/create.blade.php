<x-layout>

    <header class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <h1 class="text-center">Crea articolo</h1>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <form method="POST" action="{{ route('article-store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Titolo</label>
                        <input name="title" type="text" class="form-control" id="title">
                        @error('title')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="subtitle" class="form-label">Sottotitolo</label>
                        <input type="text" class="form-control" id="subtitle">
                        @error('subtitle')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Immagine</label>
                        <input type="file" class="form-control" id="image">
                        @error('image')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="categories" class="form-label">Categoria</label>
                        <select name="" class="form-control" id="categories">
                            <option selected disabled>Scegli categoria</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->category_id }}">{{$category->name}}</option>
                            @endforeach
                        </select>
                        @error('category')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="body" class="form-label">Descrizione</label>
                        <textarea name="body" id="body" class="form-control"></textarea>
                        @error('body')
                            {{ $message }}
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

</x-layout>
