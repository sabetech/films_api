@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Show Film<a href="{{ route('films.index') }}"> Show All Films</a></div>

                <div class="panel-body">
                    <div style="float:left">
                        <?php $movieArt = str_replace("public", "storage", url($film->photo)) ?>
                        <img src="{{ $movieArt }}" style="width:200px;">
                    </div>
                    <table style="width:50%;font-size: 1.5em">
                        <tr>
                            <td>
                                <strong>Movie Title</strong>
                            </td>
                            <td>
                                {{ $film->name }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Movie Description</strong>
                            </td>
                            <td>
                                {{ $film->description }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Release Date</strong>
                            </td>
                            <td>
                                {{ gmdate("Y-m-d", $film->release_date) }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Movie Rating</strong>
                            </td>
                            <td>
                                {{ $film->rating }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Ticket Price</strong>
                            </td>
                            <td>
                                {{ $film->ticket_price }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Country</strong>
                            </td>
                            <td>
                                {{ $film->country }}
                            </td>
                        </tr>
                    </table>

                    <!-- comments goes here -->
                    <div style="margin-top: 2em;">
                        <label>Existing Comments</label><br />
                        @foreach($film->comments as $comment)
                            <p> {{ $comment->comment }} </p>
                            <label>- {{ $comment->name }}</label>
                            <div class="pull-right">{{ $comment->date_created }}</div>

                        @endforeach
                    </div>


                    <div style="margin-top:4em;">
                     <label>Got a comment about the movie?</label>   
                        <form method="POST" action="{{ route('savecomment') }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="film_id" value="{{ $film->id }}">
                            <div class="form-group">
                              <label for="name">Name</label>
                              <input type="text" class="form-control" id="name" placeholder="Name goes here" name="name">
                            </div>
                            <div class="form-group">
                                <label for="comment">Comment</label>
                                <textarea class="form-control" rows="3" id="comment" name="comment" placeholder="Comment goes here"></textarea>
                            </div>
                            <button class="btn btn-success pull-right" type="submit">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
