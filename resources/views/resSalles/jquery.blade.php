




<script type="text/javascript">
    // $.ajaxSetup({
    // headers: {
    //     'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
    // }
    // });

// ---------------view data ------------
function allData() {
    $.ajax({
        type: "GET",
        dataType: "json",
        url: "/reservations-salles/allData",
        success: function(response) {
            var data = ""
            $.each(response, function(key, value) {
                data = data + "<tr>"
                data = data + "<td>" + value.id + "</td>"
                data = data + "<td>" + value.client_id + "</td>"
                data = data + "<td>" + value.salle_id + "</td>"
                data = data + "<td>" + value.dateres + "</td>"
                data = data + "<td>" + value.datedebut + "</td>"
                data = data + "<td>" + value.datefin + "</td>"
                data = data + "<td>" + value.salles_pr_id + "</td>"
                data = data + "<td>" + value.salles_ps_id + "</td>"
                if(value.salles_pr_id && !value.salles_ps_id){
                    data = data + "<td>" + (Math.floor(((new Date(value.datefin)) - (new Date(value.datedebut))) / (1000 * 60 * 60 * 24)))*(value.salles_pr_id) + "</td>"
                }
                else if(!value.salles_pr_id && value.salles_ps_id){
                    data = data + "<td>" + (Math.floor(((new Date(value.datefin)) - (new Date(value.datedebut))) / (1000 * 60 * 60 * 24)))*(value.salles_ps_id) + "</td>"
                }
                else if(!value.salles_pr_id && !value.salles_ps_id){
                    data = data + "<td>null</td>"
                }
                else{
                    data = data + "<td>" + (Math.floor(((new Date(value.datefin)) - (new Date(value.datedebut))) / (1000 * 60 * 60 * 24)))*(value.salles_pr_id) + "</td>"
                }

                data = data + "<td>" + value.payement + "</td>"
                data = data + "<td>" + value.statut + "</td>"
                data = data + "<td>"
                data = data + "<div class='actions text-center'>"
                <?php if((Auth::user()->hasDirectPermission("modifier"))  && (Auth::user()->hasRole(["admin","superadmin","manager"]))){ ?>
                    data = data + "<i class='ft-edit mr-1' style='color: rgba(50, 162, 50, 0.8);' data-toggle='modal' data-target='#exampleModalEdit' onclick='editData(" +
                    value.id + ")'></i>"
                <?php } else { ?>
                    data = data + "<i class='ft-edit mr-1' style='color: rgba(50, 162, 50, 0.8);'></i>"
                <?php } ?>
                <?php if((Auth::user()->hasDirectPermission("lire"))  && (Auth::user()->hasRole(["admin","superadmin","manager"]))){ ?>
                    data = data + "<a href="+'/reservations-salles/facture/' + value.id +"><i class='fa-solid fa-eye me-1' style='color: #2e612e!important;'></i></a>"
                <?php } ?>
                <?php if(Auth::user()->hasRole(["admin","superadmin"])){ ?>
                    data = data + "<i class='ft-trash-2 danger' onclick='deleteData(" +
                    value.id + ")'></i>"
                <?php } else { ?>
                    data = data + "<i class='ft-trash-2 danger'></i>"
                <?php } ?>
                data = data + "</div>"
                data = data + "</td>"
                data = data + "</tr>"
            });
            // $('tbody').html(data);
             // $('#example').DataTable().clear().draw();
            var myTable = $('#example').DataTable();
            myTable.clear().rows.add($(data)).draw();
        }
    })
};

console.log('bonjour');
allData();
// --------- end all data ---------

 // --------- data will be clear here ---------
 function clearData() {
        $('#client_id').val('');
        $('#salle_id').val('');
        $('#dateres').val('');
        $('#datedebut').val('');
        $('#datefin').val('');
        $('#salles_pr_id').val('');
        $('#salles_ps_id').val('');
        $('#payement').val('');
        $('#statut').val('');

        $('#clientError').text('');
        $('#salleError').text('');
        $('#dateresError').text('');
        $('#datedebutError').text('');
        $('#datefinError').text('');
        $('#salleprError').text('');
        $('#sallepsError').text('');
        $('#payementError').text('');
        $('#statutError').text('');
}
    // --------- end data will be clear here ---------

    function addData() {
        var client_id = $('#client_id').val();
        var salle_id = $('#salle_id').val();
        var dateres = $('#dateres').val();
        var datedebut = $('#datedebut').val();
        var datefin = $('#datefin').val();
        var salles_pr_id = $('#salles_pr_id').val();
        var salles_ps_id = $('#salles_ps_id').val();
        var payement = $('#payement').val();
        var statut =  $('input[type="radio"]:checked').val();
        $.ajax({
            type: "POST",
            dataType: "json",
            data: {
                _token: @json(csrf_token()),
                client_id: client_id,
                salle_id: salle_id,
                dateres: dateres,
                datedebut: datedebut,
                datefin: datefin,
                salles_pr_id: salles_pr_id,
                salles_ps_id: salles_ps_id,
                payement: payement,
                statut: statut,
            },
            url: "/reservations-salles/store",
            success: function(response) {
                allData();
                clearData();
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                })
                Toast.fire({
                    type: 'success',
                    title: 'Enregistrement éffectué avec succès!'
                });
                // end alert
            },
            // start error
            error: function(error) {
                $('#clientError').text('');
                $('#salleError').text('');
                $('#dateresError').text('');
                $('#datedebutError').text('');
                $('#datefinError').text('');
                $('#salleprError').text('');
                $('#sallepsError').text('');
                $('#payementError').text('');
                $('#statutError').text('');


                $('#clientError').text(error.responseJSON.errors.client_id);
                $('#salleError').text(error.responseJSON.errors.salle_id);
                $('#dateresError').text(error.responseJSON.errors.dateres);
                $('#datedebutError').text(error.responseJSON.errors.datedebut);
                $('#datefinError').text(error.responseJSON.errors.datefin);
                $('#salleprError').text(error.responseJSON.errors.salles_pr_id);
                $('#sallepsError').text(error.responseJSON.errors.salles_ps_id);
                $('#payementError').text(error.responseJSON.errors.payement);
                $('#statutError').text(error.responseJSON.errors.statut);

            }
            // end error
        });
    }

         // --------------- edit data -------------
    function editData(id) {
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "/reservations-salles/edit/" + id,
            success: function(data) {
                $('#modalCreate').html(data);
                $('#id').val(data.id);
                $('#client_id').val(data.client_id);
                $('#salle_id').val(data.salle_id);
                $('#dateres').val(data.dateres);
                $('#datedebut').val(data.datedebut);
                $('#datefin').val(data.datefin);
                $('#salles_pr_id').val(data.salles_pr_id);
                $('#salles_ps_id').val(data.salles_ps_id);
                $('#payement').val(data.payement);
                if(data.statut == 'En cours...')
                {

                    $("#statut1").prop("checked" , true)

                }else if(data.statut == 'Terminée'){

                    $("#statut2").prop("checked" , true)

                }
            }
        });
    }


    // ---------- update Data -----------
    function updateData() {
        var id = $('#id').val();
        var client_id = $('#client_id').val();
        var salle_id = $('#salle_id').val();
        var dateres = $('#dateres').val();
        var datedebut = $('#datedebut').val();
        var datefin = $('#datefin').val();
        var salles_pr_id = $('#salles_pr_id').val();
        var salles_ps_id = $('#salles_ps_id').val();
        var payement = $('#payement').val();
        var statut = $('input[name="statut"]:checked').val();
        $.ajax({
            data: {
                _token: @json(csrf_token()),
                client_id: client_id,
                salle_id: salle_id,
                dateres: dateres,
                datedebut: datedebut,
                datefin: datefin,
                salles_pr_id: salles_pr_id,
                salles_ps_id: salles_ps_id,
                payement: payement,
                statut: statut,
            },
            type: "POST",
            dataType: "json",
            url: "/reservations-salles/update/" + id,
            success: function() {
                allData();
                clearData();
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                })
                Toast.fire({
                    type: 'success',
                    title: 'Modifications éffectuée avec succès!'
                });
                // end alert
            },
            // start error
            error: function(error) {
                $('#clientError').text('');
                $('#salleError').text('');
                $('#dateresError').text('');
                $('#datedebutError').text('');
                $('#datefinError').text('');
                $('#salleprError').text('');
                $('#sallepsError').text('');
                $('#payementError').text('');
                $('#statutError').text('');

                $('#clientError').text(error.responseJSON.errors.client_id);
                $('#salleError').text(error.responseJSON.errors.salle_id);
                $('#dateresError').text(error.responseJSON.errors.dateres);
                $('#datedebutError').text(error.responseJSON.errors.datedebut);
                $('#datefinError').text(error.responseJSON.errors.datefin);
                $('#salleprError').text(error.responseJSON.errors.salles_pr_id);
                $('#sallepsError').text(error.responseJSON.errors.salles_ps_id);
                $('#payementError').text(error.responseJSON.errors.payement);
                $('#statutError').text(error.responseJSON.errors.statut);

            }
            // end error
        })
    }


    //------------show-----------


    // function showData(id) {
    //     $.ajax({
    //         type: "GET",
    //         dataType: "json",
    //         url: "/reservations-salles/show/" + id,
    //         success: function(data) {
    //             console.log(data);
    //             $('#modalEdit').html(data);
    //             $('#modalCreate').html(data);
    //             $('#client_id').text(data.client_id);
    //             $('#numres').text(data.numres);
    //             $('#salle_id').text(data.salle_id);
    //             $('#dateres').text(data.dateres);
    //             $('#datedebut').text(data.datedebut);
    //             $('#datefin').text(data.datefin);
    //             $('#salles_pr_id').text(data.salles_pr_id);
    //             $('#salles_ps_id').text(data.salles_ps_id);
    //             $('#payement').text(data.payement);
    //             $('#statut').text(data.statut);
    //         }
    //     });
    // }



    function deleteData(id) {

        // var link = $(this).attr("href");
        swal({
                title: "Voulez-vous vraiment supprimer cet enregistrement?",
                text: "Cette action est irreversible.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: "GET",
                        dataType: "json",
                        url: "/reservations-salles/supprimer/" + id,
                        success: function(response) {
                            allData();
                            clearData();

                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000
                            })
                            Toast.fire({
                                type: 'success',
                                title: 'Suppression effectuée avec succès!'
                            });
                            // end alert

                        }
                    });
                } else {
                    swal("Canceled");
                }
            });

        // $.ajax({
        //   type: "GET",
        //   dataType: "json",
        //   url: "/teacher/destroy/"+id,
        //   success: function(response){
        //     allData();
        //     console.log('data deleted');
        //   }
        // })
    }



</script>


