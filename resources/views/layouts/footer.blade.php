
			
		<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>	
		<script src="{{ url('js/bootstrap.min.js') }}"></script>
		<script src="{{ url('js/global.js') }}"></script>
		<script src="{{ url('js/custom.js') }}"></script>
		<script src="{{ url('js/svg_img.js') }}"></script>
		<script src="{{ url('js/chosen.jquery.js') }}"></script>

	<script>
		function detectIE() {
		    var ua = window.navigator.userAgent;
		    var msie = ua.indexOf('MSIE ');
		    if (msie > 0) {
		        // IE 10 or older => return version number
		        return parseInt(ua.substring(msie + 5, ua.indexOf('.', msie)), 10);
		    }
		    var trident = ua.indexOf('Trident/');
		    if (trident > 0) {
		        // IE 11 => return version number
		        var rv = ua.indexOf('rv:');
		        return parseInt(ua.substring(rv + 3, ua.indexOf('.', rv)), 10);
		    }
		    var edge = ua.indexOf('Edge/');
		    if (edge > 0) {
		       // Edge (IE 12+) => return version number
		       return parseInt(ua.substring(edge + 5, ua.indexOf('.', edge)), 10);
		    }
		    // other browser
		    return false;
		}
		$(document).ready(function(){
			if(detectIE() >= 7 && detectIE() <= 20 )
			{
				var url = "{{ url('css/ie.css') }}";
				$('head').append('<link rel="stylesheet" href="'+url+'" type="text/css" />');
				$('body').addClass('ie');
			}	
		});
	</script>
		
	</body>
</html>