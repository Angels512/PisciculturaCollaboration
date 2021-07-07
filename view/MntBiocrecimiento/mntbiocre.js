
/*Sliders Rangos*/ 
$(document).ready(function(){


    $("#peso_organ").ionRangeSlider({
        min: 0.8,
        max: 500,
        grid: true,
        hide_min_max: true
    });

    $("#peso_biomasa").ionRangeSlider({
        min: 0.8,
        max: 500,
        grid: true,
        hide_min_max: true
    });

    $("#edad_organismo").ionRangeSlider({
        min: 1,
        max: 24,
        grid: true,
        hide_min_max: true
    });

    $("#talla_organismo").ionRangeSlider({
        min: 0.5,
        max: 35,
        grid: true,
        hide_min_max: true
    });
});
