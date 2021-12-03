<?php

require "twitteroauth/autoload.php";

use Abraham\TwitterOAuth\TwitterOAuth;

$consumerkey = "8q7UU92TO0aU1N97GOgP7Wbhm";

$consumersecret = "G10vJgDO6khFZ5HmaFZbS5yrGWj7g9Bi8dJHBEkJe1LOyc2YH7";

$accesstoken = "1455621544428908544-XI4byY6KrEsE6qhdvXCQNCSkvGDAjv";

$accesstokensecret = "7P4yCs8ZJYpwrBvlSe4YmgyE56KubBuEeqy9DLLFs80SE";

$connection = new TwitterOAuth($consumerkey, $consumersecret, $accesstoken, $accesstokensecret);
$content = $connection->get("account/verify_credentials");

$statuses = $connection->get("statuses/home_timeline", ["count" => 25, "exclude_replies" => true]);

foreach($statuses as $tweet) {
	
	if ($tweet->favorite_count >= 0) {
		
	   $status = $connection->get("statuses/oembed", ["id" => $tweet->id]);

	   echo $status->html;
	
	}
}

?>