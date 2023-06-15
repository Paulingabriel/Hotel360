





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
        url: "/reservations-chambres/allData",
        success: function(response) {
            var data = ""
            $.each(response, function(key, value) {
                data = data + "<tr>"
                data = data + "<td>" + value.id + "</td>"
                data = data + "<td>" + value.client_id + "</td>"
                data = data + "<td>" + value.chambre_id + "</td>"
                data = data + "<td>" + value.dateres + "</td>"
                data = data + "<td>" + value.datedebut + "</td>"
                data = data + "<td>" + value.datefin + "</td>"
                data = data + "<td id='opt'>" + value.option + "</td>"
                data = data + "<td>" + value.occ + "</td>"
                data = data + "<td>" + value.adultes + "</td>"
                data = data + "<td>" + value.enfants + "</td>"
                data = data + "<td>" + value.chambres_pr_id + "</td>"
                data = data + "<td>" + value.chambres_ps_id + "</td>"
                if(value.chambres_pr_id && !value.chambres_ps_id && value.occ){
                    data = data + "<td>" + (value.occ)*(value.chambres_pr_id) + "</td>"
                }
                else if(!value.chambres_pr_id && value.chambres_ps_id && value.occ){
                    data = data + "<td>" + (value.occ)*(value.chambres_ps_id) + "</td>"
                }
                else if(value.chambres_pr_id && value.chambres_ps_id && value.occ){
                    data = data + "<td>" + (value.occ)*(value.chambres_pr_id) + "</td>"
                }
                else if(!value.chambres_pr_id && value.chambres_ps_id && !value.occ){
                    data = data + "<td>" + (Math.floor(((new Date(value.datefin)) - (new Date(value.datedebut))) / (1000 * 60 * 60 * 24)))*(value.chambres_ps_id) + "</td>"
                }
                else if(value.chambres_pr_id && !value.chambres_ps_id && !value.occ){
                    data = data + "<td>" + (Math.floor(((new Date(value.datefin)) - (new Date(value.datedebut))) / (1000 * 60 * 60 * 24)))*(value.chambres_pr_id) + "</td>"
                }
                else if(value.chambres_pr_id && value.chambres_ps_id && !value.occ){
                    data = data + "<td>" + (Math.floor(((new Date(value.datefin)) - (new Date(value.datedebut))) / (1000 * 60 * 60 * 24)))*(value.chambres_pr_id) + "</td>"
                }
                else if(!value.chambres_pr_id && !value.chambres_ps_id && value.occ){
                    data = data + "<td>null</td>"
                }
                else if(!value.chambres_pr_id && !value.chambres_ps_id && !value.occ){
                    data = data + "<td>null</td>"
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
                    data = data + "<a href="+'/reservations-chambres/facture/' + value.id +"><i class='fa-solid fa-eye me-1' style='color: #2e612e!important;'></i></a>"
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
            // console.log(value.datefin)
            // console.log(Math.floor(((new Date(value.datefin)) - (new Date(value.datedebut))) / (1000 * 60 * 60 * 24)));
            });
            // $('tbody').html(data);
            // $('#example').DataTable().clear().draw();
            var myTable = $('#example').DataTable();
            myTable.clear().rows.add($(data)).draw();
            // console.log(Math.floor((value.datefin - value.datedebut) / (1000 * 60 * 60 * 24)));
            // var myTable = $('#example').DataTable();
            // myTable.clear().rows.add(data).draw();
        }
    })
};

// console.log('bonjour');
allData();
// --------- end all data ---------

 // --------- data will be clear here ---------
 function clearData() {
        $('#client_id').val('');
        $('#chambre_id').val('');
        $('#dateres').val('');
        $('#datedebut').val('');
        $('#datefin').val('');
        $('#option').val('');
        $('#occ').val('');
        $('#adultes').val('');
        $('#enfants').val('');
        $('#chambres_pr_id').val('');
        $('#chambres_ps_id').val('');
        $('#payement').val('');
        $('#statut').val('');

        $('#clientError').text('');
        $('#chambreError').text('');
        $('#dateresError').text('');
        $('#datedebutError').text('');
        $('#datefinError').text('');
        $('#optionError').text('');
        $('#occError').text('');
        $('#adultesError').text('');
        $('#enfantsError').text('');
        $('#chambreprError').text('');
        $('#chambrepsError').text('');
        $('#payementError').text('');
        $('#statutError').text('');
}
    // --------- end data will be clear here ---------

    function addData() {
        var client_id = $('#client_id').val();
        var chambre_id = $('#chambre_id').val();
        var dateres = $('#dateres').val();
        var datedebut = $('#datedebut').val();
        var datefin = $('#datefin').val();
        var option = $('#option').val();
        var occ = $('#occ').val();
        var adultes = $('#adultes').val();
        var enfants = $('#enfants').val();
        var chambres_pr_id = $('#chambres_pr_id').val();
        var chambres_ps_id = $('#chambres_ps_id').val();
        var payement = $('#payement').val();
        var statut = $('input[type="radio"]:checked').val();
        $.ajax({
            type: "POST",
            dataType: "json",
            data: {
                _token: @json(csrf_token()),
                client_id: client_id,
                chambre_id: chambre_id,
                dateres: dateres,
                datedebut: datedebut,
                datefin: datefin,
                option: option,
                occ: occ,
                adultes: adultes,
                enfants: enfants,
                chambres_pr_id: chambres_pr_id,
                chambres_ps_id: chambres_ps_id,
                payement: payement,
                statut: statut,
            },
            url: "/reservations-chambres/store",
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
                $('#chambreError').text('');
                $('#dateresError').text('');
                $('#datedebutError').text('');
                $('#datefinError').text('');
                $('#optionError').text('');
                $('#occError').text('');
                $('#adultesError').text('');
                $('#enfantsError').text('');
                $('#chambreprError').text('');
                $('#chambrepsError').text('');
                $('#payementError').text('');
                $('#statutError').text('');


                $('#clientError').text(error.responseJSON.errors.client_id);
                $('#chambreError').text(error.responseJSON.errors.chambre_id);
                $('#dateresError').text(error.responseJSON.errors.dateres);
                $('#datedebutError').text(error.responseJSON.errors.datedebut);
                $('#datefinError').text(error.responseJSON.errors.datefin);
                $('#optionError').text(error.responseJSON.errors.option);
                $('#occError').text(error.responseJSON.errors.occ);
                $('#adultesError').text(error.responseJSON.errors.adultes);
                $('#enfantsError').text(error.responseJSON.errors.enfants);
                $('#chambresprError').text(error.responseJSON.errors.chambres_pr_id);
                $('#chambrespsError').text(error.responseJSON.errors.chambres_ps_id);
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
            url: "/reservations-chambres/edit/" + id,
            success: function(data) {
                $('#modalCreate').html('');
                $('#id').val(data.id);
                $('#client_id').val(data.client_id);
                $('#chambre_id').val(data.chambre_id);
                $('#dateres').val(data.dateres);
                $('#datedebut').val(data.datedebut);
                $('#datefin').val(data.datefin);
                // $('#option option:selected').text(data.option)
                $('#option').val(data.option);
                $('#occ').val(data.occ);
                $('#adultes').val(data.adultes);
                $('#enfants').val(data.enfants);
                $('#chambres_pr_id').val(data.chambres_pr_id);
                $('#chambres_ps_id').val(data.chambres_ps_id);
                $('#payement').val(data.payement);
                if(data.statut == 'En cours...')
                {

                    $("#statut1").prop("checked" , true)

                }else if(data.statut == 'Terminée'){

                    $("#statut2").prop("checked" , true)

                }

                var he = document.getElementById('he');
                var d1 = document.getElementById('d1');
                var d2 = document.getElementById('d2');
                // texte = option.options[option.selectedIndex].text;
                // console.log(opt);

                if(data.option == 'heure'){
                    he.style.display = 'block';
                    d1.style.display = 'none';
                    d2.style.display = 'none';
                }else if(option.value == 'nuitée' || option.value == 'sieste'){
                    d1.style.display = 'block';
                    d2.style.display = 'block';
                    he.style.display = 'none';
                }
            }
        });



    };


    // ---------- update Data -----------
    function updateData() {
        var id = $('#id').val();
        var client_id = $('#client_id').val();
        var chambre_id = $('#chambre_id').val();
        var dateres = $('#dateres').val();
        var datedebut = $('#datedebut').val();
        var datefin = $('#datefin').val();
        var option = $('#option').val();
        var occ = $('#occ').val();
        var adultes = $('#adultes').val();
        var enfants = $('#enfants').val();
        var chambres_pr_id = $('#chambres_pr_id').val();
        var chambres_ps_id = $('#chambres_ps_id').val();
        var payement = $('#payement').val();
        var statut = $('input[type="radio"]:checked').val();
        $.ajax({
            data: {
                _token: @json(csrf_token()),
                client_id: client_id,
                chambre_id: chambre_id,
                dateres: dateres,
                datedebut: datedebut,
                datefin: datefin,
                option: option,
                occ: occ,
                adultes: adultes,
                enfants: enfants,
                chambres_pr_id: chambres_pr_id,
                chambres_ps_id: chambres_ps_id,
                payement: payement,
                statut: statut,
            },
            type: "POST",
            dataType: "json",
            url: "/reservations-chambres/update/" + id,
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
                $('#chambreError').text('');
                $('#dateresError').text('');
                $('#datedebutError').text('');
                $('#datefinError').text('');
                $('#optionError').text('');
                $('#occError').text('');
                $('#adultesError').text('');
                $('#enfantsError').text('');
                $('#chambreprError').text('');
                $('#chambrepsError').text('');
                $('#payementError').text('');
                $('#statutError').text('');


                $('#clientError').text(error.responseJSON.errors.client_id);
                $('#chambreError').text(error.responseJSON.errors.chambre_id);
                $('#dateresError').text(error.responseJSON.errors.dateres);
                $('#datedebutError').text(error.responseJSON.errors.datedebut);
                $('#datefinError').text(error.responseJSON.errors.datefin);
                $('#optionError').text(error.responseJSON.errors.option);
                $('#opccError').text(error.responseJSON.errors.occ);
                $('#adultesError').text(error.responseJSON.errors.adultes);
                $('#enfantsError').text(error.responseJSON.errors.enfants);
                $('#chambresprError').text(error.responseJSON.errors.chambres_pr_id);
                $('#chambrespsError').text(error.responseJSON.errors.chambres_ps_id);
                $('#payementError').text(error.responseJSON.errors.payement);
                $('#statutError').text(error.responseJSON.errors.statut);

            }
            // end error
        })
    }


    // --------------------show data--------------------


    // function showData(id) {
    //     $.ajax({
    //         type: "GET",
    //         dataType: "json",
    //         url: "/reservations-chambres/facture/" + id,
    //         success: function(data) {
    //             $('#modalEdit').html(data);
    //             $('#modalCreate').html(data);
    //             $('#client_id').text(data.client_id);
    //             $('#numres').text(data.numres);
    //             $('#chambre_id').text(data.chambre_id);
    //             $('#dateres').text(data.dateres);
    //             $('#datedebut').text(data.datedebut);
    //             $('#datefin').text(data.datefin);
    //             $('#option').text(data.option);
    //             $('#occ').text(data.occ);
    //             $('#adultes').text(data.adultes);
    //             $('#enfants').text(data.enfants);
    //             $('#chambres_pr_id').text(data.chambres_pr_id);
    //             $('#chambres_ps_id').text(data.chambres_ps_id);
    //             $('#global').text(data.global);
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
                        url: "/reservations-chambres/supprimer/" + id,
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
