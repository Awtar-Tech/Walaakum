<div class="@if(isset($Field['col'])) {{$Field['col']}} @else col-md-12 @endif">
    <div class="form-group label-floating">
        <label for="{{$Field['name']}}" class="control-label">{{__('crud.'.$lang.'.'.$Field['name'])}} @if($Field['is_required'])*@endif</label>
        <input type="datetime-local" id="{{$Field['name']}}" name="{{$Field['name']}}" @if($Field['is_required']) required @endif class="form-control {{ $errors->has($Field['name']) ? ' is-invalid' : '' }}" value="{{\Carbon\Carbon::parse($value)->format('Y-m-d\TH:i')}}">
    </div>
    @if ($errors->has($Field['name']))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first($Field['name']) }}</strong>
        </span>
    @endif
</div>
