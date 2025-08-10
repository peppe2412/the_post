<x-layout>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <h1>Registrazione</h1>
                <h5>Crea un nuovo account</h5>
                <form method="POST" action="{{ route('register') }}">
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
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

</x-layout>
