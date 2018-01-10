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
$request = Requests::get('http://192.168.10.52/dvh_api/public/api/boundary/myanmar', array('Accept' => 'application/json'));

// Check what we received
$arr_data    = json_decode( $request->body , true);
$regions = $arr_data['myanmar'];

//Load Header 
include('./includes/header.php');
?>


<style type="text/css" media="screen">
    body{
      padding-top: 50px !important;
    }
    header.masthead {
      background-color: #292b2c61;
    }
</style>

<header class="masthead text-center text-white d-flex">
  <div class="container my-auto">
     <div class="row">
       <div class="col-lg-10 mx-auto">
         <h1 class="text-uppercase">
           <strong>Data Visualization Hackathon Demo</strong>
         </h1>
         <hr>
       </div>
       <div class="col-lg-8 mx-auto">
         <!-- <p class="text-faded mb-5">Start Bootstrap can help you build better websites using the Bootstrap CSS framework! Just download your template and start going, no strings attached!</p> -->
         <a class="btn btn-primary btn-xl js-scroll-trigger" href="#about">Find Out More</a>
       </div>
     </div>
  </div>

</header>

   <section class="bg-primary" id="about">
     <div class="container">
       <div class="row">
         <div class="col-lg-8 mx-auto text-center">
           <h2 class="section-heading text-white">What is Data Visualization Hackathon?</h2>
           <hr class="light my-4">
           <p class="text-faded mb-4"> The Agenda 2030 for Sustainable Development, articulated around 17 Sustainable Development Goals (SDGs), calls for increased equity in programming, putting the focus on the poorest, most vulnerable populations. To identify the most disadvantaged children and the main determinants of progress in relation to: 1) norms, behaviours and knowledge; 2) supplies of goods and services and information; and 3) the broader enabling environment, availability of quality data is fundamental. </p>
           <a class="btn btn-light btn-xl js-scroll-trigger" href="#services">Read More</a>
         </div>
       </div>
     </div>
   </section>
  <div id="map"></div>
   <!-- <section id="services">
     <div class="container">
       <div class="row">
         <div class="col-lg-12 text-center">
           <h2 class="section-heading">At Your Service</h2>
           <hr class="my-4">
         </div>
       </div>
     </div>
     <div class="container">
       <div class="row">
         <div class="col-lg-3 col-md-6 text-center">
           <div class="service-box mt-5 mx-auto">
             <i class="fa fa-4x fa-diamond text-primary mb-3 sr-icons"></i>
             <h3 class="mb-3">Sturdy Templates</h3>
             <p class="text-muted mb-0">Our templates are updated regularly so they don't break.</p>
           </div>
         </div>
         <div class="col-lg-3 col-md-6 text-center">
           <div class="service-box mt-5 mx-auto">
             <i class="fa fa-4x fa-paper-plane text-primary mb-3 sr-icons"></i>
             <h3 class="mb-3">Ready to Ship</h3>
             <p class="text-muted mb-0">You can use this theme as is, or you can make changes!</p>
           </div>
         </div>
         <div class="col-lg-3 col-md-6 text-center">
           <div class="service-box mt-5 mx-auto">
             <i class="fa fa-4x fa-newspaper-o text-primary mb-3 sr-icons"></i>
             <h3 class="mb-3">Up to Date</h3>
             <p class="text-muted mb-0">We update dependencies to keep things fresh.</p>
           </div>
         </div>
         <div class="col-lg-3 col-md-6 text-center">
           <div class="service-box mt-5 mx-auto">
             <i class="fa fa-4x fa-heart text-primary mb-3 sr-icons"></i>
             <h3 class="mb-3">Made with Love</h3>
             <p class="text-muted mb-0">You have to make your websites with love these days!</p>
           </div>
         </div>
       </div>
     </div>
   </section> -->

   <section class="p-0" id="portfolio">
     <div class="container-fluid p-0">
       <div class="row no-gutters popup-gallery">
         <div class="col-lg-4 col-sm-6">
           <a class="portfolio-box" href="img/portfolio/fullsize/1.jpg">
             <img class="img-fluid" src="img/portfolio/thumbnails/1.jpg" alt="">
             <div class="portfolio-box-caption">
               <div class="portfolio-box-caption-content">
                 <div class="project-category text-faded">
                   Category
                 </div>
                 <div class="project-name">
                   Project Name
                 </div>
               </div>
             </div>
           </a>
         </div>
         <div class="col-lg-4 col-sm-6">
           <a class="portfolio-box" href="img/portfolio/fullsize/2.jpg">
             <img class="img-fluid" src="img/portfolio/thumbnails/2.jpg" alt="">
             <div class="portfolio-box-caption">
               <div class="portfolio-box-caption-content">
                 <div class="project-category text-faded">
                   Category
                 </div>
                 <div class="project-name">
                   Project Name
                 </div>
               </div>
             </div>
           </a>
         </div>
         <div class="col-lg-4 col-sm-6">
           <a class="portfolio-box" href="img/portfolio/fullsize/3.jpg">
             <img class="img-fluid" src="img/portfolio/thumbnails/3.jpg" alt="">
             <div class="portfolio-box-caption">
               <div class="portfolio-box-caption-content">
                 <div class="project-category text-faded">
                   Category
                 </div>
                 <div class="project-name">
                   Project Name
                 </div>
               </div>
             </div>
           </a>
         </div>
         <div class="col-lg-4 col-sm-6">
           <a class="portfolio-box" href="img/portfolio/fullsize/4.jpg">
             <img class="img-fluid" src="img/portfolio/thumbnails/4.jpg" alt="">
             <div class="portfolio-box-caption">
               <div class="portfolio-box-caption-content">
                 <div class="project-category text-faded">
                   Category
                 </div>
                 <div class="project-name">
                   Project Name
                 </div>
               </div>
             </div>
           </a>
         </div>
         <div class="col-lg-4 col-sm-6">
           <a class="portfolio-box" href="img/portfolio/fullsize/5.jpg">
             <img class="img-fluid" src="img/portfolio/thumbnails/5.jpg" alt="">
             <div class="portfolio-box-caption">
               <div class="portfolio-box-caption-content">
                 <div class="project-category text-faded">
                   Category
                 </div>
                 <div class="project-name">
                   Project Name
                 </div>
               </div>
             </div>
           </a>
         </div>
         <div class="col-lg-4 col-sm-6">
           <a class="portfolio-box" href="img/portfolio/fullsize/6.jpg">
             <img class="img-fluid" src="img/portfolio/thumbnails/6.jpg" alt="">
             <div class="portfolio-box-caption">
               <div class="portfolio-box-caption-content">
                 <div class="project-category text-faded">
                   Category
                 </div>
                 <div class="project-name">
                   Project Name
                 </div>
               </div>
             </div>
           </a>
         </div>
       </div>
     </div>
   </section>


<!-- Replace the value of the key parameter with your own API key. -->
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCzuC-MPFA0MGAp550mE7DUrKS5gt6tWIU&callback=initMap">
</script>

<script  type="text/javascript" charset="utf-8" async defer>

// This example creates a simple polygon representing the Bermuda Triangle.
// When the user clicks on the polygon an info window opens, showing
// information about the polygon's coordinates.

var map;
var infoWindow;

function initMap() {
  map = new google.maps.Map(document.getElementById('map'), {
    zoom: 5,
    center: {lat: 18.7700195, lng: 	96.8783291},
    mapTypeId: 'terrain'
  });

  // Define the LatLng coordinates for the polygon.
<?php
$counter =1;
foreach ($regions as $key => $regoin):
  foreach ($regoin as   $points):
?>

var triangleCoords<?php echo $counter;?> = <?php  echo  json_encode($points, true);    ?> ;

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

<?php
  endforeach;
endforeach;
?>
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
// Load Footer 
include('./includes/footer.php');

?>