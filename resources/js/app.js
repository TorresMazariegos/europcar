require('./bootstrap');


$('.datepicker').datepicker({
    format: 'dd-mm-yyyy',
    language: "es",
    autoclose: true,
    //todayHighlight: true, 
    startDate: '-1',   
}).datepicker("setDate",'now');
