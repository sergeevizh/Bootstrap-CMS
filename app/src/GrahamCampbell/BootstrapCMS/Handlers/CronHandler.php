<?php namespace GrahamCampbell\BootstrapCMS\Handlers;

/**
 * This file is part of Bootstrap CMS by Graham Campbell.
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * @package    Bootstrap-CMS
 * @author     Graham Campbell
 * @license    GNU AFFERO GENERAL PUBLIC LICENSE
 * @copyright  Copyright (C) 2013  Graham Campbell
 * @link       https://github.com/GrahamCampbell/Bootstrap-CMS
 */

use Queuing;

class CronHandler extends BaseHandler {

    /**
     * Run the task (called by BaseHandler).
     *
     * @return void
     */
    protected function run() {
        $data = $this->data;
        // do stuff
    }

    /**
     * Run after a job success (called by BaseHandler).
     *
     * @return void
     */
    protected function afterSuccess() {
        JobProvider::clearCrons();
        Queuing::laterCron(15 ,$this->data);
    }

    /**
     * Run after a job abortion (called by BaseHandler).
     *
     * @return void
     */
    protected function afterAbortion() {
        JobProvider::clearCrons();
        Queuing::laterCron(5 ,$this->data);
    }
}