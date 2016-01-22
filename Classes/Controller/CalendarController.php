<?php
namespace B13\Amazingcalendar\Controller;
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
 * Main Controller class
 *
 */
class CalendarController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * List all upcoming events
	 */
	public function listUpcomingEventsAction() {
		$url = $this->settings['calendarUrl'];
		if (empty($url)) {
			return '';
		}
		$service = $this->objectManager->get('B13\\Amazingcalendar\\Service\\CalendarService');
		// only take the upcoming ones
		$events = $service->getUpcomingEvents($url);

		$limit = (int)$this->settings['limit'];
		if ($limit) {
			$events = array_slice($events, 0, $limit);
		}
		$this->view->assign('events', $events);
	}
}