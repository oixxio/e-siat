requirejs(['jQuery', 'underscore', 'backbone', 'socket.io', 'application', 'canvasjs.min'], function(){
	
	$(document).ready(function(){
		$('body').on('click', '.chat-head', function(){
			$("#hidden").append($(this).parent());
		});
		$('body').on('click', '.openChat', function(){
			var cont = 0;
			var found = false;
			var clickId = $(this).attr('id');
			$("#chatBar .chat-head").each(function(){
				if("#"+$(this).attr('id') == clickId)
					found = true;
				cont ++;
				if(cont == 3 && !found){
					$("#hidden").append($(this).parent());
				}
			});
			
			if(!found){
				var selector = $(this).attr('id');
				$("#chatBar").append($(selector).parent());
			}
		});
		
		var points = new Array();
		
		$.ajax({
			url : "JSONDATA/getDosis.php",
			type : "POST",
			data : {
				
			},
			success : function(data){
				var result = $.parseJSON(data);
				var array = new Array();
				
				
				
				console.log(result);
					var chart = new CanvasJS.Chart("chartContainer",
					{     
					  axisY2:{ 
						title: "Dosis",
						includeZero: false,
						suffix : "",
						lineColor: "#C24642"
					  },
					  axisX: {
						title: "Fecha",
						suffix : ""
					  },
					  data: [
						  {        
							type: "spline",  
							axisYType: "secondary"  ,
							name: "distance covered",
							dataPoints: result
						  } 
					  ]
					});

				chart.render();
			}
		});
        
		
		
	});
	
});