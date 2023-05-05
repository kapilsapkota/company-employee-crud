<div class="card-body">
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="name">Name*</label>
                {!! Form::text('name', null,[
                      'class'=> $errors->has('name')?'form-control is-invalid':'form-control',
                      'placeholder'=>'Eg. Company Name',
                      ]) !!}
                @error('name')
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
                <label for="name">Website*</label>
                {!! Form::url('website', null,[
                     'class'=> $errors->has('website')?'form-control is-invalid':'form-control',
                     'placeholder'=>'Eg. https://sapkotakapil.com.np',
                     ]) !!}
                @error('website')
                <span class="help-block invalid-feedback">
                     <strong> {{ $message }} </strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="col-md-12">
            <div class="card card-gray-dark">
                <div class="card-header">
                    Logo
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="photo_upload">Upload Logo</label>
                            {!! Form::file('main_image',[
                                'class'=> $errors->has('main_image')?'form-control btn btn-sm is-invalid':'form-control btn btn-sm',
                                'id'=>'photo',
                                'onchange'=>"showPreview(event);",
                                'accept'=>'image/png, image/gif, image/jpeg'
                             ]) !!}
                            @error('main_image')
                            <span class="help-block invalid-feedback">
                                    <strong> {{ $message }} </strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="photo">Existing Logo</label>
                            <div>
                                <img style="max-height: 200px; width: 150px" src="{{ ViewHelper::getImagePath(@$_folder,@$data['row']->photo) }}" id="file-ip-1-preview">
                            </div>
                        </div>
                    </div>
                </div>
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
        function showPreview(event){
            if(event.target.files.length > 0){
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("file-ip-1-preview");
                var photo = document.getElementById("photo");
                preview.src = src;
                photo.value=src;
                preview.style.display = "block";

            }
        }
    </script>
@endsection
