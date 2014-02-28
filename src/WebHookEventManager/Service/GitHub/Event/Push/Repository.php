<?php
/**
 * GitHub repository on push event
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
 * Class Repository
 *
 * @method int getId() Get id
 * @method string getName() Get name
 * @method string getUrl() Get url
 * @method string getDescription() Get description
 * @method int getWatchers() Get watchers
 * @method int getStargazers() Get stargazers
 * @method int getForks() Get forks
 * @method int getSize() Get size
 * @method \WebHookEventManager\Service\GitHub\Event\Push\Person getOwner() Get owner
 * @method int getOpenIssues() Get open issues
 * @method int getCreatedAt() Get created at
 * @method int getPushedAt() Get pushed at
 * @method string getMasterBranch() Get master branch
 *
 * @package WebHookEventManager\Service\GitHub\Event\Push
 */
class Repository
{
    use Accessor;

    protected $id;
    protected $name;
    protected $url;
    protected $description;
    protected $watchers = 0;
    protected $stargazers = 0;
    protected $forks = 0;
    protected $fork = false;
    protected $size = 0;
    protected $owner;
    protected $private = false;
    protected $openIssues = 0;
    protected $hasIssues = false;
    protected $hasDownloads = false;
    protected $hasWiki = false;
    protected $createdAt = 0;
    protected $pushedAt = 0;
    protected $masterBranch;

    /**
     * Repository constructor
     *
     * @param array $dataArray Repository data
     */
    public function __construct($dataArray)
    {
        $this->fillFromArray($dataArray);
    }

    /**
     * Has fork
     *
     * @return boolean
     */
    public function hasFork()
    {
        return $this->fork;
    }

    /**
     * Is private
     *
     * @return boolean
     */
    public function isPrivate()
    {
        return $this->private;
    }

    /**
     * Has issues
     *
     * @return boolean
     */
    public function hasIssues()
    {
        return $this->hasIssues;
    }

    /**
     * Has downloads
     *
     * @return boolean
     */
    public function hasDownloads()
    {
        return $this->hasDownloads;
    }

    /**
     * Has wiki
     *
     * @return boolean
     */
    public function hasWiki()
    {
        return $this->hasWiki;
    }

    /**
     * Set owner
     *
     * @param array $owner Owner data
     */
    protected function setOwner($owner)
    {
        $this->owner = new Person($owner);
    }
}
