<html>

<head>
    <title>Medbux-Admin Panel</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        table tr td,th{font-size: 12px;text-align: center}

    </style>
</head>
<body>
<div class="container-fluid">
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="<?= base_url('Admin/AdminDashboard')?>">Medpux</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="glyphicon glyphicon-alert"></i> Test
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?= base_url()?>Admin/Test/NewTest"><i class="glyphicon glyphicon-plus-sign"></i>&nbsp; Add Test</a></li>
                        <li><a href="<?= base_url()?>Admin/Test/ViewTest"><i class="glyphicon glyphicon-eye-open"></i>&nbsp;View/Test</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Labs
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?= base_url()?>Admin/ManageLab">Manager Labs</a></li>

                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Transactions
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">List Transactions</a></li>
                    </ul>
                </li>
                <!--
                <li><a href="#">Page 2</a></li>
                <li><a href="#">Page 3</a></li>-->
            </ul>
        </div>
    </nav>
