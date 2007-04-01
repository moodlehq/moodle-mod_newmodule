<?php  // $Id$
/**
 * This page prints a particular instance of newmodule
 * 
 * @author 
 * @version $Id$
 * @package newmodule
 **/

/// (Replace newmodule with the name of your module)

    require_once("../../config.php");
    require_once("lib.php");

    $id = optional_param('id', 0, PARAM_INT); // Course Module ID, or
    $a  = optional_param('a', 0, PARAM_INT);  // newmodule ID

    if ($id) {
        if (! $cm = get_record("course_modules", "id", $id)) {
            error("Course Module ID was incorrect");
        }
    
        if (! $course = get_record("course", "id", $cm->course)) {
            error("Course is misconfigured");
        }
    
        if (! $newmodule = get_record("newmodule", "id", $cm->instance)) {
            error("Course module is incorrect");
        }

    } else {
        if (! $newmodule = get_record("newmodule", "id", $a)) {
            error("Course module is incorrect");
        }
        if (! $course = get_record("course", "id", $newmodule->course)) {
            error("Course is misconfigured");
        }
        if (! $cm = get_coursemodule_from_instance("newmodule", $newmodule->id, $course->id)) {
            error("Course Module ID was incorrect");
        }
    }

    require_login($course->id);

    add_to_log($course->id, "newmodule", "view", "view.php?id=$cm->id", "$newmodule->id");

/// Print the page header

    if ($course->category) {
        $navigation = "<a href=\"../../course/view.php?id=$course->id\">$course->shortname</a> ->";
    } else {
        $navigation = '';
    }

    $strnewmodules = get_string("modulenameplural", "newmodule");
    $strnewmodule  = get_string("modulename", "newmodule");

    print_header("$course->shortname: $newmodule->name", "$course->fullname",
                 "$navigation <a href=index.php?id=$course->id>$strnewmodules</a> -> $newmodule->name", 
                  "", "", true, update_module_button($cm->id, $course->id, $strnewmodule), 
                  navmenu($course, $cm));

/// Print the main part of the page

    echo "YOUR CODE GOES HERE";


/// Finish the page
    print_footer($course);
?>
