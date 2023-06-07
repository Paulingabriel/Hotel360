<style>
    html {}


    .container-lg{

        padding: 30px;
    }
    .section-title h4{
        padding: 0.5rem;
        padding-left: 0;
        margin-top: 0.5rem;
        margin-bottom: 1.5rem;
        font-weight: 500;
    }
    .form-section{
        margin-top: 1rem;
    }

    .form-section .label{
        padding: 0;
        margin: 0;
        font-family: 'Poppins'!important;
        text-transform: none;
        font-size: 1rem;
    }

    .form-section .form-control{
        height: 45px;
        box-sizing: border-box;
        border-radius: 25px;
        border: none!important;
        box-shadow: 0 3px 8px rgb(0, 0, 0, 0.1)!important;
        padding: 0 15px 0 15px!important;
    }

    .form-section .form-control:focus{
        border: 1px solid  rgba(50, 162, 50, 0.8)!important;
        box-shadow: 0px 0px 4px rgba(50, 162, 50, 0.8)!important;

    }

    textarea:focus{
        border: 1px solid  rgba(50, 162, 50, 0.8)!important;
        box-shadow: 0px 0px 4px rgba(50, 162, 50, 0.8)!important;
    }
    textarea{
        box-shadow: 0 3px 8px rgb(0, 0, 0, 0.1)!important;
        border: none!important;
        border-radius: 10px;
    }

    /* input[type='radio']:checked:after{
        background-color:  rgba(50, 162, 50, 0.8)!important;
    } */

    .btn-actions{
        float: right;
    }
    .btn-actions button{
        padding: 8px 35px;
        letter-spacing: 1px;
        border: none;
        border-radius: 25px;
        color: #fff;

    }

    .btn-actions .btn-submit{
        background-color: #014601;
        box-shadow: 0px 0px 6px rgba(50, 162, 50, 0.8)!important;
    }
    .btn-actions .btn-cancel{
        background-color: #e91717;
        box-shadow: 0px 0px 6px rgba(255, 0, 0, 0.8)!important;
    }

    .dataTables_filter [type='search']{
        height: 100%;
        border-radius: 20px;
        padding: 0 15px;
        position: relative;
        box-shadow: 0 3px 6px rgb(0, 0, 0, 0.1)!important;
        border: none!important;
    }
    .main-panel .btn-add{
        background-color:  #2e612e;
        color: white;
        font-family: 'poppins';
        height: 35px;
        border: none;
        box-sizing: border-box;
        padding: 0 20px;
        border-radius: 20px;
        font-size: 12px;
        letter-spacing: 1px;
        display: flex;
        align-items: center;
        box-shadow: 0px 0px 4px rgba(50, 162, 50, 0.8)!important;
    }

    .main-panel .btn-download{
        background-color:  #fff;
        color:  #2e612e;
        font-family: 'poppins';
        font-weight: 500;
        height: 35px;
        border: none;
        box-sizing: border-box;
        padding: 0 20px;
        border-radius: 20px;
        font-size: 16px;
        letter-spacing: 1px;
        display: flex;
        align-items: center;
        box-shadow: 0px 0px 4px rgba(50, 162, 50, 0.8)!important;
    }
    .fa-download{
        color: #2e612e;
        font-size: 16px;
    }
    .fa-plus{
        padding: 2.5px;
        background-color: #fff;
        border-radius: 50%;
        color: #2e612e;
        font-weight: bold;
    }

    .active .page-link{
        background-color:  #2e612e!important;
        border-color:  #2e612e!important;
    }

    .dataTables_filter [type='search']:focus{
    border: 1px solid  rgba(50, 162, 50, 0.8)!important;
    box-shadow: 0px 0px 4px rgba(50, 162, 50, 0.8)!important;

    }

    .dataTables_filter label{
        position: relative;
    }
    table.dataTable.dtr-inline.collapsed>tbody>tr>td.dtr-control:before{
        background-color:  #2e612e!important;
    }
    .dt-buttons{
       text-align: center;
       padding: 0 0 20px 0;
    }
    .dt-buttons button{
        border-radius: 3px;
        background-color: #fff;
        border: none!important;
        box-shadow: 0px 0px 4px rgba(50, 162, 50, 0.8)!important;
    }
    .dataTables_length, .dataTables_filter{
        display: inline!important;
    }
    .dataTables_filter{
        float: right;
    }

    .actif{
            padding: 0 8px;
            font-size: 12px;
            color: white;
            border-radius: 5px;
            background-color: rgba(50, 162, 50, 0.8);
            box-shadow: 0px 0px 4px rgba(50, 162, 50, 0.8)!important;
        }
        .inactif{
            padding: 0 10px;
            font-size: 12px;
            color: white;
            border-radius: 5px;
            background-color: rgb(255, 0, 0, 0.8);
            box-shadow: 0px 0px 4px rgba(255, 0, 0, 0.8)!important;
        }

    /* modal-dialog */

    .label2{
        margin-left: 100px;
    }
    .label1{
        margin-left: -15px;
    }
    .modal-dialog{
        max-width: 800px!important;
    }

    @media all and (max-width: 768px){
    .modal-dialog{
        max-width: 576px!important;
    }
    .label2{
        margin-left: 30px!important;
        font-size: 12px!important;
    }
    .label1{
        margin-left: 0!important;
        font-size: 12px!important;
    }
    }

</style>
