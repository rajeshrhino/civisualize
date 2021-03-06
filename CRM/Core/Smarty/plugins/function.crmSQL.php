<?php

function smarty_function_crmSQL($params, &$smarty) { 
  
  if (!array_key_exists('sql', $params) && !array_key_exists('file', $params)) { 
    $smarty->trigger_error("assign: missing 'sql' OR 'file' parameter"); 
    return "crmAPI: missing 'sql' or 'file' parameter"; 
  } 
  if (array_key_exists('sql', $params)){
    $sql = $params["sql"];
  } else {
    $sql=file_get_contents ('queries/'.$params["file"].".sql", true);
  } 
  // TODO: remove "DELETE " and "UPDATE " and "GRANT " and ...

  if (array_key_exists('debug', $params)) { 
    $smarty->trigger_error("sql:". $params["sql"]); 
  }

//  CRM_Core_Error::setCallback(array('CRM_Utils_REST', 'fatal')); 
  $dao = CRM_Core_DAO::executeQuery($sql);
  $values = array();
  while ($dao->fetch()) {
    $values[] = $dao->toArray();
  }       

  return json_encode (array("is_error"=>0, "values" => $values), JSON_NUMERIC_CHECK);
}
