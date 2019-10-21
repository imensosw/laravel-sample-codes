<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>UL</title>		
	<link rel="icon" type="image/png" href="{{ url('images/favicon.png') }}">
	<!-- this JQuery version responsible for svg image color change -->

	<!--   SVG image color file-->
	<link href="{{ url('css/font-awesome.min.css') }}" rel="stylesheet">
	<!-- select form-->	

	<!-- This is what you need popup effect -->
	<!-- <script src="//code.jquery.com/jquery-2.1.1.js"></script>
    <script src="js/sweetalert.min.js"></script>
    <link rel="stylesheet" href="css/sweetalert.css"> -->
    <!-- <script src="js/jquery.min.js"></script> -->

    <link href="{{ url('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('css/style.css') }}" rel="stylesheet">
    <link href="{{ url('css/chosen.css') }}" rel="stylesheet">
    <link href="{{ url('css/responsive.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ url('css/jquery.dataTables.css') }}">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link href="{{ url('css/getorgchart.css') }}" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>	
    <script src="{{ url('js/getorgchart.js') }}"></script>
    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>	
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.0/js/bootstrap-toggle.min.js"></script>	
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script>
    
	<!--[if lt IE 9]>
	<script src="../assets/js/ie8-responsive-file-warning.js"></script>
	<![endif]-->
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<script type="text/javascript"> 
		function showMessage(message , messageType , validity = 10000000)
		{
			$(".message").html(
				'<div class="alert alert-'+messageType+'"><a href="#" class="closeMsg" data-dismiss="alert" aria-label="close"><img src="{{ url('images/icons/close.svg') }}" alt="close" class="im-close svg"></a><p style="diplay:inline-block">'+message+'</p></div>'
				);
			setTimeout(function(){$(".close").trigger('closeMsg');$(".message").html('');},validity);
		}
		$(document).ready(function(){
			@if(session('message'))
			showMessage( "{{ session('message') }}" , 'success' , '10000');
			@endif
		});
		function openModel(modelUrl , modalTitle = '' ,id = false) 
	    {
	        $("#modalTitle").html(modalTitle);
	        $.ajax({
	            type: "GET",
	            url: "{{ url('') }}/"+modelUrl,
	            contentType: false,
	            cache: false,           
	            data : {id:id} ,
	            success: function (data) {
	                $("#modalBody").html(data);
	                $('#globleModal').modal('show');
	            },
	            error: function (xhr, status, error) {
	                alert(error);
	            }
	        });
	    }
	</script>

	<!--[if lte IE 11]>  <link href="{{ url('css/ie.css') }}" rel="stylesheet"> <![endif]-->
	</head>
	<!--[if lt IE 12]>     <body class="ie"> <![endif]-->
	<body>
		<div class="message">
			
		</div>

		<!-- Modal -->
		<div id="globleModal" class="modal fade" role="dialog">
			<div class="modal-dialog modal-lg">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"><img src="{{ url('images/icons/close.svg') }}"  alt="close" class="svg close"></button>
						<h4 id="modalTitle" class="modal-title"></h4>
					</div>
					<div id="modalBody" class="modal-body p_30"></div>
					<!--  <div id="modalFooter" class="modal-footer"></div> -->
				</div>
			</div>
		</div>
		<div class="main_container"><!-- main container open -->			
			<div class="row1"> <!-- main row open -->