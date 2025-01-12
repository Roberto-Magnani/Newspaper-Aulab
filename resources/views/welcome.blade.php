<x-layout>

    {{-- sezione di presentazione --}}
    <header class="container-fluid p-5 bg-secondary-subtle text-center ">
        <div class="row justify-content-center align-items-center row-custom">
            <div class="col-12 ">
                <h1 class="display-1">The Aulab Post</h1>
            </div>
        </div>
    </header>

    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    @if (session('alert'))
        <div class="alert alert-danger">
            {{ session('alert') }}
        </div>
    @endif

    {{-- cards --}}
    <div class="container my-5 container-fluid">
        <div class="row justify-content-center">
            <div class="col-11 col-md-3 justify-content-between carousel-css">
                {{-- carousel --}}
                <x-carousel />
            </div>
            <div class="col-9">
                <div class="row justify-content-between">
                    @foreach ($articles as $article)
                        <div class="col-12 col-md-4 mb-4">
                            <x-article-card :article="$article"/>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    {{-- cards end --}}



    {{-- contact us generico --}}
    <x-contact_us />

</x-layout>
