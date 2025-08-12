<x-layout>

    <header class="container">
        <div class="row">
            <div class="col-12 col-md-6">
                <h1>Ciao {{ Auth::user()->name }}</h1>
            </div>
        </div>
    </header>

    @if (session('message'))
        <div class="aler alert-success mt-5 w-25" id="alert">
            {{ session('message') }}
        </div>
    @endif

    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6">
                <x-table :roleRequest="$adminRequest" role="amministratore" />
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6">
                <x-table :roleRequest="revisorRequest" role="revisore" />
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6">
                <x-table :roleRequest="$writerRequest" role="writer" />
            </div>
        </div>
    </div>

</x-layout>
