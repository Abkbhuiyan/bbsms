
<div class="col-sm-6">
    <div class="form-group">
        <label>Organization Type</label>
        <select name="group_type" class="select form-control">
            <option @if(old('group_type')=='Publicly Available'){{'selected'}}@endif value="Publicly Available" >Publicly Available</option>
            <option @if(old('group_type')=='Private'){{'selected'}}@endif value="Private">Private</option>
        </select>
        @error('group_type')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>s
</div>

<div class="col-sm-6">
    <div class="form-group">
        <label>Organization Name </label>
        <input name="group_name" value="{{ old('name')}}"   class="form-control" type="text">
        @error('group_name')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="col-sm-6">
    <div class="form-group">
        <label>Phone </label>
        <input name="group_contact" value="{{ old('group_contact')}}"   class="form-control" type="text">
        @error('group_contact')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="col-sm-6">
    <div class="form-group">
        <label>Admin Phone </label>
        <input name="admin_contact" value="{{ old('admin_contact')}}"   class="form-control" type="text">
        @error('admin_contact')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="col-sm-6">
    <div class="form-group">
        <label>District </label>
        <input name="district" value="{{ old('district')}}"   class="form-control" type="text">
        @error('district')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="col-sm-6">
    <div class="form-group">
        <label>Email <span class="text-danger">*</span></label>
        <input name="email" value="{{ old('email')}}" class="form-control" type="email">
        @error('email')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="col-sm-12">
    <div class="form-group">
        <label>Address</label>
        <textarea name="address" class="form-control" rows="3" cols="30">{{ old('address') }}</textarea>
    </div>
</div>

<div class="col-sm-6">
    <div class="form-group">
        <label>Website </label>
        <input name="website_address" value="{{ old('website_address') }}" class="form-control" type="text">
    </div>
</div>


<div class="col-sm-6">
    <div class="form-group">
        <label>User Name </label>
        <input name="username" value="{{ old('username') }}" class="form-control" type="text">
        @error('username')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="col-sm-6">
    <div class="form-group">
        <label>Logo</label>
        <div class="profile-upload">
            <div class="upload-img">
                <img alt="" src="{{asset('assets/img/user.jpg')}}">
            </div>
            <div class="upload-input">
                <input name="logo" type="file" class="form-control">
            </div>
        </div>
    </div>
</div>
