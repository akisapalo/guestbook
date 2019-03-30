@extends('master')

@section('main')
<div class="row">
<div class="col-sm-10">
  <h1 class="display-3">Guests <span style="float: right;"><a href="{{ route('guests.create')}}" class="btn btn-primary">Add a guest</a></span></h1>    
  <div class="col-sm-12">@include('messages')</div>
  <table class="table table-striped table-hover table-condensed">
    <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Phone Number</th>
          <th>Gender</th>
          <th>Address</th>
          <th colspan = 2>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($guests as $guest)
        <tr>
            <td>{{$guest->id}}</td>
            <td>{{$guest->first_name}} {{$guest->last_name}}</td>
            <td>{{$guest->email}}</td>
            <td>{{$guest->phone_number}}</td>
            <td>{{$guest->gender}}</td>
            <td>{{$guest->address}}</td>
            <td>
                <a href="{{ route('guests.edit',$guest->id)}}" class="btn btn-default">Edit</a>
            </td>
            <td>
                <form action="{{ route('guests.destroy', $guest->id)}}" method="post">
                  {!! csrf_field() !!}
                  <input type="hidden" name="_method" value="DELETE">
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>
@endsection