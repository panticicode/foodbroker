<!--MODAL-DETAILS-->
<div class="modal fade" id="edit-modal" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header text-center d-block">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title text-center" id="modal-title-edit"></h4>
        </div>
        <div class="modal-body">
            <table id="cartItem" class="table table-striped table-responsive-sm">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Naziv</th>
                    <th>Količina</th>
                    <th>Težina</th>
                    <th>Cena</th>
                    <th>Ukupno</th>
                  </tr>
                </thead>
                <tbody class="content-table">
                    <input id="orderId" type="hidden">
                </tbody>
                <hr>
                <tr>
                  <th>TOTAL</th>
                  <td></td><td></td><td></td><td></td>
                  <td id="totalSum"></td>
                </tr>
            </table>
            <br><hr>
            <h4 class="text-center">PODACI O KUPCU</h4>
            <table id="cartCustomer" class="table table-striped table-sm">
                <thead>
                  <th>#</th>
                  <td id="orderId"></td>
                </thead>
                <tbody>
                  <tr>
                  <th>Ime i Prezime</th>
                  <td id="orderName"></td>
                </tr>
                <tr>
                  <th>Kompanija</th>
                  <td id="orderCompany"></td>
                </tr>
                <tr>
                  <th>Region</th>
                  <td id="orderCountry"></td>
                </tr>
                <tr>
                  <th>Adresa</th>
                  <td id="orderAddress"></td>
                </tr>
                <tr>
                  <th>Stan</th>
                  <td id="orderApartment"></td>
                </tr>
                <tr>
                  <th>Datum isporuke</th>
                  <td id="orderDate">
                  </td>
                </tr>
                <tr>
                  <th>Termin isporuke</th>
                  <td id="orderTime">
                  </td>
                </tr>
                <tr>
                  <th>Grad</th>
                  <td id="orderCity"></td>
                </tr>
                <tr>
                  <th>Postanski broj</th>
                  <td id="orderPostalCode"></td>
                </tr>
                <tr>
                  <th>Telefon</th>
                  <td id="orderPhone"></td>
                </tr>
                <tr>
                  <th>Email</th>
                  <td id="orderEmail"></td>
                </tr>
                <tr>
                  <th>Dodatna pitanja</th>
                  <td id="orderContent"></td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="modal-footer">
            
        </div>
    </div>
  </div>
</div>
<!--MODAL-DETAILS-->

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
      <form id="formDelete" method="POST">
      {{ csrf_field()}}
      {{ method_field('DELETE') }}  
          <input type="hidden" id="del-Id" name="del-Id">
          <div class="modal-body">
              <div class="row">
                  <div class="col-9">
                      <p>
                        Da li zaista želite da obrisete porudžbinu br. <span id="span-id"></span>
                        iz baze podataka
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
