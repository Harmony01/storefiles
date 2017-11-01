                <option>---Please Select---</option>
	      @forelse($data as $d)
		<option value="{{$d->id}}">{{$d->name}}</option>
		@empty
		<option>--No Data--</option>
    @endforelse		