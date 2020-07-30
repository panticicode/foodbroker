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
                        {{ __(strtoupper('Naziv')) }}
                    </label>
                  </div>
                  <div class="col-md-9">
                      <input type="text" name="title" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" id="inputType1" value="{{ old('title') }}" required>
                      @if($errors->has('title'))
                      <div class="invalid-feedback">
                         {{ $errors->first('title') }}
                      </div>
                      @endif
                  </div>
              </div>
              <div class="form-group row">
                  <div class="col-md-3">
                     <label for="inputType4">
                    {{ __(strtoupper('Kategorija')) }}
                     </label>
                  </div>
                  <div class="col-md-9">
                    <select name="category" class="form-control {{ $errors->has('category') ? 'is-invalid' : '' }} category" id="inputType4" required>
                      <option value="">
                        Izaberite kategoriju
                      </option>
                      @foreach($categories as $category)
                      <option value="{{ $category->id - 1 }}">
                        {{ $category->title }}
                      </option>
                      @endforeach
                    </select>
                      @if($errors->has('category'))
                      <div class="invalid-feedback">
                         {{ $errors->first('category') }}
                      </div>
                   @endif
                  </div>
              </div>
              <div class="form-group row">
                  <div class="col-md-3">
                      <label for="inputType2" class=" col-form-label">
                      {{ __(strtoupper('Cena')) }}
                      </label>
                  </div>
                  <div class="col-md-9">
                      <input type="number" name="price" class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" id="inputType2" value="{{ old('price') }}" required>
                      @if($errors->has('price'))
                      <div class="invalid-feedback">
                        {{ $errors->first('price') }}
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
                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                        <input type="file" name="image" class="custom-file-input {{ $errors->has('image') ? 'is-invalid' : '' }}" id="inputGroupFile01" required>
                        @if($errors->has('image'))
                        <div class="invalid-feedback">
                            {{ $errors->first('image') }}
                        </div>
                        @endif
                      </div>
                  </div>
              </div>
              <div class="form-group row">
                <!-- <div class="col-1"></div> -->
                <div class="col-md-1 col-3">
                  {{ __(strtoupper('Stock')) }}
                </div>  
                <div class="col-md-1 col-3"></div>
                <div class="col-md-4 col-6">
                  <div class="custom-control custom-checkbox custom-control-inline" style="position: absolute;">
                      <input type="checkbox" name="visibility" class="custom-control-input {{ $errors->has('visibility') ? 'is-invalid' : '' }}" id="visibility" value="IN STOCK" style="position: relative;">
                      <label class="custom-control-label" for="visibility">
                        <div id="visibility-value"></div>
                      </label>
                      @if($errors->has('visibility'))
                      <div class="invalid-feedback">
                         {{ $errors->first('visibility') }}
                      </div>
                      @endif
                  </div>
                </div>
                <div class="col-md-4 col-6">
                  {{ __(strtoupper('Tip proizvoda')) }}
                </div>
                <div class="col-md-1 col-2">
                  <div class="custom-control custom-checkbox custom-control-inline ab-left" style="position: absolute;">
                      <input type="checkbox" name="productType" class="custom-control-input {{ $errors->has('productType') ? 'is-invalid' : '' }}" id="productType" value="KG" style="position: relative;">
                      <label class="custom-control-label" for="productType">
                        <div id="productType-value"></div>
                      </label>
                      @if($errors->has('productType'))
                      <div class="invalid-feedback">
                          {{ $errors->first('productType') }}
                      </div>
                      @endif
                  </div>
                </div>
              </div>
              <div class="form-group row">
                  <div class="col-md-3">
                     <label for="description">
                    {{ __(strtoupper('Opis')) }}
                     </label>
                  </div>
                  <div class="col-md-9">
                     <textarea name="description" id="description" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }} z-depth-1" rows="7"required>{{ old('description') }}</textarea>
                     @if($errors->has('description'))
                     <div class="invalid-feedback">
                       {{ $errors->first('description') }}
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
            <img id="productImage" class="img-fluid" src="" alt="" style="max-width: 120px" data-dismiss="modal">
        </div>
        <div class="modal-body">
            <form id="formEdit" method="post" name="formEdit" class="form-horizontal" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PUT') }}  
                <input type="hidden" name="productId" id="productId">
                <div class="form-group row">
                    <div class="col-md-3">
                      <label for="product-title" class="col-form-label">
                          {{ __(strtoupper('Naziv')) }}
                      </label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="title" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" id="product-title" value="{{ old('title') }}">
                        @if($errors->has('title'))
                        <div class="invalid-feedback">
                           {{ $errors->first('title') }}
                        </div>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                       <label for="product-category">
                      {{ __(strtoupper('Kategorija')) }}
                       </label>
                    </div>
                    <div class="col-md-9">
                      <select name="category" class="form-control {{ $errors->has('category') ? 'is-invalid' : '' }} categoryEdit">
                        @foreach($categories as $category)
                        <option id="productIdOption" value="{{ $category->id - 1 }}">
                          {{ $category->title }}
                        </option>
                        @endforeach
                      </select>
                        @if($errors->has('category'))
                        <div class="invalid-feedback">
                           {{ $errors->first('category') }}
                        </div>
                     @endif
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                        <label for="product-price" class=" col-form-label">
                        {{ __(strtoupper('Cena')) }}
                        </label>
                    </div>
                    <div class="col-md-9">
                        <input type="number" name="price" class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" id="product-price" value="{{ old('price') }}" >
                        @if($errors->has('price'))
                        <div class="invalid-feedback">
                          {{ $errors->first('price') }}
                        </div>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <div class="form-group col-md-3">
                      <label for="product-image">
                      {{ __(strtoupper('Slika')) }}
                      </label>
                    </div>
                    <div class="input-group col-md-9">
                        <div class="custom-file">
                          <label class="custom-file-label" for="product-image">Choose file</label>
                          <input type="file" name="image" class="custom-file-input {{ $errors->has('image') ? 'is-invalid' : '' }}" id="product-image">
                          @if($errors->has('image'))
                          <div class="invalid-feedback">
                              {{ $errors->first('image') }}
                          </div>
                          @endif
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                  <!-- <div class="col-1"></div> -->
                  <div class="col-md-1 col-3">
                    {{ __(strtoupper('Stock')) }}
                  </div>  
                  <div class="col-md-1 col-3"></div>
                  <div class="col-md-4 col-6">
                    <div class="custom-control custom-checkbox custom-control-inline" style="position: absolute;">
                        <input type="checkbox" name="visibility" class="custom-control-input {{ $errors->has('visibility') ? 'is-invalid' : '' }}" id="visibilityEdit" value="" style="position: relative;">
                        <label class="custom-control-label" for="visibilityEdit">
                          <div id="visibility-value-edit"></div>
                        </label>
                        @if($errors->has('visibility'))
                        <div class="invalid-feedback">
                           {{ $errors->first('visibility') }}
                        </div>
                        @endif
                    </div>
                  </div>
                  <div class="col-md-4 col-6">
                    {{ __(strtoupper('Tip proizvoda')) }}
                  </div>
                  <div class="col-md-1 col-2">
                    <div class="custom-control custom-checkbox custom-control-inline ab-left" style="position: absolute;">
                        <input type="checkbox" name="productType" class="custom-control-input {{ $errors->has('productType') ? 'is-invalid' : '' }}" id="productTypeEdit" value="KG" style="position: relative;">
                        <label class="custom-control-label" for="productTypeEdit">
                          <div id="productType-value-edit"></div>
                        </label>
                        @if($errors->has('productType'))
                        <div class="invalid-feedback">
                            {{ $errors->first('productType') }}
                        </div>
                        @endif
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                       <label for="description">
                      {{ __(strtoupper('Opis')) }}
                       </label>
                    </div>
                    <div class="col-md-9">
                       <textarea name="description" id="product-description" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }} z-depth-1" rows="7">{{ old('description') }}</textarea>
                       @if($errors->has('description'))
                       <div class="invalid-feedback">
                         {{ $errors->first('description') }}
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
      <form id="formDelete" enctype="multipart/form-data">
          <input type="hidden" id="del-Id" name="del-Id">
          <div class="modal-body">
              <div class="row">
                  <img id="image-Del" class="img-fluid" src="" alt="" style="max-width: 120px">
                  <div class="col-9">
                      <p>
                        Da li zaista želite da obrisete <span id="span-title"></span>
                        proizvod iz baze podataka
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
@section('script')
<script>
$(() => {
  if($(window).width() > 767)
  {
    $(".ab-left").css("left", "2%")
  }
  //CREATE GET VALUE
  $('#visibility-value').text($('#visibility').val())
  $('#productType-value').text($('#productType').val())
  //EDIT GET VALUE
  $('#visibility-value-edit').text($('#visibilityEdit').val())
  $('#productType-value-edit').text($('#productTypeEdit').val())

  //CREATE CHANGE VALUE
  $("#visibility").on('change', (evt) => {
    if($(evt.currentTarget).is(':checked')) 
    {
      $(evt.currentTarget).attr('value', 'OUT OF STOCK')
    } 
    else
    {
      $(evt.currentTarget).attr('value', 'IN STOCK')
    }
      $('#visibility-value').text($('#visibility').val())
  })
  $("#productType").on('change', (evt) => {
      if($(evt.currentTarget).is(':checked')) 
      {
      $(evt.currentTarget).attr('value', 'KOM')
    } 
    else
    {
        $(evt.currentTarget).attr('value', 'KG')
      }
      $('#productType-value').text($('#productType').val())
  }) 

  //EDIT CHANGE VALUE
  $("#visibilityEdit").on('change', (evt) => {
    if($(evt.currentTarget).is(':checked')) 
    {
      $(evt.currentTarget).attr('value', 'OUT OF STOCK')
    } 
    else
    {
      $(evt.currentTarget).attr('value', 'IN STOCK')
    }
      $('#visibility-value-edit').text($('#visibilityEdit').val())
  })
  $("#productTypeEdit").on('change', (evt) => {
    if($(evt.currentTarget).is(':checked')) 
    {
      $(evt.currentTarget).attr('value', 'KOM')
    } 
    else
    {
      $(evt.currentTarget).attr('value', 'KG')
    }
      $('#productType-value-edit').text($('#productTypeEdit').val())
  }) 
})
</script>
@endsection



