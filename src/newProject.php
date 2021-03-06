<?php
include "C:\Program Files\chromePHP\ChromePhp.php";

// error_reporting(E_ALL);


$CHiFolderName = 'CHi-files';

$projectName = $_POST['projectName'];
$dirInputFiles = 'projects/'.$projectName;
$dirOutputFiles = 'projects-Comments';

$result = array();
$statusreturn = -2112;

$ret = array();
$ret['success'] = 0;
$ret['successMsg'] = "Success creating project";



//If folders haven't been created, create them recursively
if (!file_exists($dirOutputFiles))
{
  mkdir($dirOutputFiles, 0777, true); //param true makes it recursive
}

if (file_exists($dirOutputFiles)) { // RE-check if folder was created
  exec('slocc.sh -findopt "-name *.java" -raw -dest_dir "'.$dirOutputFiles.'" -comment "'.$dirInputFiles.'"',$result, $statusreturn);
  if ($statusreturn!=0){
    $ret["success"] = 2;
    $ret["successMsg"] = "Failed to extract comments from java files";
  }
  //showExecOut($result,$statusreturn);
  unset($result);
  $result = array();
} else {
    $ret["success"] = 1;
    $ret["successMsg"] = "Failed to create a folder in the server";
}



//If folders haven't been created, create them 
if (!file_exists(dirname('./'.$dirInputFiles.'/'.$CHiFolderName.'/'.$projectName.'.chi')))
{               
  mkdir(dirname('./'.$dirInputFiles.'/'.$CHiFolderName.'/'.$projectName.'.chi'), 0777, true); //param true makes it recursive
}

exec('python ./python/1_convert-comments-in-many-files-to-one-csv___separated_by_phrases.py -m 4 -c NONE '.$dirOutputFiles.'/projects/'.$projectName.' ./'.$dirInputFiles.'/'.$CHiFolderName.'/'.$projectName.'.chi',$result, $statusreturn);
if ($statusreturn!=0){
  $ret["success"] = 3;
  $ret["successMsg"] = "Failed to create project";
}
//showExecOut($result,$statusreturn);
unset($result);
$result = array();






echo json_encode($ret);


function showExecOut($result,$statusreturn)
{
  if ($statusreturn == 0)
  {
    // ChromePhp::log( ' --- statusreturn is 0');
  } elseif ($statusreturn == 1) {
    // ChromePhp::log( ' --- statusreturn is 1');
  } else {
    // ChromePhp::log( ' --- statusreturn is not 0 and is not 1');
  }
 
  if (is_array($result) || is_object($result))
  {
    foreach ($result as $line)
    {
      // ChromePhp::log( ' --- --- --- '.$line);
    }
  } else {
    // ChromePhp::log( ' (not an array) --- --- ---');
  }
  
  // ChromePhp::log( ''); 
}



?>