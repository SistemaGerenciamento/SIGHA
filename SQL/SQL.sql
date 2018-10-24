drop table administradora;
drop table professores;
drop table disciplina;
drop table dias_semana;
drop table curso;
drop table curso_dias;
drop table feriados;
drop table calendario;
drop table aulas;
drop table professores_dias_aulas_turno;
drop table turno;
drop table curso_disciplina_turno_professor_dias_semana;













select * from administradora;
select * from professores;
select * from disciplina;
select * from dias_semana;
select * from curso;
select * from agendamento_sala;
select * from disciplina_semana_turno_professor;
select * from curso_dias;
select * from feriados;
select * from aulas;
select * from professores_dias_aulas_turno;
select * from turno;
select * from curso_disciplina_turno_professor_dias_semana;



create table administradora(
    id int primary key auto_increment,
    nome varchar(100),
    senha varchar(100)
);

insert into administradora values (default, "andressa", "123");


create table professores(
    id int primary key auto_increment,
    nome varchar(100),
    carga_horaria int,
    email varchar(100)
);

create table professores_dias_aulas_turno(
    professor_id integer references professor(id),
    dias_semana_id integer references dias_semana(id),
    aulas_id integer references aulas(id),
    turno_id integer references turno(id),
    primary key (professor_id, dias_semana_id, aulas_id, turno_id)
);

create table aulas(
    id int primary key auto_increment,
    aula varchar(100)
);

insert into aulas values (default, "07:30");
insert into aulas values (default, "09:20");
insert into aulas values (default, "09:40");
insert into aulas values (default, "11:30");

insert into aulas values (default, "13:30");
insert into aulas values (default, "15:20");
insert into aulas values (default, "15:40");
insert into aulas values (default, "17:30");

insert into aulas values (default, "18:30");
insert into aulas values (default, "20:20");
insert into aulas values (default, "20:40");
insert into aulas values (default, "22:30");

create table disciplina(
    id int primary key auto_increment,
    nome varchar(100),
    carga_horaria int,
    horas_dia int
);

create table curso_disciplina_turno_professor_dias_semana(
    curso_id integer references curso(id) on delete cascade on update cascade,
    disciplina_id integer references disciplina(id) on delete cascade on update cascade,
    turno_id integer references turno(id) on delete cascade on update cascade,
    professor_id integer references professor(id) on delete cascade on update cascade,
    dias_semana_id integer references dias_semana(id) on delete cascade on update cascade,
    primary key (curso_id, disciplina_id)
);

create table turno(
    id int primary key auto_increment,
    turno varchar(100)
);

insert into turno values (default, "Matutino");
insert into turno values (default, "Vespertino");
insert into turno values (default, "Noturno");
insert into turno values (default, "Matutino, dois primeiros periodos");
insert into turno values (default, "Matutino, dois ultimos periodos");
insert into turno values (default, "Vespertino, dois primeiros periodos");
insert into turno values (default, "Vespertino, dois ultimos periodos");
insert into turno values (default, "Noturno, dois primeiros periodos");
insert into turno values (default, "Noturno, dois ultimos periodos");
insert into turno values (default, "");

create table dias_semana(
    id int primary key auto_increment,
    dias_semana varchar(20)
);

insert INTO dias_semana VALUES (default, "Segunda-Feira");
insert INTO dias_semana VALUES (default, "Terca-Feira");
insert INTO dias_semana VALUES (default, "Quarta-Feira");
insert INTO dias_semana VALUES (default, "Quinta-Feira");
insert INTO dias_semana VALUES (default, "Sexta-Feira");
insert INTO dias_semana VALUES (default, "Sabado");
insert INTO dias_semana VALUES (default, "Domingo");

create table curso(
    id int primary key auto_increment,
    nome varchar(100),
    tipo varchar(25),
    turno varchar(25),
    data_inicio date,
    data_termino date,
    modulo varchar(100)
); 

create table curso_dias(
    curso_id integer references curso(id) on delete cascade on update cascade,
    dias_semana_id integer references dias_semana(id) on delete cascade on update cascade,
    primary key (curso_id, dias_semana_id)
);

create table feriados(
    id int primary key auto_increment,
    motivo varchar(100),
    feriado date
);

create table calendario(
    id int primary key auto_increment,
    datas varchar(100),
    dias_semana varchar(100),
    curso_id integer references curso(id) on update cascade on delete cascade
);

insert into feriados values (default, 'Feriado','2018-01-01');
insert into feriados values (default, 'Feriado','2018-03-30');
insert into feriados values (default, 'Feriado','2018-04-01');
insert into feriados values (default, 'Feriado','2018-04-21');
insert into feriados values (default, 'Feriado','2018-05-01');
insert into feriados values (default, 'Feriado','2018-05-31');
insert into feriados values (default, 'Feriado','2018-09-07');
insert into feriados values (default, 'Feriado','2018-10-12');
insert into feriados values (default, 'Feriado','2018-11-02');
insert into feriados values (default, 'Feriado','2018-11-15');
insert into feriados values (default, 'Feriado','2018-01-01');
insert into feriados values (default, 'Feriado','2018-12-25');

insert into disciplina values (default, 'PI', 40, 4)

SELECT DISTINCT professores_dias_aulas_turno.turno_id FROM professores_dias_aulas_turno WHERE professor_id = 1;

SELECT DISTINCT professores_dias_aulas_turno.turno_id FROM professores_dias_aulas_turno WHERE professor_id = 9;

SELECT * FROM turno WHERE turno.id IN (3,8,9) ORDER BY FIELD(turno.id,3,8,9);

SELECT DISTINCT curso_dias.dias_semana_id, curso.turno, turno.turno, professores_dias_aulas_turno.turno_id, professores_dias_aulas_turno.dias_semana_id FROM curso_dias JOIN dias_semana, professores_dias_aulas_turno, professores, turno, curso WHERE curso.id = curso_dias.curso_id AND curso_id= 1 AND professores.id = professores_dias_aulas_turno.professor_id AND professores.id = 9 AND professores_dias_aulas_turno.turno_id = turno.id AND professores_dias_aulas_turno.dias_semana_id = dias_semana.id;

SELECT DISTINCT professores.nome, professores_dias_aulas_turno.dias_semana_id, turno.id AS turno_id FROM professores JOIN professores_dias_aulas_turno, turno, dias_semana WHERE professores_dias_aulas_turno.professor_id = professores.id AND professores.id = 9 AND turno.id = professores_dias_aulas_turno.turno_id AND turno.id = 9 AND dias_semana.id = professores_dias_aulas_turno.dias_semana_id;

SELECT curso.id, curso.nome, curso.tipo, curso.turno, date_format(curso.data_inicio, '%d/%m/%Y') AS data_inicio, date_format(curso.data_termino, '%d/%m/%Y') AS data_termino, curso.modulo, curso_dias.dias_semana_id, dias_semana.dias_semana FROM curso JOIN dias_semana, curso_dias WHERE curso.id = curso_dias.curso_id AND curso_dias.dias_semana_id = dias_semana.id;

SELECT * FROM dias_semana;

SELECT DISTINCT professores.nome, professores_dias_aulas_turno.dias_semana_id FROM professores JOIN professores_dias_aulas_turno, turno, dias_semana WHERE professores_dias_aulas_turno.professor_id = professores.id AND professores.id =
1
AND turno.id = professores_dias_aulas_turno.turno_id AND turno.id =
9
AND dias_semana.id = professores_dias_aulas_turno.dias_semana_id;


SELECT DISTINCT professores.nome, professores_dias_aulas_turno.dias_semana_id FROM professores JOIN professores_dias_aulas_turno, turno, dias_semana WHERE professores_dias_aulas_turno.professor_id = professores.id AND professores.id = 1 AND turno.id = professores_dias_aulas_turno.turno_id AND turno.id = 9 AND dias_semana.id = professores_dias_aulas_turno.dias_semana_id;
SELECT DISTINCT professores.nome, professores_dias_aulas_turno.dias_semana_id FROM professores JOIN professores_dias_aulas_turno, turno, dias_semana WHERE professores_dias_aulas_turno.professor_id = professores.id AND professores.id = 1 AND turno.id = professores_dias_aulas_turno.turno_id AND turno.id = 10 AND dias_semana.id = professores_dias_aulas_turno.dias_semana_id;
SELECT DISTINCT professores.nome, professores_dias_aulas_turno.turno_id, professores_dias_aulas_turno.dias_semana_id FROM professores JOIN professores_dias_aulas_turno, dias_semana WHERE professores.id = 1 AND dias_semana.id = professores_dias_aulas_turno.dias_semana_id;

SELECT DISTINCT professores.nome, dias_semana.dias_semana FROM professores JOIN professores_dias_aulas_turno ON professores.id = professores_dias_aulas_turno.professor_id JOIN dias_semana ON dias_semana.id = professores_dias_aulas_turno.dias_semana_id
    WHERE professores.id NOT IN (SELECT professores.id FROM professores JOIN professores_dias_aulas_turno
    ON professores.id = professores_dias_aulas_turno.professor_id WHERE professores_dias_aulas_turno.turno_id = 9);

SELECT DISTINCT professores.id, professores.nome FROM professores_dias_aulas_turno JOIN professores, dias_semana, aulas, turno WHERE turno.id = 9 AND professores.id = professores_dias_aulas_turno.professor_id AND dias_semana.id = professores_dias_aulas_turno.dias_semana_id AND aulas.id = professores_dias_aulas_turno.aulas_id;

SELECT DISTINCT professores.id, professores.nome, dias_semana.dias_semana, aulas.aula, turno.id AS turno_id, turno.turno FROM professores_dias_aulas_turno JOIN professores, dias_semana, aulas, turno WHERE professores_dias_aulas_turno.turno_id = turno.id AND turno.id = 9 AND professores.id = professores_dias_aulas_turno.professor_id AND professores.id = 2 AND dias_semana.id = professores_dias_aulas_turno.dias_semana_id AND aulas.id = professores_dias_aulas_turno.aulas_id;


SELECT DISTINCT dias_semana.dias_semana, dias_semana.id FROM professores JOIN professores_dias_aulas_turno, aulas, dias_semana WHERE professores_dias_aulas.professor_id = professores.id AND professores.id = $id AND aulas.id = professores_dias_aulas.aulas_id AND dias_semana.id = professores_dias_aulas.dias_semana_id;

SELECT DISTINCT disciplina.id, disciplina.nome, disciplina.carga_horaria, disciplina.horas_dia, professores.nome AS professor_nome, turno.turno, dias_semana.dias_semana FROM disciplina JOIN dias_semana, turno, professores, disciplina_semana_turno_professor WHERE disciplina.id = disciplina_semana_turno_professor.disciplina_id AND professores.id = disciplina_semana_turno_professor.professor_id AND dias_semana.id = disciplina_semana_turno_professor.semana_id AND turno.id = disciplina_semana_turno_professor.turno_id;

SELECT DISTINCT dias_semana.dias_semana, dias_semana.id FROM professores JOIN professores_dias_aulas, aulas, dias_semana WHERE professores_dias_aulas.professor_id = professores.id AND professores.id = 1 AND aulas.id = professores_dias_aulas.aulas_id AND dias_semana.id = professores_dias_aulas.dias_semana_id;

SELECT DISTINCT professores_dias_aulas.aulas_id FROM professores_dias_aulas JOIN dias_semana, aulas, professores WHERE professores_dias_aulas.professor_id = professores.id AND professores.id = 1 AND dias_semana.id = professores_dias_aulas.dias_semana_id AND dias_semana.id = 1 ORDER BY professores_dias_aulas.aulas_id;

SELECT DISTINCT dias_semana.dias_semana, dias_semana.id FROM professores JOIN professores_dias_aulas, aulas, dias_semana WHERE professores_dias_aulas.professor_id = professores.id AND professores.id = 1 AND aulas.id = professores_dias_aulas.aulas_id AND dias_semana.id = professores_dias_aulas.dias_semana_id;

SELECT DISTINCT dias_semana.dias_semana, dias_semana.id FROM professores JOIN professores_dias_aulas, aulas, dias_semana WHERE professores_dias_aulas.professor_id = professores.id AND professores.id = 3 AND aulas.id = professores_dias_aulas.aulas_id AND dias_semana.id = professores_dias_aulas.dias_semana_id;

SELECT DISTINCT professores.id, professores.nome, dias_semana.id, dias_semana.dias_semana, aulas.id AS aula_id, aulas.aula FROM professores JOIN professores_dias_aulas, aulas, dias_semana WHERE professores_dias_aulas.professor_id = professores.id AND professores.id = 2 AND aulas.id = professores_dias_aulas.aulas_id AND dias_semana.id = professores_dias_aulas.dias_semana_id; 

SELECT DISTINCT professores_dias_aulas.dias_semana_id, dias_semana.dias_semana FROM professores_dias_aulas JOIN professores, dias_semana WHERE professores_dias_aulas.aulas_id = 0 AND dias_semana.id = professores_dias_aulas.dias_semana_id AND professores_dias_aulas.professor_id = 2;

SELECT DISTINCT professores_dias_aulas.dias_semana_id, dias_semana.dias_semana, professores_dias_aulas.aulas_id FROM professores_dias_aulas JOIN professores, dias_semana WHERE professores_dias_aulas.aulas_id > 0 AND dias_semana.id = professores_dias_aulas.dias_semana_id AND professores_dias_aulas.professor_id = 2;

insert into professores_dias_aulas values (4, 1, 9);
insert into professores_dias_aulas values (4, 1, 10);
insert into professores_dias_aulas values (4, 1, 11);
insert into professores_dias_aulas values (4, 1, 12);
insert into professores_dias_aulas values (4, 2, 0);



SELECT * FROM aulas WHERE id IN (1,2,3,4);

SELECT * FROM aulas WHERE id IN (5,6,7,8);

SELECT * FROM aulas WHERE id IN (9,10,11,12);

SELECT periodo.id, periodo.periodo, periodo_semana.semana_id, periodo_semana.periodo_id FROM periodo JOIN periodo_semana WHERE periodo.id = periodo_semana.periodo_id AND periodo_semana.semana_id = 4;

SELECT turno.id, turno.turno FROM turno JOIN periodo_turno WHERE turno.id = periodo_turno.turno_id AND periodo_turno.periodo_id = 2;

SELECT curso.turno, disciplina.nome FROM curso JOIN disciplina WHERE turno = "Vespertino";
SELECT curso.turno, disciplina.nome FROM curso JOIN disciplina, curso_disciplina WHERE turno = 'Vespertino' AND curso.id = curso_disciplina.curso_id AND disciplina.id = curso_disciplina.disciplina_id;


SELECT motivo, date_format(feriado, '%d/%m/%Y') AS feriado FROM feriados;

SELECT date_format(feriado, '%d/%m') FROM feriados AS feriado; 

SELECT professores.nome, professores.carga_horaria, professores.email, professor_semana.semana_id, dias_semana.dias_semana FROM professores JOIN professor_semana, dias_semana WHERE dias_semana.id = professor_semana.semana_id AND professores.id = professor_semana.professor_id;

SELECT dayname('2018-04-01');

select professores.id, professores.nome, professores.carga_horaria, professores.email, professor_semana.professor_id, professor_semana.semana_id from professores join professor_semana;

select sum(disciplina.carga_horaria) from disciplina, curso, curso_disciplina
  where disciplina.id = curso_disciplina.disciplina_id and curso.id = curso_disciplina.curso_id and
    curso.id = ;

select professor_semana.semana_id, professor_semana.professor_id, dias_semana.id from professor_semana join professores, dias_semana where professor_semana.professor_id = professores.id and dias_semana.id = professor_semana.semana_id;

select curso.id, curso.modulo, curso_disciplina.curso_id, curso.nome, disciplina.nome as disciplina, 
         curso.carga_horaria, curso.tipo, curso.turno, date_format(curso.data_inicio, '%d/%m/%Y') as data_inicio, date_format(curso.data_termino, '%d/%m/%Y') as data_termino
         from curso_disciplina 
         inner join curso, disciplina where curso.id = curso_id 
         and disciplina.id = disciplina_id order by curso.nome


SELECT DISTINCT curso_disciplina.disciplina_id, curso.carga_horaria, sum(disciplina.horas_dia) as horas_dia, disciplina.nome as disciplina, 
                                                 disciplina_semana.semana_id, dias_semana.dias_semana as diasSemana FROM curso_disciplina inner join 
                                                 disciplina_semana, curso, disciplina, dias_semana where curso_id = curso.id and 
                                                 curso.id = 1 and curso_disciplina.disciplina_id = disciplina_semana.disciplina_id 
                                                 and disciplina_semana.disciplina_id = disciplina.id and dias_semana.id = 
                                                 disciplina_semana.semana_id and dias_semana.dias_semana = 'Segunda-Feira';

select curso.id, curso.modulo, curso_disciplina.curso_id, curso.nome, disciplina.nome as disciplina, 
      sum(disciplina.carga_horaria) as carga_horaria, curso.tipo, curso.turno, date_format(curso.data_inicio, '%d/%m/%Y') as data_inicio, date_format(curso.data_termino, '%d/%m/%Y') as data_termino
     from curso_disciplina 
    inner join curso, disciplina where curso.id = curso_id 
     and disciplina.id = disciplina_id order by curso.nome



SELECT DISTINCT curso_disciplina.curso_id, curso.nome as curso, curso_disciplina.disciplina_id, disciplina.nome as disciplina, disciplina_semana.semana_id, dias_semana.dias_semana FROM curso_disciplina inner join disciplina_semana, curso, disciplina, dias_semana where curso_id = curso.id and curso.id = 1 and curso_disciplina.disciplina_id = disciplina_semana.disciplina_id and disciplina_semana.disciplina_id = disciplina.id and dias_semana.id = disciplina_semana.semana_id


SELECT DISTINCT sum(disciplina.horas_dia) FROM curso_disciplina inner join disciplina_semana, curso, disciplina, dias_semana where curso_id = curso.id and curso.id = 1 and curso_disciplina.disciplina_id = disciplina_semana.disciplina_id and disciplina_semana.disciplina_id =  disciplina.id and dias_semana.id = disciplina_semana.semana_id and dias_semana.dias_semana = 'Segunda-Feira'

SELECT DISTINCT curso_disciplina.disciplina_id, curso.carga_horaria, disciplina.horas_dia, disciplina.nome as disciplina, 
                             disciplina_semana.semana_id, dias_semana.dias_semana as diasSemana FROM curso_disciplina inner join 
                             disciplina_semana, curso, disciplina, dias_semana where curso_id = curso.id and 
                             curso.id = 1 and curso_disciplina.disciplina_id = disciplina_semana.disciplina_id 
                             and disciplina_semana.disciplina_id = disciplina.id and dias_semana.id = 
                             disciplina_semana.semana_id and dias_semana.dias_semana = "Segunda-Feira";



SELECT DISTINCT curso_disciplina.disciplina_id, disciplina.nome as disciplina, disciplina_semana.semana_id, dias_semana.dias_semana FROM curso_disciplina inner join disciplina_semana, curso, disciplina, dias_semana where curso_id = curso.id and curso.id = 1 and curso_disciplina.disciplina_id = disciplina_semana.disciplina_id and disciplina_semana.disciplina_id = disciplina.id and dias_semana.id = disciplina_semana.semana_id and dias_semana.dias_semana = "Sexta-Feira";






SELECT date_format("2018-08-09", '%d/%m/%Y') 

SELECT dayname("2018/08/02") as dia_semana
(CASE dia_semana
 when "Thursday" then 'Terca-Feira'
END);


SELECT * FROM curso_disciplina;



SELECT date_format(data_inicio, "%d/%m/%Y") FROM curso where id = 1;




SELECT dayname(data_inicio) FROM curso where id = 1;
SELECT (data_termino) FROM curso where id = 1;







SELECT disciplina.id as disciplinaID, disciplina.nome, disciplina.carga_horaria, disciplina.professor_id, 
 disciplina_semana.semana_id
from disciplina inner join disciplina_semana 
where disciplina.id = 1;

SELECT * from disciplina_semana;

SELECT DISTINCT curso_disciplina.curso_id, curso.nome, curso_disciplina.disciplina_id, disciplina.nome,disciplina_semana.semana_id 
FROM curso_disciplina inner join disciplina_semana, curso, disciplina where curso_id = 1 
and curso_disciplina.disciplina_id = disciplina_semana.disciplina_id and disciplina_semana.disciplina_id = disciplina.id;





select distinct disciplina.id as disciplinaID, semana_id, disciplina_id, disciplina.nome 
                 as disciplina_nome, 
                 disciplina.carga_horaria, professores.id as professorID, disciplina.professor_id, 
                 professores.nome from disciplina_semana inner join disciplina, professores
                 where disciplina.id = 1 and professores.id = disciplina.professor_id


select curso.id, curso_disciplina.curso_id, curso.nome, disciplina.nome as disciplina, 
         curso.carga_horaria, curso.tipo, curso.turno, curso.data_inicio, curso.data_termino 
         from curso_disciplina 
         inner join curso, disciplina where curso.id = curso_id 
         and disciplina.id = disciplina_id order by curso.nome


select distinct disciplina.id as disciplinaID, semana_id, dias_semana.id as dias_semana, disciplina_id, disciplina.nome 
                  as disciplina_nome, 
                  disciplina.carga_horaria, professores.id as professorID, disciplina.professor_id, 
                  professores.nome from disciplina_semana inner join disciplina, professores, dias_semana
                  where disciplina.id = 1 and professores.id = disciplina.professor_id

select disciplina.id as disciplinaID, disciplina.nome, disciplina.carga_horaria, disciplina_semana.semana_id, dias_semana.id from disciplina 
inner join disciplina_semana, dias_semana where id = 1 and dias_semana = semana_id;


select * from disciplina_semana where disciplina_id = ;


select curso.id, curso_disciplina.curso_id, curso.nome, disciplina.nome as disciplina, 
         curso.carga_horaria, curso.tipo, curso.turno from curso_disciplina 
         inner join curso, disciplina where curso.id = curso_id 
         and disciplina.id = disciplina_id order by curso.nome;


select * from professores order by nome;


select distinct disciplina.id as disciplinaID, semana_id, disciplina_id, disciplina.nome 
                 as disciplina_nome, 
                 disciplina.carga_horaria, professores.id as professorID, disciplina.professor_id, 
                 professores.nome from disciplina_semana inner join disciplina, professores
                 where disciplina.id = 1 and professores.id = disciplina.professor_id




select disciplina.id, disciplina_id, disciplina.nome 
                 as disciplina_nome, 
                 disciplina.carga_horaria, professores.id as professorID, disciplina.professor_id, 
                 professores.nome from disciplina_semana inner join disciplina, professores
                 where disciplina.id = 2 and professores.id = disciplina.professor_id;



select disciplina.id, disciplina_id, disciplina.nome, disciplina.carga_horaria, dias_semana.dias_semana, professores.id, professores.nome, disciplina.professor_id from disciplina_semana inner join disciplina ,dias_semana, professores where disciplina_id = disciplina.id and semana_id = dias_semana.id and professores.id = disciplina.professor_id order by disciplina.nome;



select disciplina_id, disciplina.nome, disciplina.carga_horaria, dias_semana.dias_semana 
from disciplina_semana inner join
 disciplina ,dias_semana where disciplina_id = disciplina.id and semana_id = dias_semana.id;

select disciplina_id, disciplina.nome, disciplina.carga_horaria from disciplina_semana
 inner join disciplina where disciplina.id = 3;

select curso.id, curso_id, curso.nome, curso.carga_horaria, disciplina.nome as disciplina 
from curso_disciplina inner join
 curso ,disciplina where curso_id = curso.id and disciplina_id = disciplina.id;

select curso.id, curso_id, curso.nome, curso.carga_horaria from curso_disciplina
 inner join curso ,disciplina where curso.id = curso_id;


select disciplina_id, disciplina.nome, disciplina.carga_horaria, dias_semana.dias_semana 
from disciplina_semana
inner join disciplina ,dias_semana where
disciplina_id = disciplina.id and semana_id = dias_semana.id order by disciplina.nome;




insert into disciplina_semana values (1, 2);
delete from disciplina_semana where discplina_id = ;

insert into disciplina_semana values (1, 3);