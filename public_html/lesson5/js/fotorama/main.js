(function () {

    /**
     * Test `fototama` http://fotorama.io/customize/api/
     */
    var fotoramaInit = function () {

        console.log('fotoramaInit');

        var $divFotorama = $('.fotorama').fotorama({
            width: '100%',
            height: '100%',
            nav: "thumbs",
            allowfullscreen: "native"
        });

        var $fotorama = $divFotorama.data('fotorama');
        $fotorama.show();
    };
    if (fotoramaStart) fotoramaInit();





})();