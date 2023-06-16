@csrf
    <input type="text" name="name" placeholder="Nome" value="{{ $church->name ?? old('name')}}">
    <input type="text" name="address" placeholder="Address" value="{{ $church->address ?? old('address')}}">
    <input type="number" name="address_number" min="0" placeholder="Address Number" value="{{ $church->address_number ?? old('address_number') }}">
    <input type="text" name="complement" placeholder="Complement" value="{{ $church->complement ?? old('complement') }}">
    <select name="state_id">
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
    <input type="checkbox" name="headquarters">
    <label for="headquarters"> headquarters</label><p></p>
    
    <button type="submit">Send</button>