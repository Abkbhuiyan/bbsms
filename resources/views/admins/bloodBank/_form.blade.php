    <div class="col-sm-6">
        <div class="form-group">
            <label>Full Name<span class="text-danger">*</span></label>
            <input name="name" value="{{ old('name',isset($blood_bank->name)?$blood_bank->name:null) }}"  class="form-control" type="text">
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    @if(!isset($blood_bank->id))
    <div class="col-sm-6">
        <div class="form-group">
            <label>Registration Number<span class="text-danger">*</span></label>
            <input name="hospital_approval_number" value="{{ old('hospital_approval_number',isset($blood_bank->hospital_approval_number)?$blood_bank->hospital_approval_number:null) }}"  class="form-control" type="text">
            @error('hospital_approval_number')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group">
            <label>Email <span class="text-danger">*</span></label>
            <input name="email" value="{{ old('email',isset($blood_bank->email)?$blood_bank->email:null) }}"  class="form-control" type="email">
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    @endif
    @if(!isset($blood_bank->id))
    <div class="col-sm-6">
        <div class="form-group">
            <label>Password<span class="text-danger">*</span></label>
            <input name="password"   class="form-control" type="password">
            @error('password')
                 <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label>Confirm Password<span class="text-danger">*</span></label>
            <input name="password_confirmation" class="form-control" type="password">
        </div>
    </div>
    @endif
    <div class="col-sm-6">
        <div class="form-group">
            <label>Latitude</label>
            <input name="latitude" value="{{ old('latitude',isset($blood_bank->latitude)?$blood_bank->latitude:null) }}" type="text" class="form-control">
            @error('longitude')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label>Longitude</label>
            <input name="longitude" value="{{ old('longitude',isset($blood_bank->longitude)?$blood_bank->longitude:null) }}" type="text" class="form-control">
            @error('longitude')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col-sm-12">
        <div class="form-group">
            <label>Address<span class="text-danger">*</span></label>
            <textarea name="address" class="form-control" rows="3" cols="30">{{ old('address',isset($blood_bank->address)?$blood_bank->address:null) }}</textarea>
            @error('address')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
        <input type="hidden" name="status" id="" value="active">
        <input type="hidden" name="approved_by" value="1" id="">

