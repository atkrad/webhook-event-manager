<?php
/**
 * GitHub issue on issues event
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
 * Class Issue
 *
 * @method string getUrl() Get url
 * @method string getLabelsUrl() Get labels url
 * @method string getCommentsUrl() Get comments url
 * @method string getEventsUrl() Get events url
 * @method string getHtmlUrl() Get html url
 * @method int getId() Get id
 * @method int getNumber() Get number
 * @method string getTitle() Get title
 * @method \WebHookEventManager\Service\GitHub\Event\Issues\Person getUser() Get user
 * @method array getLabels() Get labels
 * @method string getState() Get state
 * @method \WebHookEventManager\Service\GitHub\Event\Issues\Person getAssignee() Get assignee
 * @method string getMilestone() Get milestone
 * @method \WebHookEventManager\Service\GitHub\Event\Issues\PullRequest getPullRequest() Get pull request
 * @method string getUpdatedAt() Get updated at
 *
 * @package WebHookEventManager\Service\GitHub\Event\Issues
 */
class Issue
{
    use Accessor;

    protected $url;
    protected $labelsUrl;
    protected $commentsUrl;
    protected $eventsUrl;
    protected $htmlUrl;
    protected $id;
    protected $number;
    protected $title;
    protected $user;
    protected $labels = [];
    protected $state;
    protected $assignee;
    protected $milestone;
    protected $comments;
    protected $createdAt;
    protected $updatedAt;
    protected $closedAt;
    protected $pullRequest;
    protected $body;

    /**
     * Issue constructor
     *
     * @param array $dataArray Issue data
     */
    public function __construct($dataArray)
    {
        $this->fillFromArray($dataArray);
    }

    /**
     * Set assignee
     *
     * @param array $assignee Assignee data
     */
    public function setAssignee($assignee)
    {
        $this->assignee = new Person($assignee);
    }

    /**
     * Set pull request
     *
     * @param array $pullRequest Pull request data
     */
    public function setPullRequest($pullRequest)
    {
        $this->pullRequest = new PullRequest($pullRequest);
    }

    /**
     * Set user
     *
     * @param array $user User data
     */
    protected function setUser($user)
    {
        $this->user = new Person($user);
    }
}
