@include('dashboard.modals.categories.form')
<script src="{{ asset('js/jquery/jquery.js') }}"></script>
<script>
$(() => {
    //create-modal
    $("#create").click(() => {
        $("#modal-title").text('Kreiraj Kategoriju').addClass('text-transform')
        $("#create-modal").modal('show')
        $("#formBtn").text('Kreiraj').addClass('text-transform')
    })
    //edit-modal
    $("body").on("click", "#edit", (evt) =>{
        $("#modal-title-edit").text("Ažuriraj Kategoriju").addClass('text-transform')
        $("#edit-modal").modal('show')
        $("#formBtnEdit").val('Update')

        let $this = evt.currentTarget,
        $tr = $($this).closest("tr")

        data = $tr.children("td").map(function() {
            return $(this).text()
        }).get()

        console.log(data)

        $("#catId").val(data[0])
        $("#cat-name").val(data[1])
        let src = $(".img-fluid").attr("src")
        $("#cat-image").attr("src", src)
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
        $("#delete-modal h5").text('Izbriši Kategoriju').addClass("text-transform")
        $("#formBtnDelete").text("Izbriši")

        let $this = evt.currentTarget,
        $tr = $($this).closest("tr")

        data = $tr.children("td").map(function() {
            return $(this).text()
        }).get()

        console.log(data)

        $("#del-Id").val(data[0])
        $("#span-title").text(data[1])
        let src = $(".img-fluid").attr("src")
        $("#cat-image-Del").attr("src", src)
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
        let $this = evt.currentTarget

        $("#formBtn").text('Sending...')

        var formData = new FormData($this)

        $.ajax({
            type: 'POST',
            url: "{{ route('categories.store') }}",
            // data: $("#add-form").serialize(),
            data: formData,
            cache:false,
            contentType: false,
            processData: false,
            success: (res) => {
                $("#formBtn").text('Created')
                console.log(res)

                let tr = `
                  <tr id="row_${res.category.id}">
                        <td>${res.category.id}</td>
                        <td>${res.category.title}</td>
                        <td>
                            <img class="img-fluid" src="/images/categories/${res.category.image}" style="max-width:50px;">
                        </td>
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
        let id = $("#catId").val()
            $this = evt.currentTarget

        var formData = new FormData($this)

        $("#formBtnEdit").text('Sending..')
        $.ajax({
            type: 'POST',
            url: "{{ url('dashboard/categories') }}/" + id,
            // data: $("#formEdit").serialize(),
            data: formData,
            cache:false,
            contentType: false,
            processData: false,
            success: (res) => {
                $("#formBtnEdit").text('Updated')
                let tr = `
                  <tr id="row_${res.category.id}">
                        <td>${res.category.id}</td>
                        <td>${res.category.title}</td>
                        <td>
                            <img class="img-fluid" src="/images/categories/${res.category.image}" style="max-width:50px;">
                        </td>
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
                console.log(res)
                $("#row_" + res.category.id).replaceWith(tr)

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
            url: "{{ url('dashboard/categories') }}/" + id,
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
