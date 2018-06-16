function setCurentSum() {
    var ppInputSum = $('#ppInputSum'),
        ppInputSumEnrolled = $('#ppInputSumEnrolled'),
        ppComision = $('[data-comision]').attr('data-comision'),
        currentCurs = $("[data-curs-advcash]").attr('data-curs-advcash')/$("[data-curs-uan]").attr('data-curs-uan');


    $(ppInputSum).keyup(function (e) {
        var sumValue = e.target.value/currentCurs; //- ppComision;
        sumValue = sumValue.toFixed(4);
        if(sumValue > 0) $(ppInputSumEnrolled).val(sumValue);
        else $(ppInputSumEnrolled).val('');
    });

    $(ppInputSumEnrolled).keyup(function (e) {
        var sumValue = (e.target.value*currentCurs);
        sumValue = (sumValue.toFixed(4));
        if(sumValue > 0) $(ppInputSum).val(sumValue);
        else $(ppInputSum).val('');
    });
}
setCurentSum();


$(".numeric").numeric({ decimal : ".",  negative : false, scale: 4 });
