<?php
/****************************************************************************
* data/idiomas/it/estado.inc.php
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
	'estado.crear_dir' => array(
		'0' => 'Si &amp;grave; verificato un errore mentre si creava la cartella.',
		'1' => 'La Cartella &amp;grave; stata creata correttamente.',
		'2' => 'Una Cartella con questo nome &amp;egrave; gi&amp;agrave; presente.',
		'3' => 'La cartella specificata non possiede i permessi di scrittura.',
		'4' => 'Il nome che hai scelto contiene caratteri non supportati. Prego scegli un altro nome.',
		'5' => '&amp;Egrave; stato raggiunto lo spazio limite per questa Area Principale.',
	),
	'estado.subir_arq' => array(
		'0' => 'Si &amp;egrave; verificato un errore mentre si caricava il file.',
		'1' => 'Il File &amp;egrave; stato caricato correttamente.',
		'2' => 'Il nome che hai scelto contiene caratteri non supportati. Prego scegli un altro nome per il file.',
		'3' => 'Un file con questo nome esiste gi&amp;agrave;',
		'4' => 'La cartella di destinazione non possiede i permessi di scrittura.',
		'5' => 'La dimensione del file supera il limite previsto in questa configurazione.',
		'6' => 'La dimensione del file supera la dimensione massima prevista per questa Area Principale.',
		'7' => 'Il file supera l\\\'ampiezza di banda prevista per il mese in corso.',
	),
	'estado.eliminar_dir' => array(
		'0' => 'La cartella o parte di questa cartella non &amp;egrave; stata eliminata completamente. Prego contatta l\\\'amministratore per rimuoverla completamente.',
		'1' => 'La cartella &amp;egrave; stata eliminata correttamente.',
		'2' => 'Sei sicuro di voler eliminare questa cartella vuota?',
		'3' => 'Questa cartella non &amp;egrave; vuota. Sei sicuro di voler eliminare questa cartella e tutto ci&amp;ograve; che contiene?',
		'4' => 'La cartella che intendi eliminare non esiste.',
	),
	'estado.eliminar_arq' => array(
		'0' => 'Non &amp;agrave; possibile eliminare il file. Controllare i permessi.',
		'1' => 'Il file &amp;agrave; stato eliminato correttamente.',
		'2' => 'Sei sicuro di voler eliminare questo file?',
		'4' => 'Il file che desideri eliminare non esiste.',
	),
	'estado.renomear' => array(
		'0' => 'Il nome non pu&amp;ograve; essere cambiato. Controllare i permessi.',
		'1' => 'Il nome &amp;egrave; stato cambiato correttamente.',
		'2' => 'Una cartella con questo nome esiste gi&amp;agrave;.',
		'3' => 'Un file con questo nome esiste gi&amp;agrave;.',
		'4' => 'Il nuovo nome contiene caratteri non supportati dal programma.',
	),
	'estado.mover_dir' => array(
		'0' => 'La cartella o parte di essa non pu&amp;ograve; essere rimossa. Controllare i permessi e la destinazione.',
		'1' => 'La cartella &amp;egrave; stata spostata correttamente.',
		'2' => 'Questa cartella non &amp;egrave; vuota. Seleziona una destinazione in cui spostare questa cartella e il proprio contenuto.',
		'3' => 'Seleziona la destinazione in cui spostare questa cartella vuota.',
		'4' => 'La cartella di destinazione non esiste.',
		'5' => 'La cartella di destinazione non possiede i permessi di scrittura.',
		'6' => 'Una cartella con questo nome esiste gi&amp;agrave; nella destinazione.',
		'7' => 'Non puoi copiare una cartella dentro s&amp;egrave; stessa.',
	),
	'estado.mover_arq' => array(
		'0' => 'Il file non pu&amp;ograve; essere spostato. Controlla i permessi di origine e di destinazione.',
		'1' => 'Il file &amp;egrave; stato spostato correttamente.',
		'2' => 'Scegli una destinazione per questo file.',
		'3' => 'Un file con questo nome &amp;egrave; gi&amp;agrave;&Atilde;ƒ?  presente nella cartella di destinazione.',
		'4' => 'Non c\\\'&amp;egrave; una cartella di destinazione.',
		'5' => 'La cartella di destinazione non possiede i permessi di scrittura.',
		'6' => 'Una copia &amp;egrave; stata creata nella destinazione, ma l\\\'originale non pu&amp;ograve; essere eliminato.',
	),
	'estado.copiar_dir' => array(
		'0' => 'La cartella o parte dei suoi contenuti non pu&amp;ograve; essere copiata, controlla i permessi di origine e destinazione.',
		'1' => 'La cartella &amp;egrave; stata copiata correttamente.',
		'2' => 'Questa cartella non &amp;egrave; vuota.<br />Seleziona una destinazione in cui copiare questa cartella e il suo contenuto.',
		'3' => 'Seleziona una destinazione in cui copiare questa cartella vuota.',
		'4' => 'La cartella di destinazione non esiste.',
		'5' => 'La cartella di destinazione non possiede i permessi di scrittura.',
		'6' => 'Nella destinazione esiste gi&amp;agrave; una cartella con questo nome.',
		'7' => 'Una cartella non pu&amp;ograve; essere copiata dentro s&amp;egrave; stessa.',
		'8' => 'Non puoi copiare questa cartella perch&amp;egrave; supera il limite previsto da questa Area Principale.',
	),
	'estado.copiar_arq' => array(
		'0' => 'Il file non pu&amp;ograve; essere copiato, controlla i permessi di origine e destinazione.',
		'1' => 'Il file &amp;egrave; stato copiato correttamente.',
		'2' => 'Seleziona una destinazione per questo file.',
		'3' => 'Un file con lo stesso nome esiste gi&amp;agrave; nella cartella di destinazione.',
		'4' => 'La cartella di destinazione non esiste.',
		'5' => 'La cartella di destinazione non possiede i permessi di scrittura.',
		'6' => 'Non puoi copiare questo file perch&amp;egrave; supera il limite previsto da questa Area Principale.',
	),
	'estado.enlazar_dir' => array(
		'0' => 'La cartella o parte di essa non pu&amp;ograve; essere rimpiazzata, controlla i permessi di origine e destinazione.',
		'1' => 'La cartella &amp;egrave; stata rimpiazzata correttamente.',
		'2' => 'La cartella o la destinazione non esiste.',
		'3' => 'La cartella di destinazione non possiede i permessi di scrittura.',
		'4' => 'Nella destinazione esiste gi&amp;agrave; una cartella con questo nome.',
	),
	'estado.enlazar_arq' => array(
		'0' => 'Il file non pu&amp;ograve; essere rimpiazzato, controlla i permessi di origine e destinazione.',
		'1' => 'Il file &amp;egrave; stato rimpiazzato correttamente.',
		'2' => 'Seleziona una destinazione per questo file.',
		'3' => 'Un file con questo nome &amp;egrave; gi&amp;agrave;  presente nella cartella di destinazione.',
		'4' => 'La cartella di destinazione non esiste.',
		'5' => 'La cartella di destinazione non possiede i permessi di scrittura.',
	),
	'estado.editar' => array(
		'0' => 'Si &amp;egrave; verificato un errore mentre si componeva questo file.',
		'1' => 'Il file &amp;egrave; stato composto correttamente.',
		'2' => 'Il file non possiede i permessi di scrittura.',
		'3' => 'Il file da modificare non esiste.',
		'4' => 'Questo file non pu&amp;ograve; essere modificato.',
	),
	'estado.subir_url' => array(
		'0' => 'Si &amp;egrave; verificato un errore con questa URL.',
		'1' => 'La URL richiesta &amp;egrave; stata salvata correttamente.',
		'2' => 'Un file con questo nome &amp;egrave; gi&amp;agrave; presente.',
		'3' => 'La cartella di destinazione non possiede i permessi di scrittura.',
		'4' => 'Considera che il tempo di attesa potrebbe essere prolungato se selezioni file molto grandi. &amp;Egrave; consigliata la scelta di file di testo, come le pagine web.',
		'5' => 'Prego attendere mentre la URL richiesta sta per essere scaricata.<br /><br />Considera che nel caso il documento fosse grande il tempo di attesa potrebbe essere prolungato.',
		'6' => 'La procedura di scaricamento della URL &amp;egrave; stata annullata correttamente.',
		'7' => 'L\\\'indirizzo fornito non pu&amp;ograve; essere scaricato perch&amp;egrave; supera il limite dell\\\'Area Principale scelta.',
		'8' => 'Il nome prescelto per il file contiene caratteri non permessi.',
		'9' => 'Con questo file l\\\'ampiezza di banda prevista per questo mese verr&amp;agrave;&Atilde;ƒ?  superata.',
	),
	'estado.extraer' => array(
		'0' => 'Non &amp;egrave; stato possibile extrarre nessuno dei files, il file compresso potrebbe essere danneggiato o in un formato non corretto.',
		'1' => 'Tutti i files sono stati estratti correttamente.',
		'2' => 'Il file non possiede una estensione valida (tar,gz,gzip,tgz).',
		'3' => 'Questa applicazione non supporta l\\\'estrazione di questo tipo di file.',
		'4' => 'Non pu&amp;ograve; essere estratto, &amp;egrave; danneggiato.',
		'5' => 'Some of the files were not extracted, they already exist.',
		'6' => 'Alcuni files potrebbero non essere stati abilitati alla scrittura.',
		'7' => 'L\\\'estrazione potrebbe non venire conclusa perch&amp;egrave; il contenuto supera la dimensione massima prevista per questa Area Principale.',
		'8' => 'Alcuni files hanno nomi non permessi o sono vuoti, per questo non sono stati estratti.',
		'9' => 'Alcune cartelle necessarie all\\\'estrazione del contenuto non possono essere create.',
	),
	'estado.multiple_copiar' => array(
		'0' => 'Non &amp;egrave; possibile copiare la cartella/file, controlla entrambi i permessi origine e destinazione.',
		'1' => 'Tutte le cartelle o i files sono stati copiati correttamente.',
		'2' => 'Scegli la destinazione delle cartelle o dei files da copiare.',
		'3' => 'Un file o una cartella esiste gi&amp;agrave; con lo stesso nome nella destinazione.',
		'4' => 'La cartella di destinazione non esiste per:',
		'5' => 'La cartella di destinazione non possiede i permessi di scrittura per:',
		'6' => 'La cartella/file non pu&amp;ograve; essere copiata perch&amp;egrave; supera il limite di questa Area Principale.',
		'7' => 'Alcune delle cartelle scelte o dei files non esistono o non sono leggibili.',
		'8' => 'Il resto delle cartelle e dei files sono stati copiati correttamente.',
		'9' => 'La cartella non pu&amp;ograve; essere copiata dentro s&amp;egrave; stessa.',
	),
	'estado.multiple_eliminar' => array(
		'0' => 'Il file o la cartella non pu&amp;ograve; essere rimossa, controlla i permessi.',
		'1' => 'Tutti i files o cartelle sono stati rimossi correttamente.',
		'2' => 'Sei sicuro di voler rimuovere tutti questi files o cartelle?',
		'3' => 'Il resto dei files o cartelle sono stati rimossi correttamente.',
		'4' => 'Il file che intendi eliminare non esiste.',
	),
	'estado.multiple_mover' => array(
		'0' => 'Il file/cartella non pu&amp;ograve; essere spostato, prego controlla i permessi di origine e destinazione.',
		'1' => 'Tutte le cartelle o files sono stati spostati correttamente.',
		'2' => 'Scegli la destinazione per le cartelle o files che devono essere spostati.',
		'3' => 'Un file o una cartella con il nome dato gi&amp;agrave;&Atilde;ƒ?&Atilde;‚  esiste nella destinazione.',
		'4' => 'La cartella di destinazione non esiste per:',
		'5' => 'La cartella di destinazione non possiede i permessi di scrittura per:',
		'6' => 'Una copia della destinazione &amp;egrave; stata creata, ma l\\\'originale non pu&amp;ograve; essere rimosso.',
		'7' => 'Il resto delle cartelle e files &amp;egrave; stato spostato correttamente.',
		'8' => 'Una cartella non pu&amp;ograve; essere spostata dentro s&amp;egrave; stessa.',
		'9' => 'Alcune delle cartelle scelte o dei files non esistono o non sono leggibili.',
	),
	'estado.multiple_permisos' => array(
		'0' => 'I permessi della directory/file non possono essere cambiati.',
		'1' => 'I permessi sono stati cambiati correttamente.',
		'2' => 'Il file non esiste o i relativi permessi non sono disponibili.',
		'3' => 'Il resto dei files o delle cartelle &amp;egrave; stato cambiato correttamente.',
	),
	'estado.permisos' => array(
		'0' => 'I permessi della cartella/file non sono stati cambiati.',
		'1' => 'I permessi sono stati cambiati correttamente.',
		'2' => 'Il file non esiste o i relativi permessi non sono dispoinibili.',
	),
	'estado.descargar' => array(
		'0' => 'Il file selezionato non esiste o non &amp;egrave; leggibile.',
		'2' => 'L\\\'Area Principale attuale non pu&amp;ograve; essere scaricata perch&amp;egrave; verrebbe superato il limite di banda disponinibile per questa settimana.',
		'3' => 'Il file di registro non pu&amp;ograve; per essere aperto per salvare i dati di scarimento. Controllare la cartella [*$this->paths["info"]*].',
	),
	'estado.redimensionar' => array(
		'0' => 'La miniatura &amp;egrave; stata eliminata.',
		'1' => 'La miniatura &amp;egrave; stata creata correttamente.',
		'2' => 'La miniatura &amp;egrave; stata eliminata correttamente.',
	),
	'estado.ver_comprimido' => array(
		'1' => 'Il file selezionato non &amp;egrave; un file compresso valido.',
	),
	'estado.novo_arq' => array(
		'0' => 'Il file non pu&amp;ograve; essere creato, verifica i permessi di scrittura della cartella.',
		'1' => 'Il file &amp;egrave; stato creato correttamente.',
		'2' => 'Un file con lo stesso nome esiste &amp;agrave;.',
		'3' => 'Questo nome per il nuovo file non &amp;egrave; permesso.',
		'4' => 'La cartella in cui intendi salvare il file non possiede i permessi di scrittura.',
		'5' => 'Non &amp;egrave; stato indicato un nome per il nuovo file.',
		'6' => 'Con questo file il limite dello spazio massimo consentito per questa Area Principale &amp;egrave; stato superato.',
		'7' => 'Con questo file la banda limite permessa per questo mese &amp;egrave; stata superata.',
	),
	'estado.preferencias' => array(
		'0' => 'Si &amp;egrave; verificato un errore cambiando le preferenze dell\\\'utente. Prova nuovamente e in caso di errore contatta l\\\'Amministratore.',
		'1' => 'Le preferenze sono state cambiate correttamente.',
		'2' => 'Il campo "Nome" deve essere completato.',
		'3' => 'La lunghezza della password deve essere almeno di 8 caratteri. Sono concessi sia numeri che lettere.',
		'4' => 'La password non corrisponde.',
	),
	'estado.redimensionar_dir' => array(
		'0' => 'Questa cartella non contiena nessuna immagine valida.',
		'1' => 'Tutte le immagini sono state elaborate correttamente.',
		'2' => 'Si &amp;Egrave; verificato un errore con alcune immagini, l\\\'indice di posizione non &amp;egrave; valido.',
		'3' => 'Tutti parametri necessari per questa azione non sono stati ricevuti.',
		'4' => 'Questa immagine ha gi&amp;agrave; una previsualizzazione.',
	),
	'estado.correo' => array(
		'0' => 'La mail non pu&amp;ograve; essere spedita. Il problema potrebbe essere la configurazione del servizio di mail nel PHP.',
		'1' => 'La mail &amp;egrave; stata inviata correttamente.',
		'2' => 'Il campo "Titolo" non pu&amp;ograve; essere vuoto.',
		'3' => 'Il campo "Messaggio" non pu&amp;ograve; essere vuoto.',
		'4' => 'Il campo "Per" non pu&amp;ograve; essere vuoto.',
		'5' => 'Alcuni degli indirizzi nel campo "Per" sono sono corretti.',
		'6' => 'Tutti gli indirizzi di email contengono degli errori.',
		'7' => 'Non &amp;egrave; stato possibile allegare il file selezionato. Verifica che esista e che siano settati i permessi di scrittura.',
		'8' => 'Si &amp;Egrave; verificato un errore creando il messaggio. &amp;Egrave; possibile che il file non possa essere spedito come allegato.',
		'9' => 'Non &amp;egrave; stato permessa la spedizione di questo file perch&amp;egrave; sarebbe stato superato il limite di banda previsto per questo mese.',
		'10' => 'Non &amp;egrave; stato permessa la spedizione di questo file perch&amp;egrave; supera il limite di [*PFN_peso($this->g("limite_correo"))*] dovuto ad una associazione.',
	),
);
?>