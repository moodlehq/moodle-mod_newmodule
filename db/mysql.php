<?php // $Id$
/**
 * Upgrade procedures for NEWMODULE
 *
 * @author 
 * @version $Id$
 * @package NEWMODULE
 **/

/**
 * This function does anything necessary to upgrade 
 * older versions to match current functionality 
 *
 * @uses $CFG
 * @param int $oldversion The prior version number
 * @return boolean Success/Failure
 **/
function NEWMODULE_upgrade($oldversion) {
    global $CFG;

    if ($oldversion < 2006042900) {

       # Do something ...

    }

    return true;
}

?>
