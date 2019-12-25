<input type="hidden" name="user_id" value="{{$user_id}}">


        @foreach($serologyTests as $serology)
           <div class="col-sm-6">
               <div class="form-group">
                   <label>{{$serology->test_name}}<span class="text-danger"></span></label>
                   <input type="hidden" name="{{$serology->id}}" value="{{$serology->id}}">
                   <select class="form-control" name="result{{$serology->id}}" id="result{{$serology->id}}">
                       <option value="negative">Negative</option>
                       <option value="positive">Positive</option>
                   </select>
                   @error('name')
                   <div class="text-danger">{{ $message }}</div>
                   @enderror
               </div>
           </div>
        @endforeach

