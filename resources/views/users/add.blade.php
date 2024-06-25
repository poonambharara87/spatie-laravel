@extends('layouts/contentLayoutMaster')

@section('title', 'Add User')

@section('content')
<!-- basic custom options -->
<style type="text/css">
  .form-control-2 {
    display: block;
    width: 100%;
    padding: 0.571rem 1rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.45;
    color: #6e6b7b;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #d8d6de;
    -webkit-appearance: auto;
    -moz-appearance: none;
    appearance: auto;
    border-radius: 0.357rem;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
  }

  .col-sm-12.upload-insurance {
    position: relative;
  }

  svg.download {
    position: absolute;
    right: 0;
    bottom: 7px;

  }
</style>

    <div>
        <div id="msg" class="alert alert-success" role="alert" style="display: none;"></div>
    </div>
    <div>
        <div id="msg" class="alert alert-error" role="alert" style="display: none;"></div>
    </div>
    <div class="card">
    <div class="card-header">
        <h4 class="card-title"> User Information</h4>
        <a href="{{ @route('users') }}" class="btn btn-primary"> <i class="mr-2" data-feather="arrow-left"></i>Back</a>
      </div>
      <div class="card-body">	
     
        <form method="POST" action="{{ route('user-store') }}" class="form" accept-charset="UTF-8" enctype="multipart/form-data">
          @csrf 

          <div class="form-group mb-1">
              <div class="row">

              <div class="col-sm-6  mb-2">
                <label for="name">User<span class="danger" role="alert"></span></label>
                <input type="text" name="user_name"  class="form-control" value="{{  old('user_name') }}" >

                @if ($errors->has('user_name'))
                    <span class="alert-danger">{{ $errors->first('user_name') }}</span>
                @endif
                  
                </div>


                 <div class="col-sm-6  mb-2"><label>Email<span class="danger" role="alert">*</span></label>
                  <input type="email" name="email"  class="form-control" value="{{  old('email') }}" >
                  @if ($errors->has('email'))
                  <span class="alert-danger">
                    <p>{{ $errors->first('email') }}</p>
                  </span>
                  @endif
                </div>


                <div class="col-sm-6 mb-2">
                    <label for="description">Phone<span class="danger" role="alert">*</span></label>
                    <input type="number" name="phone" id="description" class="form-control" value="{{ old('phone') }}">

                    @if ($errors->has('phone'))
                        <span class="alert-danger">
                            <p>{{ $errors->first('phone') }}</p>
                        </span>
                    @endif
                </div>

                <div class="col-md-6">
                        <div class="form-group">
                        <label for="profile_pic">Profile Picture<span class="danger" role="alert">*</span></label>
                            <input type="file" class="form-control" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" id="profile_picture" name="image" />
                            <img id="blah" class="mt-1" width="90" height="90" />
                            @if ($errors->has('image'))
                            <span class="alert-danger">
                                <p>{{ $errors->first('image') }}</p>
                            </span>
                            @endif
                        </div>
                </div>



                <div class="col-sm-6  mb-2">
                <label for="password">Password<span class="danger" role="alert"></span></label>
                <input type="password" name="password"  class="form-control" value="{{  old('password') }}" >
                    @if ($errors->has('password'))
                        <span class="alert-danger">
                            <p>{{ $errors->first('password') }}</p>
                        </span>
                    @endif
                </div>


                 <div class="col-sm-6  mb-2"><label>Password Confirmation<span class="danger" role="alert">*</span></label>
                  <input type="password" name="password_confirmation"  class="form-control" value="{{  old('password_confirmation') }}" >
                  @if ($errors->has('password_confirmation'))
                  <span class="alert-danger">
                    <p>{{ $errors->first('password_confirmation') }}</p>
                  </span>
                  @endif
                </div>

                <!-- <div class="col-sm-6  mb-2"><label>City<span class="danger" role="alert">*</span></label>
                  <input type="text" name="city_name" id="user_city" class="form-control" value="{{  old('city_name') }}" >
                  @if ($errors->has('city_name'))
                  <span class="alert-danger">
                    <p>{{ $errors->first('city_name') }}</p>
                  </span>
                  @endif
                </div> -->

                <div class="col-sm-6" id="cities"><label for="name">City<span class="danger" role="alert">*</span></label>
                  <select class="form-select" type="text"  name="city" id="city_challenge">
                      <option value="">Select</option>
                        @if(isset($cities) && count($cities) > 0)
                          @foreach ($cities as $key => $city)
                            <option value="{{ $city->id }}" 
                                @if(isset($challenge) && !empty($challenge) && $challenge->city == $city->id)
                                    selected 
                                      @endif >
                                        {{ $city->name }}
                            </option>
                          @endforeach
                        @endif
                  </select> 
                    @if ($errors->has('city'))
                      <span class="alert-danger">
                          <p>{{ $errors->first('city') }}</p>
                      </span>
                    @endif 
              </div>



                <div class="col-sm-6  mb-2"><label >Location<span class="danger" role="alert"></span></label>
                  <input type="text" name="location" id="user_location" class="form-control" value="{{  old('location') }}">
                  @if ($errors->has('location'))
                  <span class="alert-danger">
                    <p>{{ $errors->first('location') }}</p>
                  </span>
                  @endif
                </div>


       
                </div>   
               
                <input type="hidden" inputmode="decimal" id="user_lat" name="lat" pattern="-?([0-9]|[1-8][0-9]|90(\.0{1,6})?)\s*,\s*-?([0-9]{1,2}|1[0-7][0-9]|180(\.0{1,6})?)">
                <input type="hidden" inputmode="decimal" id="user_long" name="long" pattern="-?([0-9]|[1-8][0-9]|90(\.0{1,6})?)\s*,\s*-?([0-9]{1,2}|1[0-7][0-9]|180(\.0{1,6})?)">
            <div id="cloned_form_id">
      </div> 
     
      
      <div class="col-12">
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
     </form>
     </div>
   </div>
 
@endsection
@section('page-script')


<script type="text/javascript" src="https://maps.google.com/maps/api/js?key={{ env('GOOGLE_API_KEY') }}&libraries=places" ></script>
<script>
    
    var city = null;
    google.maps.event.addDomListener(window, 'load', initialize);

    function initialize() {

        var input = document.getElementById('user_location');
        var autocomplete = new google.maps.places.Autocomplete(input);
          autocomplete.addListener('place_changed', function () {
            var place = autocomplete.getPlace();
            var address_components = place.address_components;
       
            for(i=0;i<address_components.length;i++){

                if(address_components[i].types[0] == 'locality'){
                    $city_name = address_components[i].long_name;
                }
                if(address_components[i].types[0] == 'administrative_area_level_1'){
                    $state_name = address_components[i].long_name;
                }
                if(address_components[i].types[0] == 'postal_code'){
                    $zip_code = address_components[i].long_name;
                }
            }
            $('#user_city').val($city_name);

            $('#user_lat').val(place.geometry['location'].lat());
            $('#user_long').val(place.geometry['location'].lng());
        });
    }
</script>

 
@endsection
