<?php
/**
 * Copyright (c) Enalean, 2017-2018. All Rights Reserved.
 *
 * This file is a part of Tuleap.
 *
 * Tuleap is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * Tuleap is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Tuleap. If not, see <http://www.gnu.org/licenses/>.
 */

namespace Tuleap\AgileDashboard\FormElement;

require_once __DIR__ . '/../../../bootstrap.php';

class BurnupCacheDateRetrieverTest extends \TuleapTestCase
{
    public function itGetsDaysToCacheWhenPeriodIsOngoing()
    {
        $start_date = \DateTime::createFromFormat('d-m-Y H:i', '18-12-2017 00:00');
        $yesterday  = \DateTime::createFromFormat('d-m-Y', '20-12-2017');
        $period     = new \TimePeriodWithoutWeekEnd($start_date->getTimestamp(), 5);

        $date_cache_retriever = new BurnupCacheDateRetriever();
        $days_to_cache        = $date_cache_retriever->getWorkedDaysToCacheForPeriod($period, $yesterday);

        $expected_days = array(
            \DateTime::createFromFormat('d-m-Y H:i:s', '18-12-2017 23:59:59')->getTimestamp(),
            \DateTime::createFromFormat('d-m-Y H:i:s', '19-12-2017 23:59:59')->getTimestamp()
        );

        $this->assertEqual($days_to_cache, $expected_days);
    }

    public function itGetsDaysToCacheWhenPeriodHasEnded()
    {
        $start_date = \DateTime::createFromFormat('d-m-Y H:i', '18-12-2017 00:00');
        $yesterday  = \DateTime::createFromFormat('d-m-Y', '26-12-2017');
        $period     = new \TimePeriodWithoutWeekEnd($start_date->getTimestamp(), 2);

        $date_cache_retriever = new BurnupCacheDateRetriever();
        $days_to_cache        = $date_cache_retriever->getWorkedDaysToCacheForPeriod($period, $yesterday);

        $expected_days = array(
            \DateTime::createFromFormat('d-m-Y H:i:s', '18-12-2017 23:59:59')->getTimestamp(),
            \DateTime::createFromFormat('d-m-Y H:i:s', '19-12-2017 23:59:59')->getTimestamp(),
            \DateTime::createFromFormat('d-m-Y H:i:s', '20-12-2017 23:59:59')->getTimestamp()
        );

        $this->assertEqual($days_to_cache, $expected_days);
    }

    public function itGetsDayToCacheWhenPeriodHasNotYetStarted()
    {
        $start_date = \DateTime::createFromFormat('d-m-Y H:i', '26-12-2017 00:00');
        $yesterday  = \DateTime::createFromFormat('d-m-Y', '20-12-2017');
        $period     = new \TimePeriodWithoutWeekEnd($start_date->getTimestamp(), 4);

        $date_cache_retriever = new BurnupCacheDateRetriever();
        $days_to_cache        = $date_cache_retriever->getWorkedDaysToCacheForPeriod($period, $yesterday);

        $expected_days = array();

        $this->assertEqual($days_to_cache, $expected_days);
    }

    public function itGetsDayToCacheWhenPeriodHasAWeekEnd()
    {
        $start_date = \DateTime::createFromFormat('d-m-Y H:i', '21-12-2017 00:00');
        $yesterday  = \DateTime::createFromFormat('d-m-Y', '27-12-2017');
        $period     = new \TimePeriodWithoutWeekEnd($start_date->getTimestamp(), 5);

        $date_cache_retriever = new BurnupCacheDateRetriever();
        $days_to_cache        = $date_cache_retriever->getWorkedDaysToCacheForPeriod($period, $yesterday);

        $expected_days = array(
            \DateTime::createFromFormat('d-m-Y H:i:s', '21-12-2017 23:59:59')->getTimestamp(),
            \DateTime::createFromFormat('d-m-Y H:i:s', '22-12-2017 23:59:59')->getTimestamp(),
            \DateTime::createFromFormat('d-m-Y H:i:s', '25-12-2017 23:59:59')->getTimestamp(),
            \DateTime::createFromFormat('d-m-Y H:i:s', '26-12-2017 23:59:59')->getTimestamp()
        );

        $this->assertEqual($days_to_cache, $expected_days);
    }
}
