CREATE TABLE `USER` (
  `ID` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `SEX` varchar(20),
  `MAIL` varchar(20),
  `PASS` varchar(20),
  `PHONE` varchar(20),
  `COUNTRY` varchar(20),
  `CG` varchar(20),
  `DATE` DATE,
  `NB_CONN` int
) ENGINE=InnoDB;

INSERT INTO `USER` (`ID`, `SEX`, `MAIL`, `PASS`, `PHONE`, `COUNTRY`, `CG`, `DATE`, `NB_CONN`) VALUES
(1, 'male', 'ozeliurs@gmail.com', 'password', '0000000000', 'fr', 'on', '2021-12-02', 0),
(2, 'fema', 'ozeliurs+2@gmail.com', 'password2', '0000000001', 'en', 'on', '2021-12-02', 15),
(3, 'othe', 'ozeliurs+3@gmail.com', 'password3', '0000000002', 'fr', 'off', '2021-12-02', 0),
(4, 'heli', 'ozeliurs+4@gmail.com', 'password4', '0000000003', 'en', 'off', '2021-12-02', 13),
(5, 'male', 'ozeliurs+5@gmail.com', 'password5', '0000000004', 'fr', 'on', '2021-12-02', 5),
(69, 'heli', 'laposte.net', 'antoskins', '078170038', 'en', '', '2021-12-02', 69),
(96, 'heli', 'antoskins@gmail.com', 'saucissecouscous', '0613392852', 'en', 'on', '2021-12-02', 42);
