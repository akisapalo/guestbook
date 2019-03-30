@extends('master') 
@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Update a guest</h1>
        @include('messages')
        <form method="post" action="{{ route('guests.update', $guest->id) }}">
            {!! csrf_field() !!}
            @include('guests.form')
          <input type="hidden" name="_method" value="PATCH">
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection