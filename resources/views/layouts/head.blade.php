<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui"
    />
    <meta
      name="description"
      content="Convex admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities."
    />
    <meta
      name="keywords"
      content="admin template, Convex admin template, dashboard template, flat admin template, responsive admin template, web app"
    />
    <meta name="author" content="PIXINVENT" />
    <title>
      eCommerce Dashboard - Convex bootstrap 4 admin dashboard template
    </title>
    <!-----------start datatables links------------------>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap5.min.css">



    <!-----------end datatables links-------------------->


<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
crossorigin="anonymous"
referrerpolicy="no-referrer" />
 <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('../app-assets/img/ico/apple-icon-60.html') }}" />
 <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('../app-assets/img/ico/apple-icon-76.html') }}" />
 <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('../app-assets/img/ico/apple-icon-120.html') }}" />
 <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('../app-assets/img/ico/apple-icon-152.html') }}" />
 <link rel="shortcut icon" type="image/x-icon"
     href="https://pixinvent.com/demo/convex-bootstrap-admin-dashboard-template/app-assets/img/ico/favicon.ico" />
 <link rel="shortcut icon" type="image/png" href="{{ asset('../app-assets/img/ico/favicon-32.png') }}" />
 <meta name="apple-mobile-web-app-capable" content="yes" />
 <meta name="apple-touch-fullscreen" content="yes" />
 <meta name="apple-mobile-web-app-status-bar-style" content="default" />
 <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900%7CMontserrat:300,400,500,600,700,800,900"
     rel="stylesheet" />
 <link rel="stylesheet" type="text/css" href="{{ asset('../app-assets/fonts/feather/style.min.css') }}" />
 <link rel="stylesheet" type="text/css" href="{{ asset('../app-assets/fonts/simple-line-icons/style.css') }}" />
 <link rel="stylesheet" type="text/css"
     href="{{ asset('../app-assets/fonts/font-awesome/css/font-awesome.min.css') }}" />
 <link rel="stylesheet" type="text/css" href="{{ asset('../app-assets/vendors/css/perfect-scrollbar.min.css') }}" />
 <link rel="stylesheet" type="text/css" href="{{ asset('../app-assets/vendors/css/prism.min.css') }}" />
 <link rel="stylesheet" type="text/css" href="{{ asset('../app-assets/vendors/css/chartist.min.css') }}" />
 <link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/tables/datatable/datatables.min.css">
 <link rel="stylesheet" type="text/css" href="{{ asset('../app-assets/css/app.css') }}" />
 <script src="{{ asset('../app-assets/js/bootstrap5.min.js') }}"></script>
 <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
 <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
 <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
 <script>
    function confirmation(ev){
        ev.preventDefault();
        var UrlToRedirect = ev.currentTarget.getAttribute('href');
        console.log(UrlToRedirect);
        swal({
            title:"Voulez-vous vraiment supprimer cet enregistrement?",
            text:"Cette action est irreversible.",
            icon:"warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willCancel)=>{
            if(willCancel){
                window.location.href = UrlToRedirect;
            }
        });
    }
    </script>

