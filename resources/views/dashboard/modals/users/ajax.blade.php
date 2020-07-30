@include('dashboard.modals.users.form')
<script src="{{ asset('js/jquery/jquery.js') }}"></script>
<script>
$(() => {
    //create-modal
    $("#create").click(() => {
        $("#modal-title").text('Kreiraj Korisnika').addClass('text-transform')
        $("#create-modal").modal('show')
        $("#formBtn").text('Kreiraj').addClass('text-transform')

        // alert($(".role option:selected").val())
    })
    //edit-modal
    $("body").on("click", "#edit", (evt) =>{
        $("#modal-title-edit").text("Ažuriraj Korisnika").addClass('text-transform')
        $("#edit-modal").modal('show')
        $("#formBtnEdit").text('Ažuriraj')

        let $this = evt.currentTarget,
        $tr = $($this).closest("tr")

        data = $tr.children("td").map(function() {
            return $(this).text()
        }).get()

        //console.log(data)

        $("#userId").val(data[0])
        $("#userName").val(data[1])
        $("#userEmail").val(data[2])
        $("#userPhone").val(data[3])
        
        $("#userRole option[value='"+ data[5] +"']").attr("selected",true)

        // let src = $(".img-fluid").attr("src")
        // $("#cat-image").attr("src", src)
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
        $("#delete-modal h5").text('Izbriši Korisnika').addClass("text-transform")
        $("#formBtnDelete").text("Izbriši")

        let $this = evt.currentTarget,
        $tr = $($this).closest("tr")

        data = $tr.children("td").map(function() {
            return $(this).text()
        }).get()

        //console.log(data)

        $("#del-Id").val(data[0])
        $("#span-title").text(data[1])
        
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
            url: "{{ route('users.store') }}",
            // data: $("#add-form").serialize(),
            data: formData,
            cache:false,
            contentType: false,
            processData: false,
            success: (res) => {
                $("#formBtn").text('Created')
                //console.log(res)
                let selected = $(".role option:selected").val()

                let tr = `
                  <tr id="row_${res.user.id}">
                        <td>${res.user.id}</td>
                        <td>${res.user.name}</td>
                        <td>${res.user.email}</td>
                        <td>${res.user.phone}</td>
                        <td>${res.userRoles[selected - 1].name}</td>
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
        let id = $("#userId").val()
            $this = evt.currentTarget

        var formData = new FormData($this)

        $("#formBtnEdit").text('Sending..')
        $.ajax({
            type: 'POST',
            url: "{{ url('dashboard/users') }}/" + id,
            // data: $("#formEdit").serialize(),
            data: formData,
            cache:false,
            contentType: false,
            processData: false,
            success: (res) => {
                $("#formBtnEdit").text('Updated')
                // console.log(res)
                let selected = $(".roleEdit option:selected").val()

                let tr = `
                  <tr id="row_${res.user.userId}">
                        <td>${res.user.userId}</td>
                        <td>${res.user.name}</td>
                        <td>${res.user.email}</td>
                        <td>${res.user.phone}</td>
                        <td>${res.userRoles[selected - 1].name}</td>
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
                // alert(selected)
                $("#row_" + res.user.userId).replaceWith(tr)

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
            type: "POST",
            url: "{{ url('dashboard/users') }}/" + id,
            // data: $("#formDelete").serialize(),
            data: formData,
            cache:false,
            contentType: false,
            processData: false,
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
