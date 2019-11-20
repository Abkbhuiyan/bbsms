    <div class="col-sm-6">
        <div class="form-group">
            <label>Full Name</label>
            <input name="name" value="{{ old('name')}}"   class="form-control" type="text">
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label>Blood Group</label>
            <select name="blood_group_id" class="select form-control">
                <option value="">Select</option>
                @foreach($groups as $group)
                    <option @if(old('blood_group_id')==$group->id){{'selected'}}@endif value="{{ $group->id }}">{{$group->group_name.'  '.$group->rh_factor}}</option>
                @endforeach
            </select>
            @error('blood_group_id')
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

    <div class="col-sm-6">
        <div class="form-group">
            <label>Date of Birth</label>
            <div class="">
                <input name="dob" value="{{ old('dob') }}" type="date" class="form-control">
            </div>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group gender-select">
            <label class="gen-label">Gender:</label>
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input @if(old('gender')=='female'){{'checked'}}@endif checked type="radio" name="gender" value="female" class="form-check-input">Male
                </label>
            </div>
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input @if(old('gender')=='male'){{'checked'}}@endif type="radio" name="gender" value="male" class="form-check-input">Female
                </label>
            </div>
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
            <label>Phone </label>
            <input name="phone" value="{{ old('phone') }}" class="form-control" type="text">
        </div>
    </div>


