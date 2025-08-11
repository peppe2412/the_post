<x-layout>

    <header class="container py-5 mt-5">
        <div class="row">
            <div class="col-12 col-md-6 py-5">
                <h1 class="mt-4">Lavora con noi</h1>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <form action="{{ route('carrers-submit') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="role" class="form-label">Per cosa ti canditi</label>
                        <select name="role" class="form-control" id="role">
                            <option selected disabled>Scegli ruolo</option>
                            @if (!Auth::user()->is_admin)
                            <option value="admin">Amministratore</option>                                
                            @endif
                            @if (!Auth::user()->is_revisor)
                            <option value="revisor">Revisore</option>                                
                            @endif
                            @if (!Auth::user()->is_writer)
                            <option value="writer">Writer</option>                                
                            @endif
                        </select>
                        @error('role')
                            <p class="alert alert-danger fs-5 text-dark">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input name="email" type="email" class="form-control" id="email">
                        @error('email')
                            <p class="alert alert-danger fs-5 text-dark">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="message">Perché ti stai candidando per questo ruolo?</label>
                        <textarea name="message" id="message" class="form-control"></textarea>
                        @error('message')
                            <p class="alert alert-danger fs-5 text-dark">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

</x-layout>
