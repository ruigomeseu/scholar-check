@extends('form')

@section('content')
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">
                Sign Up
            </h3>
        </div>
        <div class="panel-body ng-binding">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form id="signup-form" class="form-horizontal" role="form" method="POST" action="{{ url('/signup') }}">

                <div id="payment-errors" class="alert alert-danger" style="display:none;">
                </div>

                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                    <label class="col-md-3 control-label">Name</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Email Address</label>
                    <div class="col-md-9">
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Password</label>
                    <div class="col-md-9">
                        <input type="password" class="form-control" name="password">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Confirm Password</label>
                    <div class="col-md-9">
                        <input type="password" class="form-control" name="password_confirmation">
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="card-name">Name on Card</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="card-name" id="card-name" placeholder="Card Holder's Name">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="card-number">Card Number</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" data-stripe="number" name="card-number" id="card-number" placeholder="Debit/Credit Card Number">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="card-expiry-month">Expiration Date</label>
                    <div class="col-sm-9">
                        <div class="row">
                            <div class="col-xs-3">
                                <select class="form-control col-sm-2" name="card-expiry-month" id="card-expiry-month">
                                    <option>Month</option>
                                    <option value="01" selected>Jan (01)</option>
                                    <option value="02">Feb (02)</option>
                                    <option value="03">Mar (03)</option>
                                    <option value="04">Apr (04)</option>
                                    <option value="05">May (05)</option>
                                    <option value="06">June (06)</option>
                                    <option value="07">July (07)</option>
                                    <option value="08">Aug (08)</option>
                                    <option value="09">Sep (09)</option>
                                    <option value="10">Oct (10)</option>
                                    <option value="11">Nov (11)</option>
                                    <option value="12">Dec (12)</option>
                                </select>
                            </div>
                            <div class="col-xs-3">
                                <select class="form-control" name="card-expiry-year" id="card-expiry-year">
                                    @foreach(range(date('Y'), date('Y')+10) as $year)
                                        <option value="{{ $year }}">{{ $year }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="card-cvv">Card CVV</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="card-cvv" id="card-cvv" placeholder="Security Code">
                    </div>
                </div>

                <hr />

                <div class="form-group">
                    <label class="col-sm-3 control-label">Plan</label>
                    <div class="col-sm-6">
                        <div class="radio">
                            <label>
                                <input type="radio" value="startup" name="plan" @if(isset($_GET['startup'])) checked @endif>&nbsp;&nbsp;Startup ($9.99 / Month)
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" value="business" name="plan" @if(isset($_GET['business'])) checked @endif>&nbsp;&nbsp;Business ($29.99 / Month)
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" value="professional" name="plan" @if(isset($_GET['professional'])) checked @endif>&nbsp;&nbsp;Professional ($79.99 / Month)
                            </label>
                        </div>
                    </div>
                </div>
                <br />
                <div style="text-align: center;" class="form-group">
                    <button type="submit" class="btn btn-lg btn-primary">
                        Register
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection
