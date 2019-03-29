@extends('master')

@section('main')
<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">Guests</h1>    
   <div>
    <a style="margin: 19px;" href="{{ route('guests.create')}}" class="btn btn-primary">New guest</a>
    </div>  
    <div class="col-sm-12">

  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div>
  @endif
</div>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Name</td>
          <td>Email</td>
          <td>Phone Number</td>
          <td>Gender</td>
          <td>Address</td>
          <td colspan = 2>Actions</td>
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
                <a href="{{ route('guests.edit',$guest->id)}}" class="btn btn-primary">Edit</a>
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