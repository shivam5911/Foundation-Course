CREATE TABLE `exits_user` (
  `id` int PRIMARY KEY,
  `name` varchar(255),
  `mobile` varchar(255),
  `invite_code` int
);

CREATE TABLE `invite` (
  `invite_id` int PRIMARY KEY,
  `invite_req` varchar(255),
  `invite_res` varchar(255),
  `invite_time` datetime,
  `time_out` datetime
);

CREATE TABLE `codeTable` (
  `code_id` int PRIMARY KEY,
  `code_value` varchar(255)
);

CREATE TABLE `inventationWay` (
  `invite_link` varchar(255),
  `invite_code` int
);

CREATE TABLE `userDetails` (
  `user_id` int PRIMARY KEY,
  `name` varchar(255),
  `invite_way` varchar(255),
  `invite_code` int,
  `invite_by` int
);

ALTER TABLE `invite` ADD FOREIGN KEY (`invite_req`) REFERENCES `exits_user` (`id`);

ALTER TABLE `invite` ADD FOREIGN KEY (`invite_res`) REFERENCES `exits_user` (`id`);

ALTER TABLE `inventationWay` ADD FOREIGN KEY (`invite_link`) REFERENCES `exits_user` (`id`);

ALTER TABLE `inventationWay` ADD FOREIGN KEY (`invite_code`) REFERENCES `exits_user` (`id`);

ALTER TABLE `userDetails` ADD FOREIGN KEY (`invite_by`) REFERENCES `exits_user` (`id`);

ALTER TABLE `exits_user` ADD FOREIGN KEY (`invite_code`) REFERENCES `codeTable` (`code_id`);
