<div class="col-sm-6">
    <div class="form-group">
        <label>Full Name<span class="text-danger">*</span></label>
        <input name="name" value="{{ old('name') }}"  class="form-control" type="text">
        @error('name')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="col-sm-6">
    <div class="form-group">
        <label>Email<span class="text-danger">*</span></label>
        <input name="email" value="{{ old('email') }}"  class="form-control" type="email">
        @error('email')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="col-sm-6">
    <div class="form-group">
        <label>Gender<span class="text-danger">*</span></label>
        <div class="form-control">
            <input name="gender" value="male"   type="radio">Male
            <input name="gender" value="female"   type="radio">Female
        </div>
        @error('gender')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="col-sm-6">
    <div class="form-group">
        <label>Blood group<span class="text-danger">*</span></label>
        <select name="blood_group_id" class="form-control" id="">
            @foreach($bloodGroups as $bloodGroup)
                <option value="{{$bloodGroup->id}}">{{$bloodGroup->group_name.' '.$bloodGroup->rh_factor}}</option>
            @endforeach
        </select>
        @error('blood_group_id')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="col-sm-6">
    <div class="form-group">
        <label>Phone<span class="text-danger">*</span></label>
        <input name="phone" value="{{old('phone')}}" class="form-control" type="text">

        @error('phone')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
</div>

