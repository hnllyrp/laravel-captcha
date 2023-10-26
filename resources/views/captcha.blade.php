@if (config('captcha.disable') == false)
    <fieldset class="form-label-group form-inline position-relative">

        <input type="text" id="captcha"  name="captcha" class="form-control {{ $errors->has('captcha') ? 'is-invalid' : '' }}"
               placeholder="{{ trans('validation.attributes.captcha') }}" required autofocus style="max-width:50%;" />

        <img style="padding-left:10px" src="{{captcha_src('mathe')}}" onclick="this.src='{{captcha_src('mathe')}}?'+Math.random()" alt="" />
        <input type="hidden" name="captcha_type" value="mathe" />

        <div class="help-block with-errors"></div>
        @if($errors->has('captcha'))
            <span class="invalid-feedback text-danger" role="alert">
                @foreach($errors->get('captcha') as $message)
                    <span class="control-label" for="inputError"><i class="feather icon-x-circle"></i>{{$message}}</span>
                    <br>
                @endforeach
            </span>
        @endif

    </fieldset>
@endif
