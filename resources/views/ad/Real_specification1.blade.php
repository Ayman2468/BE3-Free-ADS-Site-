<div class="form-group row">
    <label for="real_estate_type1" class="col-md-4 col-form-label text-md-right">{{ __('Real Estate Type') }}</label>

    <div class="col-md-6">
        <select id="real_estate_type1" class="form-control text-muted" name="real_estate_type"  >
            <option></option>
            <option value="Apartment"
            @if ('Apartment' == $addata[0]->real_estate_type)
                    {{'selected'}}
                @endif>Apartment</option>
            <option value="Villa"
            @if ('Villa' == $addata[0]->real_estate_type)
                    {{'selected'}}
                @endif>Villa</option>
            <option value="Land"
            @if ('Land' == $addata[0]->real_estate_type)
                    {{'selected'}}
                @endif>Land</option>
            <option value="Whole Building"
            @if ('Whole Building' == $addata[0]->real_estate_type)
                    {{'selected'}}
                @endif>Whole Building</option>
        </select>

        <strong  id="real_estate_type_error1" class="text-danger" role="alert">
        </strong>
    </div>
</div>

<div class="form-group row">
    <label for="space1" class="col-md-4 col-form-label text-md-right">{{ __('Space') }}</label>

    <div class="col-md-6">
        <input id="space1" type="text" class="form-control" name="space" autocomplete="space" value="{{$addata[0]->space}}" autofocus>

        <strong  id="space_error1" class="text-danger" role="alert">
        </strong>
    </div>
</div>
{{-- @if($addata[0]->real_estate_type != 'Land') --}}
<div id="notforland1">
    <div class="form-group row">
        <label for="bed_rooms1" class="col-md-4 col-form-label text-md-right">{{ __('Bed Rooms') }}</label>

        <div class="col-md-6">
            <select id="bed_rooms1" class="form-control text-muted" name="bed_rooms"  >
                <option></option>
                @for ($i=1;$i<=10;$i++)
                <option value="{{$i}}"
                @if ($i == $addata[0]->bed_rooms)
                    {{'selected'}}
                @endif>{{$i}}</option>
                @endfor
                <option value="more than 10"
                @if ('more than 10' == $addata[0]->bed_rooms)
                    {{'selected'}}
                @endif>More Than 10</option>
            </select>

            <strong  id="bed_rooms_error1" class="text-danger" role="alert">
            </strong>
        </div>
    </div>

    <div class="form-group row">
        <label for="bathrooms1" class="col-md-4 col-form-label text-md-right">{{ __('Bathrooms') }}</label>

        <div class="col-md-6">
            <select id="bathrooms1" class="form-control text-muted" name="bathrooms"  >
                <option></option>

                @for ($i=1;$i<=10;$i++)
                <option value="{{$i}}"
                @if ($i == $addata[0]->bathrooms)
                    {{'selected'}}
                @endif>{{$i}}</option>
                @endfor
                <option value="more than 10"
                @if ('more than 10' == $addata[0]->bathrooms)
                    {{'selected'}}
                @endif>More Than 10</option>
            </select>

            <strong  id="bathrooms_error1" class="text-danger" role="alert">
            </strong>
        </div>
    </div>


    <div class="form-group row">
        <label for="furnished1" class="col-md-4 col-form-label text-md-right">{{ __('Furnished') }}</label>

        <div class="col-md-6">
            <select id="furnished1" class="form-control text-muted" name="furnished"  >
                <option></option>
                <option value="Yes"
                @if ('Yes' == $addata[0]->furnished)
                    {{'selected'}}
                @endif>Yes</option>
                <option value="No"
                @if ('No' == $addata[0]->furnished)
                    {{'selected'}}
                @endif>No</option>
            </select>

            <strong  id="furnished_error1" class="text-danger" role="alert">
            </strong>
        </div>
    </div>

    <div class="form-group row">
        <label for="floor1" class="col-md-4 col-form-label text-md-right">{{ __('Floor(s)') }}</label>

        <div class="col-md-6">
            <select id="floor1" class="form-control text-muted" name="floor"  >
                <option></option>
                <option value="Ground Floor"
                @if ('Ground Floor' == $addata[0]->floor)
                    {{'selected'}}
                @endif>Ground Floor</option>
                @for ($i=1;$i<=12;$i++)
                <option value="{{$i}}"
                @if ($i == $addata[0]->floor)
                    {{'selected'}}
                @endif>{{$i}}</option>
                @endfor
                <option value="+12"
                @if ('+12' == $addata[0]->floor)
                    {{'selected'}}
                @endif>+12</option>
            </select>

            <strong  id="floor_error1" class="text-danger" role="alert">
            </strong>
        </div>
    </div>

    <div class="form-group row">
        <label for="additions1" class="col-md-4 col-form-label text-md-right">{{ __('Additions') }}</label>

        <div class="col-md-6">
            <label class="mr-2 ml-2"><input type="checkbox" class="text-muted add" name="add[]" value="Security"
                @foreach (explode('-',$addata[0]->additions) as $add)
                @if ('Security' == $add)
                    {{'checked'}}
                @endif
            @endforeach> Security</label>
            <label class="mr-2 ml-2"><input type="checkbox" class="text-muted add" name="add[]" value="Private Parking"
                @foreach (explode('-',$addata[0]->additions) as $add)
                @if ('Private Parking' == $add)
                    {{'checked'}}
                @endif
            @endforeach> private Parking</label>
            <label class="mr-2 ml-2"><input type="checkbox" class="text-muted add" name="add[]" value="Balcony"
                @foreach (explode('-',$addata[0]->additions) as $add)
                @if ('Balcony' == $add)
                    {{'checked'}}
                @endif
            @endforeach> Balcony</label>
            <label class="mr-2 ml-2"><input type="checkbox" class="text-muted add" name="add[]" value="Private Garden"
                @foreach (explode('-',$addata[0]->additions) as $add)
                @if ('Private Garden' == $add)
                    {{'checked'}}
                @endif
            @endforeach> Private Garden</label>
            <label class="mr-2 ml-2"><input type="checkbox" class="text-muted add" name="add[]" value="Service Rooms"
                @foreach (explode('-',$addata[0]->additions) as $add)
                @if ('Service Rooms' == $add)
                    {{'checked'}}
                @endif
            @endforeach> Service Rooms</label>
            <label class="mr-2 ml-2"><input type="checkbox" class="text-muted add" name="add[]" value="Central AC / Heater"
                @foreach (explode('-',$addata[0]->additions) as $add)
                @if ('Central AC / Heater' == $add)
                    {{'checked'}}
                @endif
            @endforeach> Central AC / Heater</label>
            <label class="mr-2 ml-2"><input type="checkbox" class="text-muted add" name="add[]" value="Kitchen Appliances"
                @foreach (explode('-',$addata[0]->additions) as $add)
                @if ('Kitchen Appliances' == $add)
                    {{'checked'}}
                @endif
            @endforeach> Kitchen Appliances</label>
            <label class="mr-2 ml-2"><input type="checkbox" class="text-muted add" name="add[]" value="Swimming Pool"
                @foreach (explode('-',$addata[0]->additions) as $add)
                @if ('Swimming Pool' == $add)
                    {{'checked'}}
                @endif
            @endforeach> Swimming Pool</label>
            <label class="mr-2 ml-2"><input type="checkbox" class="text-muted add" name="add[]" value="Pets Allowed"
                @foreach (explode('-',$addata[0]->additions) as $add)
                @if ('Pets Allowed' == $add)
                    {{'checked'}}
                @endif
            @endforeach> Pets Allowed</label>
            <label class="mr-2 ml-2"><input type="checkbox" class="text-muted add" name="add[]" value="Elevator"
                @foreach (explode('-',$addata[0]->additions) as $add)
                @if ('Elevator' == $add)
                    {{'checked'}}
                @endif
            @endforeach> Elevator</label>
            <label class="mr-2 ml-2"><input type="checkbox" class="text-muted add" name="add[]" value="Compound"
                @foreach (explode('-',$addata[0]->additions) as $add)
                @if ('Compound' == $add)
                    {{'checked'}}
                @endif
            @endforeach> Compound</label>
            <label class="mr-2 ml-2"><input type="checkbox" class="text-muted add" name="add[]" value="Water Meter"
                @foreach (explode('-',$addata[0]->additions) as $add)
                @if ('Water Meter' == $add)
                    {{'checked'}}
                @endif
            @endforeach>Water Meter</label>
            <label class="mr-2 ml-2"><input type="checkbox" class="text-muted add" name="add[]" value="Electricity Meter"
                @foreach (explode('-',$addata[0]->additions) as $add)
                @if ('Electricity Meter' == $add)
                    {{'checked'}}
                @endif
            @endforeach> Electricity Meter</label>
            <label class="mr-2 ml-2"><input type="checkbox" class="text-muted add" name="add[]" value="Natural Gas Meter"
                @foreach (explode('-',$addata[0]->additions) as $add)
                @if ('Natural Gas Meter' == $add)
                    {{'checked'}}
                @endif
            @endforeach> Natural Gas Meter</label>
            <label class="mr-2 ml-2"><input type="checkbox" class="text-muted add" name="add[]" value="Telephone Landline"
                @foreach (explode('-',$addata[0]->additions) as $add)
                @if ('Telephone Landline' == $add)
                    {{'checked'}}
                @endif
            @endforeach> Telephone Landline</label>
        </div>
    </div>
</div>
{{-- @endif --}}
