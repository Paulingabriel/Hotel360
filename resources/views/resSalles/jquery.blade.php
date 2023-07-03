




<script type="text/javascript">
    // $.ajaxSetup({
    // headers: {
    //     'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
    // }
    // });

// ---------------view data ------------

function get(){

    
$.ajax({
    type:"GET",
    dataType: "json",
    url: "/reservations-salles/get",
    success: function(response){
    const data = response;
    console.log(data);
        
    document.form.salle_id.options.length = data.length + 1;
    document.form.salle_id.options[0].value = '';
    document.form.salle_id.options[0].text = '-----------';

    for(let i = 0; i<data.length ; i++){
        document.form.salle_id.options[i+1].value = data[i].id; 
        document.form.salle_id.options[i+1].text = data[i].num;
        // console.log(document.form.chambre_id.options[i+1].value);
        // console.log(document.form.chambre_id.options[i+1].text);

    }
    $(document).ready(function() {
  $('.salleSelect2').select2();
    });
    // console.log(document.form.chambre_id);  
    }
})
};


function change(e){

console.log(e);
$.ajax({
    type:"GET",
    dataType: "json",
    url: "/reservations-salles/change/" + e,
    success: function(response){
    console.log(response);  
    var salle = document.getElementById('salles_pr_id');
     
    salle.value = response.prix;
    salle.style.display = 'block';
    label.style.display = 'block';
   
    if(datefin.value !== '' && datedebut.value !== ''){
        total.value = (salle.value)*(((((new Date(datefin.value)).getTime()) - ((new Date(datedebut.value)).getTime()))/(1000 * 3600 * 24)));
        prixtotal.style.display = 'block';
        total.style.display = 'block';
    }  
    }
})
}

function editChange(e){

console.log(e);
$.ajax({
type:"GET",
dataType: "json",
url: "/reservations-salles/editchange/" + e,
success: function(response){

  
   var salleedit = document.getElementById('editsalles_pr_id');
     
   salleedit.value = response.prix;
   totaledit.value = (salleedit.value)*(((((new Date(datefinedit.value)).getTime()) - ((new Date(datedebutedit.value)).getTime()))/(1000 * 3600 * 24)));

   salleedit.style.display = 'block';
   prixtotaledit.style.display = 'block';
   editlabel.style.display = 'block';
   totaledit.style.display = 'block';
   editlabel.style.display = 'block';
//    console.log(salleedit.value);
}
})
}


function allData() {
    $.ajax({
        type: "GET",
        dataType: "json",
        url: "/reservations-salles/allData",
        success: function(response) {
            var data = "";
            console.log(response);
            $.each(response, function(key, value) {
                data = data + "<tr>"
                data = data + "<td>" + value.id + "</td>"
                data = data + "<td>" + value.client_id + "</td>"
                data = data + "<td>" + value.salle.num + "</td>"
                data = data + "<td>" + value.dateres + "</td>"
                data = data + "<td>" + value.datedebut + "</td>"
                data = data + "<td>" + value.datefin + "</td>"
                data = data + "<td>" + value.salles_pr_id + "</td>"
                data = data + "<td>" + value.total + "</td>"
                data = data + "<td>" + value.payement + "</td>"
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
        $('#payement').val('');

        $('#clientError').text('');
        $('#salleError').text('');
        $('#dateresError').text('');
        $('#datedebutError').text('');
        $('#datefinError').text('');
        $('#salleprError').text('');
        $('#payementError').text('');
}
    // --------- end data will be clear here ---------

    function addData() {
        var client_id = $('#client_id').val();
        var salle_id = $('#salle_id').val();
        var dateres = $('#dateres').val();
        var datedebut = $('#datedebut').val();
        var datefin = $('#datefin').val();
        var salles_pr_id = $('#salles_pr_id').val();
        var total = $('#total').val();
        var payement = $('#payement').val();
        // var statut =  $('input[type="radio"]:checked').val();
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
                total: total,
                payement: payement,
                // statut: statut,
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
                $('#payementError').text('');


                $('#clientError').text(error.responseJSON.errors.client_id);
                $('#salleError').text(error.responseJSON.errors.salle_id);
                $('#dateresError').text(error.responseJSON.errors.dateres);
                $('#datedebutError').text(error.responseJSON.errors.datedebut);
                $('#datefinError').text(error.responseJSON.errors.datefin);
                $('#salleprError').text(error.responseJSON.errors.salles_pr_id);
                $('#payementError').text(error.responseJSON.errors.payement);

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
            success: function(response) {
                var data = response.data;
                var datas = response.datas;
                console.log(response.num);
                // var salleedit = document.getElementById('editsalles_pr_id');
                // var totaledit = document.getElementById('totaledit');
                // var prixtotaledit = document.getElementById('prixtotaledit');
                // var editlabel = document.getElementById('editprix');

                $('#modalCreate').html(data);
                $('#id').val(data.id);
                $('#client_id').val(data.client_id);
                $('#salle_id').val(data.salle_id);
                $('#dateres').val(data.dateres);
                $('#datedebutedit').val(data.datedebut);
                $('#datefinedit').val(data.datefin);
                $('#editsalles_pr_id').val(data.salles_pr_id);
                $('#totaledit').val(data.total);
                $('#payement').val(data.payement);
                
                salleedit.style.display = 'block';
                prixtotaledit.style.display = 'block';
                editlabel.style.display = 'block';
                totaledit.style.display = 'block';
                editlabel.style.display = 'block';

                console.log($('#client_id').val());

                const dat = datas;  
                document.formEdit.salle_id.options.length = dat.length + 1;
                document.formEdit.salle_id.options[0].value = data.salle_id;
                document.formEdit.salle_id.options[0].text = response.num;

                for(let i = 0; i<dat.length ; i++){
                    document.formEdit.salle_id.options[i+1].value = dat[i].id; 
                    document.formEdit.salle_id.options[i+1].text = dat[i].num;
                    // console.log(document.formEdit.chambre_id.options[i+1].value);
                    // console.log(document.formEdit.chambre_id.options[i+1].text);

                }
                $(document).ready(function() {
                $('.salleSelect2Edit').select2();
                }); 

                // console.log(data);
                // console.log(salleedit.style.display);
                // console.log(totaledit.style.display);
                // if(data.statut == 'En cours...')
                // {

                //     $("#statut1").prop("checked" , true)

                // }else if(data.statut == 'Terminée'){

                //     $("#statut2").prop("checked" , true)

                // }
            }
        });
    }


    // ---------- update Data -----------
    function updateData() {
        var id = $('#id').val();
        var client_id = $('#client_id').val();
        var salle_id = $('#editsalle_id').val();
        var dateres = $('#dateres').val();
        var datedebut = $('#datedebutedit').val();
        var datefin = $('#datefinedit').val();
        var salles_pr_id = $('#editsalles_pr_id').val();
        var total = $('#totaledit').val();
        var payement = $('#payement').val();
        // var statut = $('input[name="statut"]:checked').val();
        $.ajax({
            data: {
                _token: @json(csrf_token()),
                client_id: client_id,
                salle_id: salle_id,
                dateres: dateres,
                datedebut: datedebut,
                datefin: datefin,
                salles_pr_id: salles_pr_id,
                total: total,
                payement: payement,
                // statut: statut,
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
                $('#payementError').text('');

                $('#clientError').text(error.responseJSON.errors.client_id);
                $('#salleError').text(error.responseJSON.errors.salle_id);
                $('#dateresError').text(error.responseJSON.errors.dateres);
                $('#datedebutError').text(error.responseJSON.errors.datedebut);
                $('#datefinError').text(error.responseJSON.errors.datefin);
                $('#salleprError').text(error.responseJSON.errors.salles_pr_id);
                $('#payementError').text(error.responseJSON.errors.payement);

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


