@include('dashboard.modals.products.form')
<script src="{{ asset('js/jquery/jquery.js') }}"></script>
<script>
$(() => {
    //create-modal
    $("#create").click(() => {
        $("#modal-title").text('Kreiraj Proizvod').addClass('text-transform')
        $("#create-modal").modal('show')
        $("#formBtn").text('Kreiraj').addClass('text-transform')
    })
    //edit-modal
    $("body").on("click", "#edit", (evt) =>{

        $("#modal-title-edit").text("Ažuriraj Proizvod").addClass('text-transform')
        $("#edit-modal").modal('show')
        $("#formBtnEdit").text('Ažuriraj')

        let $this = evt.currentTarget,
        $tr = $($this).closest("tr")

        data = $tr.children("td").map(function() {
            return $(this).html()
        }).get()

        //console.log(data)

        $("#productId").val(data[0])
        $("#product-title").val(data[1])
        
        let src = $(data[3]).attr("src")

        $("#productImage").attr("src", src)
        $("#product-price").val(data[4])
        
        if(data[6] == true)
        {
            $("#visibility-value-edit").text("IN STOCK")
            $("#visibilityEdit").removeAttr("checked", "checked")
        }  
        else
        {
            $("#visibility-value-edit").text("OUT OF STOCK")
            $("#visibilityEdit").attr("checked", "checked")
        }

        if(data[7] == true)
        {
            $("#productType-value-edit").text("KOM")
            $("#productTypeEdit").attr("checked", "checked")
        }  
        else
        {
            $("#productType-value-edit").text("KG")
            $("#productTypeEdit").removeAttr("checked", "checked")
        }

        $("#product-description").text(data[8])
		//THIS LINE OF CODE WORKS BUT LINE BELOW NOT I DON't KNOW HOW :)
		$('.categoryEdit option[value='+ data[9] +']').prop('selected',true)	
        //$(".categoryEdit option[value='"+ data[9] +"']").prop("selected",true)

        if($(window).width() > 575)
        {
            $("#edit-modal h4").css("margin-top", "1rem")
        }
        if($(window).width() > 366 && $(window).width() <= 575)
        {
            $("#edit-modal h4").css("margin-top", "0.7rem")
        }
    })
    //delete-modal
    $("body").on("click", "#delete", (evt) => {
        $("#delete-modal").modal('show')
        $("#delete-modal h5").text('Izbriši Proizvod').addClass("text-transform")
        $("#formBtnDelete").text("Izbriši")

        let $this = evt.currentTarget,
        $tr = $($this).closest("tr")

        data = $tr.children("td").map(function() {
            return $(this).html()
        }).get()

        //console.log(data)

        $("#del-Id").val(data[0])
        $("#span-title").text(data[1])
        let src = $(data[3]).attr("src")
        $("#image-Del").attr("src", src)
        $("#formDelete .modal-body p").css("margin-top", "1rem")
    })
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')
        }
    })
    //CREATE-AJAX
    $("#add-form").on("submit", (evt) => {
        evt.preventDefault()
        let $this = evt.currentTarget,
            formData = new FormData($this)

        $("#formBtn").text('Sending...')

        $.ajax({
            type: 'POST',
            url: "{{ route('products.store') }}",
            // data: $("#add-form").serialize(),
            data: formData,
            cache:false,
            contentType: false,
            processData: false,
            success: (res) => {
                $("#formBtn").text('Created')
                //console.log(res)

                let selected = $(".category option:selected").val()
                    if(res.product.visibility)
                    {
                        visibility = "DA"
                    }
                    else
                    {
                        visibility = "NE"
                    }

                let tr = `
                  <tr id="row_${res.product.id}">
                        <td>${res.product.id}</td>
                        <td>${res.product.title}</td>
                        <td>${res.categories[selected].title}</td>
                        <td>
                            <img class="img-fluid" src="/images/products/${res.product.image}" style="max-width:50px;">
                        </td>
                        <td>${res.product.price}</td>
                        <td>${visibility}</td>
						<td style="display:none">${res.product.visibility}</td>
                        <td style="display:none">${res.product.quantity}</td>
                        <td style="display:none">${res.product.description}</td>
                        <td style="display:none">${res.product.cat_id - 1}</td>
                        <td>
                           <a id="edit" href="javascript:void(0)" class="btn btn-outline-success btn-sm rounded-3">
                           <i class="fas fa-edit"></i>
                           </a>
                            <a id="delete" href="javascript:void(0)" class="btn btn-outline-danger btn-sm rounded-3">
                           <i class="fas fa-trash-alt"></i>
                           </a>
                        </td>
                  </tr>  
                `
                setTimeout(() => {
                  $("#create-modal").modal('hide')
                  $(".alert-success").show()
                  $(".alert-success").html(res.create)
                  $(".alert-success").fadeOut(2000)
                }, 500)

                $("#add-form").trigger("reset")

                $('.content-table').append(tr)
                // location.reload()
            },
            error: (err) => {
                console.log(err)
            }  
        })
    })
    //EDIT-AJAX
    $("#formEdit").on("submit", (evt) => {
        evt.preventDefault()
        let id = $("#productId").val()
            $this = evt.currentTarget

        var formData = new FormData($this)

        $("#formBtnEdit").text('Sending..')
        $.ajax({
            type: 'POST',
            url: "{{ url('dashboard/products') }}/" + id,
            // data: $("#formEdit").serialize(),
            data: formData,
            cache:false,
            contentType: false,
            processData: false,
            success: (res) => {
                $("#formBtnEdit").text('Updated')
                //console.log(res)
                let selected = $(".categoryEdit option:selected").val()
                    if(res.product.visibility)
                    {
                        visibility = "DA"
                    }
                    else
                    {
                        visibility = "NE"
                    }
                let tr = `
                  <tr id="row_${res.product.id}">
                        <td>${res.product.id}</td>
                        <td>${res.product.title}</td>
                        <td>${res.categories[selected].title}</td>
                        <td>
                            <img class="img-fluid" src="/images/products/${res.product.image}" style="max-width:50px;">
                        </td>
                        <td>${res.product.price}</td>
                        <td>${visibility}</td>
						<td style="display:none">${res.product.visibility}</td>
                        <td style="display:none">${res.product.quantity}</td>
                        <td style="display:none">${res.product.description}</td>
                        <td style="display:none">${res.product.cat_id - 1}</td>
                        <td>
                           <a id="edit" href="javascript:void(0)" class="btn btn-outline-success btn-sm rounded-3">
                           <i class="fas fa-edit"></i>
                           </a>
                            <a id="delete" href="javascript:void(0)" class="btn btn-outline-danger btn-sm rounded-3">
                           <i class="fas fa-trash-alt"></i>
                           </a>
                        </td>
                  </tr>  
                `
                //console.log(res)
                $("#formEdit").trigger("reset")

                $("#row_" + res.product.id).replaceWith(tr)

                setTimeout(() => {
                  $("#edit-modal").modal('hide')
                  $(".alert-info").show()
                  $(".alert-info").html(res.edit)
                  $(".alert-info").fadeOut(2000)
                }, 500)
                // location.reload()
            },
            error: (err) => {
                console.log(err)
            }  
        })
    })
    //DELETE-AJAX
    $("#formDelete").on("submit", (evt) => {
        evt.preventDefault()

        let $this = evt.currentTarget,
            id = $("#del-Id").val(),
            formData = new FormData($this)

        $("#formBtnDelete").text("Sending..")

        $.ajax({
            type: "DELETE",
            url: "{{ url('dashboard/products') }}/" + id,
            data: $("#formDelete").serialize(),
            success: (res) => {
                $("#formBtnDelete").text("Deleted")
                $("#row_" + id).remove()
                //console.log(res)
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
