<?php
/**
 * GitHub payload on issues event
 *
 * Issue opened or closed.
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
namespace WebHookEventManager\Service\GitHub\Event\Issues;

use WebHookEventManager\Accessor;

/**
 * Class Payload
 *
 * @method string getAction() Get action
 * @method \WebHookEventManager\Service\GitHub\Event\Issues\Issue getIssue() Get issue
 * @method \WebHookEventManager\Service\GitHub\Event\Issues\Repository getRepository() Get repository
 * @method \WebHookEventManager\Service\GitHub\Event\Issues\Person getSender() Get sender
 *
 * @package WebHookEventManager\Service\GitHub\Event\Issues
 */
class Payload
{
    use Accessor;

    protected $action;
    protected $issue;
    protected $repository;
    protected $sender;

    /**
     * Payload constructor
     *
     * @param $dataArray
     */
    public function __construct($dataArray)
    {
        $this->fillFromArray($dataArray);
    }

    /**
     * Set issue
     *
     * @param array $issueData Issue data
     */
    protected function setIssue($issueData)
    {
        $this->issue = new Issue($issueData);
    }

    /**
     * Set repository
     *
     * @param array $repositoryData Repository data
     */
    protected function setRepository($repositoryData)
    {
        $this->repository = new Repository($repositoryData);
    }

    /**
     * Set sender
     *
     * @param array $senderData Sender data
     */
    protected function setSender($senderData)
    {
        $this->sender = new Person($senderData);
    }
}
