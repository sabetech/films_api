@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create Film</div>

                <div class="panel-body">
                    @if ($errors->any())
					    <div class="alert alert-danger">
					        <ul>
					            @foreach ($errors->all() as $error)
					                <li>{{ $error }}</li>
					            @endforeach
					        </ul>
					    </div>
					@endif

                    <form method="POST" action="{{ route('films.store') }}" enctype="multipart/form-data">
                    	{{ csrf_field() }}
					  <div class="form-group">
					    <label for="name">Name</label>
					    <input type="text" class="form-control" id="name" placeholder="name goes here" name="name">
					  </div>
					  <div class="form-group">
					    <label for="description">Description</label>
					    <textarea class="form-control" rows="3" id="description" name="description"></textarea>
					  </div>
					  <div class="form-group">
					    <label for="release_date">Release Date</label>
					    <input type="date" class="form-control" id="release_date" placeholder="date" name="release_date">
					    
					  </div>
					  
					  <select  class="form-control" name="rating">
						  <option value="1">1</option>
						  <option value="2">2</option>
						  <option value="3">3</option>
						  <option value="4">4</option>
						  <option value="5">5</option>
					 </select>
			       
					 <div class="form-group">
					    <label class="sr-only" for="amount">Amount (in dollars)</label>
					    <div class="input-group">
					      <div class="input-group-addon">$</div>
					      <input type="text" class="form-control" id="amount" placeholder="Amount" name="ticket_price">
					      
					    </div>
					 </div>

					<div class="form-group">
					    <label for="country">Country</label>
					    <input type="text" class="form-control" id="country" placeholder="Australia" name="country">
					</div>	

					<div class="form-group">
					    <label for="genre">Genre</label>
					    <input type="text" class="form-control" id="genre" placeholder="Action" name="genre">
					</div>	

					<div class="form-group">
					    <label for="inputfile">File input</label>
					    <input type="file" id="inputfile" name="picture">
					    <p class="help-block">Upload Picture of Movie here</p>
					</div>

					<button type="submit" class="btn btn-default">Submit</button>

					</form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
