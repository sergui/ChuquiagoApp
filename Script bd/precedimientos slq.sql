-- listar estudiantes mandando el curso correspondiente


DELIMITER // 
    CREATE  procedure listadelCurso (in idc bigint) 
    BEGIN
     select concat(e.nombre,' ', e.paterno,' ', e.materno) as nombre
		from estudiante e, curso c, kardex k 
			where c.id_curso=k.id_curso and e.id_rude=k.id_rude and c.id_curso=idc; 
    END
//
DELIMITER ;
call listadelCurso(2);