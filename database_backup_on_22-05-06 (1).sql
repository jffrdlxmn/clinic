

CREATE TABLE `asset_condition` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `condition` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;


INSERT INTO asset_condition (id, condition) VALUES ('1','Fair');

INSERT INTO asset_condition (id, condition) VALUES ('2','Good');

INSERT INTO asset_condition (id, condition) VALUES ('3','New');

INSERT INTO asset_condition (id, condition) VALUES ('4','Poor');
