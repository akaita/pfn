<?php
/****************************************************************************
* data/idiomas/it/instalar.inc.php
*
* Textos para el idioma Italian
*

PHPfileNavigator versión 2.2.1

Copyright (C) 2004-2005 Lito <lito@eordes.com>

http://phpfilenavigator.litoweb.net/

Este programa es software libre. Puede redistribuirlo y/o modificarlo bajo los
términos de la Licencia Pública General de GNU según es publicada por la Free
Software Foundation, bien de la versión 2 de dicha Licencia o bien (según su
elección) de cualquier versión posterior.

Este programa se distribuye con la esperanza de que sea útil, pero SIN NINGUNA
GARANTÍA, incluso sin la garantía MERCANTIL implícita o sin garantizar la
CONVENIENCIA PARA UN PROPÓSITO PARTICULAR. Véase la Licencia Pública General de
GNU para más detalles.

Debería haber recibido una copia de la Licencia Pública General junto con este
programa. Si no ha sido así, escriba a la Free Software Foundation, Inc., en
675 Mass Ave, Cambridge, MA 02139, EEUU.
*******************************************************************************/

defined('OK') or die();

return array(
	'benvido' => 'Benvenuto nell\\\'installazione del PHPfileNavigator &egrave;',
	'idioma' => 'Lingua',
	'email' => 'Email dell\\\'Amministratore',
	'gd2' => 'Supporto libreria GD2',
	'zlib' => 'Supporto libreria ZLIB',
	'si' => 'S&amp;igrave;',
	'non' => 'No',
	'enviar' => 'Invia',
	'base_datos' => 'Informazioni sul database',
	'host' => 'Host',
	'db_nome' => 'database',
	'nome' => 'Nome',
	'usuario' => 'Utente',
	'contrasinal' => 'Password',
	'db_prefixo' => 'Prefisso delle tabelle',
	'administrador' => 'Dati Amministratore',
	'rep_contrasinal' => 'Ripeti Password',
	'raiz' => 'Cartella Principale',
	'ra_path' => 'Percorso assoluto',
	'ra_web' => 'Percorso dalla cartella web',
	'ra_conf' => 'File di configurazione',
	'avisos_instalacion' => 'Allarmi installazione',
	'erros' => array(
		'1' => 'Data Base: l\\\'HOST non &amp;egrave; stato localizzato',
		'2' => 'Data Base: il NOME del database non &amp;egrave; stato trovato',
		'3' => 'Data Base: l\\\'UTENTE non &amp;egrave; stato trovato',
		'4' => 'Amministratore: il NOME non &amp;egrave; stato trovato',
		'5' => 'Amministratore: l\\\'UTENTE non &amp;egrave; stato trovato',
		'6' => 'Amministratore: la PASSWORD non &amp;egrave; stato trovato',
		'7' => 'Amministratore: le password sono differenti',
		'8' => 'Cartella iniziale: il NOME non &amp;egrave; stato trovato',
		'9' => 'Cartella iniziale: il PERCORSO ASSOLUTO non &amp;egrave; stato trovato',
		'10' => 'Cartella iniziale: il PERCORSO WEB non &amp;egrave; stato trovato',
		'11' => 'Cartella iniziale: l\\\'HOST non &amp;egrave; stato trovato',
		'12' => 'Cartella iniziale: IL FILE DI CONFIGURAZIONE non &amp;egrave; stato trovato',
		'13' => 'L\\\'EMAIL non &amp;egrave; stata trovata',
		'14' => 'Cartella iniziale: la cartella del PERCORSO ASSOLUTO non esiste',
		'15' => 'Cartella iniziale: la cartella del PERCORSO ASSOLUTO non possiede i permessi di scrittura',
		'16' => 'Cartella iniziale: il FILE DI CONFIGURAZIONE non esiste.',
		'17' => 'Database: l\\\'HOST, il NOME o la PASSWORD non sono corretti',
		'18' => 'Database: il NOME del Data Base non esiste',
		'19' => 'La cartella data/conf deve avere i permessi di scrittura',
		'20' => 'Questa applicazione &amp;egrave; stata installata precedentemente, se provate ad installarla nuovamente tutti i dati salvati nelle tabelle MySQL verranno eliminati.',
		'21' => 'La cartella tmp/ deve avere i permessi di scrittura',
		'22' => 'La cartella data/logs/ deve avere i permessi di scrittura',
		'23' => 'La cartella data/info/ deve avere i permessi di scrittura',
		'24' => 'Non esiste una versione precedente da aggiornare oppure il file data/conf/basicas.inc.php non ha i permessi di scrittura.',
		'25' => 'Con l\\\'aggiornamento da una versione precedente alla 2.0.0 e successiva alla 1.5.7, verrano eseguite modifiche alla struttura del database, ma senza effetto sui contenuti, cos&amp;igrave; pure la l\\\'aggiornamento della logica e le implementazioni nei files dell\\\'applicazione.<br /><br />Per eseguire una installazione corretta, &amp;grave; necessario sovrascrivere la versione precedente con questa, facendo attenzione quando viene sovrascritto il files data/conf/defaults.inc.php e tutto verr&amp;agrave; installato correttamente.<br /><br />Ricordati che il file di configurazione data/conf/defaults.inc.php pu&amp;ograve; contenere variabili di configurazione pi&amp;ugrave; recenti della tua versione: prima di sovrascrivere questo file assicurati delle differenze e usa il nuovo file.',
		'26' => 'Non eseguo nessuna operazione.<br /><br />Se avete una versione uguale alla 2.2.0, &amp;egrave; necessario sovrascrivere solo l\\\'installazione con questa, facendo attenzione quando sovrascrivi il file data/conf/defaults.inc.php e tutto verr&amp;agrave installata correttamente.<br /><br />Ricordati che il file di configurazione data/conf/defaults.inc.php pu&amp;ograve; contenere variabili di configurazione pi&amp;ugrave; recenti della tua versione: prima di sovrascrivere questo file assicurati delle differenze e usa il nuovo file.',
		'27' => 'Il file data/conf/basicas.inc.php non possiede i diritti di scrittura.',
		'28' => 'Scegli un set di caratteri',
		'29' => 'L\\\'esecuzione di alcune query hanno riscontrato un errore. Prova a lanciare l\\\'installazione nuovamente.',
		'30' => 'Non &amp;egrave; possibile eseguire l\\\'aggiornamento da una versione uguale o superiore a questo pacchetto. Controlla che la versione installata non sia la stessa di quella che stai tentando di installare.',
		'31' => 'Questa applicazione verr&amp;agrave; aggiornata dalla versione >2.0.0 e <2.2.0<br /><br />Ricordati che il file di configurazione data/conf/defaults.inc.php pu&amp;ograve; contenere variabili di configurazione pi&amp;ugrave; recenti della tua versione: prima di sovrascrivere questo file assicurati delle differenze e usa il nuovo file.',
	),
	'axuda' => array(
		'accion' => 'Puoi scegliere una delle seguenti modalit&amp;agrave di installazione:<br /><strong>Installazione:</strong>permette una nuova installazione cancellando le tabelle, se esistono, e sovrascrivendo i files di configurazione.<br /><strong>Aggiornamento dalla versione >1.5.7 and <2.0.0: <strong>Aggiornamento dalla versione <2.2.0: </strong> Permette l\\\'aggiornamento dalla versione precedente alla 2.2.0 e nuova rispetto la 2.0.0.<br /><strong>Non fare nulla:</strong> non modifica il database, non modifica i dati di configurazione.',
		'idioma' => 'Potete scegliere la lingua per l\\\'uso di PHPfileNavigator.',
		'gd2' => 'Se il server ha installate le librerie GD2 per gestire le immagini e permette di creare miniature di immagini di buona qualit&amp;agrave.',
		'zlib' => 'Se il server possiede le librerie ZLIB per comprimere ed estrarre i files.',
		'charset' => 'Il set di caratteri. Solitamente quello utilizzato dal server.',
		'db_host' => 'Il server MySQL. <strong>es: localhost</strong>',
		'db_nome' => 'Nome del database che viene installato. <strong>Deve esistere prima dell\\\'installazione</strong>',
		'db_usuario' => 'Utente MySQL per accedere al database. Deve possedere i permessi per creare e modificare tabelle.',
		'db_contrasinal' => 'Password per accedere con questi utenti.',
		'db_rep_contrasinal' => 'Ripeti Password.',
		'db_prefixo' => 'Prefisso della tabella. Per evitare di sovrascrivere tabelle con lo stesso nome.',
		'ad_nome' => 'Utente Amministraore nome comune.',
		'ad_usuario' => 'Nome Utente per collegarsi.',
		'ad_contrasinal' => 'Password per amministrare l\\\'utente.',
		'ad_rep_contrasinal' => 'Ripeti password.',
		'ad_email' => 'Email dell\\\'Amministratore. A questa email verranno inviati bollettini sulla sicurezza o problematiche di accesso.',
		'ra_nome' => 'Nome generico per questa area principale. Permette di identificarla nella lista delle aree se avete accesso a pi&amp;ugrave; di una. <strong>es:Area Principale</strong>',
		'ra_path' => 'Percorso assoluto dalla root del server. Dopo potrai creare altre Aree Principali.<br />Ricordati di usare la barra /. <strong>es: /var/www/html/docs/</strong>',
		'ra_web' => 'Percorso di accesso al web dalla Root del dominio. <strong>es:/docs/</strong>',
		'ra_host' => 'Nome dominio da gestire. Senza http <strong>es: www.dominio.com</strong>',
		'raices_atopadas' => 'Queste le aree principali che saranno configurate.',
		'usuarios_atopados' => 'Questa &amp;egrave; una relazione con un gruppo. Quando aggiorni puoi scegliere solo in questa lista, ma poi puoi creare e gestire tutti gli utenti e i gruppi.',
		'configuracions_atopadas' => 'File di configurazione trovato. Nella nuova area di amministrazione puoi creare, modificare o eliminare file di configurazione e assegnazioni a gruppi o aree principali.',
		'aviso_instalacion' => 'Se marcate questa opzione, l\\\'installazione invier&amp;agrave; allo sviluppatore di PHPfileNavigator una email che avvisa una nuova installazione. Verranno spediti solo la mail dell\\\'Amministratore e l\\\'host. <strong>Non spedisce</strong> nessuna informazione personale come percorsi, dati utente o passwords. Questo ti concedere di essere informato di nuove versioni o bolletti di sicurezza.<br /><br />Puoi controllare l\\\'invio del codice mail nel file instalar/index.php tra le linee 84 e 100.',
	),
	'instalacion_correcta' => 'PHPfileNavigator &amp;egrave; stato installato correttamente.<br /><br />Devi ora eliminare la cartela instalar per terminare l\\\'operazione.<br /><br />Grazie per l\\\'utilizzo di questa applicazione.',
	'accion' => 'Azione',
	'a:instalar' => 'Installa',
	'a:actualizar_168' => 'Aggiornamento dalla versione > 1.5.7 e < 2.0.0',
	'a:actualizar_211' => 'Aggiornamento dalla versione < 2.2.0',
	'a:nada' => 'Nulla &amp;egrave; stato fatto',
	'usuarios' => 'Utenti',
	'charset' => 'Set di caratteri',
	'datos_xerais' => 'Dati generali',
	'raices_atopadas' => 'Aree Principali trovate',
	'usuarios_atopados' => 'Utenti trovati',
	'admins' => 'Amministratori',
	'configuracions_atopadas' => 'File di configurazione trovati',
	'doazon' => 'Se questa applicazione viene utilizzata in un\\\'Azienda o integrata in un progetto a pagamento, sarebbe gradita una donazione. Grazie.',
	'aviso_instalacion' => 'Notifica dell\\\'installazione',
);
?>