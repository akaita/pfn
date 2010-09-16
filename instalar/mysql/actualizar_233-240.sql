DROP TABLE IF EXISTS rexistros;
CREATE TABLE IF NOT EXISTS rexistros (
	id smallint(6) unsigned NOT NULL auto_increment,
	id_raiz smallint(6) unsigned NOT NULL default '0',
	id_usuario smallint(6) unsigned NOT NULL default '0',
	usuario varchar(50) NOT NULL default '',
	accion varchar(50) NOT NULL default '',
	orixe varchar(255) NOT NULL default '',
	destino varchar(255) NOT NULL default '',
	data int(10) unsigned NOT NULL default '0',
	ip varchar(40) NOT NULL default '',
	PRIMARY KEY (id),
	KEY (id_usuario)
) TYPE=MyISAM DEFAULT CHARSET=utf8;

ALTER IGNORE TABLE usuarios ADD id_control varchar(50) NOT NULL default '' AFTER id;
ALTER IGNORE TABLE usuarios ADD login_certificado tinyint(1) unsigned NOT NULL default '1';
ALTER IGNORE TABLE usuarios ADD login_usuario tinyint(1) unsigned NOT NULL default '1';

ALTER IGNORE TABLE accesos DEFAULT CHARACTER SET=utf8;
ALTER IGNORE TABLE arquivos DEFAULT CHARACTER SET=utf8;
ALTER IGNORE TABLE arquivos_campos_palabras DEFAULT CHARACTER SET=utf8;
ALTER IGNORE TABLE bloqueo_ip DEFAULT CHARACTER SET=utf8;
ALTER IGNORE TABLE campos DEFAULT CHARACTER SET=utf8;
ALTER IGNORE TABLE configuracions DEFAULT CHARACTER SET=utf8;
ALTER IGNORE TABLE configuracions_datos DEFAULT CHARACTER SET=utf8;
ALTER IGNORE TABLE directorios DEFAULT CHARACTER SET=utf8;
ALTER IGNORE TABLE grupos DEFAULT CHARACTER SET=utf8;
ALTER IGNORE TABLE palabras DEFAULT CHARACTER SET=utf8;
ALTER IGNORE TABLE raices DEFAULT CHARACTER SET=utf8;
ALTER IGNORE TABLE raices_grupos_configuracions DEFAULT CHARACTER SET=utf8;
ALTER IGNORE TABLE raices_usuarios DEFAULT CHARACTER SET=utf8;
ALTER IGNORE TABLE sesions DEFAULT CHARACTER SET=utf8;
ALTER IGNORE TABLE usuarios DEFAULT CHARACTER SET=utf8;
