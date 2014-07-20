<?php
/**
*
* @package favicon
* @copyright (c) 2013 Татьяна5
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace tatiana5\favicon\event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
* Event listener
*/
class listener implements EventSubscriberInterface
{
	/**
	* Assign functions defined in this class to event listeners in the core
	*
	* @return array
	* @static
	* @access public
	*/
	static public function getSubscribedEvents()
	{
		return array();
	}
}
