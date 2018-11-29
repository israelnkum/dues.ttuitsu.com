<?php
function convert_number($number){

    if (($number < 0) || ($number > 999999999)) {
        return "$number";
    }

    $Gn = floor($number / 1000000); /* Millions (giga) */
    $number -= $Gn * 1000000;
    $kn = floor($number / 1000); /* Thousands (kilo) */
    $number -= $kn * 1000;
    $Hn = floor($number / 100); /* Hundreds (hecto) */
    $number -= $Hn * 100;
    $Dn = floor($number / 10); /* Tens (deca) */
    $n = $number % 10; /* Ones */

    $res = "";

    if ($Gn) {
        $res .= convert_number($Gn) . " Million";
    }

    if ($kn) {
        $res .= (empty($res) ? "" : " ") .
            convert_number($kn) . " Thousand";
    }

    if ($Hn) {
        $res .= (empty($res) ? "" : " ") .
            convert_number($Hn) . " Hundred";
    }

    $ones = array(
        "",
        "One",
        "Two",
        "Three",
        "Four",
        "Five",
        "Six",
        "Seven",
        "Eight",
        "Nine",
        "Ten",
        "Eleven",
        "Twelve",
        "Thirteen",
        "Fourteen",
        "Fifteen",
        "Sixteen",
        "Seventeen",
        "Eighteen",
        "Nineteen");
    $tens = array(
        "",
        "",
        "Twenty",
        "Thirty",
        "Fourty",
        "Fifty",
        "Sixty",
        "Seventy",
        "Eighty",
        "Ninety");

    if ($Dn || $n) {
        if (!empty($res)) {
            $res .= " and ";
        }

        if ($Dn < 2) {
            $res .= $ones[$Dn * 10 + $n];
        } else {
            $res .= $tens[$Dn];
            if ($n) {
                $res .= "-" . $ones[$n];
            }
        }
    }

    if (empty($res)) {
        $res = "zero";
    }

    return $res;

//$thea=explode(".",$res);
}


function convert($amt)
{
//$amt = "190120.09" ;

    $amt = number_format($amt, 2, '.', '');
    $thea = explode(".", $amt);

//echo $thea[0];

    $words = convert_number($thea[0]) . " Ghana Cedis ";
    if ($thea[1] > 0) {
        $words .= convert_number($thea[1]) . " Pesewas";
    }

    return ($words) ;
}?>
        <!DOCTYPE html>
<html lang="en">

<head>

    <!-- Basic Page Needs
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <!-- COMMON TAGS -->
    <meta charset="utf-8">
    <title>Printing - Union Resource Management System</title>

    <!-- Search Engine -->
    <!-- Schema.org for Google -->
    <meta itemprop="name" content="Official Receipt - Union Resource Management System(ITSU)">
    <meta itemprop="description" content="Offical Receipt printing">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="printThis - jQuery printing plugin">
    <meta name="twitter:description" content="printThis is an extensible jQuery printing plugin that allows for printing specific or multiple DOM elements">
    <meta name="twitter:image:src" content="https://jasonday.github.io/printThis/assets/images/print.png">
    <!-- Open Graph general (Facebook, Pinterest & Google+) -->
    <meta name="og:title" content="printThis - jQuery printing plugin">
    <meta name="og:description" content="printThis is an extensible jQuery printing plugin that allows for printing specific or multiple DOM elements">
    <meta name="og:image" content="https://jasonday.github.io/printThis/assets/images/print.png">
    <meta name="og:url" content="https://jasonday.github.io/printThis/">
    <meta name="og:site_name" content="printThis - jQuery printing plugin">
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
<body>
<section class="container" aria-describedby="demos">
    <br/>
    {{-- <div class="row">
         <div class="col-md-12 text-right m-b-40">
             <a id="basic" href="#" class="button button-primary">Print receipt</a>
             <a href="{{route('student.index')}}" class="button button-primary">Go Back</a>
         </div>
     </div>--}}
    @for($i=0;$i<2;$i++)
        @foreach($student as $std)
            <div class="demo">
                <br><br><br><br><br><br>
                <img id="kitty-one" alt="cute kitten" src="{{asset('img/header.jpg')}}" />
                <div class="row">
                    <div class="col-md-6 mt-2">
                        <h2 class="mt-0 mb-0">Name: {{ucwords($std->lastName." ".$std->firstName." ".$std->otherName) }}</h2>
                        <h2 class="mt-0 mb-0">Index Number: {{$std->indexNumber}}</h2>
                        <h2 class="mt-0 mb-0">Level: {{$getStudentLevel}}</h2>
                    </div>
                    <div class="col-md-6 float-right text-right mt-2">
                        <h2 class="mt-0 mb-0">Date: {{substr($dateTime,0,10)}}</h2>
                        <h2 class="mt-0 mb-0">Time: {{substr($dateTime,10)}}</h2>
                        <h2 class="mt-0 mb-0">Ref. Number: {{"ITSU".$receipt}}</h2>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6 ">
                        <h2 class="mt-0 mb-0 display-5">Amount(Figures): </h2>
                        <h2 class="mt-0 mb-0">Amount in Words:</h2>
                        <h2 class="mt-0 mb-0">Arrears: </h2>
                    </div>
                    <div class="col-md-6 float-right text-right">
                        <h2 class="mt-0 mb-0"> {{$amount}}</h2>
                        <h2 class="mt-0 mb-0"> {!! convert($amount) !!}</h2>
                        <h2 class="mt-0 mb-0"> {{$arrears}}</h2>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6 ">
                        <h2 class="mt-0 mb-0 display-5">Souvenir's </h2>
                    </div>
                    <div class="col-md-6 float-right text-right">
                        <h2 class="mt-0 mb-0"> {{$std->souvenir}}</h2>
                    </div>
                    <div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6 ">
                        <h2 class="mt-0 mb-0 display-5 mt-5">............................</h2>
                        <h2 class="mt-0 mb-0 display-5">Student Signature</h2>
                    </div>
                    <div class="col-md-6 float-right text-right">
                        <h2 class="mt-0 mb-0 display-5 mt-5">..............................</h2>
                        <h2 class="mt-0 mb-0"> {{$user}}</h2>
                    </div>
                </div>

                <div class="row">
                    <div  class="col-md-12 text-center">
                        <img src="{{asset('qrCodes/'.$receipt.'.png')}}">
                    </div>
                </div>
                <br>
                <div class="demo twelve columns">
                    <img id="footer" alt="Footer" src="{{asset('img/footer.jpg')}}" />
                    <br>
                    <p>........................................................
                        ........................................................
                        ........................................................
                        ........................................................
                        ........................................................
                        .....................................................</p>
                    <br>
                </div>
            </div>
        @endforeach
    @endfor
</section>
<br/>
<br/>
<!-- End Document
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<!-- jQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- demo -->
<script>
    window.onload = function() {
        window.print();
        window.close();
        //   window.history.back();

        document.location.href="/student?payment_success";
    }
</script>

</body>

</html>
