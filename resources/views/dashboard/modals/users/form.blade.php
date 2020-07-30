<!--MODAL- CREATE-->
<div class="modal fade" id="create-modal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="modal-title"></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form id="add-form" name="add-form" class="form-horizontal" enctype="multipart/form-data">
                <div class="form-group row">
                    <div class="col-md-3">
                        <label for="inputType1" class="col-form-label">
                        {{ __(strtoupper('Ime i Prezime')) }}
                        </label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="inputType1" value="{{ old('name') }}">
                        @if($errors->has('name'))
                        <div class="invalid-feedback">
                           {{ $errors->first('name') }}
                        </div>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                        <label for="inputType2" class=" col-form-label">
                        {{ __(strtoupper('Email')) }}
                        </label>
                    </div>
                    <div class="col-md-9">
                        <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="inputType2" value="{{ old('email') }}" >
                        @if($errors->has('email'))
                        <div class="invalid-feedback">
                          {{ $errors->first('email') }}
                        </div>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                        <label for="inputType4">
                        {{ __(strtoupper('Lozinka')) }}
                        </label>
                    </div>
                    <div class="col-md-9">
                       <input type="password" name="password" id="inputType4" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}">
                       @if($errors->has('password'))
                       <div class="invalid-feedback">
                         {{ $errors->first('password') }}
                       </div>
                       @endif
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                        <label for="inputType13">
                        {{ __(strtoupper('Telefon')) }}
                        </label>
                    </div>
                    <div class="col-md-9">
                       <input type="text" name="phone" id="inputType13" class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" value="{{ old('phone') }}">
                       @if($errors->has('phone'))
                       <div class="invalid-feedback">
                         {{ $errors->first('phone') }}
                       </div>
                       @endif
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                        <label for="inputType24">
                        {{ __(strtoupper('Privilegije')) }}
                        </label>
                    </div>
                    <div class="col-md-9">
                        <select name="role_id" class="form-control role" id="inputType24">
                          @foreach($roles as $role)
                          <option value="{{ $role->id }}">
                            {{ $role->name }}
                          </option>
                          @endforeach
                        </select>
                        @if($errors->has('role'))
                        <div class="invalid-feedback">
                           {{ $errors->first('role') }}
                        </div>
                     @endif
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <button id="formBtn" class="btn btn-success btn-block">
                          
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            
        </div>
    </div>
  </div>
</div>
<!--MODAL-CREATE-->
<!--MODAL- EDIT-->
<div class="modal fade" id="edit-modal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="modal-title-edit"></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form id="formEdit" method="POST" name="formEdit" class="form-horizontal">
            {{ csrf_field() }}
            {{ method_field('PUT') }}  
                <input type="hidden" name="userId" id="userId">
                <div class="form-group row">
                    <div class="col-md-3">
                        <label for="userName" class="col-form-label">
                        {{ __(strtoupper('Ime i Prezime')) }}
                        </label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="userName" value="{{ old('name') }}">
                        @if($errors->has('name'))
                        <div class="invalid-feedback">
                           {{ $errors->first('name') }}
                        </div>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                        <label for="userEmail" class=" col-form-label">
                        {{ __(strtoupper('Email')) }}
                        </label>
                    </div>
                    <div class="col-md-9">
                        <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="userEmail" value="{{ old('email') }}" >
                        @if($errors->has('email'))
                        <div class="invalid-feedback">
                          {{ $errors->first('email') }}
                        </div>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                        <label for="userPassword">
                        {{ __(strtoupper('Lozinka')) }}
                        </label>
                    </div>
                    <div class="col-md-9">
                       <input type="password" name="password" id="userPassword" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}">
                       @if($errors->has('password'))
                       <div class="invalid-feedback">
                         {{ $errors->first('password') }}
                       </div>
                       @endif
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                        <label for="userPhone">
                        {{ __(strtoupper('Telefon')) }}
                        </label>
                    </div>
                    <div class="col-md-9">
                       <input type="text" name="phone" id="userPhone" class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" value="{{ old('phone') }}">
                       @if($errors->has('phone'))
                       <div class="invalid-feedback">
                         {{ $errors->first('phone') }}
                       </div>
                       @endif
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                        <label for="userRole">
                        {{ __(strtoupper('Privilegije')) }}
                        </label>
                    </div>
                    <div class="col-md-9">
                        <select name="role_id" class="form-control roleEdit" id="userRole">
                          @foreach($roles as $role)
                          <option value="{{ $role->id }}">
                            {{ $role->name }}
                          </option>
                          @endforeach
                        </select>
                        @if($errors->has('role'))
                        <div class="invalid-feedback">
                           {{ $errors->first('role') }}
                        </div>
                     @endif
                    </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                      <button id="formBtnEdit" class="btn btn-success btn-block">
                        
                      </button>
                  </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            
        </div>
    </div>
  </div>
</div>
<!--MODAL-EDIT-->
<!--MODAL_DELETE-->
<div id="delete-modal" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="formDelete" method="post">
        {{ csrf_field() }}
        {{ method_field('delete') }}
          <input type="hidden" id="del-Id" name="del-Id">
          <div class="modal-body">
              <div class="row">
                  <div class="col-9">
                      <p>
                        Da li zaista želite da obrisete <span id="span-title"></span>
                        korisnika iz baze podataka
                      </p>
                  </div>
              </div>  
          </div>
          <div class="modal-footer">
              <button id="formBtnDelete" type="submit" class="btn btn-danger"></button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Zatvori</button>
          </div>
      </form>
    </div>
  </div>
</div>
<!--MODAL_DELETE-->



