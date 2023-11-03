@extends('layouts.admin')

@section('main')
    <section id="show_section" class=" min-vh-100">



        <div class="bg-secondary py-4 text-center d-flex justify-content-center align-items-center">
            <h1>
                {{ $comic->title }}
            </h1>
            <a href="{{ route('comics.edit', $comic->id) }}" class="btn btn-info mx-5">Edit</a>
        </div>

        <div class="container">
            <div class="row py-4">
                <div class="col">
                    <img src="{{ $comic->thumb }}" alt="">
                </div>
                <div class="col border-start">
                    <div class="py-2 ps-3">
                        <h4>
                            Description
                        </h4>
                        <p>
                            {{ $comic->description }}
                        </p>
                        <p class="fs-4">
                            Series: {{ $comic->series }}
                        </p>
                        <p class="fs-4">
                            Type: {{ $comic->type }}
                        </p>
                        <p class="fs-4">
                            Price: ${{ $comic->price }}
                        </p>
                        <div class="row">
                            <div class="col">
                                <h4>
                                    Artists
                                </h4>
                                <p>
                                    {{ $comic->artists }}
                                </p>
                            </div>
                            <div class="col">
                                <h4>
                                    Writers
                                </h4>
                                <p>
                                    {{ $comic->writers }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
