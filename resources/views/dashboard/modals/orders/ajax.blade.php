@include('dashboard.modals.orders.form')
<script src="{{ asset('js/jquery/jquery.js') }}"></script>
<script>
$(() => {
    //DETAILS-MODAL
    $("body").on("click", "#edit", (evt) =>{
        $("#modal-title-edit").text("Podaci o porudžbini").addClass('text-transform')
        $("#edit-modal").modal('show')
        $("#cartCustomer").hide()

        let $this = evt.currentTarget,
        $tr = $($this).closest("tr")

        data = $tr.children("td").map(function() {
            return $(this).html()
        }).get()

        //console.log(data)

        $("#orderId").val(data[0])
        $("#orderName").text(data[1])
        $("#orderEmail").text(data[2])
        $("#orderCity").text(data[3])
        $("#orderAddress").text(data[4])
        $("#orderPhone").text(data[5])
        $("#orderDate").text(data[6] + '2020')
        $("#orderTime").text(data[7])
        $("#orderCountry").text(data[8])
        $("#orderCompany").text(data[9])
        $("#orderApartment").text(data[10])
        $("#orderPostalCode").text(data[11])
        $("#orderUserId").val(data[12])
        $("#orderContent").text(data[13])
        
        if($(window).width() > 575)
        {
            $("#edit-modal h4").css("margin-top", "1rem")
        }
        if($(window).width() > 366 && $(window).width() <= 575)
        {
            $("#edit-modal h4").css("margin-top", "0.7rem")
        }
        /**AJAX TEST**/
        let id = $("#orderId").val()
            $this = evt.currentTarget

        // var formData = new FormData($this)

        /**DETAILS-AJAX**/
        $.ajax({
            type: 'GET',
            url: "{{ url('dashboard/orders/details') }}/" + id,
            data: $("#cartItem").serialize(),
            // data: formData,
            cache:false,
            contentType: false,
            processData: false,
            success: (res) => {
                let sum = 0
                $.each(res.carts, (i, cart) =>{
                //console.log(cart)  
                
                let qty = cart.qty !== true && cart.weight > 0 ? '/' :  cart.qty + ' ' + 'kom',
                    weight = !cart.weight ? '/' : cart.weight + ' ' + 'kg'  

                    if(data = qty) data = cart.weight
                             
                    if(cart.weight == 0) data = cart.qty
                    // alert(data)
                let total = cart.price * data,
                    // var sum = sum + Number(total),
                    tr = `
                    <tr id="rowAppend_${cart.id}">
                        <td>${cart.id}</td>
                        <td>${cart.name}</td>
                        <td>${qty}</td>
                        <td>${weight}</td>
                        <td>${cart.price} RSD</td>
                        <td>${total} RSD</td>
                    </tr>           
                    `
                    $(".content-table").append(tr)

                    sum += total

                    $(".close").on("click", () => {
                        $("#rowAppend_" + cart.id).remove()
                    })
                    
                })
                
                $("#totalSum").text(sum + " RSD")
                setTimeout(() => {
                  $("#cartCustomer").fadeIn(350)
                }, 150)

                // location.reload()
            },
            error: (err) => {
                console.log(err)
            }  
        })
        /**DETAILS-AJAX**/
    })
    //DETAILS-MODAL

    //DELETE-MODAL
    $("body").on("click", "#delete", (evt) => {
        $("#delete-modal").modal('show')
        $("#delete-modal h5").text('Izbriši Porudžbinu').addClass("text-transform")
        $("#formBtnDelete").text("Izbriši")

        let $this = evt.currentTarget,
        $tr = $($this).closest("tr")

        data = $tr.children("td").map(function() {
            return $(this).text()
        }).get()

        console.log(data)

        $("#del-Id").val(data[0])
        $("#span-id").text(data[0])
        $("#formDelete .modal-body p").css("margin-top", "1rem")
    })
    //DELETE-MODAL

    //DELETE-AJAX
    $("#formDelete").on("submit", (evt) => {
        evt.preventDefault()

        let $this = evt.currentTarget,
            id = $("#del-Id").val(),
            formData = new FormData($this)

        $("#formBtnDelete").text("Sending..")

        $.ajax({
            type: "DELETE",
            url: "{{ url('dashboard/orders') }}/" + id,
            data: $("#formDelete").serialize(),
            success: (res) => {
                $("#formBtnDelete").text("Deleted")
                $("#row_" + id).remove()
                console.log(res)
                setTimeout(() => {
                  $("#delete-modal").modal('hide')
                  $(".alert-danger").show()
                  $(".alert-danger").html(res.danger)
                  $(".alert-danger").fadeOut(1500)
                }, 500)
            },
            error: (err) => {
                console.log(err)
            }
        })
    })
})   
</script>
