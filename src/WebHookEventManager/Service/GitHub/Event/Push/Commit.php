<?php
/**
 * GitHub commit on push event
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
 * Class Commit
 *
 * @method int getId() Get id
 * @method string getMessage() Get message
 * @method string getTimestamp() Get timestamp
 * @method string getUrl() Get url
 * @method \WebHookEventManager\Service\GitHub\Event\Push\Person getAuthor() Get author
 * @method \WebHookEventManager\Service\GitHub\Event\Push\Person getCommitter() Get committer
 * @method array getAdded() Get added
 * @method array getRemoved() Get removed
 * @method array getModified() Get modified
 *
 * @package WebHookEventManager\Service\GitHub\Event\Push
 */
class Commit
{
    use Accessor;

    protected $id;
    protected $distinct;
    protected $message;
    protected $timestamp;
    protected $url;
    protected $author;
    protected $committer;
    protected $added;
    protected $removed;
    protected $modified;

    /**
     * Commit constructor
     *
     * @param array $dataArray Commit data
     */
    public function __construct($dataArray)
    {
        $this->fillFromArray($dataArray);
    }

    /**
     * Is distinct
     *
     * @return boolean
     */
    public function isDistinct()
    {
        return $this->distinct;
    }

    /**
     * Set author
     *
     * @param array $author Author data
     */
    public function setAuthor($author)
    {
        $this->author = new Person($author);
    }

    /**
     * Set committer
     *
     * @param array $committer Committer data
     */
    public function setCommitter($committer)
    {
        $this->committer = new Person($committer);
    }
}
