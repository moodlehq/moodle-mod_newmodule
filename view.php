<?PHP  // $Id$

/// This page prints a particular instance of NEWMODULE
/// (Replace NEWMODULE with the name of your module)

    require_once("../../config.php");
    require_once("lib.php");

    $id = optional_param('id', 0, PARAM_INT); // Course Module ID, or
    $a  = optional_param('a', 0, PARAM_INT);  // NEWMODULE ID

    if ($id) {
        if (! $cm = get_record("course_modules", "id", $id)) {
            error("Course Module ID was incorrect");
        }
    
        if (! $course = get_record("course", "id", $cm->course)) {
            error("Course is misconfigured");
        }
    
        if (! $NEWMODULE = get_record("NEWMODULE", "id", $cm->instance)) {
            error("Course module is incorrect");
        }

    } else {
        if (! $NEWMODULE = get_record("NEWMODULE", "id", $a)) {
            error("Course module is incorrect");
        }
        if (! $course = get_record("course", "id", $NEWMODULE->course)) {
            error("Course is misconfigured");
        }
        if (! $cm = get_coursemodule_from_instance("NEWMODULE", $NEWMODULE->id, $course->id)) {
            error("Course Module ID was incorrect");
        }
    }

    require_login($course->id);

    add_to_log($course->id, "NEWMODULE", "view", "view.php?id=$cm->id", "$NEWMODULE->id");

/// Print the page header

    if ($course->category) {
        $navigation = "<a href=\"../../course/view.php?id=$course->id\">$course->shortname</a> ->";
    }

    $strNEWMODULEs = get_string("modulenameplural", "NEWMODULE");
    $strNEWMODULE  = get_string("modulename", "NEWMODULE");

    print_header("$course->shortname: $NEWMODULE->name", "$course->fullname",
                 "$navigation <a href=index.php?id=$course->id>$strNEWMODULEs</a> -> $NEWMODULE->name", 
                  "", "", true, update_module_button($cm->id, $course->id, $strNEWMODULE), 
                  navmenu($course, $cm));

/// Print the main part of the page

    echo "YOUR CODE GOES HERE";


/// Finish the page
    print_footer($course);

?>
