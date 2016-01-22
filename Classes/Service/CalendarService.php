<?php
namespace B13\Amazingcalendar\Service;
/**
 * This file is part of a project brought to you by b:dreizehn.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * Copyright owner is b:dreizehn GmbH, Stuttgart, Germany.
 * See www.b13.de for more details.
 */

/**
 * Wrapper class to fetch events as an array using iCal library
 */
class CalendarService {

	/**
	 * Fetch upcoming events
	 *
	 * @param $calendarUrl
	 * @return array
	 */
	public function getUpcomingEvents($calendarUrl) {
		$calendar = $this->getCalendarObjectFromUrl($calendarUrl);
		$events = array();
		$rightNow = new \DateTime();
		foreach ($calendar->events() as $event) {
			$end = new \DateTime($event['DTEND']);
			if ($end > $rightNow) {
				$start = new \DateTime($event['DTSTART']);
				$sortable = $event['DTSTART'] . $event['UID'];
				$event['location'] = str_replace('\\', '', $event['LOCATION']);
				$events[$sortable] = array_merge($event, array(
					'start' => $start,
					'end'   => $end,
				));
			}
		}
		ksort($events);
		return $events;
	}

	/**
	 *
	 * @param string $calendarUrl
	 * @return \ICal
	 */
	protected function getCalendarObjectFromUrl($calendarUrl) {
		return new \ICal($calendarUrl);
	}

}