@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Show Films | <a href="{{ route('films.create') }}"> Create </a></div>

                <div class="panel-body">
                    <table class="table table-striped">
                      <thead>
                        <th>Film Title</th>
                        <th>Description</th>
                        <th>Release Date</th>
                        <th>Rating</th>
                        <th>Ticket Price</th>
                        <th>Genre</th>
                        <th>Cover Art</th>
                      </thead>
                      <tbody>
                          @foreach($films as $film)
                          <tr>
                            <td><a href="{{ url('films/'.$film->url_slug) }}"> {{ $film->name }} </a></td>
                            <td>{{ $film->description }}</td>
                            <td>{{ gmdate("Y-m-d", $film->release_date) }}</td>
                            <td>{{ $film->rating }}</td>
                            <td>{{ $film->ticket_price }}</td>
                            <td>{{ $film->genre }}</td>
                            <?php $movieArt = str_replace("public", "storage", url($film->photo)) ?>
                            <td><img src="{{ $movieArt }}" style="width:100px;"></td>
                          </tr>
                          @endforeach

                      </tbody>

                    </table>

                    {{ $films->links() }}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
