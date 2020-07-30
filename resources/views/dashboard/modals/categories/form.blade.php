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
                      <label for="name" class="col-form-label">
                          {{ __(strtoupper('Naziv')) }}
                      </label>
                    </div>
                    <div class="col-md-9">
                        <input id="name" type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ old('name') }}" required>
                        @if($errors->has('name'))
                        <div class="invalid-feedback">
                           {{ $errors->first('name') }}
                        </div>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <div class="form-group col-md-3">
                      <label for="image">
                      {{ __(strtoupper('Slika')) }}
                      </label>
                    </div>
                    <div class="input-group col-md-9">
                        <div class="custom-file">
                          <label class="custom-file-label" for="image"></label>
                          <input type="file" name="image" class="custom-file-input {{ $errors->has('image') ? 'is-invalid' : '' }}" id="image" required>
                          @if($errors->has('image'))
                          <div class="invalid-feedback">
                              {{ $errors->first('image') }}
                          </div>
                          @endif
                        </div>
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
            <img id="cat-image" class="img-fluid" src="" alt="" style="max-width: 120px" data-dismiss="modal">
        </div>
        <div class="modal-body">
            <form id="formEdit" method="post" name="formEdit" class="form-horizontal" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PUT') }}  
                <input type="hidden" name="catId" id="catId">
                <div class="form-group row">
                    <div class="col-md-3">
                        <label for="name" class="col-form-label">
                          {{ __(strtoupper('Naziv')) }}
                      </label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="cat-name" value="{{ old('name') }}">
                        @if($errors->has('name'))
                        <div class="invalid-feedback">
                           {{ $errors->first('name') }}
                        </div>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                  <div class="form-group col-md-3">
                    <label for="image">
                    {{ __(strtoupper('Slika')) }}
                    </label>
                  </div>
                  <div class="input-group col-md-9">
                      <div class="custom-file">
                        <label class="custom-file-label" for="cat-image">Choose file</label>
                        <input type="file" name="image" class="custom-file-input {{ $errors->has('image') ? 'is-invalid' : '' }}" id="cat-image">
                        @if($errors->has('image'))
                          <div class="invalid-feedback">
                              {{ $errors->first('image') }}
                          </div>
                        @endif
                      </div>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                      <button id="formBtnEdit" class="btn btn-success btn-block">
                        Ažuriraj
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
      <form id="formDelete" enctype="multipart/form-data">
          <input type="hidden" id="del-Id" name="del-Id">
          <div class="modal-body">
              <div class="row">
                  <img id="cat-image-Del" class="img-fluid" src="" alt="" style="max-width: 120px">
                  <div class="col-9">
                      <p>
                        Da li zaista želite da obrisete <span id="span-title"></span>
                        kategoriju iz baze podataka
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



