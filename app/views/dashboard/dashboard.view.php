<div class="formulaire">
    <div class="titre">
        <h3>Dashboard</h3>
    </div>

    <div class="onglet-contenu dashboard-top" >
	      <div id="dashboard-top-item-1" class="dashboard-top-item" >
		      <div class="dashboard-top-item-content">
		      	<span class="dashboard-title-item">Menu</span>
		      	<hr class="souligne">
		      	<span class="dashboard-nb-item" >4</span>
		      </div>
	      </div>
	      <div id="dashboard-top-item-2" class="dashboard-top-item">
		      <div class="dashboard-top-item-content">
		      	<span class="dashboard-title-item">Repas</span>
		      	<hr class="souligne">
		      	<span class="dashboard-nb-item"  >8</span>
		      </div>
	      </div>
	      <div id="dashboard-top-item-3" class="dashboard-top-item">
		      <div class="dashboard-top-item-content">
		      	<span class="dashboard-title-item">Un truc</span>
		      	<hr class="souligne">
		      	<span class="dashboard-nb-item" >9</span>
		      </div>
	      </div>
    </div>


    <div id="nbVisiteFinish"  >112</div>
    <div id="nbVisiteStart"  >323</div>


    <div class="onglet-contenu dashboard-bottom" >
	    <div id="chartdiv" style="width: 100%; height: 355px;">#Donuts</div>
		  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
		  integrity="sha256-k2WSCIexGzOj3Euiig+TlR8gA0EmPjuc79OEeY5L45g="
		  crossorigin="anonymous"></script>
		  <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
		  <script src="https://www.amcharts.com/lib/3/pie.js"></script>
		  <script src="https://www.amcharts.com/lib/3/themes/none.js"></script>
	    </div>
	</div>

    <script>
		$nbVisiteFinish = $("#nbVisiteFinish").text();
		$nbVisiteStart = $("#nbVisiteStart").text();

		  var chart = AmCharts.makeChart( "chartdiv", {
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
</div>