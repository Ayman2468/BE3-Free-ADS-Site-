<div class="form-group row">
    <label for="real_estate_type" class="col-md-4 col-form-label text-md-right">{{ __('Real Estate Type') }}</label>

    <div class="col-md-6">
        <select id="real_estate_type" class="form-control text-muted" name="real_estate_type"  >
            {{old('real_estate_type')}}
            <option disabled selected>Choose The Type of Real Estate</option>
            <option value="Apartment">Apartment</option>
            <option value="Villa">Villa</option>
            <option value="Land">Land</option>
            <option value="Whole Building">Whole Building</option>
        </select>

        <strong  id="real_estate_type_error" class="text-danger" role="alert">
        </strong>
    </div>
</div>

<div class="form-group row">
    <label for="space" class="col-md-4 col-form-label text-md-right">{{ __('Space') }}</label>

    <div class="col-md-6">
        <input id="space" type="text" class="form-control" name="space" value="{{ old('space') }}"  autocomplete="space" placeholder="Space of Real Estate (Square Meters)" autofocus>

        <strong  id="space_error" class="text-danger" role="alert">
        </strong>
    </div>
</div>
<div id="notforland">
    <div class="form-group row">
        <label for="bed_rooms" class="col-md-4 col-form-label text-md-right">{{ __('Bed Rooms') }}</label>

        <div class="col-md-6">
            <select id="bed_rooms" class="form-control text-muted" name="bed_rooms"  >
                {{old('bed_rooms')}}
                <option disabled selected>Choose Number Bed Rooms</option>
                @for ($i=1;$i<=10;$i++)
                <option value="{{$i}}">{{$i}}</option>
                @endfor
                <option value="more than 10">More Than 10</option>
            </select>

            <strong  id="bed_rooms_error" class="text-danger" role="alert">
            </strong>
        </div>
    </div>

    <div class="form-group row">
        <label for="bathrooms" class="col-md-4 col-form-label text-md-right">{{ __('Bathrooms') }}</label>

        <div class="col-md-6">
            <select id="bathrooms" class="form-control text-muted" name="bathrooms"  >
                {{old('bathrooms')}}
                <option disabled selected>Choose Number Bathrooms</option>
                @for ($i=1;$i<=10;$i++)
                <option value="{{$i}}">{{$i}}</option>
                @endfor
                <option value="more than 10">More Than 10</option>
            </select>

            <strong  id="bathrooms_error" class="text-danger" role="alert">
            </strong>
        </div>
    </div>


    <div class="form-group row">
        <label for="furnished" class="col-md-4 col-form-label text-md-right">{{ __('Furnished') }}</label>

        <div class="col-md-6">
            <select id="furnished" class="form-control text-muted" name="furnished"  >
                {{old('furnished')}}
                <option disabled selected>Choose Furniture Status</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>

            <strong  id="furnished_error" class="text-danger" role="alert">
            </strong>
        </div>
    </div>

    <div class="form-group row">
        <label for="floor" class="col-md-4 col-form-label text-md-right">{{ __('Floor(s)') }}</label>

        <div class="col-md-6">
            <select id="floor" class="form-control text-muted" name="floor"  >
                {{old('floor')}}
                <option disabled selected>Choose Floor</option>
                <option value="Ground Floor">Ground Floor</option>
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
        <label for="additions" class="col-md-4 col-form-label text-md-right">{{ __('Additions') }}</label>

        <div class="col-md-6">
            <label class="mr-2 ml-2"><input type="checkbox" class="text-muted" name="add1" value="Security"> Security</label>
            <label class="mr-2 ml-2"><input type="checkbox" class="text-muted" name="add2" value="Private Parking"> private Parking</label>
            <label class="mr-2 ml-2"><input type="checkbox" class="text-muted" name="add3" value="Balcony"> Balcony</label>
            <label class="mr-2 ml-2"><input type="checkbox" class="text-muted" name="add4" value="Private Garden"> Private Garden</label>
            <label class="mr-2 ml-2"><input type="checkbox" class="text-muted" name="add5" value="Service Rooms"> Service Rooms</label>
            <label class="mr-2 ml-2"><input type="checkbox" class="text-muted" name="add6" value="Central AC / Heater"> Central AC / Heater</label>
            <label class="mr-2 ml-2"><input type="checkbox" class="text-muted" name="add7" value="Kitchen Appliances"> Kitchen Appliances</label>
            <label class="mr-2 ml-2"><input type="checkbox" class="text-muted" name="add8" value="Swimming Pool"> Swimming Pool</label>
            <label class="mr-2 ml-2"><input type="checkbox" class="text-muted" name="add9" value="Pets Allowed"> Pets Allowed</label>
            <label class="mr-2 ml-2"><input type="checkbox" class="text-muted" name="add10" value="Elevator"> Elevator</label>
            <label class="mr-2 ml-2"><input type="checkbox" class="text-muted" name="add11" value="Compound"> Compound</label>
            <label class="mr-2 ml-2"><input type="checkbox" class="text-muted" name="add12" value="Water Meter">Water Meter</label>
            <label class="mr-2 ml-2"><input type="checkbox" class="text-muted" name="add13" value="Electricity Meter"> Electricity Meter</label>
            <label class="mr-2 ml-2"><input type="checkbox" class="text-muted" name="add14" value="Natural Gas Meter"> Natural Gas Meter</label>
            <label class="mr-2 ml-2"><input type="checkbox" class="text-muted" name="add15" value="Telephone Landline"> Telephone Landline</label>
        </div>
    </div>
</div>
