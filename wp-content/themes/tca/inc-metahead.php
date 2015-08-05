<!DOCTYPE html>
<html lang="en" <?php if('venue' == get_post_type()){ echo 'style="background: #000'; } ?>>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=Edge"/><meta name="MSSmartTagsPreventParsing" content="true" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no target-densitydpi=device-dpi" />
    <title><?php wp_title(); ?></title>
    <!-- <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.3.15/slick.css"/> -->
    <link rel="apple-touch-icon" sizes="57x57" href="<?php bloginfo('url'); ?>/ui/icons/apple-touch-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php bloginfo('url'); ?>/ui/icons/apple-touch-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php bloginfo('url'); ?>/ui/icons/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="144x144" href="<?php bloginfo('url'); ?>/ui/icons/apple-touch-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="60x60" href="<?php bloginfo('url'); ?>/ui/icons/apple-touch-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="120x120" href="<?php bloginfo('url'); ?>/ui/icons/apple-touch-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="76x76" href="<?php bloginfo('url'); ?>/ui/icons/apple-touch-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="152x152" href="<?php bloginfo('url'); ?>/ui/icons/apple-touch-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo('url'); ?>/ui/icons/apple-touch-icon-180x180.png">
	<link rel="shortcut icon" href="<?php bloginfo('url'); ?>/ui/icons/favicon.ico">
	<link rel="icon" type="image/png" href="<?php bloginfo('url'); ?>/ui/icons/favicon-192x192.png" sizes="192x192">
	<link rel="icon" type="image/png" href="<?php bloginfo('url'); ?>/ui/icons/favicon-160x160.png" sizes="160x160">
	<link rel="icon" type="image/png" href="<?php bloginfo('url'); ?>/ui/icons/favicon-96x96.png" sizes="96x96">
	<link rel="icon" type="image/png" href="<?php bloginfo('url'); ?>/ui/icons/favicon-16x16.png" sizes="16x16">
	<link rel="icon" type="image/png" href="<?php bloginfo('url'); ?>/ui/icons/favicon-32x32.png" sizes="32x32">
	<meta name="msapplication-TileColor" content="#00aba9">
	<meta name="msapplication-TileImage" content="<?php bloginfo('url'); ?>/ui/icons/mstile-144x144.png">
	<meta name="msapplication-config" content="<?php bloginfo('url'); ?>/ui/icons/browserconfig.xml">

    <link type="text/plain" rel="author" href="authors.txt" />
    <?php wp_head(); ?>