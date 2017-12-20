CREATE TABLE `test`.`reservations` ( 
    `id_reservation` INT(5) NOT NULL ,
    `id_user` INT(5) NOT NULL , 
    `id_doctor` INT(5) NOT NULL , 
    `start_reservation` DATETIME NOT NULL ,
    `time_interval` VARCHAR(5) NOT NULL , 
    `creation_date` DATETIME NOT NULL ,
    PRIMARY KEY (`id_reservation`))
ENGINE = InnoDB;