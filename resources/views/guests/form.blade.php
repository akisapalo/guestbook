
	{!! csrf_field() !!}
	<div class="row">
		<div class="form-group col-md-6">    
		  <label for="first_name">First Name:</label>
		  <input type="text" class="form-control" name="first_name" value="{{ old('first_name', $guest->first_name) }}"/>
		</div>

		<div class="form-group col-md-6">
		  <label for="last_name">Last Name:</label>
		  <input type="text" class="form-control" name="last_name" value="{{ old('last_name', $guest->last_name) }}"/>
		</div>
	</div>
	<div class="row">
		<div class="form-group col-md-4">
		  <label for="email">Email:</label>
		  <input type="text" class="form-control" name="email" value="{{ old('email', $guest->email) }}"/>
		</div>
		<div class="form-group col-md-4">
		  <label for="phone_number">Phone Number :</label>
		  <input type="text" class="form-control" name="phone_number" value="{{ old('phone_number', $guest->phone_number) }}"/>
		</div>   

		<div class="form-group col-md-4">
		<label class="radio control-label" style="margin-top: 0px;">Gender: </label>
		    <label class="radio-inline"><input type="radio" value="Female" name="gender">Female</label>
		    <label class="radio-inline"><input type="radio" value="Male" name="gender">Male</label>
		</div>
	</div>
	<div class="form-group">
	  <label for="address">Address:</label>
	  <input type="text" class="form-control" name="address" value="{{ old('address', $guest->address) }}"/>
	</div>      