@extends('master')

@section('main')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Add a guest</h1>
  <div>
    @include('messages')
      <form method="post" action="{{ route('guests.store') }}">
        <div class="row">
          {!! csrf_field() !!}
          @include('guests.form')
          <input type="hidden" name="_method" value="POST">
          <button type="submit" class="btn btn-primary-outline">Add guest</button>
      </form>
  </div>
</div>
</div>
@endsection