CREATE TABLE IF NOT EXISTS `pastes` (
  `id` varchar(36) NOT NULL,
  `title` varchar(256) NOT NULL,
  `paste_data` text NOT NULL,
  `type` varchar(50) NOT NULL,
  `short_url` varchar(32) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `username` varchar(50) default NULL,
  `password` varchar(50) default NULL,
  `email` varchar(128) default NULL,
  `require_login_for_new` boolean NOT NULL,
  `role` varchar(20) default NULL,
  `created` datetime default NULL,
  `modified` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

INSERT INTO `users` (`id`, `username`, `password`, `email`, `require_login_for_new`, `role`, `created`, `modified`) VALUES
('', 'paste_username', 'paste_password', 'paste_email', '1', 'admin', NOW(), NOW());