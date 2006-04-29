<?PHP // $Id$

function NEWMODULE_upgrade($oldversion) {
/// This function does anything necessary to upgrade 
/// older versions to match current functionality 

    global $CFG;

    if ($oldversion < 2006042900) {

       # Do something ...

    }

    return true;
}

?>
