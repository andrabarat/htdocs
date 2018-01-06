CREATE TABLE `users` (
    `id_user` int(5) NOT NULL,
    `first_name` varchar(50) NOT NULL,
    `last_name` varchar(50) NOT NULL,
    `cnp` varchar(13) NOT NULL,
    `user_name` varchar(50) NOT NULL,
    `phone_number` varchar(13) NOT NULL,
    `email` varchar(50) NOT NULL,
    `password` varchar(250) NOT NULL,
    PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

