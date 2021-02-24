
    <div class="form-group mb-0 required">
        <label class="control-label">Woreda</label>
        <select name="woreda_id" id="woreda_id" class="form-control{{ $errors->has('woreda_id') ? ' is-invalid' : '' }}"
            onfocusout="validateworedao()" required>
            <option class="dropup" value=""> Select One</option>
            @foreach ($woredas as $woreda)
            <option class="dropup" value="{{$woreda->id}}" {{$woreda->id == $place->woreda_id ? 'selected' : '' }}>
                {{$woreda->name}} </option>
            @endforeach

        </select>
        @if ($errors->has('woreda_id'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('woreda_id') }}</strong>
        </span>
        @endif
    </div>
    <div class="form-group mb-0 required">
        <label class="control-label">Place Name</label>
        <div class="input-group">
            <input name="name" type="text" id="name"
                class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
                value="{{ old('name') ?? $place->name}}" onfocusout="validateName()">
            @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
            @endif
        </div>
    </div>

    <div class="form-group">
        <label class="control-label">Comments</label>
        <textarea name="comment" rows="5" class="form-control" id="comment">{{$place->comment}}</textarea>
    </div>

