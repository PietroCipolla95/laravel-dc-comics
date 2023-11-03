@extends('layouts.admin')


@section('main')
    <section class="index_comics my-4">
        <div class="container">
            <h4 class="text-muted text-uppercase">All Comics</h4>
            <a class="btn btn-primary my-4 ms-4 position-fixed top-10 start-0" href="{{ route('comics.create') }}">Add
                Comic</a>

            @if (session('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <strong> {{ session('message') }} </strong>
                </div>
            @endif

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
                                    <td>${{ $comic->price }}</td>
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
                                        <a href="{{ route('comics.edit', $comic->id) }}"
                                            class="btn btn-secondary my-3">Edit</a>


                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#modalId-{{ $comic->id }}">
                                            Delete
                                        </button>

                                        <div class="modal fade" id="modalId-{{ $comic->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="modalTitle-{{ $comic->id }}"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                                role="document">
                                                <div class="modal-content border-danger">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalTitle-{{ $comic->id }}">Modal
                                                            id: {{ $comic->id }}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure you want to remove this record? This cannot be undone
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Cancel</button>

                                                        <form action="{{ route('comics.destroy', $comic->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="btn text-black btn-danger">DELETE</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


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
