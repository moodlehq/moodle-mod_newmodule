<?PHP  // $Id$

/// Library of functions and constants for module NEWMODULE
/// (replace NEWMODULE with the name of your module and delete this line)


$NEWMODULE_CONSTANT = 7;     /// for example


function NEWMODULE_add_instance($NEWMODULE) {
/// Given an object containing all the necessary data, 
/// (defined by the form in mod.html) this function 
/// will create a new instance and return the id number 
/// of the new instance.

    $NEWMODULE->timemodified = time();

    # May have to add extra stuff in here #
    
    return insert_record("NEWMODULE", $NEWMODULE);
}


function NEWMODULE_update_instance($NEWMODULE) {
/// Given an object containing all the necessary data, 
/// (defined by the form in mod.html) this function 
/// will update an existing instance with new data.

    $NEWMODULE->timemodified = time();
    $NEWMODULE->id = $NEWMODULE->instance;

    # May have to add extra stuff in here #

    return update_record("NEWMODULE", $NEWMODULE);
}


function NEWMODULE_delete_instance($id) {
/// Given an ID of an instance of this module, 
/// this function will permanently delete the instance 
/// and any data that depends on it.  

    if (! $NEWMODULE = get_record("NEWMODULE", "id", "$id")) {
        return false;
    }

    $result = true;

    # Delete any dependent records here #

    if (! delete_records("NEWMODULE", "id", "$NEWMODULE->id")) {
        $result = false;
    }

    return $result;
}

function NEWMODULE_user_outline($course, $user, $mod, $NEWMODULE) {
/// Return a small object with summary information about what a 
/// user has done with a given particular instance of this module
/// Used for user activity reports.
/// $return->time = the time they did it
/// $return->info = a short text description

    return $return;
}

function NEWMODULE_user_complete($course, $user, $mod, $NEWMODULE) {
/// Print a detailed representation of what a  user has done with 
/// a given particular instance of this module, for user activity reports.

    return true;
}

function NEWMODULE_print_recent_activity($course, $isteacher, $timestart) {
/// Given a course and a time, this module should find recent activity 
/// that has occurred in NEWMODULE activities and print it out. 
/// Return true if there was output, or false is there was none.

    global $CFG;

    return false;  //  True if anything was printed, otherwise false 
}

function NEWMODULE_cron () {
/// Function to be run periodically according to the moodle cron
/// This function searches for things that need to be done, such 
/// as sending out mail, toggling flags etc ... 

    global $CFG;

    return true;
}

function NEWMODULE_grades($NEWMODULEid) {
/// Must return an array of grades for a given instance of this module, 
/// indexed by user.  It also returns a maximum allowed grade.

    $return->grades = NULL;
    $return->maxgrade = NULL;

    return $return;
}

function NEWMODULE_get_participants($NEWMODULEid) {
//Must return an array of user records (all data) who are participants
//for a given instance of NEWMODULE. Must include every user involved
//in the instance, independient of his role (student, teacher, admin...)
//See other modules as example.

    return false;
}

function NEWMODULE_scale_used ($NEWMODULEid,$scaleid) {
//This function returns if a scale is being used by one NEWMODULE
//it it has support for grading and scales. Commented code should be
//modified if necessary. See forum, glossary or journal modules
//as reference.
   
    $return = false;

    //$rec = get_record("NEWMODULE","id","$NEWMODULEid","scale","-$scaleid");
    //
    //if (!empty($rec)  && !empty($scaleid)) {
    //    $return = true;
    //}
   
    return $return;
}

//////////////////////////////////////////////////////////////////////////////////////
/// Any other NEWMODULE functions go here.  Each of them must have a name that 
/// starts with NEWMODULE_


?>
