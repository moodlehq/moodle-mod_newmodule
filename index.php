<?php // $Id$
/**
 * This page lists all the instances of newmodule in a particular course
 *
 * @author
 * @version $Id$
 * @package newmodule
 **/

/// Replace newmodule with the name of your module

    require_once("../../config.php");
    require_once("lib.php");

    $id = required_param('id', PARAM_INT);   // course

    if (! $course = get_record("course", "id", $id)) {
        error("Course ID is incorrect");
    }

    require_login($course->id);

    add_to_log($course->id, "newmodule", "view all", "index.php?id=$course->id", "");


/// Get all required stringsnewmodule

    $strnewmodules = get_string("modulenameplural", "newmodule");
    $strnewmodule  = get_string("modulename", "newmodule");


/// Print the header

    $navlinks = array();
    $navlinks[] = array('name' => $strnewmodules, 'link' => '', 'type' => 'activity');
    $navigation = build_navigation($navlinks);

    print_header_simple("$strnewmodules", "", $navigation, "", "", true, "", navmenu($course));

/// Get all the appropriate data

    if (! $newmodules = get_all_instances_in_course("newmodule", $course)) {
        notice("There are no newmodules", "../../course/view.php?id=$course->id");
        die;
    }

/// Print the list of instances (your module will probably extend this)

    $timenow = time();
    $strname  = get_string("name");
    $strweek  = get_string("week");
    $strtopic  = get_string("topic");

    if ($course->format == "weeks") {
        $table->head  = array ($strweek, $strname);
        $table->align = array ("center", "left");
    } else if ($course->format == "topics") {
        $table->head  = array ($strtopic, $strname);
        $table->align = array ("center", "left", "left", "left");
    } else {
        $table->head  = array ($strname);
        $table->align = array ("left", "left", "left");
    }

    foreach ($newmodules as $newmodule) {
        if (!$newmodule->visible) {
            //Show dimmed if the mod is hidden
            $link = "<a class=\"dimmed\" href=\"view.php?id=$newmodule->coursemodule\">$newmodule->name</a>";
        } else {
            //Show normal if the mod is visible
            $link = "<a href=\"view.php?id=$newmodule->coursemodule\">$newmodule->name</a>";
        }

        if ($course->format == "weeks" or $course->format == "topics") {
            $table->data[] = array ($newmodule->section, $link);
        } else {
            $table->data[] = array ($link);
        }
    }

    echo "<br />";

    print_table($table);

/// Finish the page

    print_footer($course);

?>
