DROP PROCEDURE IF EXISTS insertNotification

DELIMITER $$

CREATE PROCEDURE insertNotification(
    IN id INT,
	IN descripcion VARCHAR(255),
	IN url VARCHAR(255),
	IN icon VARCHAR(255))
	
	MODIFIES SQL DATA

BEGIN 
	DECLARE loopValue INT DEFAULT 0;
	
	SET loopValue = (SELECT MIN(idUsuario) FROM usuario);

	WHILE loopValue IS NOT NULL DO
		IF id <> loopValue THEN
			INSERT INTO notificaciones (`involvedA_idUsuario`, `involvedB_idUsuario`, `descripcion`, `url`, `icon`)
										VALUES (id, loopValue, descripcion, url, icon);
		END IF;
		SET loopValue = (SELECT MIN(idUsuario) FROM usuario WHERE loopValue < idUsuario);
	END WHILE;

END$$

DELIMITER ;


DELIMITER $$	













DELIMITER $$

CREATE PROCEDURE prueba(
    IN `idUsuario` INT
    )
	MODIFIES SQL DATA

BEGIN 
	DECLARE flag INT DEFAULT FALSE;
	DECLARE done INT DEFAULT FALSE;
	DECLARE idNotificacion INT DEFAULT 0;
	DECLARE cont INT DEFAULT 0;
	DECLARE resultset CURSOR FOR SELECT id FROM notificaciones WHERE involvedA_idUsuario=idUsuario AND active=1;
	DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;
	/*
	OPEN resultset;
	
	SET @id = "IN('null'";
	
	the_loop: LOOP
		FETCH resultset INTO idNotificacion;
		IF done THEN
			LEAVE the_loop;
		END IF;
		SET cont = cont + 1;
		SET flag = TRUE;
		SET @id = CONCAT(@id," , " ,idNotificacion);
	END LOOP the_loop;
	
	SET @id = CONCAT(@id,")");

	CLOSE resultset;
	*/
	SET @id = "IN (1)";
	IF flag THEN
		SET @select = CONCAT("SELECT * FROM notificaciones WHERE id ",@id);
		SET @update = CONCAT("UPDATE notificaciones SET active=0 WHERE id ",@id);
		PREPARE stmt FROM @update;
        EXECUTE stmt;
        DEALLOCATE PREPARE stmt;
        PREPARE stmt FROM @select;
        EXECUTE stmt;
        DEALLOCATE PREPARE stmt;
	END IF;

END$$

DELIMITER ;