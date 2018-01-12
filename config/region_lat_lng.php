<?php
define("BASE_URL", "http://localhost/requests/");
define("API_URL","http://api.datavisualizationhackathon.org/");

function base_url($file_path){
	return BASE_URL.$file_path;
}
function api_url(){
  return  API_URL;
}

function get_region(){
$point_arr = array(
  'ayeyawady' => array( 'lat' => 17.0265275 , 'lng' => 94.960546),
  'bago' =>  array('lat' => 18.0564065 , 'lng' => 95.7947285 ),
  'chin' =>  array('lat' => 22.1037994 , 'lng' => 93.0064834 ),
  'kachin' =>  array('lat' => 25.7044165 , 'lng' => 96.6468919),
  'kayah' =>  array( 'lat' => 19.2095643 , 'lng' => 97.2041616 ),
  'kayin' =>  array( 'lat' => 16.8461272 , 'lng' => 96.8309949 ),
  'magway' =>  array( 'lat' => 20.7068298 , 'lng' => 93.8928963 ),
  'mon' =>  array( 'lat' => 16.1572766 , 'lng' => 97.2589807
  ),
   'naypyitaw' =>  array( 'lat' => 19.7423916 , 'lng' => 96.0703839 ),
  'rakhine' =>  array( 'lat' => 18.9844057 , 'lng' => 93.1280891 ),
  'sagaing' =>  array(   'lat' => 24.5614461 , 'lng' => 95.3634453 ),
  'shan' =>  array( 'lat' => 21.5907477 , 'lng' => 97.1029711 ),
  'tanintharyi' =>  array( 'lat' => 12.2736844 , 'lng' => 97.779519   ),
  'yangon' =>  array( 'lat' => 17.0038964 , 'lng' => 96.0002165 ),
  'mandalay' =>  array(   'lat' => 21.2621671 ,   'lng' => 95.5755129 ),
  'myanmar'=> array('lat' =>19.175637, 'lng' => 97.480893)
);

return $point_arr;
}

function get_region_boundary($name){
    $reg=$name;
        if($reg=="bago")
        {
           return bago();
        }
        else if($reg=="ayeyawady")
        {
           return ayeyarwaddy();
        }
        else if($reg=="chin")
        {
           return chin();
        }
        else if($reg=="kachin")
        {
           return kachin();
        }
        else if($reg=="kayah")
        {
           return kayah();
        }
         else if($reg=="kayin")
        {
           return kayin();
        }
        else if($reg=="magway")
        {
           return magway();
        }
        else if($reg=="mandalay")
        {
           return mandalay();
        }
         else if($reg=="mon")
        {
           return mon();
        }
        else if($reg=="naypyitaw")
        {
           return naypyitaw();
        }
        else if($reg=="rakhine")
        {
           return rakhine();
        }
        else if($reg=="sagaing")
        {
            return sagaing();
        }
          else if($reg=="shan")
        {
            return shan();
        }
        else if($reg=="tanintharyi")
        {
            return tanintharyi();
        }
        else if($reg=="yangon")
        {
            return yangon();
        }
        else
        {
            $res['error']="Cann't find Json file";
            return  $res;
        }
}

function bago()
{

   $path = BASE_URL."boundary_json/Bago_clean.min.geojson"   ;
   $res['bago'][] = json_decode(file_get_contents($path), true);

   return $res;
}

 function chin()
{
    $path = BASE_URL."boundary_json/Chin_clean.min.geojson";
    $res['chin'][] = json_decode(file_get_contents($path), true);
    return $res;
}

 function ayeyarwaddy()
{
    $path =  BASE_URL."boundary_json/Ayeyarwaddy_clean.min.geojson";
    $res['ayeyawady'][] = json_decode(file_get_contents($path), true);
    return $res;
}

 function kachin()
{
    $path =  BASE_URL."boundary_json/kachin_clean.min.geojson";
    $res['kachin'][] = json_decode(file_get_contents($path), true);
    return $res;
}

 function kayah()
{
    $path =  BASE_URL."boundary_json/Kayah_clean.min.geojson";
    $res['kayah'][] = json_decode(file_get_contents($path), true);
    return $res;
}

 function kayin()
{
    $path =  BASE_URL."boundary_json/Kayin_clean.min.geojson";
    $res['kayin'][] = json_decode(file_get_contents($path), true);
    return $res;
}

 function magway()
{
    $path =  BASE_URL."boundary_json/Magway_clean.min.geojson";
    $res['magway'][] = json_decode(file_get_contents($path), true);
    return $res;
}

 function mandalay()
{
    $path =  BASE_URL."boundary_json/Mandalay_clean.min.geojson";
    $res['mandalay'][] = json_decode(file_get_contents($path), true);
    return $res;
}

 function mon()
{
    $path1 =  BASE_URL."boundary_json/Mon_clean_part1.min.geojson";
    $path2 =  BASE_URL."boundary_json/Mon_clean_part2.min.geojson";
    $path3 =  BASE_URL."boundary_json/Mon_clean_part3.min.geojson";

    $mon_res[] = json_decode(file_get_contents($path1), true);
    $mon_res[] = json_decode(file_get_contents($path2), true);
    $mon_res[] = json_decode(file_get_contents($path3), true);
    $res['mon']  =$mon_res;
    return $res;
}

 function naypyitaw()
{
    $path =  BASE_URL."boundary_json/Naypyitaw_clean.min.geojson";
    $res['naypyitaw'][] = json_decode(file_get_contents($path), true);
    return $res;
}

 function rakhine()
{
    $path =  BASE_URL."boundary_json/Rakhine_clean.min.geojson";
    $res['rakhine'][] = json_decode(file_get_contents($path), true);
    return $res;
}

 function sagaing()
{
    $path =  BASE_URL."boundary_json/Sagaing_clean.min.geojson";
    $res['sagaing'][] = json_decode(file_get_contents($path), true);
    return $res;
}

  function shan()
{
    $path =  BASE_URL."boundary_json/Shan_clean.min.geojson";
    $res['shan'][] = json_decode(file_get_contents($path), true);
    return $res;
}

 function tanintharyi()
{
    $path =  BASE_URL."boundary_json/Tanintharyi_clean.min.geojson";
    $res['tanintharyi'][] = json_decode(file_get_contents($path), true);
    return $res;
}

 function yangon()
{
    $path1 =  BASE_URL."boundary_json/Yangon_clean_part1_cocoIsland.min.geojson";
    $path2 =  BASE_URL."boundary_json/Yangon_clean_part2_preparis.min.geojson";
    $path3 =  BASE_URL."boundary_json/Yangon_clean_part3.min.geojson";
    $path4 =  BASE_URL."boundary_json/Yangon_clean_part4_ygnstate.min.geojson";

    $res[] = json_decode(file_get_contents($path1), true);
    $res[] = json_decode(file_get_contents($path2), true);
    $res[] = json_decode(file_get_contents($path3), true);
    $res[] = json_decode(file_get_contents($path4), true);
    $result['yangon']  =$res;
    return $result;
}

 function myanmar()
{
    $path =  BASE_URL."boundary_json/Bago_clean.min.geojson";
    $res['myanmar']['bago'][] = json_decode(file_get_contents($path), true);

    $path =  BASE_URL."boundary_json/Ayeyarwaddy_clean.min.geojson";
    $res['myanmar']['ayeyawady'][] = json_decode(file_get_contents($path), true);

    $path =  BASE_URL."boundary_json/Chin_clean.min.geojson";
    $res['myanmar']['chin'][] = json_decode(file_get_contents($path), true);

    $path =  BASE_URL."boundary_json/kachin_clean.min.geojson";
    $res['myanmar']['kachin'][] = json_decode(file_get_contents($path), true);

    $path =  BASE_URL."boundary_json/Kayah_clean.min.geojson";
    $res['myanmar']['kayah'][] = json_decode(file_get_contents($path), true);

    $path =  BASE_URL."boundary_json/Kayin_clean.min.geojson";
    $res['myanmar']['kayin'][] = json_decode(file_get_contents($path), true);

    $path1 =  BASE_URL."boundary_json/Yangon_clean_part1_cocoIsland.min.geojson";
    $path2 =  BASE_URL."boundary_json/Yangon_clean_part2_preparis.min.geojson";
    $path3 =  BASE_URL."boundary_json/Yangon_clean_part3.min.geojson";
    $path4 =  BASE_URL."boundary_json/Yangon_clean_part4_ygnstate.min.geojson";

    $ygn_res[] = json_decode(file_get_contents($path1), true);
    $ygn_res[] = json_decode(file_get_contents($path2), true);
    $ygn_res[] = json_decode(file_get_contents($path3), true);
    $ygn_res[] = json_decode(file_get_contents($path4), true);
    $res['myanmar']['yangon']  =$ygn_res;

    $path =  BASE_URL."boundary_json/Tanintharyi_clean.min.geojson";
    $res['myanmar']['tanintharyi'][] = json_decode(file_get_contents($path), true);

    $path =  BASE_URL."boundary_json/Shan_clean.min.geojson";
    $res['myanmar']['shan'][] = json_decode(file_get_contents($path), true);

    $path =  BASE_URL."boundary_json/Sagaing_clean.min.geojson";
    $res['myanmar']['sagaing'][] = json_decode(file_get_contents($path), true);

    $path =  BASE_URL."boundary_json/Rakhine_clean.min.geojson";
    $res['myanmar']['rakhine'][] = json_decode(file_get_contents($path), true);

    $path =  BASE_URL."boundary_json/Naypyitaw_clean.min.geojson";
    $res['myanmar']['naypyitaw'][] = json_decode(file_get_contents($path), true);

    $path1 =  BASE_URL."boundary_json/Mon_clean_part1.min.geojson";
    $path2 =  BASE_URL."boundary_json/Mon_clean_part2.min.geojson";
    $path3 =  BASE_URL."boundary_json/Mon_clean_part3.min.geojson";

    $mon_res[] = json_decode(file_get_contents($path1), true);
    $mon_res[] = json_decode(file_get_contents($path2), true);
    $mon_res[] = json_decode(file_get_contents($path3), true);
    $res['myanmar']['mon']  =$mon_res;

    $path =  BASE_URL."boundary_json/Mandalay_clean.min.geojson";
    $res['myanmar']['mandalay'][] = json_decode(file_get_contents($path), true);

    $path =  BASE_URL."boundary_json/Magway_clean.min.geojson";
    $res['myanmar']['magway'][] = json_decode(file_get_contents($path), true);

    return $res;
}
 ?>
