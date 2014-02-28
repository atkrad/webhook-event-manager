<?php
/**
 * GitHub repository on issues event
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
 * Class Repository
 *
 * @method string getArchiveUrl() Get archive url
 * @method string getAssigneesUrl() Get assignees url
 * @method string getBlobsUrl() Get blobs url
 * @method string getBranchesUrl() Get branches url
 * @method string getCloneUrl() Get clone url
 * @method string getCollaboratorsUrl() Get collaborators url
 * @method string getCommentsUrl() Get comments url
 * @method string getCommitsUrl() Get commits url
 * @method string getCompareUrl() Get compare url
 * @method string getContentsUrl() Get contents url
 * @method string getContributorsUrl() Get contributors url
 * @method string getCreatedAt() Get created at
 * @method string getDefaultBranch() Get default branch
 * @method string getDescription() Get description
 * @method string getDownloadsUrl() Get downloads url
 * @method string getEventsUrl() Get events url
 * @method int getForks() Get forks
 * @method int getForksCount() Get forks count
 * @method string getForksUrl() Get forks url
 * @method string getFullName() Get full name
 * @method string getGitCommitsUrl() Get git commits url
 * @method string getGitRefsUrl() Get git refs url
 * @method string getGitTagsUrl() Get git tags url
 * @method string getGitUrl() Get git url
 * @method string getHomepage() Get homepage
 * @method string getHooksUrl() Get hooks url
 * @method string getHtmlUrl() Get html url
 * @method int getId() Get id
 * @method string getIssueCommentUrl() Get issue comment url
 * @method string getIssueEventsUrl() Get issue events url
 * @method string getIssuesUrl() Get issues url
 * @method string getKeysUrl() Get keys url
 * @method string getLabelsUrl() Get labels url
 * @method string getLanguagesUrl() Get languages url
 * @method string getMasterBranch() Get master branch
 * @method string getMergesUrl() Get merges url
 * @method string getMilestonesUrl() Get milestones url
 * @method string getMirrorUrl() Get mirror url
 * @method string getName() Get name
 * @method string getNotificationsUrl() Get notifications url
 * @method string getOpenIssues() Get open issues
 * @method string getOpenIssuesCount() Get open issues count
 * @method string getPullsUrl() Get pulls url
 * @method string getPushedAt() Get pushed at
 * @method string getReleasesUrl() Get releases url
 * @method int getSize() Get size
 * @method string getSshUrl() Get ssh url
 * @method int getStargazersCount() Get stargazers count
 * @method string getStargazersUrl() Get stargazers url
 * @method string getStatusesUrl() Get statuses url
 * @method string getSubscribersUrl() Get subscribers url
 * @method string getSubscriptionUrl() Get subscription url
 * @method string getSvnUrl() Get svn url
 * @method string getTagsUrl() Get tags url
 * @method string getTeamsUrl() Get teams url
 * @method string getTreesUrl() Get trees url
 * @method string getUpdatedAt() Get updated at
 * @method string getUrl() Get url
 * @method int getWatchers() Get watchers
 * @method int getWatchersCount() Get watchers count
 * @method \WebHookEventManager\Service\GitHub\Event\Issues\Person  getOwner() Get owner
 *
 * @package WebHookEventManager\Service\GitHub\Event\Issues
 */
class Repository
{
    use Accessor;

    protected $id;
    protected $name;
    protected $fullName;
    protected $owner;
    protected $private = false;
    protected $htmlUrl;
    protected $description;
    protected $fork = false;
    protected $url;
    protected $forksUrl;
    protected $keysUrl;
    protected $collaboratorsUrl;
    protected $teamsUrl;
    protected $hooksUrl;
    protected $issueEventsUrl;
    protected $eventsUrl;
    protected $assigneesUrl;
    protected $branchesUrl;
    protected $tagsUrl;
    protected $blobsUrl;
    protected $gitTagsUrl;
    protected $gitRefsUrl;
    protected $treesUrl;
    protected $statusesUrl;
    protected $languagesUrl;
    protected $stargazersUrl;
    protected $contributorsUrl;
    protected $subscribersUrl;
    protected $subscriptionUrl;
    protected $commitsUrl;
    protected $gitCommitsUrl;
    protected $commentsUrl;
    protected $issueCommentUrl;
    protected $contentsUrl;
    protected $compareUrl;
    protected $mergesUrl;
    protected $archiveUrl;
    protected $downloadsUrl;
    protected $issuesUrl;
    protected $pullsUrl;
    protected $milestonesUrl;
    protected $notificationsUrl;
    protected $labelsUrl;
    protected $releasesUrl;
    protected $createdAt;
    protected $updatedAt;
    protected $pushedAt;
    protected $gitUrl;
    protected $sshUrl;
    protected $cloneUrl;
    protected $svnUrl;
    protected $homepage;
    protected $size;
    protected $stargazersCount = 0;
    protected $watchersCount = 0;
    protected $hasIssues = false;
    protected $hasDownloads = false;
    protected $hasWiki = false;
    protected $forksCount = 0;
    protected $mirrorUrl;
    protected $openIssuesCount = 0;
    protected $forks = 0;
    protected $openIssues = 0;
    protected $watchers = 0;
    protected $defaultBranch;
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
     * Set owner
     *
     * @param array $data Owner data
     */
    protected function setOwner($data)
    {
        $this->owner = new Person($data);
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
     * Has downloads
     *
     * @return boolean
     */
    public function hasDownloads()
    {
        return $this->hasDownloads;
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
     * Has wiki
     *
     * @return boolean
     */
    public function hasWiki()
    {
        return $this->hasWiki;
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
}
