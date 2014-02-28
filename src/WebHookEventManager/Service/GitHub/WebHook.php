<?php
/**
 * GitHub WebHook
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) 2014, Mohammad Abdoli Rad
 * @author    Mohammad Abdoli Rad <m.abdolirad@gmail.com>
 * @since     Version 0.1.0
 * @license   http://opensource.org/licenses/MIT MIT license
 */
namespace WebHookEventManager\Service\GitHub;

use WebHookEventManager\ArrayAccess;
use WebHookEventManager\Service\GitHub\Event\Issues\Payload as IssuesPayload;
use WebHookEventManager\Service\GitHub\Event\Push\Payload as PushPayload;

/**
 * Class WebHook
 *
 * @package WebHookEventManager\Service\GitHub
 */
class WebHook implements \ArrayAccess
{
    use ArrayAccess;

    /**
     * WebHook constructor
     *
     * @param string $jsonData GitHub data
     */
    public function __construct($jsonData)
    {
        if (is_array($jsonData)) {
            $this->fromArray($jsonData);
        } elseif (is_string($jsonData)) {
            $this->fromString($jsonData);
        }
    }

    /**
     * Get push event
     *
     * @return Event\Push\Payload
     */
    public function getPushEvent()
    {
        $push = new PushPayload($this->container);

        return $push;
    }

    /**
     * Get issues event
     *
     * @return Event\Issues\Payload
     */
    public function getIssuesEvent()
    {
        $push = new IssuesPayload($this->container);

        return $push;
    }
}
