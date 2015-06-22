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
 * Filename : callback
 * Author   : John Welch <jwelch@welchitconsulting.co.uk>
 * Created  : 01 Jun 2015
 */

require_once('../../config.php');
require_once($CFG->dirroot . '/soundcloud/lib.php');

require_login();

$id = required_param('id', PARAM_INT);

header('Cache-Control: no-cache, must-revalidate');
header('Expires: Thu, 1 Jan 2015 01::00:00 GMT');

core_php_time_limit::raise();

