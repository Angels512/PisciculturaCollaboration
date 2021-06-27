$('.hora').datetimepicker({
    widgetPositioning: {
        horizontal: 'right'
    },
    format: 'LT',
    debug: false
});


$(document).on("click","#newmortandad",function(){

    $('#modalmortandad').modal('show');
});

$(document).on("click","#newnovedad",function(){

    $('#modalnovedad').modal('show');
});

    
    
