use paginaweb;

SELECT * FROM inmueble 
where estado = 'Disponible' 
and oferta like '%arriendo%' 
and tipo like '%apartamento%'
and ciudad like '%cartagena%' 
order by idinmueble desc LIMIT 0,1000;

SELECT
 schema_name AS 'database', 
 default_character_set_name AS 'charset',
 default_collation_name AS 'collation'
FROM
 information_schema.SCHEMATA
WHERE
 schema_name = "paginaweb";
 
 SELECT 
 T.table_schema AS 'database',
 T.table_name AS 'table',
 CCSA.character_set_name AS 'charset',
 CCSA.collation_name AS 'collation'
FROM
 information_schema.TABLES T,
 information_schema.collation_character_set_applicability CCSA
WHERE 
 CCSA.collation_name = T.table_collation
 AND T.table_schema = 'paginaweb'
 AND T.table_name IN (SELECT table_name FROM information_schema.tables WHERE table_schema = 'paginaweb');
 
ALTER TABLE
    inmueble
    CHANGE descripcion descripcion
    VARCHAR(2000)
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;
