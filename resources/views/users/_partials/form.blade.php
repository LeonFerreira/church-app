@csrf
    <input type="text" name="name" placeholder="Nome" value="{{ $user->name ?? old('name')}}">
    <input type="email" name="email" placeholder="E-mail" value="{{ $user->email ?? old('email')}}">
    <input type="password" name="password" placeholder="Password">
    <input type="tel" name="phone" placeholder="Phone" value="{{ $user->phone ?? old('phone')}}">
    <label for="birthday">Birthday</label>
    <input type="date" name="birthday" placeholder="Brithday" value="{{ $user->birthday ?? old('birthday')}}">
    <input type="text" name="address" placeholder="Address" value="{{ $user->address ?? old('address')}}">
    <input type="number" name="address_number" min="0" placeholder="Address Number" value="{{ $user->address_number ?? old('address_number') }}">
    <input type="text" name="complement" placeholder="Complement" value="{{ $user->complement ?? old('complement') }}">
    <label for="baptized">Baptized</label>
    <input type="date" name="baptized" placeholder="Baptized" value="{{ $user->baptized ?? old('baptized') }}">
    <select name="gender" required>
        <option selected disabled>Gender</option>
        @foreach(array_column(\App\Enums\Gender::cases(), 'value') as $option)
            <option @if(isset($user) && $option == $user->gender) selected @endif value="{{$option}}">{{$option}}</option>
        @endforeach
    </select>
    <select name="marital_status">
        <option selected disabled>Marital Status</option>
        @foreach(array_column(\App\Enums\MaritalStatus::cases(), 'value') as $option)
            <option @isset($user) @if($option == $user->marital_status) selected @endif @endisset value="{{$option}}">{{$option}}</option>
        @endforeach
    </select>
    <select name="state_id">
        <option selected disabled>States</option>
        @foreach($states as $state)
            <option
                value="{{$state->id}}"
                @if (isset($user) && $user->state_id == $state->id)
                    selected
                @endif
            >
                {{$state->name}}
            </option>
        @endforeach
    </select>
    <select name="church_id">
        <option selected disabled>Church</option>
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
    <button type="submit">Send</button>