<x-layout>

    <div class="container py-5 mt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 mt-5">
                <h1>Registrazione</h1>
                <h5 class="text-secondary">Crea un nuovo account</h5>
                <form method="POST" action="{{ route('register') }}" class="fs-4 mt-4">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome</label>
                        <input name="name" type="text" class="form-control" id="name-register">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input name="email" type="mail" class="form-control" id="mail-register">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input name="password" type="password" class="form-control" id="password">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Conferma Password</label>
                        <input name="password_confirmation" type="password" class="form-control" id="password_confirmation">
                    </div>
                    <button type="submit" class="bg-sec color-main rounded fs-3 mt-3 w-100">Registrati</button>
                </form>
            </div>
        </div>
    </div>

</x-layout>
