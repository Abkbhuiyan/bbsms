    <div class="col-sm-6">
        <div class="form-group">
            <label>Full Name</label>
            <input name="name" value="{{ old('name',isset($user->name)?$user->name:null) }}" placeholder="Mr. Abdur Rahim"  class="form-control" type="text">
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group">
            <label>Email <span class="text-danger">*</span></label>
            <input name="email" value="{{ old('email',isset($user->email)?$user->email:null) }}" placeholder="example@xyz.com"  class="form-control" type="email">
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label>Password<span class="text-danger">*</span></label>
            <input name="password" name="name" placeholder="AbcD@12345"  class="form-control" type="password">
            @error('password')
                 <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label>Confirm Password<span class="text-danger">*</span></label>
            <input name="password_confirmation" class="form-control" placeholder="Re-enter your password" type="password">
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label>Date of Birth</label>
            <div class="cal-icon">
                <input name="dob" value="{{ old('dob',isset($user->dob)?$user->dob:null) }}" type="date" class="form-control">
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group gender-select">
            <label class="gen-label">Gender:</label>
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="radio" name="gender" value="female" class="form-check-input">Male
                </label>
            </div>
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="radio" name="gender" value="male" class="form-check-input">Female
                </label>
            </div>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="form-group">
            <label>Address</label>
            <textarea name="address" class="form-control" rows="3" cols="30">{{ old('address',isset($user->address)?$user->address:null) }}</textarea>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label>Phone </label>
            <input name="phone" value="{{ old('phone',isset($user->phone)?$user->phone:null) }}" class="form-control" type="text">
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label>Avatar</label>
            <div class="profile-upload">
                <div class="upload-img">
                    <img alt="" src="{{asset('assets/img/user.jpg')}}">
                </div>
                <div class="upload-input">
                    <input name="image" type="file" class="form-control">
                </div>
            </div>
        </div>
    </div>


    <div class="form-group">
        <label class="display-block">Status</label>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="status" id="doctor_active" value="active" checked>
            <label class="form-check-label" for="doctor_active">
                Active
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="status" id="doctor_inactive" value="inactive">
            <label class="form-check-label" for="doctor_inactive">
                Inactive
            </label>
        </div>
    </div>

