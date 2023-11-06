@extends('layouts.admin')


@section('main')
    <div class="container my-5">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <form action="{{ route('comics.store') }}" method="POST" enctype="multipart/form-data">


            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" id="title" aria-describedby="helpId"
                    placeholder="Batman">
                <small id="titleHelper" class="form-text text-muted">Type the title here</small>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" step="0.01" class="form-control" name="price" id="price"
                    aria-describedby="helpId" placeholder="99.99">
                <small id="priceHelper" class="form-text text-muted">Type the price here</small>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">description</label>
                <input type="text" step="0.01" class="form-control" name="description" id="description"
                    aria-describedby="helpId" placeholder=".....">
                <small id="descriptionHelper" class="form-text text-muted">Type the description here</small>
            </div>

            <div class="mb-3">
                <label for="series" class="form-label">series</label>
                <input type="text" step="0.01" class="form-control" name="series" id="series"
                    aria-describedby="helpId" placeholder="Es. Batman">
                <small id="seriesHelper" class="form-text text-muted">Type the series here</small>
            </div>

            <div class="mb-3">
                <label for="type" class="form-label">type</label>
                <input type="text" step="0.01" class="form-control" name="type" id="type"
                    aria-describedby="helpId" placeholder="comic book etc">
                <small id="typeHelper" class="form-text text-muted">Type the type here</small>
            </div>

            <div class="mb-3">
                <label for="artists" class="form-label">artists</label>
                <input type="text" step="0.01" class="form-control" name="artists" id="artists"
                    aria-describedby="helpId" placeholder="Clay Mann, Tony S. Daniel">
                <small id="artistsHelper" class="form-text text-muted">Type the artists here</small>
            </div>

            <div class="mb-3">
                <label for="writers" class="form-label">writers</label>
                <input type="text" step="0.01" class="form-control" name="writers" id="writers"
                    aria-describedby="helpId" placeholder="Scott Snyder, Dan Abnett">
                <small id="writersHelper" class="form-text text-muted">Type the writers here</small>
            </div>

            <div class="mb-3">
                <label for="sale_date" class="form-label">Sale date</label>
                <input type="text" step="0.01" class="form-control" name="sale_date" id="sale_date"
                    aria-describedby="helpId" placeholder="Es. 2023-10-24">
                <small id="sale_dateHelper" class="form-text text-muted">Type the sale date here</small>
            </div>

            <div class="mb-3">
                <label for="thumb" class="form-label">Choose file</label>
                <input type="file" class="form-control" name="thumb" id="thumb" placeholder=""
                    aria-describedby="thumb_helper">
                <div id="thumb_helper" class="form-text">Upload an image for the current product</div>
            </div>


            <button type="submit" class="btn btn-primary">
                Upload
            </button>


        </form>

    </div>
@endsection
