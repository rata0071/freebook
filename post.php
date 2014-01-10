<?php

$statuses = json_decode($_POST['statuses_json']);
$statuses = $statuses->posts->data;

define('PATH_TO_WP','blog/');

$authorID = 1;

define('WP_USE_THEMES',false);
require_once( realpath(PATH_TO_WP.'/wp-blog-header.php') );

$statuses = array_reverse($statuses);
foreach ( $statuses as $s ) {

        
		$content = $s->message;
		$title = substr($content,0,140);

		//-- Set up post values
		$myPost = array(
			'post_status' => 'publish',
			'post_type' => 'post',
			'post_author' => $authorID,
			'post_title' => $title,
			'post_content' => $content,
			'comment_status' => 'closed',
			'ping_status' => 'closed',
		);

		//-- Create the new post
		$newPostID = wp_insert_post($myPost);

}

header('Location: /blog');
