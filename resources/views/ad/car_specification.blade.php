<div class="form-group row">
    <label for="brand" class="col-md-4 col-form-label text-md-right">{{ __('Brand') }}</label>

    <div class="col-md-6">
        <select id="brand" class="form-control text-muted" name="brand"  >
            <option disabled selected>Choose Brand</option>
            @foreach ( $brands as $brand)
            <option class="{{$brand->id}}" value="{{$brand->id}}">{{$brand->brand_en}}</option>
            @endforeach
        </select>

        <strong  id="brand_error" class="text-danger" role="alert">
        </strong>
    </div>
</div>

<div class="form-group row">
    <label for="model" class="col-md-4 col-form-label text-md-right">{{ __('Model') }}</label>

    <div class="col-md-6">
        <select id="model" class="form-control text-muted" name="model"  >
            <option disabled selected>Choose Model</option>
        </select>

        <strong  id="model_error" class="text-danger" role="alert">
        </strong>
    </div>
</div>

<div class="form-group row">
    <label for="condition1" class="col-md-4 col-form-label text-md-right">{{ __('Condition') }}</label>

    <div class="col-md-6">
        <select id="condition1" class="form-control text-muted" name="condition1"  >
            <option disabled selected>Choose Condition</option>
            <option value="new">New</option>
            <option value="used">Used</option>
        </select>

        <strong  id="condition1_error" class="text-danger" role="alert">
        </strong>
    </div>
</div>
<div id="notforspare">
<div class="form-group row">
    <label for="engine" class="col-md-4 col-form-label text-md-right">{{ __('Engine Capacity') }}</label>

    <div class="col-md-6">
        <select id="engine" class="form-control text-muted" name="engine"  >
            <option disabled selected>Choose Engine Capacity</option>
            <option value="0-800">0-800</option>
            <option value="1000-1300">1000-1300</option>
            <option value="1400-1500">1400-1500</option>
            <option value="1600">1600</option>
            <option value="1800-2000">1800-2000</option>
            <option value="2200-2800">2200-2800</option>
            <option value="more than 3000">{{'more than 3000'}}</option>
        </select>

        <strong  id="engine_error" class="text-danger" role="alert">
        </strong>
    </div>
</div>

<div class="form-group row">
    <label for="body_type" class="col-md-4 col-form-label text-md-right">{{ __('Body Type') }}</label>

    <div class="col-md-6">
        <select id="body_type" class="form-control text-muted" name="body_type"  >
            <option disabled selected>Choose Body Type</option>
            <option value="4X4">4X4</option>
            <option value="SUV">{{'SUV'}}</option>
            <option value="Sedan">{{'Sedan'}}</option>
            <option value="Hatch Back">{{'Hatch Back'}}</option>
            <option value="Van">{{'Van'}}</option>
            <option value="Bus">{{'Bus'}}</option>
            <option value="Truck">{{'Truck'}}</option>
            <option value="Coupe">{{'Coupe'}}</option>
            <option value="Cabriolet">{{'Cabriolet'}}</option>
            <option value="Other">{{'Other'}}</option>
        </select>

        <strong  id="body_type_error" class="text-danger" role="alert">
        </strong>
    </div>
</div>

<div class="form-group row">
    <label for="fuel" class="col-md-4 col-form-label text-md-right">{{ __('Fuel Type') }}</label>

    <div class="col-md-6">
        <select id="fuel" class="form-control text-muted" name="fuel"  >
            <option disabled selected>Choose Fuel Type</option>
            <option value="Petrol">{{'Petrol'}}</option>
            <option value="Diesel">{{'Diesel'}}</option>
            <option value="Gas">{{'Gas'}}</option>
            <option value="Electricity">{{'Electricity'}}</option>
            <option value="Hybrid">{{'Hybrid'}}</option>
        </select>

        <strong  id="fuel_error" class="text-danger" role="alert">
        </strong>
    </div>
</div>

<div class="form-group row">
    <label for="transmition" class="col-md-4 col-form-label text-md-right">{{ __('Transmition Type') }}</label>

    <div class="col-md-6">
        <select id="transmition" class="form-control text-muted" name="transmition"  >
            <option disabled selected>Choose Transmition Type</option>
            <option value="{{'Automatic'}}">{{'Automatic'}}</option>
            <option value="{{'Manual'}}">{{'Manual'}}</option>
        </select>

        <strong  id="transmition_error" class="text-danger" role="alert">
        </strong>
    </div>
</div>

<div class="form-group row">
    <label for="kilometers" class="col-md-4 col-form-label text-md-right">{{ __('Kilometers') }}</label>

    <div class="col-md-6">
        <select id="kilometers" class="form-control text-muted" name="kilometers"  >
            <option disabled selected>Choose Kilometers</option>
            <option value="{{'Less than 10000'}}">{{'Less than 10000'}}</option>
            @for ( $i=10000;$i<200000;$i +=2000)
            <option value="{{$i}} -> {{$i+1999}}">{{$i}} -> {{$i+1999}}</option>
            @endfor
            <option value="{{'200000 or more'}}">{{'200000 or more'}}</option>
        </select>

        <strong  id="kilometers_error" class="text-danger" role="alert">
        </strong>
    </div>
</div>

<div class="form-group row">
    <label for="color" class="col-md-4 col-form-label text-md-right">{{ __('Color') }}</label>

    <div class="col-md-6">
        <select id="color" class="form-control text-muted" name="color"  >
            <option disabled selected>Choose Color</option>
            <option style="background-color:white; color:black;" value="{{'White'}}">{{'White'}}</option>
            <option style="background-color:black; color:white;" value="{{'Black'}}">{{'Black'}}</option>
            <option style="background-color:grey; color:white;" value="{{'Grey'}}">{{'Grey'}}</option>
            <option style="background-color:silver; color:white;" value="{{'Silver'}}">{{'Silver'}}</option>
            <option style="background-color:brown; color:white;" value="{{'Brown'}}">{{'Brown'}}</option>
            <option style="background-color:green; color:white;" value="{{'Green'}}">{{'Green'}}</option>
            <option style="background-color:blue; color:white;" value="{{'Blue'}}">{{'Blue'}}</option>
            <option style="background-color:navy; color:white;" value="{{'Navy'}}">{{'Navy'}}</option>
            <option style="background-color:red; color:white;" value="{{'Red'}}">{{'Red'}}</option>
            <option style="background-color:yellow; color:white;" value="{{'Yellow'}}">{{'Yellow'}}</option>
            <option style="background-color:aqua; color:white;" value="{{'Aqua'}}">{{'Aqua'}}</option>
            <option style="background-color:gold; color:white;" value="{{'Gold'}}">{{'Gold'}}</option>
            <option style="background-color:orange; color:white;" value="{{'Orange'}}">{{'Orange'}}</option>
            <option style="background-color:rgb(100, 0, 0); color:white;" value="{{'Dark Red'}}">{{'Dark Red'}}</option>
            <option value="{{'Other'}}">{{'Other'}}</option>
        </select>

        <strong  id="color_error" class="text-danger" role="alert">
        </strong>
    </div>
</div>

<div class="form-group row">
    <label for="additions" class="col-md-4 col-form-label text-md-right">{{ __('Additions') }}</label>

    <div class="col-md-6">
        <label class="mr-2 ml-2"><input type="checkbox" class="text-muted add" name="add1[]" value="ABS">ABS</label>
        <label class="mr-2 ml-2"><input type="checkbox" class="text-muted add" name="add1[]" value="AC">AC</label>
        <label class="mr-2 ml-2"><input type="checkbox" class="text-muted add" name="add1[]" value="AUX">AUX</label>
        <label class="mr-2 ml-2"><input type="checkbox" class="text-muted add" name="add1[]" value="EBD">EBD</label>
        <label class="mr-2 ml-2"><input type="checkbox" class="text-muted add" name="add1[]" value="Air Bags">Air Bags</label>
        <label class="mr-2 ml-2"><input type="checkbox" class="text-muted add" name="add1[]" value="Alert">Alert</label>
        <label class="mr-2 ml-2"><input type="checkbox" class="text-muted add" name="add1[]" value="Radio">Radio</label>
        <label class="mr-2 ml-2"><input type="checkbox" class="text-muted add" name="add1[]" value="Bluetooth">Bluetooth</label>
        <label class="mr-2 ml-2"><input type="checkbox" class="text-muted add" name="add1[]" value="Cruise Control">Cruise Control</label>
        <label class="mr-2 ml-2"><input type="checkbox" class="text-muted add" name="add1[]" value="Fog Lights">Fog Lights</label>
        <label class="mr-2 ml-2"><input type="checkbox" class="text-muted add" name="add1[]" value="Start Botton">Start Botton</label>
        <label class="mr-2 ml-2"><input type="checkbox" class="text-muted add" name="add1[]" value="Leather Seats">Leather Seats</label>
        <label class="mr-2 ml-2"><input type="checkbox" class="text-muted add" name="add1[]" value="Navigation System">Navigation System</label>
        <label class="mr-2 ml-2"><input type="checkbox" class="text-muted add" name="add1[]" value="Off Road Wheels">Off Road Wheels</label>
        <label class="mr-2 ml-2"><input type="checkbox" class="text-muted add" name="add1[]" value="Parking Sensors">Parking Sensors</label>
        <label class="mr-2 ml-2"><input type="checkbox" class="text-muted add" name="add1[]" value="Center Lock">Center Lock</label>
        <label class="mr-2 ml-2"><input type="checkbox" class="text-muted add" name="add1[]" value="Electrical Mirrors">Electrical Mirrors</label>
        <label class="mr-2 ml-2"><input type="checkbox" class="text-muted add" name="add1[]" value="Electrical Seats">Electrical Seats</label>
        <label class="mr-2 ml-2"><input type="checkbox" class="text-muted add" name="add1[]" value="Power Stiring">Power Stiring</label>
        <label class="mr-2 ml-2"><input type="checkbox" class="text-muted add" name="add1[]" value="Electrical Windows">Electrical Windows</label>
        <label class="mr-2 ml-2"><input type="checkbox" class="text-muted add" name="add1[]" value="Special Wheels">Special Wheels</label>
        <label class="mr-2 ml-2"><input type="checkbox" class="text-muted add" name="add1[]" value="Rear Camera">Rear Camera</label>
        <label class="mr-2 ml-2"><input type="checkbox" class="text-muted add" name="add1[]" value="Car Roof Rack">Car Roof Rack</label>
        <label class="mr-2 ml-2"><input type="checkbox" class="text-muted add" name="add1[]" value="Sunroof">Sunroof</label>
        <label class="mr-2 ml-2"><input type="checkbox" class="text-muted add" name="add1[]" value="Touch Screen">Touch Screen</label>
        <label class="mr-2 ml-2"><input type="checkbox" class="text-muted add" name="add1[]" value="USB Charger">USB Charger</label>
    </div>
</div>
</div>
