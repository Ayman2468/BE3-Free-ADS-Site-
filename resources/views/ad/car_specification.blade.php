<div class="form-group row">
    <label for="brand" class="col-md-4 col-form-label text-md-right">{{ __('msg.Brand') }}</label>

    <div class="col-md-6">
        <select id="brand" class="form-control text-muted" name="brand"  >
            <option disabled selected>{{__('msg.Choose Brand')}}</option>
            @foreach ( $brands as $brand)
            <option class="{{$brand->id}}" value="{{$brand->id}}">{{$brand['brand_'.LaravelLocalization::getcurrentlocale()]}}</option>
            @endforeach
        </select>

        <strong  id="brand_error" class="text-danger" role="alert">
        </strong>
    </div>
</div>

<div class="form-group row">
    <label for="model" class="col-md-4 col-form-label text-md-right">{{ __('msg.Model') }}</label>

    <div class="col-md-6">
        <select id="model" class="form-control text-muted" name="model"  >
            <option disabled selected>{{__('msg.Choose Model')}}</option>
        </select>

        <strong  id="model_error" class="text-danger" role="alert">
        </strong>
    </div>
</div>

<div class="form-group row">
    <label for="condition1" class="col-md-4 col-form-label text-md-right">{{ __('msg.Condition') }}</label>

    <div class="col-md-6">
        <select id="condition1" class="form-control text-muted" name="condition1"  >
            <option disabled selected>{{__('msg.Choose Condition')}}</option>
            <option value="new">{{__('msg.New')}}</option>
            <option value="used">{{__('msg.Used')}}</option>
        </select>

        <strong  id="condition1_error" class="text-danger" role="alert">
        </strong>
    </div>
</div>
<div id="notforspare">
<div class="form-group row">
    <label for="engine" class="col-md-4 col-form-label text-md-right">{{ __('msg.Engine Capacity') }}</label>

    <div class="col-md-6">
        <select id="engine" class="form-control text-muted" name="engine"  >
            <option disabled selected>{{__('msg.Choose Engine Capacity')}}</option>
            <option value="0-800">0-800</option>
            <option value="1000-1300">1000-1300</option>
            <option value="1400-1500">1400-1500</option>
            <option value="1600">1600</option>
            <option value="1800-2000">1800-2000</option>
            <option value="2200-2800">2200-2800</option>
            <option value="more than 3000">+3000</option>
        </select>

        <strong  id="engine_error" class="text-danger" role="alert">
        </strong>
    </div>
</div>

<div class="form-group row">
    <label for="body_type" class="col-md-4 col-form-label text-md-right">{{ __('msg.Body Type') }}</label>

    <div class="col-md-6">
        <select id="body_type" class="form-control text-muted" name="body_type"  >
            <option disabled selected>{{__('msg.Choose Body Type')}}</option>
            <option value="4X4">4X4</option>
            <option value="SUV">{{__('msg.SUV')}}</option>
            <option value="Sedan">{{__('msg.Sedan')}}</option>
            <option value="Hatch Back">{{__('msg.Hatch Back')}}</option>
            <option value="Van">{{__('msg.Van')}}</option>
            <option value="Bus">{{__('msg.Bus')}}</option>
            <option value="Truck">{{__('msg.Truck')}}</option>
            <option value="Coupe">{{__('msg.Coupe')}}</option>
            <option value="Cabriolet">{{__('msg.Cabriolet')}}</option>
            <option value="Other">{{__('msg.Other')}}</option>
        </select>

        <strong  id="body_type_error" class="text-danger" role="alert">
        </strong>
    </div>
</div>

<div class="form-group row">
    <label for="fuel" class="col-md-4 col-form-label text-md-right">{{ __('msg.Fuel Type') }}</label>

    <div class="col-md-6">
        <select id="fuel" class="form-control text-muted" name="fuel"  >
            <option disabled selected>{{__('msg.Choose Fuel Type')}}</option>
            <option value="Petrol">{{__('msg.Petrol')}}</option>
            <option value="Diesel">{{__('msg.Diesel')}}</option>
            <option value="Gas">{{__('msg.Gas')}}</option>
            <option value="Electricity">{{__('msg.Electricity')}}</option>
            <option value="Hybrid">{{__('msg.Hybrid')}}</option>
        </select>

        <strong  id="fuel_error" class="text-danger" role="alert">
        </strong>
    </div>
</div>

<div class="form-group row">
    <label for="transmition" class="col-md-4 col-form-label text-md-right">{{ __('msg.Transmition Type') }}</label>

    <div class="col-md-6">
        <select id="transmition" class="form-control text-muted" name="transmition"  >
            <option disabled selected>{{__('msg.Choose Transmition Type')}}</option>
            <option value="Automatic">{{__('msg.Automatic')}}</option>
            <option value="Manual">{{__('msg.Manual')}}</option>
        </select>

        <strong  id="transmition_error" class="text-danger" role="alert">
        </strong>
    </div>
</div>

<div class="form-group row">
    <label for="kilometers" class="col-md-4 col-form-label text-md-right">{{ __('msg.Kilometers') }}</label>

    <div class="col-md-6">
        <select id="kilometers" class="form-control text-muted" name="kilometers"  >
            <option disabled selected>{{__('msg.Choose Kilometers')}}</option>
            <option value="-10000">-10000</option>
            @for ( $i=10000;$i<200000;$i +=2000)
            <option value="{{$i}} -> {{$i+1999}}">{{$i}} -> {{$i+1999}}</option>
            @endfor
            <option value="+200000">+200000</option>
        </select>

        <strong  id="kilometers_error" class="text-danger" role="alert">
        </strong>
    </div>
</div>

<div class="form-group row">
    <label for="color" class="col-md-4 col-form-label text-md-right">{{ __('msg.Color') }}</label>

    <div class="col-md-6">
        <select id="color" class="form-control text-muted" name="color"  >
            <option disabled selected>{{__('msg.Choose Color')}}</option>
            <option style="background-color:white; color:black;" value="{{'White'}}">{{__('msg.White')}}</option>
            <option style="background-color:black; color:white;" value="{{'Black'}}">{{__('msg.Black')}}</option>
            <option style="background-color:grey; color:white;" value="{{'Grey'}}">{{__('msg.Grey')}}</option>
            <option style="background-color:silver; color:white;" value="{{'Silver'}}">{{__('msg.Silver')}}</option>
            <option style="background-color:brown; color:white;" value="{{'Brown'}}">{{__('msg.Brown')}}</option>
            <option style="background-color:green; color:white;" value="{{'Green'}}">{{__('msg.Green')}}</option>
            <option style="background-color:blue; color:white;" value="{{'Blue'}}">{{__('msg.Blue')}}</option>
            <option style="background-color:navy; color:white;" value="{{'Navy'}}">{{__('msg.Navy')}}</option>
            <option style="background-color:red; color:white;" value="{{'Red'}}">{{__('msg.Red')}}</option>
            <option style="background-color:yellow; color:white;" value="{{'Yellow'}}">{{__('msg.Yellow')}}</option>
            <option style="background-color:aqua; color:white;" value="{{'Aqua'}}">{{__('msg.Aqua')}}</option>
            <option style="background-color:gold; color:white;" value="{{'Gold'}}">{{__('msg.Gold')}}</option>
            <option style="background-color:orange; color:white;" value="{{'Orange'}}">{{__('msg.Orange')}}</option>
            <option style="background-color:rgb(100, 0, 0); color:white;" value="{{'Dark Red'}}">{{__('msg.Dark Red')}}</option>
            <option value="{{'Other'}}">{{__('msg.Other')}}</option>
        </select>

        <strong  id="color_error" class="text-danger" role="alert">
        </strong>
    </div>
</div>

<div class="form-group row">
    <label for="additions" class="col-md-4 col-form-label text-md-right">{{ __('msg.Additions') }}</label>

    <div class="col-md-6">
        <label class="mr-2 ml-2"><input type="checkbox" class="text-muted ml-1" name="add1[]" value="ABS">{{ __('msg.ABS') }}</label>
        <label class="mr-2 ml-2"><input type="checkbox" class="text-muted ml-1" name="add1[]" value="AC">{{ __('msg.AC') }}</label>
        <label class="mr-2 ml-2"><input type="checkbox" class="text-muted ml-1" name="add1[]" value="AUX">{{ __('msg.AUX') }}</label>
        <label class="mr-2 ml-2"><input type="checkbox" class="text-muted ml-1" name="add1[]" value="EBD">{{ __('msg.EBD') }}</label>
        <label class="mr-2 ml-2"><input type="checkbox" class="text-muted ml-1" name="add1[]" value="Air Bags">{{ __('msg.Air Bags') }}</label>
        <label class="mr-2 ml-2"><input type="checkbox" class="text-muted ml-1" name="add1[]" value="Alert">{{ __('msg.Alert') }}</label>
        <label class="mr-2 ml-2"><input type="checkbox" class="text-muted ml-1" name="add1[]" value="Radio">{{ __('msg.Radio') }}</label>
        <label class="mr-2 ml-2"><input type="checkbox" class="text-muted ml-1" name="add1[]" value="Bluetooth">{{ __('msg.Bluetooth') }}</label>
        <label class="mr-2 ml-2"><input type="checkbox" class="text-muted ml-1" name="add1[]" value="Cruise Control">{{ __('msg.Cruise Control') }}</label>
        <label class="mr-2 ml-2"><input type="checkbox" class="text-muted ml-1" name="add1[]" value="Fog Lights">{{ __('msg.Fog Lights') }}</label>
        <label class="mr-2 ml-2"><input type="checkbox" class="text-muted ml-1" name="add1[]" value="Start Botton">{{ __('msg.Start Botton') }}</label>
        <label class="mr-2 ml-2"><input type="checkbox" class="text-muted ml-1" name="add1[]" value="Leather Seats">{{ __('msg.Leather Seats') }}</label>
        <label class="mr-2 ml-2"><input type="checkbox" class="text-muted ml-1" name="add1[]" value="Navigation System">{{ __('msg.Navigation System') }}</label>
        <label class="mr-2 ml-2"><input type="checkbox" class="text-muted ml-1" name="add1[]" value="Off Road Wheels">{{ __('msg.Off Road Wheels') }}</label>
        <label class="mr-2 ml-2"><input type="checkbox" class="text-muted ml-1" name="add1[]" value="Parking Sensors">{{ __('msg.Parking Sensors') }}</label>
        <label class="mr-2 ml-2"><input type="checkbox" class="text-muted ml-1" name="add1[]" value="Center Lock">{{ __('msg.Center Lock') }}</label>
        <label class="mr-2 ml-2"><input type="checkbox" class="text-muted ml-1" name="add1[]" value="Electrical Mirrors">{{ __('msg.Electrical Mirrors') }}</label>
        <label class="mr-2 ml-2"><input type="checkbox" class="text-muted ml-1" name="add1[]" value="Electrical Seats">{{ __('msg.Electrical Seats') }}</label>
        <label class="mr-2 ml-2"><input type="checkbox" class="text-muted ml-1" name="add1[]" value="Power steering">{{ __('msg.Power steering') }}</label>
        <label class="mr-2 ml-2"><input type="checkbox" class="text-muted ml-1" name="add1[]" value="Electrical Windows">{{ __('msg.Electrical Windows') }}</label>
        <label class="mr-2 ml-2"><input type="checkbox" class="text-muted ml-1" name="add1[]" value="Special Wheels">{{ __('msg.Special Wheels') }}</label>
        <label class="mr-2 ml-2"><input type="checkbox" class="text-muted ml-1" name="add1[]" value="Rear Camera">{{ __('msg.Rear Camera') }}</label>
        <label class="mr-2 ml-2"><input type="checkbox" class="text-muted ml-1" name="add1[]" value="Car Roof Rack">{{ __('msg.Car Roof Rack') }}</label>
        <label class="mr-2 ml-2"><input type="checkbox" class="text-muted ml-1" name="add1[]" value="Sunroof">{{ __('msg.Sunroof') }}</label>
        <label class="mr-2 ml-2"><input type="checkbox" class="text-muted ml-1" name="add1[]" value="Touch Screen">{{ __('msg.Touch Screen') }}</label>
        <label class="mr-2 ml-2"><input type="checkbox" class="text-muted ml-1" name="add1[]" value="USB Charger">{{ __('msg.USB Charger') }}</label>
    </div>
</div>
</div>
