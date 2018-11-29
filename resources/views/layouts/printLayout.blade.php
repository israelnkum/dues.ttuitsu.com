<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Basic Page Needs
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <!-- COMMON TAGS -->
    <meta charset="utf-8">
    <title>Printing</title>

    <!-- Search Engine -->
    <meta name="description" content="printThis is an extensible jQuery printing plugin that allows for printing specific or multiple DOM elements">
    <meta name="image" content="https://jasonday.github.io/printThis/assets/images/print.png">
    <!-- Schema.org for Google -->
    <meta itemprop="name" content="printThis - jQuery printing plugin">
    <meta itemprop="description" content="printThis is an extensible jQuery printing plugin that allows for printing specific or multiple DOM elements">
    <meta itemprop="image" content="https://jasonday.github.io/printThis/assets/images/print.png">
    <!-- Twitter -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="printThis - jQuery printing plugin">
    <meta name="twitter:description" content="printThis is an extensible jQuery printing plugin that allows for printing specific or multiple DOM elements">
    <meta name="twitter:image:src" content="https://jasonday.github.io/printThis/assets/images/print.png">
    <!-- Open Graph general (Facebook, Pinterest & Google+) -->
    <meta name="og:title" content="printThis - jQuery printing plugin">
    <meta name="og:description" content="printThis is an extensible jQuery printing plugin that allows for printing specific or multiple DOM elements">
    <meta name="og:image" content="https://jasonday.github.io/printThis/assets/images/print.png">
    <meta name="og:url" content="https://jasonday.github.io/printThis/">
    <meta name="og:site_name" content="Print Receipt">
    <meta name="og:type" content="website">

    <!-- Mobile Specific Metas
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- FONT
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <link href="https://fonts.googleapis.com/css?family=Cabin|Roboto+Condensed:700" rel="stylesheet">

    <!-- CSS
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <link rel="stylesheet" href="{{asset('css1/normalize.css')}}">
    <link rel="stylesheet" href="{{asset('css1/skeleton.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>
<body class="bg-white" style="font-family: Arial">
<section class="container " aria-describedby="demos">
    <br/>
    <div class="row">
        <div class="col-md-12 text-right m-b-40">
            <a id="basic" href="#nada" class="button button-primary">Print receipt</a>
            <a id="basic" href="{{route('student.index')}}" class="button button-primary">Go Back</a>
        </div>
    </div>

    @for($i=0;$i<2;$i++)
        @foreach($student as $std)
            <div class="demo">
                <img id="kitty-one" alt="cute kitten" src="{{asset('img/header.jpg')}}" />
                <div>
                    <div class="row mt-3 ml-5 receipt-content mr-5">
                        <div class="col-md-6 text-justify ">
                            <h2 class="mt-0 mb-0 display-5">Name: {{ucwords($std->lastName." ".$std->firstName." ".$std->otherName) }}</h2>
                            <h2 class="mt-0 mb-0">Index Number: {{$std->indexNumber}}</h2>
                            <h2 class="mt-0 mb-0">Level: {{$getStudentLevel}}</h2>
                        </div>

                        <div class="col-md-6 text-right">
                            <h2 class="mt-0 mb-0">Date: {{substr($std->created_at,0,10)}}</h2>
                            <h2 class="mt-0 mb-0">Time: {{substr($std->created_at,10)}}</h2>
                            <h2 class="mt-0 mb-0">Ref. Number: {{"ITSU".$receipt}}</h2>
                        </div>
                    </div>
                </div>
                <br><br><br><br>
                <hr>
                <div>
                    <div class="row mt-3 ml-5 receipt-content mr-5">
                        <div class="col-md-6 text-justify ">
                            <h2 class="mt-0 mb-0 display-5">Amount(Figures): </h2>
                            <h2 class="mt-0 mb-0">Amount in Words:</h2>
                            <h2 class="mt-0 mb-0">Arrears: </h2>
                        </div>

                        <div class="col-md-6 text-right">
                            <h2 class="mt-0 mb-0"> {{$amount}}</h2>
                            <h2 class="mt-0 mb-0"> {!! convert($amount) !!}</h2>
                            <h2 class="mt-0 mb-0"> {{$arrears}}</h2>
                        </div>
                    </div>
                </div>
                <br><br><br><br>
                <hr>
                <div>
                    <div class="row mt-3 ml-5 receipt-content mr-5">
                        <div class="col-md-6 text-justify ">
                            <h2 class="mt-0 mb-0 display-5">Souvenir's </h2>
                        </div>

                        <div class="col-md-6 text-right">
                            <h2 class="mt-0 mb-0"> {{$std->souvenir}}</h2>
                        </div>
                    </div>
                </div>
                <br><br><br><br>
                <hr>
                <div>
                    <div class="row mt-3 ml-5 receipt-content mr-5">
                        <div class="col-md-6 text-justify ">
                            <h2 class="mt-0 mb-0 display-5 mt-5">............................</h2>
                            <h2 class="mt-0 mb-0 display-5">Student Signature</h2>
                        </div>

                        <div class="col-md-6 text-right">
                            <h2 class="mt-0 mb-0 display-5 mt-5">..............................</h2>
                            <h2 class="mt-0 mb-0"> {{$user}}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <hr/>
            <section class="container">
                <div class="row">
                    <div class="demo twelve columns">
                        <img id="kitty-one" alt="cute kitten" src="{{asset('img/footer.jpg')}}" />
                        <br><br>
                        <p>........................................................
                            ........................................................
                            ........................................................
                            ........................................................
                            ........................................................
                            .....................................................</p>
                        <br><br>
                    </div>
                </div>
            </section>

        @endforeach
    @endfor
</section>
<!-- jQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- printThis -->

<script type="text/javascript" src="{{asset('js/printThis.js')}}"></script>

<!-- demo -->
<script>
    $('#basic').on("click", function () {
        $('.demo').printThis({
            base: "https://jasonday.github.io/printThis/"
        });
    });


    $('#advanced').on("click", function () {
        $('#kitty-one, #kitty-two, #kitty-three').printThis({
            importCSS: false,
            header: "<h1>Look at all of my kitties!</h1>",
            base: "https://jasonday.github.io/printThis/"
        });
    });
</script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-114774247-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-114774247-1');
</script>

</body>

</html>
