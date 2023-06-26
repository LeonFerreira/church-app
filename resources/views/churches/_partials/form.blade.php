@csrf
    <div class="row mb-3">
        <div class="col">
            <label for="name" class="form-label">Name</label>
            <input type="text" id="name" class="form-control" name="name" placeholder="Contoso" value="{{ $church->name ?? old('name')}}">
        </div>
        <div class="col">
            <label for="address" class="form-label">Address</label>
            <input type="text" id="address" class="form-control" name="address" placeholder="Av. Contoso" value="{{ $church->address ?? old('address')}}">
        </div>
        <div class="col">
            <label for="address_number" class="form-label">Address Number</label>
            <input type="number" id="address_number" class="form-control" name="address_number" min="0" value="{{ $church->address_number ?? old('address_number') }}">
        </div>
    </div>

    <div class="row mb-3">
        <div class="col">
            <label for="complement" class="form-label">Complement</label>
            <input type="text" id="complement" class="form-control" name="complement" placeholder="Complement" value="{{ $church->complement ?? old('complement') }}">
        </div>
        <div class="col">
            <label for="" class="form-label">States</label>
            <select name="state_id" class="form-select">
                <option selected disabled>States</option>
                @foreach($states as $state)
                    <option
                        value="{{$state->id}}"
                        @if (isset($church) && $church->state_id == $state->id)
                            selected
                        @endif
                    >
                        {{$state->name}}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col">
            <div class="d-flex flex-column justify-content-center">
                <div class="d-flex justify-content-center">
                    <label class="form-label" for="headquarters">Headquarters</label>
                </div>
                <div class="d-flex justify-content-center mt-2">
                    <input class="form-check-input" type="checkbox" id="headquarters" name="headquarters">
                </div>
            </div>
        </div>
    </div>

    
    
    
    
    <button type="submit" class="btn btn-success">Send</button>