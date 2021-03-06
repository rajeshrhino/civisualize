<?php
//todo: move that to core
function _civicrm_api3_basic_getsql ($params,$sql) {
  $returnSQL        = CRM_Utils_Array::value('sql', $params, CRM_Utils_Array::value('options_sql', $params));
  if ($returnSQL) {
    return array("is_error"=>1,"sql"=>$sql);
  }
  $dao = CRM_Core_DAO::executeQuery($sql);
  $values = array();
  while ($dao->fetch()) {
    $values[] = $dao->toArray();
  }
  return civicrm_api3_create_success($values, $params, NULL, NULL, $dao);
}


require_once 'civisualize.civix.php';

/**
 * Implementation of hook_civicrm_config
 */
function civisualize_civicrm_config(&$config) {
  _civisualize_civix_civicrm_config($config);
}

/**
 * Implementation of hook_civicrm_xmlMenu
 *
 * @param $files array(string)
 */
function civisualize_civicrm_xmlMenu(&$files) {
  _civisualize_civix_civicrm_xmlMenu($files);
}

/**
 * Implementation of hook_civicrm_install
 */
function civisualize_civicrm_install() {
  return _civisualize_civix_civicrm_install();
}

/**
 * Implementation of hook_civicrm_uninstall
 */
function civisualize_civicrm_uninstall() {
  return _civisualize_civix_civicrm_uninstall();
}

/**
 * Implementation of hook_civicrm_enable
 */
function civisualize_civicrm_enable() {
  return _civisualize_civix_civicrm_enable();
}

/**
 * Implementation of hook_civicrm_disable
 */
function civisualize_civicrm_disable() {
  return _civisualize_civix_civicrm_disable();
}

/**
 * Implementation of hook_civicrm_upgrade
 *
 * @param $op string, the type of operation being performed; 'check' or 'enqueue'
 * @param $queue CRM_Queue_Queue, (for 'enqueue') the modifiable list of pending up upgrade tasks
 *
 * @return mixed  based on op. for 'check', returns array(boolean) (TRUE if upgrades are pending)
 *                for 'enqueue', returns void
 */
function civisualize_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _civisualize_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implementation of hook_civicrm_managed
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 */
function civisualize_civicrm_managed(&$entities) {
  return _civisualize_civix_civicrm_managed($entities);
}
