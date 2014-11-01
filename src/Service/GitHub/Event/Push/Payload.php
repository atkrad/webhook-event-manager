<?php
/**
 * GitHub payload on push event
 *
 * Git push to the repository.
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
namespace WebHookEventManager\Service\GitHub\Event\Push;

use WebHookEventManager\Accessor;

/**
 * Class Payload
 *
 * @method string getRef() Get ref
 * @method string getAfter() Get after
 * @method string getBefore() Get before
 * @method string getCompare() Get compare
 * @method Commit[] getCommits() Get commits
 * @method Commit getHeadCommit() Get head commit
 * @method Repository getRepository() Get repository
 * @method Person getPusher() Get pusher
 *
 * @package WebHookEventManager\Service\GitHub\Event\Push
 */
class Payload
{
    use Accessor;

    protected $ref;
    protected $after;
    protected $before;
    protected $created = false;
    protected $deleted = false;
    protected $forced = false;
    protected $compare;
    protected $commits = [];
    protected $headCommit;
    protected $repository;
    protected $pusher;

    /**
     * Payload constructor
     *
     * @param array $dataArray Payload data
     */
    public function __construct($dataArray)
    {
        $this->fillFromArray($dataArray);
    }

    /**
     * Is created
     *
     * @return boolean
     */
    public function isCreated()
    {
        return $this->created;
    }

    /**
     * Is deleted
     *
     * @return boolean
     */
    public function isDeleted()
    {
        return $this->deleted;
    }

    /**
     * Is forced
     *
     * @return boolean
     */
    public function isForced()
    {
        return $this->forced;
    }

    /**
     * Set commit
     *
     * @param array $commits Commits data
     */
    protected function setCommits($commits)
    {
        foreach ($commits as $commit) {
            $this->commits[] = new Commit($commit);
        }
    }

    /**
     * Set head commit
     *
     * @param array $headCommit Head commit data
     */
    protected function setHeadCommit($headCommit)
    {
        $this->headCommit = new Commit($headCommit);
    }

    /**
     * Set repository
     *
     * @param array $repository Repository data
     */
    protected function setRepository($repository)
    {
        $this->repository = new Repository($repository);
    }

    /**
     * Set pusher
     *
     * @param array $pusher Pusher data
     */
    protected function setPusher($pusher)
    {
        $this->pusher = new Person($pusher);
    }
}
