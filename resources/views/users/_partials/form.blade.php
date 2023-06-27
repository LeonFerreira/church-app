@csrf
    <div class="row mb-3">
        <div class="col">
            <label for="name" class="form-label">Name</label>
            <input
                type="text"
                id="name"
                class="form-control"
                name="name"
                placeholder="Contoso"
                value="{{ $user->name ?? old('name')}}"
                required
            >
        </div>
        <div class="col">
            <label for="" class="form-label">E-mail</label>
            <input
                type="email"
                class="form-control"
                name="email"
                placeholder="contoso@contoso.com"
                value="{{ $user->email ?? old('email')}}"
                required
            >
        </div>
        <div class="col">
            <label for="" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" placeholder="******" required>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col">
            <label for="" class="form-label">States</label>
            <select name="state_id" class="form-select">
                <option selected disabled>States</option>
                @foreach($states as $state)
                    <option
                        value="{{$state->id}}"
                        @if ((isset($user) && $user->state_id == $state->id) || old('state_id') == $state->id)
                            selected
                        @endif
                    >
                        {{$state->name}}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col">
            <label for="" class="form-label">Address</label>
            <input type="text" class="form-control" name="address" placeholder="Address" value="{{ $user->address ?? old('address')}}" required>
        </div>
        <div class="col">
            <label for="" class="form-label">Address Number</label>
            <input type="number" class="form-control" name="address_number" min="0" placeholder="Address Number" value="{{ $user->address_number ?? old('address_number') }}" required>
        </div>
        <div class="col">
            <label for="" class="form-label">Complement</label>
            <input type="text" class="form-control" name="complement" placeholder="Complement" value="{{ $user->complement ?? old('complement') }}">
        </div>
        <div class="col">
            <label for="" class="form-label">Phone</label>
            <input type="tel" class="form-control" name="phone" placeholder="Phone" value="{{ $user->phone ?? old('phone')}}" required>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col">
            <label for="" class="form-label">Gender</label>
            <select name="gender" class="form-select" required>
                <option selected disabled>Gender</option>
                @foreach(array_column(\App\Enums\Gender::cases(), 'value') as $option)
                    <option @if(isset($user) && $option == $user->gender) selected @endif value="{{$option}}">{{$option}}</option>
                @endforeach
            </select>
        </div>
        <div class="col">
            <label for="" class="form-label">Marital Status</label>
            <select name="marital_status" class="form-select" >
                <option selected disabled>Marital Status</option>
                @foreach(array_column(\App\Enums\MaritalStatus::cases(), 'value') as $option)
                    <option @if((isset($user) && $option == $user->marital_status) || old('marital_status') == $option) selected @endif value="{{$option}}">{{$option}}</option>
                @endforeach
            </select>
        </div>
        <div class="col">
            <label for="birthday" class="form-label">Birthday</label>
            <input type="date" class="form-control" name="piruleta" placeholder="Birthday" value="{{$user->piruleta ?? old('piruleta') }}" required>
        </div>
        <div class="col">
            <label for="baptized" class="form-label">Baptized</label>
            <input type="date" class="form-control" name="baptized" placeholder="Baptized" value="{{ $user->baptized ?? old('baptized') }}">
        </div>
    </div>

    <div class="row">
        <div>
            <label for="" class="form-label">Churches</label>
        </div>
    </div>
    <div class="row mb-3">
        <select class="select" style="padding: 0!important" name="church_id[]" multiple>
            <option disabled></option>
            @foreach($churches as $church)
                <option
                    value="{{$church->id}}"
                    @if (isset($user) && $user->church_id == $church->id)
                        selected
                    @endif
                >
                    {{$church->name}}
                </option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-success">Send</button>