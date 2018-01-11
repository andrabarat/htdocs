CREATE TABLE `quickreservations` (
    `id_quick_reservation` int(5) NOT NULL,
    `job_title_reservation` varchar(100) NOT NULL,
    `last_name_reservation` varchar(100) NOT NULL,
    `first_name_reservation` varchar(100) NOT NULL,
    `phone_reservation` varchar(13) NOT NULL,
    `creation_reservation_quick` datetime NOT NULL,
    PRIMARY KEY (`id_quick_reservation`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1