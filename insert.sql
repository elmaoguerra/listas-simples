INSERT INTO `operacion` (`id`, `name`, `descripcion`) VALUES 
(3, 'Recorrer Lista', 'Esta Operacion Recorre toda la lista');

INSERT INTO `ejercicio` (`id`, `enunciado`, `lista_inicial`, `solucion`, `operacion_id`) VALUES
(9, 'Se desea recorrer todos los nodos de la lista dada (vÃ©ase lista inicial)', '1,6,8,9,3', NULL, 3);

INSERT INTO `sentencia` (`id`, `instruccion`, `ejercicio_id`, `orden`) VALUES
(2000, 'void recorrer(Nodo *ptrLista) {\r\n    while (ptrLista != NULL){\r\n', 9, 1);
(2001, '        ptrLista = ptrLista->sig;\r\n    }\r\n', 9, 2),
(2002, '}\n', 9, 3),
