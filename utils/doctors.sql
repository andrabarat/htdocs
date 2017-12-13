CREATE TABLE `doctors` (
    `id_doctor` int(5) NOT NULL,
    `user_name` varchar(50) NOT NULL,
    `password` varchar(250) NOT NULL,
    `grade` varchar(50) NOT NULL,
    `first_name` varchar(50) NOT NULL,
    `last_name` varchar(50) NOT NULL,
    `job_title` varchar(100) NOT NULL,
    `description` varchar(1000) NOT NULL,
    PRIMARY KEY (`id_doctor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;