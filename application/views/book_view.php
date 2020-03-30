<html>
<head>
    <title>ITX.WEB.ID</title>
    <base href="<?php echo base_url(); ?>" />
    <style type="text/css">
        body {
            font-family: Arial, Helvetica, sans-serif;
        }
        #tabs {
            font-size: .9em;
            margin: 0 auto;
            width: 800px;
        }

        .ui-widget-content {
            font-size: .8em;
        }

        #tabel, #tabel2 {
            font-size: 1.3em;
            width: 100%;
        }

        #tabel tr:nth-child(2n) {
            background: #EAEAEA;
        }

        #tabel tr:hover {
            background: #CCCCCC;
        }

        #tabel td {
            padding: 6px;
            margin: 8px;
        }
    </style>
</head>
<body>
<center><h2> Book & Member List</h2></center>
<div id="tabs">

    <ul>
        <li><a href="#read">Book List</a></li>
		<li><a href="#read2">Member List</a></li>
    </ul>

    <div id="read">
        <table id="tabel"></table>
    </div>

	<div id="read2">
        <table id="tabel2"></table>
    </div>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script type="text/javascript">
    $( function() {
    $( '#tabs' ).tabs({
        fx: { height: 'toggle', opacity: 'toggle' }
    });

    $.ajax({
        url: 'index.php/belajar/readBook',
        dataType: 'json',
        success: function( response ) {
            $( '#readTemp' ).render( response ).appendTo( "#tabel" );
        }
    });

    $.ajax({
        url: 'index.php/belajar/readMember',
        dataType: 'json',
        success: function( response ) {
            $( '#readTemp2' ).render( response ).appendTo( "#tabel2" );
        }
    });

});
</script>

<script type="text/template" id="readTemp">
    <tr>
        <td>${id}</td>
        <td>${title}</td>
        <td>${author}</td>
    </tr>

</script>

<script type="text/template" id="readTemp2">
    <tr>
        <td>${no}</td>
        <td>${name}</td>s
        <td>${address}</td>
    </tr>

</script>

<script type="text/javascript" src="cssjs/all.js"></script>
</body>
</html>