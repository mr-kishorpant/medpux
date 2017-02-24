<html>

    <head>
        <title>Medbux-Dashboard for Labs</title>
        <!-- jQuery library -->

       <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
        <style>
            table tr td,th{font-size: 12px;text-align: center}

        </style>
        <!-- Latest compiled JavaScript -->


    </head>
    <body>
        <div class="container-fluid">
            <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="<?= base_url('Dashboard')?>">Medpux</a>
                    </div>
                    <!--
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Home</a></li>
                        <li><a href="#">Page 1</a></li>
                        <li><a href="#">Page 2</a></li>
                    </ul>-->
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href=""><span class="glyphicon glyphicon-bell"></span></a></li>
						<li class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" href="#"><?= $this->session->client_name?><span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?= base_url('/Dashboard/Logout');?>">Logout</a></li>
                    </ul>
                </li>
                
                    </ul>
                </div>
            </nav>

