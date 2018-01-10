<?php
define("BASE_URL", "http://localhost/requests/");
function base_url($file_path){
	return BASE_URL.$file_path;
}
// First, include Requests
include('./library/Requests.php');

// Next, make sure Requests can load internal classes
Requests::register_autoloader();

// Now let's make a request!
// $request = Requests::get('http://192.168.10.52/dvh_api/public/api/boundary/myanmar', array('Accept' => 'application/json'));

// // Check what we received
// $arr_data    = json_decode( $request->body , true);
// $regions = $arr_data['myanmar'];

$uri_data = $_GET['reg'];

$point_arr =  array('ayeyarwaddy' =>  array(
                          'lat' => 17.0265275 ,
                          'lng' => 94.960546
                        ),
                    'bago' =>  array(
                          'lat' => 18.0564065 ,
                          'lng' => 95.7947285
                        ),
                    'chin' =>  array(
                          'lat' => 22.1037994 ,
                          'lng' => 93.0064834
                        ),
                    'kachin' =>  array(
                        'lat' => 25.7044165 ,
                        'lng' => 96.6468919
                      ),
                     'kayah' =>  array(
                        'lat' => 19.2095643 ,
                        'lng' => 97.2041616
                      ),
                     'kayin' =>  array(
                        'lat' => 16.8461272 ,
                        'lng' => 96.8309949
                      ),
                      'magway' =>  array(
                        'lat' => 20.7068298 ,
                        'lng' => 93.8928963
                      ),
                      'mon' =>  array(
                          'lat' => 16.1572766 ,
                          'lng' => 97.2589807
                      ),
                       'naypyitaw' =>  array(
                          'lat' => 19.7423916 ,
                          'lng' => 96.0703839
                      ),
                     'rakhine' =>  array(
                        'lat' => 18.9844057 ,
                        'lng' => 93.1280891
                      ),
                      'sagaing' =>  array(
                          'lat' => 24.5614461 ,
                          'lng' => 95.3634453
                      ),
                       'shan' =>  array(
                        'lat' => 21.5907477 ,
                        'lng' => 97.1029711
                      ),
                       'tanintharyi' =>  array(
                        'lat' => 12.2736844 ,
                        'lng' => 97.779519
                      ),
                    'yangon' =>  array(
                          'lat' => 17.0038964 ,
                          'lng' => 96.0002165
                        ),
                    'mandalay' =>  array(
                          'lat' => 21.2621671 ,
                          'lng' => 95.5755129
                        )
                  );
    // $data['point_arr']  = $point_arr;

    // Get Boundary for each region 
    $url_base =   "http://192.168.10.52/dvh_api/public/api/boundary?reg=".$uri_data;
    $returndata    =  Requests::get($url_base , array('Accept' => 'application/json') );
    
    $arr_data  = json_decode( $returndata->body , true);
    $points =  $arr_data[$uri_data];
    // $data['points']=$points;

    // var_dump($points);die();

  $district = array();
 
  //if($uri_data == $uri_data){
    $ayeay_url_base =   "http://192.168.10.52/dvh_api/public/api/dataset?reg=".$uri_data."&tb=A-7";
    $ayeayreturndata    =  Requests::get($ayeay_url_base, array('Accept' => 'application/json') );
    $ayeayarr_data  = json_decode( $ayeayreturndata->body , true);

    if(count($ayeayarr_data)>0){
      foreach ($ayeayarr_data as $value) {
         if($value['level'] == "district"){
            $district[] = $value;
         }
      }
    }

    // echo "<pre>";
    // var_dump($district);
    // echo "</pre>";
    // die();
  //}

    // $data['district'] =  $district;
    // echo "<pre>";
    // var_dump($data);
    // die();



//Load Header 
include('./includes/header.php');
?>

 

<script src="<?= base_url('chartjs/dist/Chart.bundle.js') ?>"></script>
<script src="<?= base_url('chartjs/samples/utils.js') ?>"></script>
<style>
canvas{
    -moz-user-select: none;
    -webkit-user-select: none;
    -ms-user-select: none;
}
</style>




<div  class="container">
  <div class="row">
      <div style="height:500px" style="boder:2px solid #eee" class="col-md-4" id="map">
        <div id="map"></div>
      </div>
      <div class="col-md-8">
          <canvas id="canvas"></canvas>
      </div>
  </div>
</div>



<!-- Replace the value of the key parameter with your own API key. -->
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCzuC-MPFA0MGAp550mE7DUrKS5gt6tWIU&callback=initMap">
</script>
<?php
$uri_data = $_GET['reg'];

$lat  =  isset($point_arr[$uri_data]['lat']) ? $point_arr[$uri_data]['lat'] : 20.5494254 ;
$lng =  isset($point_arr[$uri_data]['lng']) ? $point_arr[$uri_data]['lng'] :98.6800869  ;
?>
<script  type="text/javascript" charset="utf-8" async defer>

// This example creates a simple polygon representing the Bermuda Triangle.
// When the user clicks on the polygon an info window opens, showing
// information about the polygon's coordinates.

var map;
var infoWindow;

function initMap() {
  map = new google.maps.Map(document.getElementById('map'), {
    zoom: 7,
    center: {lat: <?= $lat  ?>, lng: <?= $lng ?>},
    mapTypeId: 'terrain'
  });

  // Define the LatLng coordinates for the polygon.
<?php
$counter =1;
foreach ($points as   $point): ?>

var triangleCoords<?php echo $counter;?> = <?php  echo  json_encode($point, true);    ?> ;

  // Construct the polygon.
  var bermudaTriangle = new google.maps.Polygon({
    paths: triangleCoords<?php echo $counter++;?>,
    strokeColor: '#FF0000',
    strokeOpacity: 0.8,
    strokeWeight: 2,
    fillColor: '#FF0000',
    fillOpacity: 0.35
  });
  bermudaTriangle.setMap(map);

  // Add a listener for the click event.
  bermudaTriangle.addListener('click', showArrays);

<?php endforeach; ?>

  infoWindow = new google.maps.InfoWindow;

}

/** @this {google.maps.Polygon} */
function showArrays(event) {
  // Since this polygon has only one path, we can call getPath() to return the
  // MVCArray of LatLngs.
  var vertices = this.getPath();

  var contentString = '<b>Bermuda Triangle polygon</b><br>' +
      'Clicked location: <br>' + event.latLng.lat() + ',' + event.latLng.lng() +
      '<br>';

  // Iterate over the vertices.
  for (var i =0; i < vertices.getLength(); i++) {
    var xy = vertices.getAt(i);
    contentString += '<br>' + 'Coordinate ' + i + ':<br>' + xy.lat() + ',' +
        xy.lng();
  }
  // Replace the info window's content and position.
  infoWindow.setContent(contentString);
  infoWindow.setPosition(event.latLng);

  infoWindow.open(map);
}
</script>
<?php

$district_name = array();
$total = array();
$no1 = array();
$no2  = array();
$no3= array();
$no4= array();
$no5= array();
$no6= array();
$no7= array();
$no8= array();
$no9andmore = array();

if(count($district) > 0){

  foreach ($district as $value) {
    $district_name [] =  $value['location'];
    $total [] = $value['total_conventional_households'];
    $no1 []  = $value['1_person'];
    $no2 []  = $value['2_persons'];
    $no3 []  = $value['3_persons'];
    $no4 []   = $value['4_persons'];
    $no5 []   = $value['5_persons'];
    $no6 []   = $value['6_persons'];
    $no7 []  = $value['7_persons'];
    $no8 []  = $value['8_persons'];
    $no9andmore  []   = $value['9_and_more'];
  }

// echo "<pre>";
// var_dump($district);
// echo "<hr>";
// var_dump($district_name);
// var_dump($total);
// var_dump($no1 );
// var_dump($no2 );
// var_dump($no3 );
// var_dump($no4 );
// var_dump($no5 );
// var_dump($no6 );
// var_dump($no7 );
// var_dump($no8 );
// var_dump($no9andmore );
// die();

 ?>

<script>





    var MONTHS = <?php  echo  json_encode($district_name, true);    ?> ;
    var config = {
        type: 'line',
        data: {
            labels: <?php  echo  json_encode($district_name, true);    ?> ,


            datasets: [
              {
                  label: "total_conventional_households",
                  backgroundColor: window.chartColors.red,
                  borderColor: window.chartColors.red,
                  data:  <?php echo json_encode($total, true);    ?>,
                  fill: false,
              }, {
                  label: "1_person",
                  fill: false,
                  backgroundColor: window.chartColors.blue,
                  borderColor: window.chartColors.blue,
                  data: <?php echo json_encode($no1, true);    ?>,
              }
              ,
              {
                  label: "2_persons",
                  backgroundColor: window.chartColors.red,
                  borderColor: window.chartColors.red,
                  data:  <?php echo json_encode($no2, true);    ?>,
                  fill: false,
              },{
                  label: "3_person",
                  fill: false,
                  backgroundColor: window.chartColors.blue,
                  borderColor: window.chartColors.blue,
                  data: <?php echo json_encode($no3, true);    ?>,
              }
              ,{
                    label: "4_persons",
                    backgroundColor: window.chartColors.red,
                    borderColor: window.chartColors.red,
                    data:  <?php echo json_encode($no4, true);    ?>,
                    fill: false,
                }, {
                    label: "5_persons",
                    fill: false,
                    backgroundColor: window.chartColors.blue,
                    borderColor: window.chartColors.blue,
                    data: <?php echo json_encode($no5, true);    ?>,
                },
                {
                    label: "6_persons",
                    backgroundColor: window.chartColors.red,
                    borderColor: window.chartColors.red,
                    data:  <?php echo json_encode($no6, true);    ?>,
                    fill: false,
                },{
                    label: "7_person",
                    fill: false,
                    backgroundColor: window.chartColors.blue,
                    borderColor: window.chartColors.blue,
                    data: <?php echo json_encode($no7, true);    ?>,
                }
                ,{
                      label: "8_persons",
                      backgroundColor: window.chartColors.red,
                      borderColor: window.chartColors.red,
                      data:  <?php echo json_encode($no8, true);    ?>,
                      fill: false,
                  }, {
                      label: "no9andmore",
                      fill: false,
                      backgroundColor: window.chartColors.blue,
                      borderColor: window.chartColors.blue,
                      data: <?php echo json_encode($no9andmore, true);    ?>,
                  }

            ]
        },
        options: {
            responsive: true,
            title:{
                display:true,
                text:'Conventional Households'
            },
            tooltips: {
                mode: 'index',
                intersect: false,
            },
            hover: {
                mode: 'nearest',
                intersect: true
            },
            scales: {
                xAxes: [{
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: 'District'
                    }
                }],
                yAxes: [{
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: 'Value'
                    }
                }]
            }
        }
    };

    window.onload = function() {
        var ctx = document.getElementById("canvas").getContext("2d");
        window.myLine = new Chart(ctx, config);
    };

    document.getElementById('randomizeData').addEventListener('click', function() {
        config.data.datasets.forEach(function(dataset) {
            dataset.data = dataset.data.map(function() {
                return randomScalingFactor();
            });

        });

        window.myLine.update();
    });

    var colorNames = Object.keys(window.chartColors);
    document.getElementById('addDataset').addEventListener('click', function() {
        var colorName = colorNames[config.data.datasets.length % colorNames.length];
        var newColor = window.chartColors[colorName];
        var newDataset = {
            label: 'Dataset ' + config.data.datasets.length,
            backgroundColor: newColor,
            borderColor: newColor,
            data: [],
            fill: false
        };

        for (var index = 0; index < config.data.labels.length; ++index) {
            newDataset.data.push(randomScalingFactor());
        }

        config.data.datasets.push(newDataset);
        window.myLine.update();
    });

    document.getElementById('addData').addEventListener('click', function() {
        if (config.data.datasets.length > 0) {
            var month = MONTHS[config.data.labels.length % MONTHS.length];
            config.data.labels.push(month);

            config.data.datasets.forEach(function(dataset) {
                dataset.data.push(randomScalingFactor());
            });

            window.myLine.update();
        }
    });

    document.getElementById('removeDataset').addEventListener('click', function() {
        config.data.datasets.splice(0, 1);
        window.myLine.update();
    });

    document.getElementById('removeData').addEventListener('click', function() {
        config.data.labels.splice(-1, 1); // remove the label first

        config.data.datasets.forEach(function(dataset, datasetIndex) {
            dataset.data.pop();
        });

        window.myLine.update();
    });
</script>

<?php

}


 ?>



 





<?php
// Load Footer 
include('./includes/footer.php');

?>