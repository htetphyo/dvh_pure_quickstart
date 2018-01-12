<?php
define("BASE_URL", "http://localhost/requests/");
define("API_URL","http://localhost/dvh_api/public/");

function base_url($file_path){
	return BASE_URL.$file_path;
}
function api_url(){
  return  API_URL;
}

 ?>
