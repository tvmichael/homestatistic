<?php
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Yandex Metrika: Simple page</title>
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">

    <!-- Yandex.Metrika counter -->
    <script type="text/javascript" >
        (function (d, w, c) {
            (w[c] = w[c] || []).push(function() {
                try {
                    w.yaCounter49513357 = new Ya.Metrika2({
                        id:49513357,
                        clickmap:true,
                        trackLinks:true,
                        accurateTrackBounce:true,
                        ecommerce:"dataLayer"
                    });
                } catch(e) { }
            });

            var n = d.getElementsByTagName("script")[0],
                s = d.createElement("script"),
                f = function () { n.parentNode.insertBefore(s, n); };
            s.type = "text/javascript";
            s.async = true;
            s.src = "https://mc.yandex.ru/metrika/tag.js";

            if (w.opera == "[object Opera]") {
                d.addEventListener("DOMContentLoaded", f, false);
            } else { f(); }
        })(document, window, "yandex_metrika_callbacks2");
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/49513357" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->
</head>
<body>
<header>
    <h1>Yandex Metrica</h1>
</header>
<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Yandex.Metrika counter</h3>
                    </div>
                    <div class="panel-body">
                        <button id="btn-add" onclick="metrikaAdd()" class="btn btn-default" type="submit">add</button>
                        <button class="btn btn-default" type="submit">buy</button>
                        <button class="btn btn-default" type="submit">delete</button>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        Metrika counter
                    </div>
                    <div class="panel-body">
                        <pre>
                            <code>
                                <!- Yandex.Metrika counter ->
                                <>script type="text/javascript" >
                                    (function (d, w, c) {
                                        (w[c] = w[c] || []).push(function() {
                                            try {
                                                w.yaCounter49513357 = new Ya.Metrika2({
                                                    id:49513357,
                                                    clickmap:true,
                                                    trackLinks:true,
                                                    accurateTrackBounce:true
                                                });
                                            } catch(e) { }
                                        });

                                        var n = d.getElementsByTagName("script")[0],
                                            s = d.createElement("script"),
                                            f = function () { n.parentNode.insertBefore(s, n); };
                                        s.type = "text/javascript";
                                        s.async = true;
                                        s.src = "https://mc.yandex.ru/metrika/tag.js";

                                        if (w.opera == "[object Opera]") {
                                            d.addEventListener("DOMContentLoaded", f, false);
                                        } else { f(); }
                                    })(document, window, "yandex_metrika_callbacks2");
                                <>/script>
                                <>noscript>
                                    <>div>
                                        <>img src="https://mc.yandex.ru/watch/49513357" style="position:absolute; left:-9999px;" alt="" />
                                    <>/div>
                                <>noscript>
                                <!-- /Yandex.Metrika counter -->
                                </code>
                        </pre>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<footer>
    <p class="text-center">
        Test Ya.metrika
    </p>
    <!-- Yandex.Metrika informer -->
    <a href="https://metrika.yandex.ru/stat/?id=49513357&amp;from=informer" target="_blank" rel="nofollow">
        <img src="https://informer.yandex.ru/informer/49513357/3_0_FFFFFFFF_EFEFEFFF_0_pageviews" style="width:88px; height:31px; border:0;" alt="Яндекс.Метрика" title="Яндекс.Метрика: дані за сьогодні (перегляди, візити та унікальні відвідувачі)" class="ym-advanced-informer" data-cid="49513357" data-lang="ua" />
    </a>
    <!-- /Yandex.Metrika informer -->
</footer>

<script>
    var add = document.getElementById('btn-add');

    document.addEventListener("DOMContentLoaded", function () {
        window.dataLayer = window.dataLayer || [];
    });



    function metrikaAdd(){
        window.dataLayer.push({
            "ecommerce": {
                "currencyCode": "RUB",
                "add" : {
                    "products": [
                        {
                            "id": "12345",
                            "name": "Test",
                            "price": 12345,
                            "brand": "legko.add",
                            "category": "legko/test/add",
                            "quantity": 1
                        }
                    ]
                }
            }
        });
        console.log(dataLayer);
    }

</script>
</body>
</html>
