require('./bootstrap');

import $ from 'jquery';
window.$ = window.jQuery = $;

import 'jquery-ui/ui/widgets/datepicker.js';

$.datepicker.regional['es'] = {
    closeText: 'Cerrar',
    prevText: '< Ant',
    nextText: 'Sig >',
    currentText: 'Hoy',
    monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
    monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
    dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
    dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
    dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
    weekHeader: 'Sm',
    dateFormat: 'dd/mm/yy',
    firstDay: 1,
    isRTL: false,
    showMonthAfterYear: false,
    yearSuffix: ''
    };
    $.datepicker.setDefaults($.datepicker.regional['es']);

$('#fecha').datepicker( {
    changeMonth: true,
    showButtonPanel: true,
    dateFormat: 'mm',
    onClose: function(dateText, inst) {
        $(this).datepicker('setDate', new Date(null, inst.selectedMonth, 1));
    }
    }
).focus(function () {
    $(".ui-datepicker-calendar").hide();
    $(".ui-datepicker-year").hide();
});
$('#anio').datepicker( {
    changeYear: true,
    showButtonPanel: true,
    dateFormat: 'yy',
    onClose: function(dateText, inst) {
        $(this).datepicker('setDate', new Date(inst.selectedYear, null, 1));
    }
    }
).focus(function () {
    $(".ui-datepicker-calendar").hide();
    $(".ui-datepicker-month").hide();
});
