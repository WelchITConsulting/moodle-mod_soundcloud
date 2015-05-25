<?php
/*
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
 *
 * Filename : mod_form
 * Author   : John Welch <jwelch@welchitconsulting.co.uk>
 * Created  : 27 Apr 2015
 */

defined('MOODLE_INTERNAL') || die();

require_once($CFG->dirroot . '/course/moodleform_mod.php');

class mod_soundcloud_mod_form extends moodleform_mod
{
    function definition()
    {
        $mform =& $this->_form;

        $mform->addElement('header', 'general', get_string('general', 'form'));

        $mform->addElement('text', 'name', get_string('soundcloudname', 'soundcloud'), array('size' => '64'));
        $mform->setType('name', PARAM_TEXT);
        $mform->addRule('name', null, 'required', null, 'client');
        $mform->addRule('name', get_string('maximumchars', '', 255), 'maxlength', 255, 'client');

        $this->add_intro_editor(true);
        $mform->addHelpButton('introeditor', 'description', 'soundcloud');

        // Section for the SoundCloud access settings
        $mform->addElement('header', 'soundcloud', get_string('soundcloud', 'soundcloud'));

        $mform->addElement('text', 'clientid', get_string('soundcloudid', 'soundcloud'), array('size' => '64'));
        $mform->setType('clientid', PARAM_TEXT);
        $mform->addRule('clientid', null, 'required', null, 'client');
        $mform->addRule('clientid', get_string('maximumchars', '', 40), 'maxlength', 40, 'client');

        $mform->addElement('text', 'clientsecret', get_string('soundcloudsecret', 'soundcloud'), array('size' => '64'));
        $mform->setType('clientsecret', PARAM_TEXT);
        $mform->addRule('clientsecret', null, 'required', null, 'client');
        $mform->addRule('clientsecret', get_string('maximumchars', '', 40), 'maxlength', 40, 'client');

        $mform->addElement('text', 'clientuser', get_string('soundclouduser', 'soundcloud'), array('size' => '64'));
        $mform->setType('clientuser', PARAM_TEXT);
        $mform->addRule('clientuser', null, 'required', null, 'client');
        $mform->addRule('clientuser', get_string('maximumchars', '', 64), 'maxlength', 64, 'client');

        $mform->addElement('text', 'clientpwd', get_string('soundcloudpassword', 'soundcloud'), array('size' => '64'));
        $mform->setType('clientpwd', PARAM_TEXT);
        $mform->addRule('clientpwd', null, 'required', null, 'client');
        $mform->addRule('clientpwd', get_string('maximumchars', '', 64), 'maxlength', 64, 'client');

//        $mform->addElement('text', '', get_string('', 'mod_soundcloud'), array('size' => '64'));
//        $mform->setType('name', PARAM_TEXT);
//        $mform->addRule('', null, 'required', null, 'client');
//        $mform->addRule('', get_string('maximumchars', '', 64), 'maxlength', 64, 'client');
//
//        $mform->addElement('text', '', get_string('', 'mod_soundcloud'), array('size' => '64'));
//        $mform->setType('name', PARAM_TEXT);
//        $mform->addRule('', null, 'required', null, 'client');
//        $mform->addRule('', get_string('maximumchars', '', 64), 'maxlength', 64, 'client');
//
//        $mform->addElement('text', '', get_string('', 'mod_soundcloud'), array('size' => '64'));
//        $mform->setType('name', PARAM_TEXT);
//        $mform->addRule('', null, 'required', null, 'client');
//        $mform->addRule('', get_string('maximumchars', '', 64), 'maxlength', 64, 'client');
//
//        $mform->addElement('text', '', get_string('', 'mod_soundcloud'), array('size' => '64'));
//        $mform->setType('name', PARAM_TEXT);
//        $mform->addRule('', null, 'required', null, 'client');
//        $mform->addRule('', get_string('maximumchars', '', 64), 'maxlength', 64, 'client');


        // Add standard elements
        $this->standard_coursemodule_elements();

        // Add standard buttons
        $this->add_action_buttons();
    }
}