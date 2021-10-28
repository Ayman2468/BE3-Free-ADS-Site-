<div class="form-group row">
    <label for="real_estate_type" class="col-md-4 col-form-label text-md-right">{{ __('msg.Real Estate Type') }}</label>

    <div class="col-md-6">
        <select id="real_estate_type" class="form-control text-muted" name="real_estate_type"  >
            <option disabled selected>{{__('msg.Choose The Type of Real Estate')}}</option>
            <option value="Apartment">{{__('msg.Apartment')}}</option>
            <option value="Villa">{{__('msg.Villa')}}</option>
            <option value="Land">{{__('msg.Land')}}</option>
            <option value="Whole Building">{{__('msg.Whole Building')}}</option>
        </select>

        <strong  id="real_estate_type_error" class="text-danger" role="alert">
        </strong>
    </div>
</div>

<div class="form-group row">
    <label for="space" class="col-md-4 col-form-label text-md-right">{{ __('msg.Space') }}</label>

    <div class="col-md-6">
        <input id="space" type="text" class="form-control" name="space" autocomplete="space" placeholder="{{__('msg.Space of Real Estate (Square Meters)')}}" autofocus>

        <strong  id="space_error" class="text-danger" role="alert">
        </strong>
    </div>
</div>
<div id="notforland">
    <div class="form-group row">
        <label for="bed_rooms" class="col-md-4 col-form-label text-md-right">{{ __('msg.Bed Rooms') }}</label>

        <div class="col-md-6">
            <select id="bed_rooms" class="form-control text-muted" name="bed_rooms"  >
                <option disabled selected>{{__('msg.Choose Number Bed Rooms')}}</option>
                @for ($i=1;$i<=10;$i++)
                <option value="{{$i}}">{{$i}}</option>
                @endfor
                <option value="more than 10">+10</option>
            </select>

            <strong  id="bed_rooms_error" class="text-danger" role="alert">
            </strong>
        </div>
    </div>

    <div class="form-group row">
        <label for="bathrooms" class="col-md-4 col-form-label text-md-right">{{ __('msg.Bathrooms') }}</label>

        <div class="col-md-6">
            <select id="bathrooms" class="form-control text-muted" name="bathrooms"  >
                <option disabled selected>{{__('msg.Choose Number Bathrooms')}}</option>
                @for ($i=1;$i<=10;$i++)
                <option value="{{$i}}">{{$i}}</option>
                @endfor
                <option value="more than 10">+10</option>
            </select>

            <strong  id="bathrooms_error" class="text-danger" role="alert">
            </strong>
        </div>
    </div>


    <div class="form-group row">
        <label for="furnished" class="col-md-4 col-form-label text-md-right">{{ __('msg.Furnished') }}</label>

        <div class="col-md-6">
            <select id="furnished" class="form-control text-muted" name="furnished"  >
                <option disabled selected>{{__('msg.Choose Furniture Status')}}</option>
                <option value="Yes">{{__('msg.Yes')}}</option>
                <option value="No">{{__('msg.No')}}</option>
            </select>

            <strong  id="furnished_error" class="text-danger" role="alert">
            </strong>
        </div>
    </div>

    <div class="form-group row">
        <label for="floor" class="col-md-4 col-form-label text-md-right">{{ __('msg.Floor') }}</label>

        <div class="col-md-6">
            <select id="floor" class="form-control text-muted" name="floor"  >
                <option disabled selected>{{__('msg.Choose Floor')}}</option>
                <option value="Ground Floor">{{__('msg.Ground Floor')}}</option>
                @for ($i=1;$i<=12;$i++)
                <option value="{{$i}}">{{$i}}</option>
                @endfor
                <option value="+12">+12</option>
            </select>

            <strong  id="floor_error" class="text-danger" role="alert">
            </strong>
        </div>
    </div>

    <div class="form-group row">
        <label for="additions" class="col-md-4 col-form-label text-md-right">{{ __('msg.Additions')}}</label>

        <div class="col-md-6">
            <label class="mr-2 ml-2"><input type="checkbox" class="text-muted add" name="add[]" value="Security"> {{__('msg.Security')}}</label>
            <label class="mr-2 ml-2"><input type="checkbox" class="text-muted add" name="add[]" value="Private Parking"> {{__('msg.Private Parking')}}</label>
            <label class="mr-2 ml-2"><input type="checkbox" class="text-muted add" name="add[]" value="Balcony"> {{__('msg.Balcony')}}</label>
            <label class="mr-2 ml-2"><input type="checkbox" class="text-muted add" name="add[]" value="Private Garden"> {{__('msg.Private Garden')}}</label>
            <label class="mr-2 ml-2"><input type="checkbox" class="text-muted add" name="add[]" value="Service Rooms"> {{__('msg.Service Rooms')}}</label>
            <label class="mr-2 ml-2"><input type="checkbox" class="text-muted add" name="add[]" value="Central AC / Heater"> {{__('msg.Central AC / Heater')}}</label>
            <label class="mr-2 ml-2"><input type="checkbox" class="text-muted add" name="add[]" value="Kitchen Appliances"> {{__('msg.Kitchen Appliances')}}</label>
            <label class="mr-2 ml-2"><input type="checkbox" class="text-muted add" name="add[]" value="Swimming Pool"> {{__('msg.Swimming Pool')}}</label>
            <label class="mr-2 ml-2"><input type="checkbox" class="text-muted add" name="add[]" value="Pets Allowed"> {{__('msg.Pets Allowed')}}</label>
            <label class="mr-2 ml-2"><input type="checkbox" class="text-muted add" name="add[]" value="Elevator"> {{__('msg.Elevator')}}</label>
            <label class="mr-2 ml-2"><input type="checkbox" class="text-muted add" name="add[]" value="Compound"> {{__('msg.Compound')}}</label>
            <label class="mr-2 ml-2"><input type="checkbox" class="text-muted add" name="add[]" value="Water Meter"> {{__('msg.Water Meter')}}</label>
            <label class="mr-2 ml-2"><input type="checkbox" class="text-muted add" name="add[]" value="Electricity Meter"> {{__('msg.Electricity Meter')}}</label>
            <label class="mr-2 ml-2"><input type="checkbox" class="text-muted add" name="add[]" value="Natural Gas Meter"> {{__('msg.Natural Gas Meter')}}</label>
            <label class="mr-2 ml-2"><input type="checkbox" class="text-muted add" name="add[]" value="Telephone Landline"> {{__('msg.Telephone Landline')}}</label>
        </div>
    </div>
</div>
