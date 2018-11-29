<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Israel Appiah NKum">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('img/itsu.jpeg')}}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Union Management System') }}</title>
    <!-- This page CSS -->
    <!-- chartist CSS -->
    <link href="http://eliteadmin.themedesigner.in/demos/bt4/assets/node_modules/morrisjs/morris.css" rel="stylesheet">
    <!-- Vector CSS -->
    <link href="http://eliteadmin.themedesigner.in/demos/bt4/assets/node_modules/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <!--c3 CSS -->
    <link href="{{asset('css/dataTables.css')}}" rel="stylesheet">
    <link href="{{asset('css/pages/easy-pie-chart.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{asset('css/steps.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.min.css')}}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
   <link href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css" rel="stylesheet">
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/themify-icons/0.1.2/css/themify-icons.css'>
    <!-- Dashboard 1 Page CSS -->
    <link href="{{asset('css/pages/dashboard2.css')}}" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="horizontal-nav skin-megna fixed-layout">
<!-- ============================================================== -->
<!-- Preloader - style you can find in spinners.css -->
<!-- ============================================================== -->
<div class="preloader">
    <div class="loader">
        <div class="loader__figure"></div>
        <p class="loader__label">Union Mangement</p>
    </div>
</div>