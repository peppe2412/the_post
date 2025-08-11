<x-layout>

    <div class="container py-5 mt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-3 mt-5">
                <h1>Accesso</h1>
                <h5 class="text-secondary">Accedi al tuo account</h5>
                <form action="{{ route('login') }}" method="POST" class="fs-4 mt-4">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input name="email" type="email" class="form-control" id="email">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input name="password" type="password" class="form-control" id="password">
                    </div>
                    <button type="submit" class="bg-sec color-main rounded fs-5 w-100">Accedi</button>
                </form>
            </div>
            <div class="col-12 col-md-4 py-5 mx-5 mt-4">
                <h2 class="text-center">Nuovo utente?</h2>
                <div class="mt-5 h-50 d-flex align-items-center justify-content-center">
                    <a href="{{ route('register') }}" class="text-decoration-none border-main p-4 fs-2 rounded link-new-user">Crea un account</a>
                </div>
            </div>
        </div>
    </div>

</x-layout>
