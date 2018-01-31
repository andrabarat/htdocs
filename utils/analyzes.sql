CREATE TABLE `analysis` ( 
    `id_analyse` INT(5) NOT NULL , 
    `id_reservation` INT(5) NOT NULL , 
    `status` VARCHAR(100) NOT NULL , 
    `prescription` VARCHAR(1500) NOT NULL )
ENGINE = InnoDB;