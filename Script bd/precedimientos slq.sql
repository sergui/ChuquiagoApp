#asignacion del asesor
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

#lista de los alumnos
DELIMITER // 
    CREATE  procedure padre_alumno (IN idc BIGINT, IN idt BIGINT) 
    BEGIN
    SELECT tmpcurso.*,IFNULL(tmpestudiante.id_tutor,-1) AS id_tutor
		FROM
			(SELECT 
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
			    AND c.id_curso = idc )tmpcurso
			LEFT JOIN (SELECT * FROM encargado WHERE id_tutor=idt)tmpestudiante
		ON tmpcurso.id_rude = tmpestudiante.id_rude;
    END
//
DELIMITER ;