@extends('layouts.adminApp')
@section('css-hooks')
<style>
.option{
    background: #fff;
    height: 100%;
    width: 24%;
    display: flex;
    align-items: center;
    justify-content: space-evenly;
    border-radius: 5px;
    cursor: pointer;
    padding: 8px;
    transition: all 0.3s ease;
    text-align: center;
    box-shadow: rgb(0 0 0 / 10%) 0px 2px 5px 0px !important;
    color: #707070;
}
#option-Basic{
    display: none;
}
#option-Basic:checked .option{
        border-color: #0077B6;
    background: #0077B6;
    color: #ffffff;
}
</style>
@endsection
@section('content')
<div class="student-list-page">
    <div class="page-head px-3 py-2 d-flex justify-content-between align-items-center">
        <label class="page-title d-flex align-items-center">
            <i class="mdi mdi-email-outline" aria-hidden="true"></i>
            <span class="ps-1">User Edit</span>
        </label>
    </div>
    <div class="box-main bg-white p-3 px-4 mt-4 pb-2">

        <div class="row">
            <div class="col-lg-12 col-md-6">
                <form method="POST" action="{{ route('update_user') }}">
                    @csrf
                    <input type="hidden" id="user_id" name="id" value="{{$user->id}}">
                    <div class="mb-3">
                        <label for="name" class="col-form-label p-0 mb-1">{{ __('Select an Option') }} <span class="pt-color-red pt-fs-16">*</span></label>
                        <div class="d-flex">
                            <div class="me-5">
                                <input type="radio" name="role" value="Tutor" {{($user->role == 'Tutor')? "checked":""}}> {{ __('Tutor') }}
                            </div>
                            <div class="">
                                <input type="radio" name="role" value="Student" {{($user->role == 'Student')? "checked":""}}> {{ __('Student') }}
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="first_name" class="col-form-label p-0 mb-1">{{ __('First Name') }} <span class="pt-color-red pt-fs-16">*</span></label>
                            <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ $user->first_name }}" autocomplete="name" autofocus>
                            @error('first_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="last_name" class="col-form-label p-0 mb-1">{{ __('Last Name') }} <span class="pt-color-red pt-fs-16">*</span></label>

                            <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ $user->last_name }}" autocomplete="name" autofocus>

                            @error('last_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="email" class="col-form-label p-0 mb-1">{{ __('E-Mail Address') }} <span class="pt-color-red pt-fs-16">*</span></label>


                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="language_id" class="col-form-label p-0 mb-1">{{ __('Language') }} <span class="pt-color-red pt-fs-16">*</span></label>

                            <select class="form-control language_id" name="language_id">
                                <option value=""> Select Language</option>
                                @foreach(\App\Models\Languages::all() as $language)
                                    <option value="{{$language->id}}" {{$language->id == $user->language_id ?'selected':''}}>{{$language->name}}</option>
                                @endforeach
                            </select>
                           
                        </div>
                    </div>

                    <div class="row mb-3 tutor_field">
                        <div class="col-md-6">
                            <label for="specialization" class="col-form-label p-0 mb-1">{{ __('Specialization') }} <span class="pt-color-red pt-fs-16">*</span></label>

                            <select class="form-control specialization" name="specialization">
                                <option value=""> Select Specialization</option>
                                @foreach(\App\Models\Specialization::All() as $specialization)
                                <option value="{{$specialization->id}}" {{$specialization->id == $user->specialization_id ?'selected':''}}>{{$specialization->name}}</option>
                                @endforeach
                                
                            </select>
                            
                        </div>
                        <div class="col-md-6">
                            <label for="country_id" class="col-form-label p-0 mb-1">{{ __('Country') }} 
                                <span class="pt-color-red pt-fs-16">*</span></label>

                            <select class="form-control country_id" name="country_id" id="country_id">
                                <option value=""> Select Country</option>
                                @foreach(\App\Models\Country::all() as $country)
                                    <option value="{{$country->id}}" {{$country->id == $user->country_id ?'selected':''}}>{{$country->name}}</option>
                                @endforeach
                            </select>
                            
                        </div>
                    </div>

                    <div class="row mb-3 tutor_field">

                        <div class="col-md-6">
                            <label for="state_id" class="col-form-label p-0 mb-1">{{ __('State') }} <span class="pt-color-red pt-fs-16">*</span></label>


                            <select class="form-control state_id" name="state_id" id="state_id">
                                <option value=""> Select State</option>
                                 @foreach(\App\Models\State::all() as $state)
                                    <option value="{{$state->id}}" {{$state->id == $user->state_id ?'selected':''}}>{{$state->name}}</option>
                                @endforeach
                            </select>
                            
                        </div>
                    </div>

                    
                        <div class="mb-3 subscription " style="display: none;">
                        <div class="d-flex wrapper justify-content-between">
                             @foreach(\App\Models\Subscription::All() as $sub)
                             <input type="radio" id="option-Basic" name="subscription_id" value="{{$sub->id}}"{{($user->subscriptions_id == $sub->id)? "checked":""}}>
                            <label for="option-Basic" class="option">
                                <div class="k-width-p-100">
                                    <div class="pt-font-size-px-16">{{$sub->plan}}</div>
                                    <div class="pt-font-size-px-16">${{$sub->price}}</div>
                                    <div class="pt-font-size-px-14">Minutes :{{$sub->minutes}}</div>
                                </div>
                            </label>
                             @endforeach               
                                

                        </div>
                    </div>


                    <div class="mb-3">
                        <div class="d-flex justify-content-center pt-width-p-80 my-0 mx-auto">
                            <button type="submit" class="btn common-btn">
                                {{ __('Edit Account') }}
                            </button>
                        </div>
                    </div>

                </form>
            </div>
            <div class="col-12 col-md-6">
                
            </div>
        </div>
    </div>
</div>
@endsection
@section('js-hooks')
<script>
    $(document).ready(function() {
        
        var value =$('input:radio[name=role]:checked').val();
            if (value == 'Tutor') {
               
                $('.tutor_field').addClass('d-flex');
                $('.subscription').addClass('d-none');
                $('.tutor_field').removeClass('d-none');
                // $('.subscription').removeClass('d-flex');
            }
            if (value == 'Student') {
                $('.tutor_field').addClass('d-none');
                $('.subscription').css('display', 'block');
                $('.tutor_field').removeClass('d-flex');
                $('.subscription').removeClass('d-none');
            }

        $('input:radio[name=role]').change(function() {
            if (this.value == 'Tutor') {
               
                $('.tutor_field').addClass('d-flex');
                $('.subscription').addClass('d-none');
                $('.tutor_field').removeClass('d-none');
                // $('.subscription').removeClass('d-flex');
            }
            if (this.value == 'Student') {

                $('.tutor_field').addClass('d-none');
                $('.subscription').css('display', 'block');
                $('.tutor_field').removeClass('d-flex');
                $('.subscription').removeClass('d-none');
            }
        });
    })
</script>
<script>
$(document).ready(function() {
    $('#country_id').on('change', function() {
    var country_id = this.value;
    $.ajax({
        url:"{{url('get-states')}}",
        type: "POST", 
        data: {
        country_id: country_id,
        _token: '{{csrf_token()}}' 
    },
    dataType : 'json',
    success: function(result){
        $.each(result.states,function(key,value){
        $("#state_id").append('<option value="'+value.id+'">'+value.name+'</option>');
        });
        }
    });
    });
});
</script>

@endsection