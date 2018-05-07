DELIMITER // 
    CREATE  procedure asignar_asesor () 
    BEGIN
        
  SELECT 
  concat(c.grado,' ',c.paralelo) as Cursos,
  tmpkardex.* ,IFNULL(tmpkardex.id_asesor,-1) AS id_asesor
FROM
  curso c 
  RIGHT JOIN 
    (SELECT DISTINCT 
      (id_curso),
      (SELECT 
        CONCAT(nombre, ' ', paterno, ' ', materno) 
      FROM
        docente 
      WHERE id_docente = id_asesor) nombre_completo,
      gestion ,id_asesor
    FROM
      kardex 
    WHERE gestion = 2018) tmpkardex 
    ON c.`id_curso` = tmpkardex.`id_curso` 
WHERE c.`estado` = 1;
    END
//
DELIMITER ;