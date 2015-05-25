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

defined('MOODLE_INTERNAL') || die();

if ($ADMIN->fulltree) {
  require_once($CFG->dirroot . '/mod/soundcloud/lib.php');

  $settings->add(new admin_setting_configtext('soundcloud_id',
                 get_string('soundcloudid', 'soundcloud'),
                 get_string('configsoundcloudid', 'soundcloud'), 0));
  $settings->add(new admin_setting_configtext('soundcloud_secret',
                 get_string('soundcloudsecret', 'soundcloud'),
                 get_string('configsoundcloudsecret', 'soundcloud'), 0));
}
