<?php
/****************************************************************************
* data/idiomas/it/axuda.inc.php
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
	'h1_quero_facer' => 'Quale operazione vuoi eseguire?',
	'tit_crear_dir' => 'Crea Nuova Cartella',
	'txt_crear_dir' => 'Per creare una Cartella clicca sulla opzione sopra <strong><img src="[*$this->g("estilo")*]imx/crear_dir.png" alt="Crea Cartella" /> Crea Cartella</strong>. Cliccandola potrai compilare tutti i campi, anche se &amp;eacute; richiesto solo il nome.',
	'tit_subir_arq' => 'Carica File',
	'txt_subir_arq' => 'Per caricare un file clicca prima sulla opzione in alto <strong><img src="[*$this->g("estilo")*]imx/subir_arq.png" alt="Carica File" /> Carica File</strong>. Fatto questo, dovrai compilare tutti i campi richiesti; il campo obbligatorio &amp;eacute; solo il file da caricare. Se un\\\'immagine sta per essere caricata, verranno presentate due opzioni per creare una copia in miniatura dell\\\'immagine presente in <strong>Immagine ridotta</strong>, altrimenti non prendere in considerazione questa opzione.',
	'tit_subir_url' => 'Prendi un file da un altro sito',
	'txt_subir_url' => 'Per caricare un file esistente su un altro sito web, clicca l\\\'opzione <strong><img src="[*$this->g("estilo")*]imx/subir_url.png" alt="Carica URL" /> Carica URL</strong>. Fatto questo, dovrai scrivere <strong>la URL (indirizzo)</strong> che desideri collegare, nella forma completa dell\\\'indirizzo, per esempio, questo &amp;eacute; meglio <i>http://www.nomesito.net/index.php</i> di <i>http://sottodominio.nomesito.net</i>, perch&amp;eacute; nel secondo caso l\\\'accesso potrebbe fallire. Dopo l\\\'indirzzo URL appare <strong>Nome del file da creare</strong> dove dovrai scrivere il nome che permetter&amp;agrave;  di identificare la URL successivamente, ad esempio come <i>Nomesito Web</i>.',
	'tit_miniaturas' => 'Visualizza le miniature nella lista dei file',
	'txt_miniaturas' => 'Basta cliccare sull\\\'opzione in alto <strong><img src="[*$this->g("estilo")*]imx/ver_imaxes.png" alt="Miniature" /> Miniature</strong> per vedere le immagini in forma ridotta mentre consulti la lista dei file.',
	'tit_arbore' => 'Visualizza tutti i files e le cartelle in una sola pagina',
	'txt_arbore' => 'Per vedere il contenuto della Cartella Principale, clicca su <strong><img src="[*$this->g("estilo")*]imx/arbore.png" alt="Tree View" /> Tree View</strong>, e appariranno tutte le cartelle presenti nella principale. Inoltre, se vuoi vedere tutti i files di ogni cartella, clicca sull\\\'opzione a destra <strong>[Lista Completa]</strong> e apparir&amp;agrave; la lista delle cartelle, completa dei relativi files e ti verr&amp;agrave; evidenziata la cartella in cui ti trovi.',
	'tit_buscar' => 'Cerca un file o un testo',
	'txt_buscar' => 'Hai due possibilit&amp;agrave; per cercare un file, la prima &amp;eacute; tramite il menu in alto <strong>Cerca</strong> e la seconda scrivendo parte del nome da cercare nel campo <strong>Cerca:</strong> e confermando con un click sulla lente.',
	'tit_accions' => 'Operazioni possibili solo con un file o una cartella come il copia, muovi, elimina...',
	'txt_accions' => 'Puoi eseguire un\\\'azione su un file o una cartella dal menu <strong>Azioni</strong>, che &amp;eacute; l\\\'ultima elencata. Questo menu ti permette, se abilitato, di applicare le azioni <strong>Informazioni</strong>, <strong>Copia</strong>, <strong>Sposta</strong>, <strong>Rinomina</strong>, <strong>Elimina</strong>, <strong>Cambia permessi</strong> o <strong>Scarica</strong>.',
	'tit_accions_multiple' => 'Operazioni possibili con pi&amp;ugrave; files o pi&amp;ugrave; cartelle contemporaneamente.',
	'txt_accions_multiple' => 'Se possiedi i permessi necessari, puoi eseguire diverse operazioni con pi&amp;ugrave file e cartelle contemporaneamente. Le azioni possibili sono <strong>Copia</strong>, <strong>Sposta</strong>, <strong>Elimina</strong>, <strong>Cambia Permessi</strong> e <strong>Scarica</strong>.',
	'h1_accions' => 'Quali operazioni posso eseguire su ogni file o cartella in elenco?',
	'txt_info' => '<strong>Informazioni:</strong>Questa opzione permette di vedere in dettaglio informazioni quali la dimensione, la data di creazione, i permessi o dati relativi ad informazioni aggiuntive come il titolo e la descrizione, e un formulario per modificare questi valori.',
	'txt_copiar' => '<stronga>Copia:</strong>Permette di eseguire una copia di un file o di una cartella in un\\\'altra destinazione. Se si tratta di una cartella, verranno copiati anche i contenuti nella destinazione prescelta.',
	'txt_mover' => '<strong>Sposta: </strong>Permette di spostare una cartella in un\\\'altra destinazione. Il file o la cartella selezionata saranno copiati nella destinazione prescelta e l\\\'originale NON sar&amp;agrave; eliminato.',
	'txt_renomear' => '<strong>Rinomina: </strong>Permette di cambiare il nome del file o della cartella.',
	'txt_eliminar' => '<strong>Elimina: </strong>Elimina un file o una cartella e tutto il contenuto.',
	'txt_permisos' => '<strong>Permessi: </strong>Permette di cambiare i permessi di accesso a file e cartelle.',
	'txt_descargar' => '<strong>Scarica File: </strong>Esegue lo scaricamento di un file sul computer. Tutti gli scaricamenti eseguiti saranno computati, cos&amp;igrave; pure le volte che sono stati scaricati.',
	'txt_comprimir' => '<strong>Comprimi:</strong>Comprime un file o una cartella (e tutto il suo contenuto) per essere scaricato in un unico file, al fine di guadagnare tempo sullo scaricamento, dato che la compressione riduce la dimensione totale dei dati da scaricare.',
	'txt_redimensionar' => '<strong>Copia immagine ridotta: </strong>Permette di creare una immagine pi&amp;ugrave; piccola di quella in elaborazione. La copia ridotta sar&amp;agrave;&Acirc;&nbsp; una copia esatta dell\\\'originale ma pi&amp;ugrave; piccola nelle dimensioni, oppure &amp;egrave; possibile scegliere solo una parte dell\\\'immagine e di questa crearne una copia ridotta.',
	'txt_extraer' => '<strong>Decomprimi:</strong>Permette lo scompattamento di un file compresso con TAR/GZ/TGZ/GZIP. L\\\'operazione decomprime tutti i contenuti di questo genere ricreando l\\\'esatta struttura originale dei file e delle cartelle. Potrebbe accadere che un file possa non venire estratto a causa di un nome-file non valido, ma questo non interromper&amp;agrave; l\\\'operazione.',
	'txt_ver_contido' => '<strong>Vedi Contenuti: </strong>Permette di visionare un file di testo modificabile. Nel caso di file web (come PHP o HTML) la lettura del codice sorgente verr&amp;agrave agevolata dalla colorazione dei comandi del linguaggio.',
	'txt_editar' => 'strong>Modifica: </strong>Permette di modificare il contenuto di un file di testo.',
	'h1_accions_multiple' => 'Quali operazioni posso eseguire su pi&amp;ugrave; file e cartelle contemporaneamente?',
	'txt_multiple_copiar' => '<strong>Copia: </strong>Permette di copiare pi&amp;ugrave; files e cartelle contemporaneamente. Una volta avviata, questa procedura prosegue fino al termine delle operazioni e solo alla fine, in caso di errore verrai informati dell\\\'esito.',
	'txt_multiple_mover' => '<strong>Sposta: </strong>Permette di spostare pi&amp;ugrave; file e cartelle contemporaneamente. Una volta avviata, questa procedura prosegue fino al termine delle operazioni e solo alla fine, in caso di errore verrai informati dell\\\'esito.',
	'txt_multiple_eliminar' => '<strong>Modifica Permessi: </strong>Permette di cambiare i permessi di accesso a pi&amp;ugrave; files e cartelle contemporaneamente. Una volta avviata, questa procedura prosegue fino al termine delle operazioni e solo alla fine, in caso di errore verrai informato dell\\\'esito.',
	'txt_multiple_permisos' => '<strong>Modifica Permessi: </strong>Permette di cambiare i permessi di accesso a pi&amp;ugrave; files e cartelle contemporaneamente. Una volta avviata, questa procedura prosegue fino al termine delle operazioni e solo alla fine, in caso di errore verrete informati dell\\\'esito.',
	'txt_multiple_comprimir' => '<strong>Scaricamento Compresso:</strong> Permette di scaricare tutti i files selezionati e le cartelle in un unico file compresso, al fine di salvaguardare il tempo di scaricamento. Il file creato sar&amp;agrave; nel formato ZIP.',
	'h1_problemas' => 'Come posso risolvere questo problema?',
	'tit_problema_subir_arq' => 'Non riesco a caricare un file o una URL.',
	'txt_problema_subir_arq' => 'Se non riesci a carica un file o una URL devi controllare se disponi di sufficiente spazio nel disco su cui volete salvare. Per verificare questo, in basso alla pagina noterai qualcosa tipo: <strong> spazio libero: XX MB</strong>, che indica lo spazio limite per salvare in questa cartella principale.',
	'tit_problema_crear_dir' => 'Non riesco a creare la cartella.',
	'txt_problema_crear_dir' => 'La pi&amp;ugrave; frequente causa di accesso negato nella creazione di una cartella &amp;egrave; dovuta al fatto che nel punto in cui vorresti crearla essa non ha i permessi di scrittura abilitati. Se questo dovesse accadere un messaggio di allarme apparir&amp;agrave; per mostrare il problema. Se il problema non pu&amp;ograve;essere risolto dall\\\'utente, devi contattare l\\\'Amministratore.',
	'tit_problema_buscador' => 'La ricerca non ha trovato corrispondenze',
	'txt_problema_buscador' => 'Se la ricerca non trova il file e sei invece sicuro che esso esista nelle cartelle, chiedi all\\\'Amministratore di re-indicizzare la cartella principale per aggiornarne i dati relativi.',
	'tit_problema_miniaturas' => 'Non riesco a vedere le miniature.',
	'txt_problema_miniaturas' => 'Se premi <img src="[*$this->g("estilo")*]imx/ver_imaxes.png" alt="Mostra Immagini" /> Miniature</strong> le immagini che provengono da quelle grandi non vengono mostrate nella lista, questo significa che non sono state create. Per fare questo clicca su <strong>Informazioni</strong> nell\\\'immagine selezionata e clicca su <strong>Copia Immagine Ridotta </strong> dove puoi creare una copia personalizzata o ridotta e proporzionale rispetto l\\\'originale.',
	'tit_problema_paxinar' => 'Non riesco a visionare tutti i contenuti della cartella.',
	'txt_problema_paxinar' => 'Quando una cartella &amp;egrtave; molto ampia (pi&amp;ugrave; di [*$this->g("paxinar")*] file o cartelle) il risultato viene paginato. Se vuoi andare alla pagina successiva o all\\\'ultima, in basso alla lista trovi le indicazioni per spostarti.',
	'tit_problema_sesion' => 'Se lascio passare troppo tempo senza interagire con le pagine web il sistema mi esclude.',
	'txt_problema_sesion' => 'La ragione di questo comportamento &amp;egrave; dato dal limite di tempo stabilito per ogni sessione, per non concedere l\\\'accesso illegale quando lasciate solo il computer. Solitamente la sessione impiega circa mezz\\\'ora da quando avete usato le pagine l\\\'ultima volta prima di sconnettere l\\\'utente.<br />Se non vuoi che la sessione si concluda, devi aggiornare la pagina prima della scadenza della sessione.',
);
?>