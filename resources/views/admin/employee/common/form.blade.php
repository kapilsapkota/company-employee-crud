<div class="card-body">
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="name">Company*</label>
                {!! Form::select('company_id',$data['companies'] ?? [], null,[
                     'class'=> $errors->has('company_id')?'form-control is-invalid':'form-control',
                     'placeholder'=>'Eg. --SELECT COMPANY--',
                     ]) !!}
                @error('company_id')
                <span class="help-block invalid-feedback">
                     <strong> {{ $message }} </strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="name">First Name*</label>
                {!! Form::text('first_name', null,[
                      'class'=> $errors->has('first_name')?'form-control is-invalid':'form-control',
                      'placeholder'=>'Eg. First Name',
                      ]) !!}
                @error('first_name')
                    <span class="help-block invalid-feedback">
                     <strong> {{ $message }} </strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="name">Last Name*</label>
                {!! Form::text('last_name', null,[
                      'class'=> $errors->has('last_name')?'form-control is-invalid':'form-control',
                      'placeholder'=>'Eg. Last Name',
                      ]) !!}
                @error('last_name')
                <span class="help-block invalid-feedback">
                     <strong> {{ $message }} </strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="name">Email*</label>
                {!! Form::text('email', null,[
                     'class'=> $errors->has('email')?'form-control is-invalid':'form-control',
                     'placeholder'=>'Eg. info@company.com',
                     ]) !!}
                @error('email')
                <span class="help-block invalid-feedback">
                     <strong> {{ $message }} </strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="name">Phone*</label>
                {!! Form::text('phone', null,[
                     'class'=> $errors->has('phone')?'form-control is-invalid':'form-control',
                     'placeholder'=>'Eg. 0456153158',
                     ]) !!}
                @error('phone')
                <span class="help-block invalid-feedback">
                     <strong> {{ $message }} </strong>
                </span>
                @enderror
            </div>
        </div>

    </div>
</div>
<!-- /.card-body -->
<div class="card-footer">
    <button type="submit" class="btn btn-primary">{{$button}}</button>
</div>

@section('formJs')
    <script>
        //javascript here
    </script>
@endsection
