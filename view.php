<?php
/**
 * Copyright (C) 2015 Welch IT Consulting
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

require_once('../../config.php');
require_once($CFG->dirroot . '/mod/soundcloud/locallib.php');

$id = optional_param('id', null, PARAM_INT);    // Course module ID
$a  = optional_param('a', null, PARAM_INT);     // Gallery ID
$p  = optional_param('p', 0, PARAM_INT);        // Page to show
$s  = optional_param('s', '', PARAM_CLEAN);     // Search string

if ($id) {
    if (!$cm = get_coursemodule_from_id('soundcloud', $id)) {
        print_error('invalidcoursemodule');
    }
    if (!$course = $DB->get_record('course', array('id' => $cm->course))) {
        print_error('coursemisconf');
    }
    if (!$soundcloud = $DB->get_record('soundcloud', array('id' => $cm->instance))) {
        print_error('invalidcoursemodule');
    }
} else if ($a) {
    if (!$soundcloud = $DB->get_record('soundcloud', array('id' => $a))) {
        print_error('invalidcoursemodule');
    }
    if (!$course = $DB->get_record('course', array('id' => $soundcloud->course))) {
        print_error('coursemisconf');
    }
    if (!$cm = get_coursemodule_from_instance('soundcloud', $soundcloud->id, $course->id)) {
        print_error('invalidcoursemodule');
    }
} else {
    print_error('missingparameter');
}

// Define the page URL with the parameters
$params = array();
if ($id) {
    $params['id'] = $id;
} else {
    $params['a'] = $a;
}
if ($p) {
    $params['p'] = $p;
}
if ($s) {
    $params['s'] = $s;
}
$PAGE->set_url('/mod/soundcloud/view.php', $params);

require_course_login($course, true, $cm);
$context = context_module::instance($cm->id);
$PAGE->set_context($context);

// Print header
$PAGE->set_title($soundcloud->name);
$PAGE->set_heading($course->fullname);
echo $OUTPUT->header();

// Some capability checks
if (empty($cm->visible) && !has_capability('moodle/course:viewhiddenactivities', $context)) {
    notice(get_string('activityiscurrentlyhidden'));
}
if (!has_capability('mod/sbgallery:view', $context)) {
    notice(get_string('noviewpermission', 'soundcloud'));
}

// Print the page content
echo $OUTPUT->heading(format_text($soundcloud->name), 2)
   . ($soundcloud->intro ? $OUTPUT->box(format_module_intro('soundcloud', $soundcloud, $cm->id), 'generalbox', 'intro')
                         : '')
   . $OUTPUT->box_start('generalbox boxaligncenter boxwidthwide');




echo $OUTPUT->box_end()
   . $OUTPUT->footer();
