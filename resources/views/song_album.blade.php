@extends('layout')

@section('content')

<div class="d-flex justify-content-end gap-2 p-4">
    <div class="col-md-6">
        <form action="{{ route('song_album.import') }}" method="POST" enctype="multipart/form-data" class="d-flex flex-column gap-2 shadow-sm p-3 bg-white rounded">
            @csrf
            <input type="file" name="csv_file" class="form-control" required>
            <button type="submit" class="btn btn-primary btn-sm mt-2">Import CSV</button>
        </form>
    </div>

    <a href="{{ url('/song_album/csv-all') }}" target="_blank" class="btn btn-primary rounded-2">CSV</a>

    <a href="{{ url('/song_album/pdf') }}" target="_blank" class="btn btn-primary rounded-2">Export</a>

</div>


<div class="container mt-4">

    <div class="row">

        @foreach($albums as $sa)

            <div class="col-md-4 mb-4">

                <div class="card">

                    <div class="card-body text-center">

                        {!! QrCode::size(100)->generate(Request::url() . '/song_album/' . $sa->id) !!}

                        <h5 class="card-title">{{ $sa->title }}</h5>

                        <p class="card-text">{{ $sa->artist }}</p>

                        <p class="card-text">{{ $sa->genre }}</p>

                        <p class="card-text">{{ $sa->release_date }}</p>

                    </div>

                </div>

            </div>

        @endforeach

    </div>

</div>

@endsection
