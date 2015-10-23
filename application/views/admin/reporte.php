<?php	

 if($consulta==TRUE){

 	
 		
 			 
 			  
 		 if( isset($consulta[0]['REGISTRO'])){
         	 $registro=$consulta[0]['REGISTRO'];
         } 
          if( isset($consulta[1]['REGISTRO'])){
         	 $registro1=$consulta[1]['REGISTRO'];
         } 
          if( isset($consulta[2]['REGISTRO'])){
         	 $registro2=$consulta[2]['REGISTRO'];
         } 
          if( isset($consulta[3]['REGISTRO'])){
         	 $registro3=$consulta[3]['REGISTRO'];
         } 
          if( isset($consulta[4]['REGISTRO'])){
         	 $registro4=$consulta[4]['REGISTRO'];
         } 
          if( isset($consulta[5]['REGISTRO'])){
         	 $registro5=$consulta[5]['REGISTRO'];
         } 
          if( isset($consulta[6]['REGISTRO'])){
         	 $registro6=$consulta[6]['REGISTRO'];
         } 
          if( isset($consulta[7]['REGISTRO'])){
         	 $registro7=$consulta[7]['REGISTRO'];
         } 
          if( isset($consulta[8]['REGISTRO'])){
         	 $registro8=$consulta[8]['REGISTRO'];
         } 
          if( isset($consulta[9]['REGISTRO'])){
         	 $registro9=$consulta[9]['REGISTRO'];
         } 
          if( isset($consulta[10]['REGISTRO'])){
         	 $registro10=$consulta[10]['REGISTRO'];
         } 
          if( isset($consulta[11]['REGISTRO'])){
         	 $registro11=$consulta[11]['REGISTRO'];
         } 
              
     
            

         }
$totaldoc=$registro+$registro1+$registro2+$registro3+$registro4+$registro5+$registro6+$registro7+$registro8+$registro9+$registro10+$registro11;
   ?>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
				<li class="active">Reportes</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12"> 
				<h1 class="page-header">Gráfico</h1>
				
			</div>
		</div><!--/.row-->
		
	<!-- 	<div class="row" style="display:none;">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Line Chart</div>
					<div class="panel-body">
						<div class="canvas-wrapper">
							<canvas class="main-chart" id="line-chart" height="200" width="600"></canvas>
						</div>
					</div>
				</div>
			</div>
		</div> --><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Documentos</div>
					<div class="panel-body">
						<div class="canvas-wrapper">
							<canvas class="main-chart" id="bar-chart" height="200" width="600"></canvas>
						</div>
					</div>
				</div>
			</div>
		</div><!--/.row-->		
		<div class="row" >
			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading">Cuadro Resumen</div>
					<div class="panel-body">
						<div class="canvas-wrapper">
							<table border="1" width="400" align="center">
								<tr align="center">
									<td><b>ENERO</b></td><td><?=$registro?> Documentos</td>
								</tr>
								<tr align="center">
									<td><b>FEBERO</b></td><td><?=$registro1?> Documentos</td>
								</tr>
								<tr align="center">
									<td><b>MARZO</b></td><td><?=$registro2?> Documentos</td>
								</tr>
								<tr align="center">
									<td><b>ABRIL</b></td><td><?=$registro3?> Documentos</td>
								</tr>
								<tr align="center">
									<td><b>MAYO</b></td><td><?=$registro4?> Documentos</td>
								</tr>
								<tr align="center">
									<td><b>JUNIO</b></td><td><?=$registro5?> Documentos</td>
								</tr>
								<tr align="center">
									<td><b>JULIO</b></td><td><?=$registro6?> Documentos</td>
								</tr>
								<tr align="center">
									<td><b>AGOSTO</b></td><td><?=$registro7?> Documentos</td>
								</tr>
								<tr align="center">
									<td><b>SETIEMBRE</b></td><td><?=$registro8?> Documentos</td>
								</tr>
								<tr align="center">
									<td><b>OCTUBRE</b></td><td><?=$registro9?> Documentos</td>
								</tr>
								<tr align="center">
									<td><b>NOVIEMBRE</b></td><td><?=$registro10?> Documentos</td>
								</tr>
								<tr align="center">
									<td><b>DICIEMBRE</b></td><td><?=$registro11?> Documentos</td>
								</tr>
								<tr align="center">
									<td><b>TOTAL</b></td><td><b><?=$totaldoc?> Documentos</b></td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
<!-- 		
		<div class="row" style="display:none;">
			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading">Pie Chart</div>
					<div class="panel-body">
						<div class="canvas-wrapper">
							<canvas class="chart" id="pie-chart" ></canvas>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6" style="display:none;">
				<div class="panel panel-default">
					<div class="panel-heading">Doughnut Chart</div>
					<div class="panel-body">
						<div class="canvas-wrapper">
							<canvas class="chart" id="doughnut-chart" ></canvas>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="row" style="display:none;">
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Label:</h4>
						<div class="easypiechart" id="easypiechart-blue" data-percent="92" ><span class="percent">92%</span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Label:</h4>
						<div class="easypiechart" id="easypiechart-orange" data-percent="65" ><span class="percent">65%</span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Label:</h4>
						<div class="easypiechart" id="easypiechart-teal" data-percent="56" ><span class="percent">56%</span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Label:</h4>
						<div class="easypiechart" id="easypiechart-red" data-percent="27" ><span class="percent">27%</span>
						</div>
					</div>
				</div>
			</div>
		</div>
											
	</div>	-->
	<script type="text/javascript">
	var randomScalingFactor = function(){ return Math.round(Math.random()*1000)};
	
	// var lineChartData = {
	// 		labels : ["January","February","March","April","May","June","July"],
	// 		datasets : [
	// 			{
	// 				label: "My First dataset",
	// 				fillColor : "rgba(220,220,220,0.2)",
	// 				strokeColor : "rgba(220,220,220,1)",
	// 				pointColor : "rgba(220,220,220,1)",
	// 				pointStrokeColor : "#fff",
	// 				pointHighlightFill : "#fff",
	// 				pointHighlightStroke : "rgba(220,220,220,1)",
	// 				data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
	// 			},
	// 			{
	// 				label: "My Second dataset",
	// 				fillColor : "rgba(48, 164, 255, 0.2)",
	// 				strokeColor : "rgba(48, 164, 255, 1)",
	// 				pointColor : "rgba(48, 164, 255, 1)",
	// 				pointStrokeColor : "#fff",
	// 				pointHighlightFill : "#fff",
	// 				pointHighlightStroke : "rgba(48, 164, 255, 1)",
	// 				data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
	// 			}
	// 		]

	// 	}
		
	var barChartData = {
			labels : ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"],
			datasets : [
				// {
				// 	fillColor : "rgba(220,220,220,0.5)",
				// 	strokeColor : "rgba(220,220,220,0.8)",
				// 	highlightFill: "rgba(220,220,220,0.75)",
				// 	highlightStroke: "rgba(220,220,220,1)",
				// 	data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
				// },
				{
					fillColor : "rgba(48, 164, 255, 0.2)",
					strokeColor : "rgba(48, 164, 255, 0.8)",
					highlightFill : "rgba(48, 164, 255, 0.75)",
					highlightStroke : "rgba(48, 164, 255, 1)",
					data : [<?=$registro?>,<?=$registro1?>,<?=$registro2?>,<?=$registro3?>,<?=$registro4?>,<?=$registro5?>,<?=$registro6?>,<?=$registro7?>,
					<?=$registro8?>,<?=$registro9?>,<?=$registro10?>,<?=$registro11?>]
				}
			]
	
		}

	// var pieData = [
	// 			{
	// 				value: 300,
	// 				color:"#30a5ff",
	// 				highlight: "#62b9fb",
	// 				label: "Blue"
	// 			},
	// 			{
	// 				value: 50,
	// 				color: "#ffb53e",
	// 				highlight: "#fac878",
	// 				label: "Orange"
	// 			},
	// 			{
	// 				value: 100,
	// 				color: "#1ebfae",
	// 				highlight: "#3cdfce",
	// 				label: "Teal"
	// 			},
	// 			{
	// 				value: 120,
	// 				color: "#f9243f",
	// 				highlight: "#f6495f",
	// 				label: "Red"
	// 			}

	// 		];
			
	// var doughnutData = [
	// 				{
	// 					value: 300,
	// 					color:"#30a5ff",
	// 					highlight: "#62b9fb",
	// 					label: "Blue"
	// 				},
	// 				{
	// 					value: 50,
	// 					color: "#ffb53e",
	// 					highlight: "#fac878",
	// 					label: "Orange"
	// 				},
	// 				{
	// 					value: 100,
	// 					color: "#1ebfae",
	// 					highlight: "#3cdfce",
	// 					label: "Teal"
	// 				},
	// 				{
	// 					value: 120,
	// 					color: "#f9243f",
	// 					highlight: "#f6495f",
	// 					label: "Red"
	// 				}
	
	// 			];

window.onload = function(){
	// var chart1 = document.getElementById("line-chart").getContext("2d");
	// window.myLine = new Chart(chart1).Line(lineChartData, {
	// 	responsive: true
	// });
	var chart2 = document.getElementById("bar-chart").getContext("2d");
	window.myBar = new Chart(chart2).Bar(barChartData, {
		responsive : true
	});
	// var chart3 = document.getElementById("doughnut-chart").getContext("2d");
	// window.myDoughnut = new Chart(chart3).Doughnut(doughnutData, {responsive : true
	// });
	// var chart4 = document.getElementById("pie-chart").getContext("2d");
	// window.myPie = new Chart(chart4).Pie(pieData, {responsive : true
	// });
	
};</script>
