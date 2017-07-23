<div class="formulaire">
    <div class="titre">
        <h3>Dashboard</h3>
    </div>

    <div class="onglet-contenu" >
        <div class="theme-block">
	      <div id="nbVisiteStart">70</div>
	      <div id="nbVisiteFinish">30</div>
    	</div>

    <div id="chartdiv" style="width: 100%; height: 355px;">#Donuts</div>
	  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
	  integrity="sha256-k2WSCIexGzOj3Euiig+TlR8gA0EmPjuc79OEeY5L45g="
	  crossorigin="anonymous"></script>
	  <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
	  <script src="https://www.amcharts.com/lib/3/pie.js"></script>
	  <script src="https://www.amcharts.com/lib/3/themes/none.js"></script>
    </div>

    <script>
		$nbVisiteFinish = $("#nbVisiteFinish").text();
		$nbVisiteStart = $("#nbVisiteStart").text();

		  var chart = AmCharts.makeChart( "chartdiv", {
		    "type": "pie",
		    
		    "dataProvider": [ {
		      "title": "Nombre de visite par mois",
		      "value": $nbVisiteFinish
		    }, 
		    {
		      "title": "Nombre de visite du moins dernier",
		      "value": $nbVisiteStart
		    }
		    ],

		    "titleField": "title",
		    "valueField": "value",
		    "labelRadius": 5,

		    "radius": "42%",
		    "innerRadius": "60%",
		    "labelText": "[[title]]",

		  } );

	</script>
</div>