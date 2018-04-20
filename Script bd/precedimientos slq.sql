-- listar estudiantes mandando el curso correspondiente
DELIMITER $$

USE `bdchuquiago` $$

DROP PROCEDURE IF EXISTS `listadelCurso` $$

CREATE DEFINER = `root` @`localhost` PROCEDURE `listadelCurso` (IN idc BIGINT) 
BEGIN
  SELECT 
    CONCAT(
      e.nombre,
      ' ',
      e.paterno,
      ' ',
      e.materno
    ) AS nombre_completo,
    e.sexo,
    e.fecha_nac,
    e.id_rude 
  FROM
    estudiante e,
    curso c,
    kardex k 
  WHERE c.id_curso = k.id_curso 
    AND e.id_rude = k.id_rude 
    AND c.id_curso = idc ;
END $$

DELIMITER ;

call listadelCurso(2);