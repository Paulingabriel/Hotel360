<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap');

.container-lg{
    padding-top: 0!important;
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
    padding: 0 15px 0 15px!important;
}

.form-section .form-control:focus{
    border: 1px solid  rgba(50, 162, 50, 0.8)!important;
    box-shadow: 0px 0px 4px rgba(50, 162, 50, 0.8)!important;

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
}
.btn-actions .btn-cancel{
    background-color: #e91717;
}


/* The switch - the box around the slider */
.switch {
  position: relative;
  display: inline-block;
  width: 30px;
  height: 17px;
}

/* Hide default HTML checkbox */
.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color:  rgba(50, 162, 50, 0.8);
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 13px;
  width: 13px;
  right: 2px;
  bottom: 2.1px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
    background-color: #ccc;
}

input:focus + .slider {
    box-shadow: 0 0 1px rgba(50, 162, 50, 0.8);
}

input:checked + .slider:before {
  -webkit-transform: translateX(-13px);
  -ms-transform: translateX(-13px);
  transform: translateX(-13px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}

input[type='date']{
    padding: 6px 12px 6px 12px !important;
}

td{
    display: flex;
    justify-content: center;
    align-items: center;
}

</style>
