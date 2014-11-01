<?php
/**
 * GitHub push event test
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
namespace WebHookEventManager\Tests\Service\GitHub;

use PHPUnit_Framework_TestCase;
use WebHookEventManager\Service\GitHub\Event\Push\Commit;
use WebHookEventManager\Service\GitHub\Event\Push\Payload;
use WebHookEventManager\Service\GitHub\Event\Push\Person;
use WebHookEventManager\Service\GitHub\Event\Push\Repository;
use WebHookEventManager\Service\GitHub\WebHook;

/**
 * Class PushTest
 *
 * @package WebHookEventManager\Service\GitHub
 */
class PushTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var WebHook
     */
    protected $webHook;

    /**
     * @var Payload
     */
    protected $pushEvent;

    /**
     * Sets up the fixture, for example, open a network connection.
     * This method is called before a test is executed.
     */
    public function setUp()
    {
        $request = file_get_contents(GITHUB_FIXTURES_DIR . '/Event/push.json');

        $this->webHook = new WebHook($request);
        $this->pushEvent = $this->webHook->getPushEvent();
    }

    /**
     * Payload test
     */
    public function testPayload()
    {
        $this->assertTrue(($this->pushEvent->getRepository() instanceof Repository));
        $this->assertTrue(($this->pushEvent->getHeadCommit() instanceof Commit));
        $this->assertTrue(($this->pushEvent->getPusher() instanceof Person));
    }
}
