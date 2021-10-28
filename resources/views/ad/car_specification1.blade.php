<div class="form-group row">
    <label for="brand1" class="col-md-4 col-form-label text-md-right">{{ __('msg.Brand') }}</label>

    <div class="col-md-6">
        <select id="brand1" class="form-control text-muted" name="brand"  >
            <option></option>
            @foreach ( $brands as $brand)
                <option class="{{$brand->id}}" value="{{$brand->id}}"
                    @if ($brand->id == $addata[0]->brand)
                        {{'selected'}}
                    @endif>{{$brand['brand_'.LaravelLocalization::getcurrentlocale()]}}</option>
            @endforeach
        </select>

        <strong  id="brand_error1" class="text-danger" role="alert">
        </strong>
    </div>
</div>

<div class="form-group row">
    <label for="model1" class="col-md-4 col-form-label text-md-right">{{ __('msg.Model') }}</label>

    <div class="col-md-6">
        <select id="model1" class="form-control text-muted" name="model"  >
            <option></option>
            @foreach ( $models as $model)
                @if ($model->brand_id == $addata[0]->brand)
                    <option class="{{$model->id}}" value="{{$model->id}}"
                        @if ($model->id == $addata[0]->model)
                            {{'selected'}}
                        @endif>{{$model->model}}</option>
                @endif
            @endforeach
        </select>

        <strong  id="model_error1" class="text-danger" role="alert">
        </strong>
    </div>
</div>

<div class="form-group row">
    <label for="condition11" class="col-md-4 col-form-label text-md-right">{{ __('msg.Condition') }}</label>

    <div class="col-md-6">
        <select id="condition11" class="form-control text-muted" name="condition1"  >
            <option></option>
            <option value="new"
            @if ('new' == $addata[0]->condition1)
                {{'selected'}}
            @endif>{{__('msg.New')}}</option>
            <option value="used"
            @if ('used' == $addata[0]->condition1)
                {{'selected'}}
            @endif>{{__('msg.Used')}}</option>
        </select>

        <strong  id="condition1_error1" class="text-danger" role="alert">
        </strong>
    </div>
</div>
<div id="notforspare1">
<div class="form-group row">
    <label for="engine1" class="col-md-4 col-form-label text-md-right">{{ __('msg.Engine Capacity') }}</label>

    <div class="col-md-6">
        <select id="engine1" class="form-control text-muted" name="engine"  >
            <option></option>
            <option value="0-800"
            @if ('0-800' == $addata[0]->engine)
                {{'selected'}}
            @endif>0-800</option>
            <option value="1000-1300"
            @if ('1000-1300' == $addata[0]->engine)
                {{'selected'}}
            @endif>1000-1300</option>
            <option value="1400-1500"
            @if ('1400-1500' == $addata[0]->engine)
                {{'selected'}}
            @endif>1400-1500</option>
            <option value="1600"
            @if ('1600' == $addata[0]->engine)
                {{'selected'}}
            @endif>1600</option>
            <option value="1800-2000"
            @if ('1800-2000' == $addata[0]->engine)
                {{'selected'}}
            @endif>1800-2000</option>
            <option value="2200-2800"
            @if ('2200-2800' == $addata[0]->engine)
                {{'selected'}}
            @endif>2200-2800</option>
            <option value="+3000"
            @if ('+3000' == $addata[0]->engine)
                {{'selected'}}
            @endif>+3000</option>
        </select>

        <strong  id="engine_error1" class="text-danger" role="alert">
        </strong>
    </div>
</div>

<div class="form-group row">
    <label for="body_type1" class="col-md-4 col-form-label text-md-right">{{ __('msg.Body Type') }}</label>

    <div class="col-md-6">
        <select id="body_type1" class="form-control text-muted" name="body_type"  >
            <option></option>
            <option value="4X4"
            @if ('4X4' == $addata[0]->body_type)
                {{'selected'}}
            @endif>4X4</option>
            <option value="SUV"
            @if ('SUV' == $addata[0]->body_type)
                {{'selected'}}
            @endif>{{__('msg.SUV')}}</option>
            <option value="Sedan"
            @if ('Sedan' == $addata[0]->body_type)
                {{'selected'}}
            @endif>{{__('msg.Sedan')}}</option>
            <option value="Hatch Back"
            @if ('Hatch Back' == $addata[0]->body_type)
                {{'selected'}}
            @endif>{{__('msg.Hatch Back')}}</option>
            <option value="Van"
            @if ('Van' == $addata[0]->body_type)
                {{'selected'}}
            @endif>{{__('msg.Van')}}</option>
            <option value="Bus"
            @if ('Bus' == $addata[0]->body_type)
                {{'selected'}}
            @endif>{{__('msg.Bus')}}</option>
            <option value="Truck"
            @if ('Truck' == $addata[0]->body_type)
                {{'selected'}}
            @endif>{{__('msg.Truck')}}</option>
            <option value="Coupe"
            @if ('Coupe' == $addata[0]->body_type)
                {{'selected'}}
            @endif>{{__('msg.Coupe')}}</option>
            <option value="Cabriolet"
            @if ('Cabriolet' == $addata[0]->body_type)
                {{'selected'}}
            @endif>{{__('msg.Cabriolet')}}</option>
            <option value="Other"
            @if ('Other' == $addata[0]->body_type)
                {{'selected'}}
            @endif>{{__('msg.Other')}}</option>
        </select>

        <strong  id="body_type_error1" class="text-danger" role="alert">
        </strong>
    </div>
</div>

<div class="form-group row">
    <label for="fuel1" class="col-md-4 col-form-label text-md-right">{{ __('msg.Fuel Type') }}</label>

    <div class="col-md-6">
        <select id="fuel1" class="form-control text-muted" name="fuel"  >
            <option></option>
            <option value="Petrol"
            @if ('Petrol' == $addata[0]->fuel)
                {{'selected'}}
            @endif>{{__('msg.Petrol')}}</option>
            <option value="Diesel"
            @if ('Diesel' == $addata[0]->fuel)
                {{'selected'}}
            @endif>{{__('msg.Diesel')}}</option>
            <option value="Gas"
            @if ('Gas' == $addata[0]->fuel)
                {{'selected'}}
            @endif>{{__('msg.Gas')}}</option>
            <option value="Electricity"
            @if ('Electricity' == $addata[0]->fuel)
                {{'selected'}}
            @endif>{{__('msg.Electricity')}}</option>
            <option value="Hybrid"
            @if ('Hybrid' == $addata[0]->fuel)
                {{'selected'}}
            @endif>{{__('msg.Hybrid')}}</option>
        </select>

        <strong  id="fuel_error1" class="text-danger" role="alert">
        </strong>
    </div>
</div>

<div class="form-group row">
    <label for="transmition1" class="col-md-4 col-form-label text-md-right">{{ __('msg.Transmition Type') }}</label>

    <div class="col-md-6">
        <select id="transmition1" class="form-control text-muted" name="transmition"  >
            <option></option>
            <option value="Automatic"
            @if ('Automatic' == $addata[0]->transmition)
                {{'selected'}}
            @endif>{{__('msg.Automatic')}}</option>
            <option value="Manual"
            @if ('Manual' == $addata[0]->transmition)
                {{'selected'}}
            @endif>{{__('msg.Manual')}}</option>
        </select>

        <strong  id="transmition_error1" class="text-danger" role="alert">
        </strong>
    </div>
</div>

<div class="form-group row">
    <label for="kilometers1" class="col-md-4 col-form-label text-md-right">{{ __('msg.Kilometers') }}</label>

    <div class="col-md-6">
        <select id="kilometers1" class="form-control text-muted" name="kilometers"  >
            <option></option>
            <option value="{{$addata[0]->kilometers}}" selected>{{$addata[0]->kilometers}}</option>
            <option value="Less than 10000">-10000</option>
            @for ( $i=10000;$i<200000;$i +=2000)
                <option value="{{$i}} -> {{$i+1999}}">{{$i}} -> {{$i+1999}}</option>
            @endfor
            <option value="200000 or more">+200000</option>
        </select>

        <strong  id="kilometers_error1" class="text-danger" role="alert">
        </strong>
    </div>
</div>

<div class="form-group row">
    <label for="color1" class="col-md-4 col-form-label text-md-right">{{ __('msg.Color') }}</label>

    <div class="col-md-6">
        <select id="color1" class="form-control text-muted" name="color"  >
            <option></option>
            <option style="background-color:white; color:black;" value="White"
            @if ('White' == $addata[0]->color)
                {{'selected'}}
            @endif>{{__('msg.White')}}</option>
            <option style="background-color:black; color:white;" value="Black"
            @if ('Black' == $addata[0]->color)
                {{'selected'}}
            @endif>{{__('msg.Black')}}</option>
            <option style="background-color:grey; color:white;" value="Grey"
            @if ('Gray' == $addata[0]->color)
                {{'selected'}}
            @endif>{{__('msg.Grey')}}</option>
            <option style="background-color:silver; color:white;" value="Silver"
            @if ('Silver' == $addata[0]->color)
                {{'selected'}}
            @endif>{{__('msg.Silver')}}</option>
            <option style="background-color:brown; color:white;" value="Brown"
            @if ('Brown' == $addata[0]->color)
                {{'selected'}}
            @endif>{{__('msg.Brown')}}</option>
            <option style="background-color:green; color:white;" value="Green"
            @if ('Green' == $addata[0]->color)
                {{'selected'}}
            @endif>{{__('msg.Green')}}</option>
            <option style="background-color:blue; color:white;" value="Blue"
            @if ('Blue' == $addata[0]->color)
                {{'selected'}}
            @endif>{{__('msg.Blue')}}</option>
            <option style="background-color:navy; color:white;" value="Navy"
            @if ('Navy' == $addata[0]->color)
                {{'selected'}}
            @endif>{{__('msg.Navy')}}</option>
            <option style="background-color:red; color:white;" value="Red"
            @if ('Red' == $addata[0]->color)
                {{'selected'}}
            @endif>{{__('msg.Red')}}</option>
            <option style="background-color:yellow; color:white;" value="Yellow"
            @if ('Yellow' == $addata[0]->color)
                {{'selected'}}
            @endif>{{__('msg.Yellow')}}</option>
            <option style="background-color:aqua; color:white;" value="Aqua"
            @if ('Auqa' == $addata[0]->color)
                {{'selected'}}
            @endif>{{__('msg.Aqua')}}</option>
            <option style="background-color:gold; color:white;" value="Gold"
            @if ('Gold' == $addata[0]->color)
                {{'selected'}}
            @endif>{{__('msg.Gold')}}</option>
            <option style="background-color:orange; color:white;" value="Orange"
            @if ('Orange' == $addata[0]->color)
                {{'selected'}}
            @endif>{{__('msg.Orange')}}</option>
            <option style="background-color:rgb(100, 0, 0); color:white;" value="Dark Red"
            @if ('Dark Red' == $addata[0]->color)
                {{'selected'}}
            @endif>{{__('msg.Dark Red')}}</option>
            <option value="Other"
            @if ('Other' == $addata[0]->color)
                {{'selected'}}
            @endif>{{__('msg.Other')}}</option>
        </select>

        <strong  id="color_error1" class="text-danger" role="alert">
        </strong>
    </div>
</div>

<div class="form-group row">
    <label for="additions1" class="col-md-4 col-form-label text-md-right">{{ __('msg.Additions') }}</label>

    <div class="col-md-6">
        <label class="mr-2 ml-2"><input type="checkbox" class="text-muted add" name="add1[]" value="ABS"
            @foreach (explode('-',$addata[0]->additions) as $add)
                @if ('ABS' == $add)
                    {{'checked'}}
                @endif
            @endforeach
            >{{ __('msg.ABS')}}</label>
        <label class="mr-2 ml-2"><input type="checkbox" class="text-muted add" name="add1[]" value="AC"
            @foreach (explode('-',$addata[0]->additions) as $add)
                @if ('AC' == $add)
                    {{'checked'}}
                @endif
            @endforeach>{{ __('msg.AC')}}</label>
        <label class="mr-2 ml-2"><input type="checkbox" class="text-muted add" name="add1[]" value="AUX"
            @foreach (explode('-',$addata[0]->additions) as $add)
                @if ('AUX' == $add)
                    {{'checked'}}
                @endif
            @endforeach>{{ __('msg.AUX')}}</label>
        <label class="mr-2 ml-2"><input type="checkbox" class="text-muted add" name="add1[]" value="EBD"
            @foreach (explode('-',$addata[0]->additions) as $add)
                @if ('EBD' == $add)
                    {{'checked'}}
                @endif
            @endforeach>{{ __('msg.EBD')}}</label>
        <label class="mr-2 ml-2"><input type="checkbox" class="text-muted add" name="add1[]" value="Air Bags"
            @foreach (explode('-',$addata[0]->additions) as $add)
                @if ('Air Bags' == $add)
                    {{'checked'}}
                @endif
            @endforeach>{{ __('msg.Air Bags')}}</label>
        <label class="mr-2 ml-2"><input type="checkbox" class="text-muted add" name="add1[]" value="Alert"
            @foreach (explode('-',$addata[0]->additions) as $add)
                @if ('Alert' == $add)
                    {{'checked'}}
                @endif
            @endforeach>{{ __('msg.Alert')}}</label>
        <label class="mr-2 ml-2"><input type="checkbox" class="text-muted add" name="add1[]" value="Radio"
            @foreach (explode('-',$addata[0]->additions) as $add)
                @if ('Radio' == $add)
                    {{'checked'}}
                @endif
            @endforeach>{{ __('msg.Radio')}}</label>
        <label class="mr-2 ml-2"><input type="checkbox" class="text-muted add" name="add1[]" value="Bluetooth"
            @foreach (explode('-',$addata[0]->additions) as $add)
                @if ('Bluetooth' == $add)
                    {{'checked'}}
                @endif
            @endforeach>{{ __('msg.Bluetooth')}}</label>
        <label class="mr-2 ml-2"><input type="checkbox" class="text-muted add" name="add1[]" value="Cruise Control"
            @foreach (explode('-',$addata[0]->additions) as $add)
                @if ('Cruise Control' == $add)
                    {{'checked'}}
                @endif
            @endforeach>{{ __('msg.Cruise Control')}}</label>
        <label class="mr-2 ml-2"><input type="checkbox" class="text-muted add" name="add1[]" value="Fog Lights"
            @foreach (explode('-',$addata[0]->additions) as $add)
                @if ('Fog Lights' == $add)
                    {{'checked'}}
                @endif
            @endforeach>{{ __('msg.Fog Lights')}}</label>
        <label class="mr-2 ml-2"><input type="checkbox" class="text-muted add" name="add1[]" value="Start Botton"
            @foreach (explode('-',$addata[0]->additions) as $add)
                @if ('Start Botton' == $add)
                    {{'checked'}}
                @endif
            @endforeach>{{ __('msg.Start Botton')}}</label>
        <label class="mr-2 ml-2"><input type="checkbox" class="text-muted add" name="add1[]" value="Leather Seats"
            @foreach (explode('-',$addata[0]->additions) as $add)
                @if ('Leather Seats' == $add)
                    {{'checked'}}
                @endif
            @endforeach>{{ __('msg.Leather Seats')}}</label>
        <label class="mr-2 ml-2"><input type="checkbox" class="text-muted add" name="add1[]" value="Navigation System"
            @foreach (explode('-',$addata[0]->additions) as $add)
                @if ('Navigation System' == $add)
                    {{'checked'}}
                @endif
            @endforeach>{{ __('msg.Navigation System')}}</label>
        <label class="mr-2 ml-2"><input type="checkbox" class="text-muted add" name="add1[]" value="Off Road Wheels"
            @foreach (explode('-',$addata[0]->additions) as $add)
                @if ('Off Road Wheels' == $add)
                    {{'checked'}}
                @endif
            @endforeach>{{ __('msg.Off Road Wheels')}}</label>
        <label class="mr-2 ml-2"><input type="checkbox" class="text-muted add" name="add1[]" value="Parking Sensors"
            @foreach (explode('-',$addata[0]->additions) as $add)
                @if ('Parking Sensors' == $add)
                    {{'checked'}}
                @endif
            @endforeach>{{ __('msg.Parking Sensors')}}</label>
        <label class="mr-2 ml-2"><input type="checkbox" class="text-muted add" name="add1[]" value="Center Lock"
            @foreach (explode('-',$addata[0]->additions) as $add)
                @if ('Center Lock' == $add)
                    {{'checked'}}
                @endif
            @endforeach>{{ __('msg.Center Lock')}}</label>
        <label class="mr-2 ml-2"><input type="checkbox" class="text-muted add" name="add1[]" value="Electrical Mirrors"
            @foreach (explode('-',$addata[0]->additions) as $add)
                @if ('Electrical Mirrors' == $add)
                    {{'checked'}}
                @endif
            @endforeach>{{ __('msg.Electrical Mirrors')}}</label>
        <label class="mr-2 ml-2"><input type="checkbox" class="text-muted add" name="add1[]" value="Electrical Seats"
            @foreach (explode('-',$addata[0]->additions) as $add)
                @if ('Electrical Seats' == $add)
                    {{'checked'}}
                @endif
            @endforeach>{{ __('msg.Electrical Seats')}}</label>
        <label class="mr-2 ml-2"><input type="checkbox" class="text-muted add" name="add1[]" value="Power Stiring"
            @foreach (explode('-',$addata[0]->additions) as $add)
                @if ('Power Stiring' == $add)
                    {{'checked'}}
                @endif
            @endforeach>{{ __('msg.Power steering')}}</label>
        <label class="mr-2 ml-2"><input type="checkbox" class="text-muted add" name="add1[]" value="Electrical Windows"
            @foreach (explode('-',$addata[0]->additions) as $add)
                @if ('Electrical Windows' == $add)
                    {{'checked'}}
                @endif
            @endforeach>{{ __('msg.Electrical Windows')}}</label>
        <label class="mr-2 ml-2"><input type="checkbox" class="text-muted add" name="add1[]" value="Special Wheels"
            @foreach (explode('-',$addata[0]->additions) as $add)
                @if ('Special Wheels' == $add)
                    {{'checked'}}
                @endif
            @endforeach>{{ __('msg.Special Wheels')}}</label>
        <label class="mr-2 ml-2"><input type="checkbox" class="text-muted add" name="add1[]" value="Rear Camera"
            @foreach (explode('-',$addata[0]->additions) as $add)
                @if ('Rear Camera' == $add)
                    {{'checked'}}
                @endif
            @endforeach>{{ __('msg.Rear Camera')}}</label>
        <label class="mr-2 ml-2"><input type="checkbox" class="text-muted add" name="add1[]" value="Car Roof Rack"
            @foreach (explode('-',$addata[0]->additions) as $add)
                @if ('Car Roof Rack' == $add)
                    {{'checked'}}
                @endif
            @endforeach>{{ __('msg.Car Roof Rack')}}</label>
        <label class="mr-2 ml-2"><input type="checkbox" class="text-muted add" name="add1[]" value="Sunroof"
            @foreach (explode('-',$addata[0]->additions) as $add)
                @if ('Sunroof' == $add)
                    {{'checked'}}
                @endif
            @endforeach>{{ __('msg.Sunroof')}}</label>
        <label class="mr-2 ml-2"><input type="checkbox" class="text-muted add" name="add1[]" value="Touch Screen"
            @foreach (explode('-',$addata[0]->additions) as $add)
                @if ('Touch Screen' == $add)
                    {{'checked'}}
                @endif
            @endforeach>{{ __('msg.Touch Screen')}}</label>
        <label class="mr-2 ml-2"><input type="checkbox" class="text-muted add" name="add1[]" value="USB Charger"
            @foreach (explode('-',$addata[0]->additions) as $add)
                @if ('USB Charger' == $add)
                    {{'checked'}}
                @endif
            @endforeach>{{ __('msg.USB Charger')}}</label>
    </div>
</div>
</div>
{{-- @endif --}}
