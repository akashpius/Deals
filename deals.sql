CREATE TABLE IF NOT EXISTS `deals` (
  `deal_id` int(11) NOT NULL AUTO_INCREMENT,
  `deal_type` int(11) NOT NULL,
  `type_id` varchar(50) NOT NULL,
  `deal_price` float DEFAULT NULL,
  `deal_qty` float DEFAULT NULL,
  `date_from` text NOT NULL,
  `time_from` text,
  `date_to` text NOT NULL,
  `time_to` text,
  `banner_file` text NOT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`deal_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
