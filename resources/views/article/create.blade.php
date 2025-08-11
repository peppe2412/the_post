<x-layout>

    <header class="container py-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 mt-5">
                <h1 class="text-center mt-4 display-1">Crea articolo</h1>
            </div>
        </div>
    </header>

    <div class="container py-3">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 bg-white rounded shadow">
                <form method="POST" action="{{ route('article-store') }}" enctype="multipart/form-data" class="fs-3 p-4">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Titolo</label>
                        <input name="title" type="text" class="form-control" id="title">
                        @error('title')
                            <p class="alert alert-danger fs-5 text-dark">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="subtitle" class="form-label">Sottotitolo</label>
                        <input name="subtitle" type="text" class="form-control" id="subtitle">
                        @error('subtitle')
                          <p class="alert alert-danger fs-5 text-dark">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Immagine</label>
                        <input name="image" type="file" class="form-control" id="image">
                        @error('image')
                            <p class="alert alert-danger fs-5 text-dark">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="categories" class="form-label">Categoria</label>
                        <select name="category" class="form-control" id="categories">
                            <option selected disabled>Scegli categoria</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{$category->name}}</option>
                            @endforeach
                        </select>
                        @error('category')
                           <p class="alert alert-danger fs-5 text-dark">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="body" class="form-label">Descrizione</label>
                        <textarea name="body" id="body" class="form-control"></textarea>
                        @error('body')
                           <p class="alert alert-danger fs-5 text-dark">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="btn-create-article rounded-1 p-2 w-100">Inserisci articolo</button>
                </form>
            </div>
        </div>
    </div>

</x-layout>
