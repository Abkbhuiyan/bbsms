<div class="col-sm-6">
    <div class="form-group">
        <label>Full Name<span class="text-danger">*</span></label>
        <input name="name" value="{{ old('name',isset($medical_officer->name)?$medical_officer->name:null) }}"  class="form-control" type="text">
        @error('name')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
</div>
@if(!isset($medical_officer->id))
    <div class="col-sm-6">
        <div class="form-group">
            <label>BMA Approval Number<span class="text-danger">*</span></label>
            <input name="bmo_no" value="{{ old('bmo_no',isset($medical_officer->bmo_no)?$medical_officer->bmo_no:null) }}"  class="form-control" type="text">
            @error('bmo_no')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group">
            <label>Email <span class="text-danger">*</span></label>
            <input name="email" value="{{ old('email',isset($medical_officer->email)?$medical_officer->email:null) }}"  class="form-control" type="email">
            @error('email')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
@endif

<div class="col-sm-12">
    <div class="form-group">
        <label>Address<span class="text-danger">*</span></label>
        <textarea name="address" class="form-control" rows="3" cols="30">{{ old('address',isset($blood_bank->address)?$blood_bank->address:null) }}</textarea>
        @error('address')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
</div>


