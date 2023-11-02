@extends('layouts.admin')


@section('main')
    <section class="index_comics my-4">
        <div class="container">
            <h4 class="text-muted text-uppercase">All Comics</h4>
            <a class="btn btn-primary my-4" href="{{ route('comics.create') }}">Add Comic</a>


            <div class="card">

                <div class="table-responsive-lg">
                    <table class="table table-light mb-0">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Image</th>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Price</th>
                                <th scope="col">Series</th>
                                <th scope="col">Sale date</th>
                                <th scope="col">Type</th>
                                <th scope="col">Artists</th>
                                <th scope="col">Writers</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>


                            @forelse ($comics as $comic)
                                <tr class="">
                                    <td scope="row">{{ $comic->id }}</td>
                                    <td>
                                        <!--  <img width="100" src="{{ $comic->cover_image }}" alt=""> -->
                                        <img width="100" src="{{ $comic->thumb }}" alt="">

                                    </td>
                                    <td>{{ $comic->title }}</td>
                                    <td>
                                        <p>
                                            {{ $comic->description }}
                                        </p>
                                    </td>
                                    <td>{{ $comic->price }}</td>
                                    <td>{{ $comic->series }}</td>
                                    <td>{{ $comic->sale_date }}</td>
                                    <td>{{ $comic->type }}</td>
                                    <td>
                                        <p>
                                            {{ $comic->artists }}
                                        </p>
                                    </td>
                                    <td>
                                        <p>
                                            {{ $comic->writers }}
                                        </p>
                                    </td>
                                    <td>

                                        <a href="{{ route('comics.show', $comic->id) }}" class="btn btn-primary">View</a>
                                        <a href="{{ route('comics.edit', $comic->id) }}" class="btn btn-secondary">Edit</a>

                                    </td>
                                </tr>
                            @empty
                                <tr class="">

                                    <td>Oops! No comics yet!</td>

                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </section>
@endsection
