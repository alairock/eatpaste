CREATE TABLE IF NOT EXISTS `pastes` (
  `id` varchar(36) NOT NULL,
  `paste_data` text NOT NULL,
  `type` varchar(50) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;