<div class="formulaire">
    <div class="titre">
        <h3>Dashboard</h3>
    </div>
    
    <div class="onglet-contenu dashboard-top" >
	      <div id="dashboard-top-item-1" class="dashboard-top-item" >
		      <div class="dashboard-top-item-content">
		      	<span class="dashboard-title-item">Menus</span>
		      	<hr class="souligne">
		      	<span class="dashboard-nb-item" ><?php echo $countMenu; ?></span>
		      </div>
	      </div>
	      <div id="dashboard-top-item-2" class="dashboard-top-item">
		      <div class="dashboard-top-item-content">
		      	<span class="dashboard-title-item">Repas</span>
		      	<hr class="souligne">
		      	<span class="dashboard-nb-item"  ><?php echo $countRepas; ?></span>
		      </div>
	      </div>
	      <div id="dashboard-top-item-3" class="dashboard-top-item">
		      <div class="dashboard-top-item-content">
		      	<span class="dashboard-title-item">Utilisateurs</span>
		      	<hr class="souligne">
		      	<span class="dashboard-nb-item" ><?php echo $countUser; ?></span>
		      </div>
	      </div>
    </div>


    <div id="nbVisiteFinish"  ><?php echo $moisActuel['result']; ?></div>
    <div id="nbVisiteStart"  ><?php echo $moisDernier['result']; ?></div>


    <div class="onglet-contenu dashboard-bottom" >
	    <div id="chart1div" style="width: 100%; height: 355px;">#Donuts</div>
	    <div id="chart2div" style="width: 100%; height: 355px;">#Donuts</div>

		  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
		  integrity="sha256-k2WSCIexGzOj3Euiig+TlR8gA0EmPjuc79OEeY5L45g="
		  crossorigin="anonymous"></script>
		  <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
		  <script src="https://www.amcharts.com/lib/3/pie.js"></script>
		  <script src="https://www.amcharts.com/lib/3/serial.js"></script>
		  <script src="https://www.amcharts.com/lib/3/themes/none.js"></script>
	    </div>
	</div>

    <script>
		$nbVisiteFinish = $("#nbVisiteFinish").text();
		$nbVisiteStart = $("#nbVisiteStart").text();

		  var chart1 = AmCharts.makeChart( "chart1div", {
		    "type": "pie",
		    
		    "dataProvider": [ {
		      "title": "Nombre de visite ce mois",
		      "value": $nbVisiteFinish,
		      "color": "#3e95cd"

		    }, 
		    {
		      "title": "Nombre de visite du mois dernier",
		      "value": $nbVisiteStart,
		      "color": "#656D78"
		    }
		    ],

		    "titleField": "title",
		    "valueField": "value",
		    "colorField": "color",
		    "radius": "42%",
		    "innerRadius": "60%",
		    "labelText": "[[title]]",

		  } );

	</script>
	<script>
	var chart2 = AmCharts.makeChart( "chart2div", {
	  "type": "serial",

	  "dataProvider": [ {
	    "month": "<?php echo $deuxDernierMois['nom']; ?>",
	    "visits": <?php echo $deuxDernierMois['result']; ?>
	  }, {
	    "month": "<?php echo $moisDernier['nom']; ?>",
	    "visits": <?php echo $moisDernier['result']; ?>
	  }, {
	    "month": "<?php echo $moisActuel['nom']; ?>",
	    "visits": <?php echo $moisActuel['result']; ?>
	  }],
	  "valueAxes": [ {
	  	"title": "Nombre de viste par mois",
	    "gridColor": "#FFFFFF",
	    "gridAlpha": 0.2,
	    "dashLength": 0
	  } ],
	  "gridAboveGraphs": true,
	  "startDuration": 1,
	  "graphs": [ {
	    "balloonText": "[[category]]: <b>[[value]]</b>",
	    "fillAlphas": 0.8,
	    "lineAlpha": 0.2,
	    "type": "column",
	    "valueField": "visits"
	  } ],
	  "chartCursor": {
	    "categoryBalloonEnabled": false,
	    "cursorAlpha": 0,
	    "zoomable": false
	  },
	  "categoryField": "month",
	  "categoryAxis": {
	    "gridPosition": "start",
	    "gridAlpha": 0,
	    "tickPosition": "start",
	    "tickLength": 20
	  }

	} );
	</script>

</div>