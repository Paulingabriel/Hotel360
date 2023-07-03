





<script type="text/javascript">

    // $.ajaxSetup({
    // headers: {
    //     'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
    // }
    // });

// ---------------view data ------------
// var option = $('#option').val();

function get(){

    
    $.ajax({
        type:"GET",
        dataType: "json",
        url: "/reservations-chambres/get",
        success: function(response){
        const data = response;
        // console.log(data);
            
        document.form.chambre_id.options.length = data.length + 1;
        document.form.chambre_id.options[0].value = '';
        document.form.chambre_id.options[0].text = '-----------';

        for(let i = 0; i<data.length ; i++){
            document.form.chambre_id.options[i+1].value = data[i].id; 
            document.form.chambre_id.options[i+1].text = data[i].num;
            // console.log(document.form.chambre_id.options[i+1].value);
            // console.log(document.form.chambre_id.options[i+1].text);

        }
        $(document).ready(function() {
      $('.stateSelect2').select2();
        });
        // console.log(document.form.chambre_id);  
        }
    })
};


function change(e){

    // console.log(e);
    $.ajax({
        type:"GET",
        dataType: "json",
        url: "/reservations-chambres/change/" + e,
        success: function(response){
        //    console.log(response);
           var chambre1 = document.getElementById('chambres_pr_1');
           var chambre2 = document.getElementById('chambres_pr_2');
           var chambre3 = document.getElementById('chambres_pr_3');
           
           chambre1.value = response.prixheure;
           chambre2.value = response.prixsieste;
           chambre3.value = response.prixnuitee;
           
            if((datedebut.value == '' && datefin.value == '') && (option.value == 'heure')){
            total1.value = (chambre1.value)*(occ.value);
            prixtotal.style.display = 'block';
            total1.style.display = 'block';
            total2.style.display = 'none';
            total3.style.display = 'none';
            }
            else if((datedebut.value !== '' && datefin.value !== '') && (option.value == 'sieste')){
                total2.value = (chambre2.value)*(((((new Date(datefin.value)).getTime()) - ((new Date(datedebut.value)).getTime()))/(1000 * 3600 * 24)));
                prixtotal.style.display = 'block';
                total2.style.display = 'block';
                total1.style.display = 'none';
                total3.style.display = 'none';
            }
            else if((datedebut.value !== '' && datefin.value !== '') && (option.value == 'nuitée')){
                total3.value = (chambre3.value)*(((((new Date(datefin.value)).getTime()) - ((new Date(datedebut.value)).getTime()))/(1000 * 3600 * 24)));
                prixtotal.style.display = 'block';
                total3.style.display = 'block';
                total1.style.display = 'none';
                total2.style.display = 'none';
            }
            else{
                total2.value = 0;
                prixtotal.style.display = 'block';
                total2.style.display = 'block';
                total1.style.display = 'none';
                total3.style.display = 'none';
            }

           
        }
    })
}

function editChange(e){

// console.log(e);
$.ajax({
    type:"GET",
    dataType: "json",
    url: "/reservations-chambres/editchange/" + e,
    success: function(response){
       console.log(response);
      
       var chambre4 = document.getElementById('chambres_pr_4');
       var chambre5 = document.getElementById('chambres_pr_5');
       var chambre6 = document.getElementById('chambres_pr_6');
        
       
       
       chambre4.value = response.prixheure;
       chambre5.value = response.prixsieste;
       chambre6.value = response.prixnuitee;

            if(optionedit.value == 'heure'){
            total4.value = (chambre4.value)*(occedit.value);
            prixtotaledit.style.display = 'block';
            total4.style.display = 'block';
            total5.style.display = 'none';
            total6.style.display = 'none';
            }
            else if((datedebutedit.value !== '' && datefinedit.value !== '') && (optionedit.value == 'sieste')){
                total5.value = (chambre5.value)*(((((new Date(datefinedit.value)).getTime()) - ((new Date(datedebutedit.value)).getTime()))/(1000 * 3600 * 24)));
                prixtotaledit.style.display = 'block';
                total5.style.display = 'block';
                total4.style.display = 'none';
                total6.style.display = 'none';
            }
            else if((datedebutedit.value !== '' && datefinedit.value !== '') && (optionedit.value == 'nuitée')){
                total6.value = (chambre6.value)*(((((new Date(datefinedit.value)).getTime()) - ((new Date(datedebutedit.value)).getTime()))/(1000 * 3600 * 24)));
                prixtotaledit.style.display = 'block';
                total6.style.display = 'block';
                total4.style.display = 'none';
                total5.style.display = 'none';
            }
            else{
                total5.value == 0;
                prixtotaledit.style.display = 'block';
                total5.style.display = 'block';
                total4.style.display = 'none';
                total6.style.display = 'none';
            }

    }
})
}
function allData() {
    $.ajax({
        type: "GET",
        dataType: "json",
        url: "/reservations-chambres/allData",
        success: function(response) {
            var data = "";
            $.each(response, function(key, value) {
                data = data + "<tr>"
                data = data + "<td>" + value.id + "</td>"
                data = data + "<td>" + value.client_id + "</td>"
                data = data + "<td>" + value.chambre.num + "</td>"
                data = data + "<td>" + value.dateres + "</td>"
                data = data + "<td>" + value.datedebut + "</td>"
                data = data + "<td>" + value.datefin + "</td>"
                data = data + "<td id='opt'>" + value.option + "</td>"
                data = data + "<td>" + value.occ + "</td>"
                data = data + "<td>" + value.adultes + "</td>"
                data = data + "<td>" + value.enfants + "</td>"
                data = data + "<td>" + value.chambres_pr_id + "</td>"
                data = data + "<td>" + value.total + "</td>"
                // if(value.chambres_pr_id && value.occ){
                //     data = data + "<td>" + (value.occ)*(value.chambres_pr_id) + "</td>"
                // }
                // else if(value.chambres_pr_id && !value.occ){
                //     data = data + "<td>" + (Math.floor(((new Date(value.datefin)) - (new Date(value.datedebut))) / (1000 * 60 * 60 * 24)))*(value.chambres_pr_id) + "</td>"
                // }

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
            });
            var myTable = $('#example').DataTable();
            myTable.clear().rows.add($(data)).draw();

        }
    })
}

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
        if($('#option').val() == 'heure'){
            $('#chambres_pr_1').val('');
            $('#total1').val('');
        }
        else if($('#option').val() == 'sieste'){
            $('#chambres_pr_2').val('');
            $('#total2').val('');
        }
        else if($('#option').val() == 'nuitée'){
            $('#chambres_pr_3').val('');
            $('#total3').val();
        }
        $('#payement').val('');

        $('#clientError').text('');
        $('#chambreError').text('');
        $('#dateresError').text('');
        $('#datedebutError').text('');
        $('#datefinError').text('');
        $('#optionError').text('');
        $('#occError').text('');
        $('#adultesError').text('');
        $('#enfantsError').text('');
        $('#payementError').text('');
}

function clearDataEdit() {
        $('#client_id').val('');
        $('#chambre_id').val('');
        $('#dateres').val('');
        $('#datedebutedit').val('');
        $('#datefinedit').val('');
        $('#optionedit').val('');
        $('#occedit').val('');
        $('#adultes').val('');
        $('#enfants').val('');
        if($('#optionedit').val() == 'heure'){
            $('#chambres_pr_4').val('');
            $('#total4').val('');
        }
        else if($('#optionedit').val() == 'sieste'){
            $('#chambres_pr_5').val('');
            $('#total5').val('');
        }
        else if($('#optionedit').val() == 'nuitée'){
            $('#chambres_pr_6').val('');
            $('#total6').val('');
        }
        $('#payement').val('');

        $('#clientError').text('');
        $('#chambreError').text('');
        $('#dateresError').text('');
        $('#datedebutError').text('');
        $('#datefinError').text('');
        $('#optionError').text('');
        $('#occError').text('');
        $('#adultesError').text('');
        $('#enfantsError').text('');
        $('#payementError').text('');
}
    // --------- end data will be clear here ---------

    function addData() {
        var client_id = $('#client_id').val();
        var chambre_id = $('#chambre_id').val();
        // var dateres = $('#dateres').val();
        var datedebut = $('#datedebut').val();
        var datefin = $('#datefin').val();
        var option = $('#option').val();
        var occ = $('#occ').val();
        var adultes = $('#adultes').val();
        var enfants = $('#enfants').val();
        if($('#option').val() == 'heure'){
            var chambres_pr_id = $('#chambres_pr_1').val();
            var total = $('#total1').val();
        }
        else if($('#option').val() == 'sieste'){
            var chambres_pr_id = $('#chambres_pr_2').val();
            var total = $('#total2').val();
        }
        else if($('#option').val() == 'nuitée'){
            var chambres_pr_id = $('#chambres_pr_3').val();
            var total = $('#total3').val();
        }
        var payement = $('#payement').val();
        // var statut = $('input[type="radio"]:checked').val();
        $.ajax({
            type: "POST",
            dataType: "json",
            data: {
                _token: @json(csrf_token()),
                client_id: client_id,
                chambre_id: chambre_id,
                // dateres: dateres,
                datedebut: datedebut,
                datefin: datefin,
                option: option,
                occ: occ,
                adultes: adultes,
                enfants: enfants,
                chambres_pr_id: chambres_pr_id,
                total: total,
                payement: payement,
                // statut: statut,

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
                $('#payementError').text('');


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
            url: "/reservations-chambres/edit/" + id,
            success: function(response) {
                var data = response.data;
                var datas = response.datas;
                // console.log(data);
                // console.log(datas);
                // console.log(response.num);
                $('#modalCreate').html('');
                $('#id').val(data.id);
                $('#client_id').val(data.client_id);
                // $('#chambre_id').val(response.num);
                $('#dateres').val(data.dateres);
                $('#datedebutedit').val(data.datedebut);
                $('#datefinedit').val(data.datefin);
                // $('#option option:selected').text(data.option)
                $('#optionedit').val(data.option);
                $('#occedit').val(data.occ);
                $('#adultes').val(data.adultes);
                $('#enfants').val(data.enfants);
                // $('#chambres_pr_id').val(data.chambres_pr_id);
                $('#payement').val(data.payement);

                const dat = datas;  
                document.formEdit.chambre_id.options.length = dat.length + 1;
                document.formEdit.chambre_id.options[0].value = data.chambre_id;
                document.formEdit.chambre_id.options[0].text = response.num;

                for(let i = 0; i<dat.length ; i++){
                    document.formEdit.chambre_id.options[i+1].value = dat[i].id; 
                    document.formEdit.chambre_id.options[i+1].text = dat[i].num;
                    // console.log(document.formEdit.chambre_id.options[i+1].value);
                    // console.log(document.formEdit.chambre_id.options[i+1].text);

                }
                $(document).ready(function() {
                $('.stateSelect2Edit').select2();
                }); 



                // if(data.statut == 'En cours...')
                // {

                //     $("#statut1").prop("checked" , true)

                // }else if(data.statut == 'Terminée'){

                //     $("#statut2").prop("checked" , true)

                // }

                var he = document.getElementById('he');
                var d1 = document.getElementById('d1');
                var d2 = document.getElementById('d2');
                // texte = option.options[option.selectedIndex].text;
                // console.log(opt);

                if(data.option == 'heure'){

                    he.style.display = 'block';
                    d1.style.display = 'none';
                    d2.style.display = 'none';
                    editlabel.style.display = 'block';
                    $('#chambres_pr_4').val(data.chambres_pr_id);
                    chambre4.style.display = 'block';
                    chambre5.style.display = 'none';
                    chambre6.style.display = 'none';
                    $('#total4').val(data.total);
                    prixtotaledit.style.display = 'block';
                    total4.style.display = 'block';
                    total5.style.display = 'none';
                    total6.style.display = 'none';

                }else if(optionedit.value == 'sieste'){

                    d1.style.display = 'block';
                    d2.style.display = 'block';
                    he.style.display = 'none';
                    editlabel.style.display = 'block';
                    $('#chambres_pr_5').val(data.chambres_pr_id);
                    chambre5.style.display = 'block';
                    chambre4.style.display = 'none';
                    chambre6.style.display = 'none';
                    if(datedebutedit.value !== '' && datefinedit.value !== ''){
                        total5.value = (chambre5.value)*(((((new Date(datefinedit.value)).getTime()) - ((new Date(datedebutedit.value)).getTime()))/(1000 * 3600 * 24)));
                        prixtotaledit.style.display = 'block';
                        total5.style.display = 'block';
                        total4.style.display = 'none';
                        total6.style.display = 'none';
                    }
                    else{
                        
                        total5.value == 0;
                        prixtotaledit.style.display = 'block';
                        total5.style.display = 'block';
                        total4.style.display = 'none';
                        total6.style.display = 'none';
    
                    }

                }else if(optionedit.value == 'nuitée'){

                    d1.style.display = 'block';
                    d2.style.display = 'block';
                    he.style.display = 'none';
                    editlabel.style.display = 'block';
                    $('#chambres_pr_6').val(data.chambres_pr_id);
                    chambre6.style.display = 'block';
                    chambre4.style.display = 'none';
                    chambre5.style.display = 'none';
                    if(datedebutedit.value !== '' && datefinedit.value !== ''){
                        total6.value = (chambre6.value)*(((((new Date(datefinedit.value)).getTime()) - ((new Date(datedebutedit.value)).getTime()))/(1000 * 3600 * 24)));
                        prixtotaledit.style.display = 'block';
                        total6.style.display = 'block';
                        total4.style.display = 'none';
                        total5.style.display = 'none';
                    }
                    else{
                       
                        total5.value == 0;
                        prixtotaledit.style.display = 'block';
                        total5.style.display = 'block';
                        total4.style.display = 'none';
                        total6.style.display = 'none';
            
                        
                    }
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
        var datedebut = $('#datedebutedit').val();
        var datefin = $('#datefinedit').val();
        var option = $('#optionedit').val();
        var occ = $('#occedit').val();
        var adultes = $('#adultes').val();
        var enfants = $('#enfants').val();
        if(option == 'heure'){
            var chambres_pr_id = $('#chambres_pr_4').val();
            var total = $('#total4').val();
        }
        else if(option == 'sieste'){
            var chambres_pr_id = $('#chambres_pr_5').val();
            var total = $('#total5').val();
        }
        else if(option == 'nuitée'){
            var chambres_pr_id = $('#chambres_pr_6').val();
            var total = $('#total6').val();
        }
        var payement = $('#payement').val();
        // var statut = $('input[type="radio"]:checked').val();
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
                total: total,
                payement: payement,
                // statut: statut,
            },
            type: "POST",
            dataType: "json",
            url: "/reservations-chambres/update/" + id,
            success: function() {
                allData();
                clearDataEdit();
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
                $('#payementError').text('');


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
                $('#payementError').text(error.responseJSON.errors.payement);

            }

            // end error
        });
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
