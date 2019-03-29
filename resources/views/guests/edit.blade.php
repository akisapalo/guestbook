@extends('master') 
@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Update a guest</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br /> 
        @endif
        <form method="post" action="{{ route('guests.update', $guest->id) }}">
            @method('PATCH') 
            @csrf
            <div class="form-group">

                <label for="first_name">First Name:</label>
                <input type="text" class="form-control" name="first_name" value={{ $guest->first_name }} />
            </div>

            <div class="form-group">
                <label for="last_name">Last Name:</label>
                <input type="text" class="form-control" name="last_name" value={{ $guest->last_name }} />
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" value={{ $guest->email }} />
            </div>
            <div class="form-group">
                <label for="gender">Gender:</label>
                <input type="text" class="form-control" name="gender" value={{ $guest->gender }} />
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" class="form-control" name="address" value={{ $guest->address }} />
            </div>
            <div class="form-group">
                <label for="phone_number">Phone Number:</label>
                <input type="number" class="form-control" name="phone_number" value={{ $guest->phone_number }} />
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection