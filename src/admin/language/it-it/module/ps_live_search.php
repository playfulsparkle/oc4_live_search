<?php
// Heading
$_['heading_title']                        = 'Playful Sparkle - Live Search';
$_['heading_fix']                          = 'Correggere i comuni errori';
$_['heading_getting_started']              = 'Iniziare';
$_['heading_setup']                        = 'Configurazione di Live Search';
$_['heading_troubleshot']                  = 'Risoluzione dei problemi comuni';
$_['heading_faq']                          = 'Domande frequenti';
$_['heading_contact']                      = 'Contatta il supporto';

// Text
$_['text_extension']                       = 'Estensioni';
$_['text_success']                         = 'Successo: Hai modificato il modulo Live Search!';
$_['text_filter_success']                  = 'Successo: I filtri non utilizzati sono stati rimossi con successo!';
$_['text_edit']                            = 'Modifica il modulo Live Search';
$_['text_getting_started']                 = '<p><strong>Panoramica:</strong> Playful Sparkle - Live Search è un\'estensione di ricerca avanzata per OpenCart 4, progettata per visualizzare dinamicamente i risultati di ricerca in un menu a discesa mentre l\'utente digita. Supporta la ricerca di prodotti, categorie, produttori e pagine informative, con dimensioni personalizzabili delle miniature, lunghezza delle descrizioni e impostazioni di ritardo per ottimizzare l\'esperienza dell\'utente.</p><p><strong>Requisiti:</strong> OpenCart 4.x+, PHP 7.4+ o versioni superiori.</p>';
$_['text_setup']                           = '<ul><li><strong>Impostazioni generali:</strong> Configura il ritardo dell\'input (predefinito: 100 ms) per controllare il tempo tra la digitazione dei caratteri e la visualizzazione dei risultati di ricerca.</li><li><strong>Impostazioni prodotto:</strong><ul><li>Abilita/Disabilita i risultati di ricerca per i prodotti.</li><li>Abilita/Disabilita la visualizzazione delle descrizioni dei prodotti e imposta la lunghezza massima della descrizione (predefinita: 100 caratteri).</li><li>Abilita/Disabilita le miniature dei prodotti e imposta la larghezza e l\'altezza delle miniature (minimo: 16 px, massimo: 128 px).</li></ul></li><li><strong>Impostazioni categoria:</strong><ul><li>Abilita/Disabilita i risultati di ricerca per le categorie.</li><li>Abilita/Disabilita le miniature delle categorie e imposta la dimensione delle miniature (minimo: 16 px, massimo: 128 px).</li></ul></li><li><strong>Impostazioni produttore:</strong><ul><li>Abilita/Disabilita i risultati di ricerca per i produttori.</li><li>Abilita/Disabilita le miniature dei produttori e imposta la dimensione delle miniature (minimo: 16 px, massimo: 128 px).</li></ul></li><li><strong>Impostazioni pagina informativa:</strong><ul><li>Abilita/Disabilita i risultati di ricerca per le pagine informative.</li></ul></li></ul>';
$_['text_troubleshot']                     = '<ul><li><strong>La ricerca live non funziona:</strong> Clicca sul pulsante "Correggi Event Handler", verifica le impostazioni del ritardo dell\'input e assicurati che il modulo sia abilitato.</li><li><strong>Risultati mancanti (Prodotto, Categoria, Produttore, Informazioni):</strong> Assicurati che il tipo di risultato pertinente sia abilitato nelle impostazioni.</li></ul>';
$_['text_faq']                             = '<details><summary>Qual è il ritardo dell\'input predefinito?</summary> Il ritardo dell\'input predefinito è impostato su 100 millisecondi.</details><details><summary>Come posso impostare la dimensione massima della miniatura?</summary> Le dimensioni delle miniature possono essere impostate entro un intervallo di 16-128 pixel per larghezza e altezza.</details><details><summary>Come posso limitare la lunghezza della descrizione del prodotto?</summary> La lunghezza della descrizione può essere regolata nelle impostazioni; il valore predefinito è di 100 caratteri.</details><details><summary>Perché alcuni risultati non appaiono nel menu a discesa?</summary> Assicurati che il tipo di risultato specifico (Prodotto, Categoria, Produttore o Informazioni) sia abilitato nelle impostazioni del modulo.</details>';
$_['text_contact']                         = '<p>Per ulteriore assistenza, contatta il nostro team di supporto:</p><ul><li><strong>Contatto:</strong> <a href="mailto:%s">%s</a></li><li><strong>Documentazione:</strong> <a href="%s" target="_blank" rel="noopener noreferrer">Documentazione utente</a></li></ul>';

// Tab
$_['tab_general']                          = 'Generale';
$_['tab_products']                         = 'Prodotti';
$_['tab_categories']                       = 'Categorie';
$_['tab_manufacturers']                    = 'Produttori';
$_['tab_informations']                     = 'Informazioni';
$_['tab_help_and_support']                 = 'Aiuto &amp; Supporto';

// Entry
$_['entry_status']                         = 'Stato';
$_['entry_input_delay']                    = 'Ritardo dell\'Input';
$_['entry_product_status']                 = 'Mostra Prodotti';
$_['entry_category_status']                = 'Mostra Categorie';
$_['entry_category_image']                 = 'Mostra Immagine Categoria';
$_['entry_category_image_size']            = 'Dimensione Immagine Categoria (L x A)';
$_['entry_manufacturer_status']            = 'Mostra Produttori';
$_['entry_manufacturer_image']             = 'Mostra Immagine Produttore';
$_['entry_manufacturer_image_size']        = 'Dimensione Immagine Produttore (L x A)';
$_['entry_information_status']             = 'Mostra Informazioni';
$_['entry_product_description']            = 'Mostra Descrizione Prodotto';
$_['entry_product_description_length']     = 'Lunghezza Descrizione Prodotto';
$_['entry_product_image']                  = 'Mostra Immagine Prodotto';
$_['entry_product_image_size']             = 'Dimensione Immagine Prodotto (L x A)';
$_['entry_product_price']                  = 'Mostrare il prezzo del prodotto';
$_['entry_width']                          = 'Larghezza';
$_['entry_height']                         = 'Altezza';
$_['entry_input_min_chars']                = 'Min. caratteri input';

// Button
$_['button_fix_event_handler']             = 'Correggi Event Handler';

// Help
$_['help_input_delay']                     = 'Questa impostazione specifica il tempo di ritardo (in millisecondi) tra la digitazione di un tasto e l\'invio dei dati al server. Aumentando il ritardo si può ridurre il numero di richieste inviate durante l\'input rapido, migliorando così le prestazioni e i tempi di risposta del server.';
$_['help_product_description_length']      = 'Specifica il numero massimo di caratteri per la descrizione del prodotto. Questa impostazione determina quanti caratteri saranno visualizzati nei risultati di ricerca live.';
$_['help_input_min_chars']                 = 'Specifica il numero minimo di caratteri richiesti prima che una query di ricerca venga inviata al server.';

// Error
$_['error_permission']                     = 'Attenzione: Non hai il permesso di modificare il modulo Live Search!';
$_['error_form']                           = 'Il modulo contiene errori. Correggi i campi evidenziati.';
$_['error_input_delay_min']                = 'Il ritardo dell\'input deve essere almeno di 100 millisecondi.';
$_['error_product_description_length_min'] = 'La lunghezza della descrizione del prodotto non può essere inferiore a 0 caratteri.';
$_['error_product_description_length_max'] = 'La lunghezza della descrizione del prodotto non può superare i 200 caratteri.';
$_['error_product_image_width_min']        = 'La larghezza dell\'immagine del prodotto deve essere almeno di 16 pixel.';
$_['error_product_image_width_max']        = 'La larghezza dell\'immagine del prodotto non deve superare i 128 pixel.';
$_['error_product_image_height_min']       = 'L\'altezza dell\'immagine del prodotto deve essere almeno di 16 pixel.';
$_['error_product_image_height_max']       = 'L\'altezza dell\'immagine del prodotto non deve superare i 128 pixel.';
$_['error_category_image_width_min']       = 'La larghezza dell\'immagine della categoria deve essere almeno di 16 pixel.';
$_['error_category_image_width_max']       = 'La larghezza dell\'immagine della categoria non deve superare i 128 pixel.';
$_['error_category_image_height_min']      = 'L\'altezza dell\'immagine della categoria deve essere almeno di 16 pixel.';
$_['error_category_image_height_max']      = 'L\'altezza dell\'immagine della categoria non deve superare i 128 pixel.';
$_['error_manufacturer_image_width_min']   = 'La larghezza dell\'immagine del produttore deve essere almeno di 16 pixel.';
$_['error_manufacturer_image_width_max']   = 'La larghezza dell\'immagine del produttore non deve superare i 128 pixel.';
$_['error_manufacturer_image_height_min']  = 'L\'altezza dell\'immagine del produttore deve essere almeno di 16 pixel.';
$_['error_manufacturer_image_height_max']  = 'L\'altezza dell\'immagine del produttore non deve superare i 128 pixel.';
