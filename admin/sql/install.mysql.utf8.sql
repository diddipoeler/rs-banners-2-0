
CREATE TABLE IF NOT EXISTS `#__rsbanners_ad` 
( 
`id` int(11) NOT NULL AUTO_INCREMENT, 
`cid` int(11) NOT NULL DEFAULT '0', 
`ad_code` text NOT NULL, 
`status` int(1) NOT NULL DEFAULT '1',
`ordering` int(11) NOT NULL DEFAULT '0',
  `checked_out` int(11) NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` DATETIME NULL ,
  `modified_by` INT NULL ,
 PRIMARY KEY (`id`) 
 ) 
 ENGINE=MyISAM  DEFAULT CHARSET=utf8 ;
 
CREATE TABLE IF NOT EXISTS `#__rsbanners_adcat` 
( 
`id` int(11) NOT NULL AUTO_INCREMENT,
 `name` varchar(150) NOT NULL,
  `code` varchar(50) NOT NULL,
   `status` int(1) NOT NULL DEFAULT '1',
   `ordering` int(11) NOT NULL DEFAULT '0',
  `checked_out` int(11) NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` DATETIME NULL ,
  `modified_by` INT NULL ,
    PRIMARY KEY (`id`)
 ) 
 ENGINE=MyISAM  DEFAULT CHARSET=utf8 ; 