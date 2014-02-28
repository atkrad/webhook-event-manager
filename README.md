WebHook Event Manager
=====================
WebHook Event Manager is a simple library to help parse webhook payloads from some services ([GitHub](https://help.github.com/articles/post-receive-hooks), BitBucket):

Requirements
---

 - php >=5.4


Installation
---

Using [composer](http://getcomposer.org/):

Add the following to your `composer.json` file:

    "require": {
        "atkrad/webhook-event-manager": "0.1.*",
    },

Usage
---
```php
<?php
use WebHookEventManager\WebHook;

$webHook = new WebHook();

//Get repository owner's avatar url
$avatarUrl = $webHook->getGitHubService()
    ->getIssuesEvent()
    ->getRepository()
    ->getOwner()
    ->getAvatarUrl();

//Get sender's followers url
$followersUrl = $webHook->getGitHubService()
    ->getIssuesEvent()
    ->getSender()
    ->getFollowersUrl();

//Get pusher's username
$pusherUsername = $webHook->getGitHubService()
    ->getPushEvent()
    ->getPusher()
    ->getUsername();
```

Contribute
---
Please do. Fork it and send pull requests.