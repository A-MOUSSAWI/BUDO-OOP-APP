<?php

function check_input($data){
    $data = htmlspecialchars($data);
    $data = trim($data);
    return $data;
}
function url_for($script_path) {
    // add the leading '/' if not present
    if($script_path[0] != '/') {
      $script_path = "/" . $script_path;
    }
    return WWW_ROOT . $script_path;
  }
  
  function redirect_to($url){
    header("Location:$url");
  } 

  function dd($data){
    var_dump($data);
    die();
  }