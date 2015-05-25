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


function soundcloud_add_instance($instance)
{
    global $DB;

    $instance->timemodified = time();
    $instance->timecreated  = $instance->timemodified;

    if (!($instance->id = $DB->insert_record('soundcloud', $instance))) {
        return false;
    }

    return $instance->id;
}

function soundcloud_update_instance($instance)
{
    global $DB;

    $instance->timemodified = time();
    $instance->id = $instance->instance;

    if (!($registration->id = $DB->insert_record('registration', $registration))) {
        return false;
    }

    return $DB->update_record('soundcloud', $instance);
}

function soundcloud_delete_instance($id)
{
    global $DB;

    if (!$instance = $DB->get_record('soundcloud', array('id' => $id))) {
        return false;
    }

     if (!$DB->delete_records('soundcloud_posts', array('soundcloud' => $instance->id))) {
      return false;
    }

    return $DB->delete_records('soundcloud', array('id' => $instance->id));
}
