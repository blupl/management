<div class="col-md-12">
    <h1 class="text-center bold">ACCREDITATION</h1>
    <h2 class="text-center">BCB MANAGEMENT</h2>
</div>

<div class="col-md-12">
    @if ($errors->has())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
        </div>
    @endif
{!! Form::open(['url'=>'management/member/registration', 'files'=>true]) !!}
{!! Form::hidden('user_id', Auth::user()->id) !!}

<fieldset xmlns="http://www.w3.org/1999/html">
    
        <div class="col-md-6 form-group">
            {!! Form::label('name', 'NAME') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>
        <div class="col-md-6 form-group">
            {!! Form::label('gender', 'GENDER') !!}
            {!! Form::select('gender', [''=>'Choose From List', 'male'=>'Male', 'female'=>'Female', 'other'=>'Other'], null, ['class'=>'form-control select2', 'style'=>'width: 100%;']) !!}
        </div>

            <div class="col-md-6 form-group">
                {!! Form::label('role', 'DESIGNATION / ROLE / ACTIVITY') !!}
                {{--{!! Form::select('role', [--}}
                {{--'admin'=>'Administrator',--}}
                {{--'assistant'=>'Assistant Manager',--}}
                {{--'ceo'=>'Chief Executive Officer',--}}
                {{--'deputy'=>'Deputy Manager',--}}
                {{--'executive'=>'Executive',--}}
                {{--'ccdm'=>'CCDM',--}}
                {{--'head-corruption'=>'Head of Anti-Corruption',--}}
                {{--'head-security'=>'Head of Security',--}}
                {{--'incharge'=>'In-Charge',--}}
                {{--'manager'=>'Manager',--}}
                {{--'curator'=>'Curator',--}}
                {{--'assistant-curator'=>'Assistant Curator',--}}
                {{--'national-manager'=>'National Manager',--}}
                {{--'president'=>'PS to BCB President',--}}
                {{--'marketing'=>'Marketing and Commercial',--}}
                {{--'senior-executive'=>'Senior Executive',--}}
                {{--'senior-manager'=>'Senior Manager',--}}
                {{--'senior-national-manager'=>'Senior National Manager',--}}
                {{--'physician'=>'Sports Physician',--}}
                {{--'venue-administrator'=>'Venue Administrator'--}}
                {{--],--}}
                {{--null, ['class'=>'form-control select2', 'style'=>'width: 100%;']) !!}--}}
                {!! Form::text('role', null, ['class'=>'form-control']) !!}
            </div>
            <div class="col-md-6 form-group">
                {!! Form::label('department', 'DEPARTMENT') !!}
                @include('blupl/management::common._department')
            </div>
        <div>
            <div class="col-md-6 form-group">
                {!! Form::label('organization', 'ORGANIZATION') !!}
                {!! Form::text('organization', 'BCB Management', ['class'=>'form-control', 'readonly']) !!}
            </div>
            <div class="col-md-6 form-group">
                {!! Form::label('mobile', 'CONTACT PHONE NUMBER') !!}
                {!! Form::text('mobile', null, ['class'=>'form-control']) !!}
            </div>
        </div>
        
            <div class="col-md-6 form-group">
                {!! Form::label('personal_id', 'PASSPORT OR NID NUMBER') !!}
                {!! Form::text('personal_id', null,['class'=>'form-control']) !!}
            </div>
            <div class="col-md-6 form-group">
                {!! Form::label('email', 'CONTACT E-MAIL ID') !!}
                {!! Form::text('email', null, ['class'=>'form-control']) !!}
            </div>

            <div class="col-md-6 form-group ">
                {!! Form::label('present_address', 'PRESENT ADDRESS') !!}
                {!! Form::text('present_address1', null, ['class'=>'form-control', 'placeholder'=>'Line 1']) !!}
                {!! Form::text('present_address2', null, ['class'=>'form-control', 'placeholder'=>'Line 2']) !!}
                <div class="col-md-6 form-group first-child no-padding">
                    @include('blupl/management::common._district-list', ['field'=>'present_district'])
                </div>
                <div class="col-md-6 form-group no-padding">
                    {!! Form::text('present_zip', null, ['class'=>'form-control', 'placeholder'=>'Post Code']) !!}
                </div>
            </div>

            <div class="col-md-6 form-group">
                {!! Form::label('permanent_address', 'PERMANENT ADDRESS') !!}
                {!! Form::text('permanent_address1', null, ['class'=>'form-control', 'placeholder'=>'Line 1']) !!}
                {!! Form::text('permanent_address2', null, ['class'=>'form-control', 'placeholder'=>'Line 2']) !!}
                <div class="col-md-6 form-group last-child no-padding">
                    @include('blupl/management::common._district-list', ['field'=>'permanent_district'])
                </div>
                <div class="col-md-6 form-group no-padding">
                    {!! Form::text('permanent_zip', null, ['class'=>'form-control', 'placeholder'=>'Post Code']) !!}
                </div>
            </div>

        
            <div class="col-md-6 form-group">
                {!! Form::label('workstation', 'WORKSTATION') !!}
                {!! Form::select('workstation', [''=>'Choose From List', 'dhaka'=>'Dhaka', 'chittagong'=>'Chittagong'], null, ['class'=>'form-control select2', 'style'=>'width: 100%;']) !!}
            </div>
            <div class="col-md-6 form-group">
                {!! Form::label('card_collection_point', 'PREFERRED CARD COLLECTION POINT') !!}
                {!! Form::select('card_collection_point', [''=>'Choose From List', 'dhaka'=>'Dhaka', 'chittagong'=>'Chittagong'], null, ['class'=>'form-control select2', 'style'=>'width: 100%;']) !!}
            </div>

            <div class="col-md-6 form-group">
                {!! Form::label('attachment', 'SCAN COPY OF PASSPORT BIO-PAGE OR BOTH SIDES OF NID') !!}
                {!! Form::file('file2', ['class'=>'form-control']) !!}
            </div>
            <div class="col-md-6 form-group">
                {!! Form::label('photo', 'UPLOAD RECENTLY TAKEN PORTRAIT PHOTO') !!}
                {!! Form::file('file1',  ['class'=>'form-control']) !!}
            </div>
</fieldset>

<fieldset>
    <div class="divider"></div>
    
        <div class="col-md-12">
            {!! Form::submit('Submit', ['class'=>'btn-success']) !!}
        </div>
</fieldset>
{!! Form::close() !!}
</div>