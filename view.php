<?php

// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.


/**
 * Prints a particular instance of newmodule
 *
 * You can have a rather longer description of the file as well,
 * if you like, and it can span multiple lines.
 *
 * @package   mod-newmodule
 * @copyright 2009 Your Name
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/// (Replace newmodule with the name of your module and remove this line)

require_once(dirname(dirname(dirname(__FILE__))).'/config.php');
require_once(dirname(__FILE__).'/lib.php');

$id = optional_param('id', 0, PARAM_INT); // course_module ID, or
$a  = optional_param('a', 0, PARAM_INT);  // newmodule instance ID

if ($id) {
    if (! $cm = get_coursemodule_from_id('newmodule', $id)) {
        error('Course Module ID was incorrect');
    }

    if (! $course = $DB->get_record('course', array('id' => $cm->course))) {
        error('Course is misconfigured');
    }

    if (! $newmodule = $DB->get_record('newmodule', array('id' => $cm->instance))) {
        error('Course module is incorrect');
    }

} else if ($a) {
    if (! $newmodule = $DB->get_record('newmodule', array('id' => $a))) {
        error('Course module is incorrect');
    }
    if (! $course = $DB->get_record('course', array('id' => $newmodule->course))) {
        error('Course is misconfigured');
    }
    if (! $cm = get_coursemodule_from_instance('newmodule', $newmodule->id, $course->id)) {
        error('Course Module ID was incorrect');
    }

} else {
    error('You must specify a course_module ID or an instance ID');
}

require_login($course, true, $cm);

add_to_log($course->id, "newmodule", "view", "view.php?id=$cm->id", "$newmodule->id");

/// Print the page header

$PAGE->set_url('mod/newmodule/view.php', array('id' => $cm->id));
$PAGE->set_title($newmodule->name);
$PAGE->set_heading($course->shortname);
$PAGE->set_button(update_module_button($cm->id, $course->id, get_string('modulename', 'newmodule')));

// other things you may want to set - remove if not needed
//$PAGE->set_cacheable(false);
//$PAGE->set_focuscontrol('some-html-id');

// TODO navigation will be changed yet for Moodle 2.0
$navlinks   = array();
$navlinks[] = array('name' => get_string('modulenameplural', 'newmodule'),
                    'link' => "index.php?id=$course->id",
                    'type' => 'activity');
$navlinks[] = array('name' => format_string($newmodule->name),
                    'link' => '',
                    'type' => 'activityinstance');
$navigation = build_navigation($navlinks);
$menu       = navmenu($course, $cm);

echo $OUTPUT->header($navigation, $menu);

/// Print the main part of the page

echo 'YOUR CODE GOES HERE';


/// Finish the page
echo $OUTPUT->footer();
