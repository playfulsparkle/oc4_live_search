<?php
// Heading
$_['heading_title']                        = 'Playful Sparkle - Live Search';
$_['heading_fix']                          = 'Häufige Fehler beheben';
$_['heading_getting_started']              = 'Erste Schritte';
$_['heading_setup']                        = 'Einrichtung des Live Search';
$_['heading_troubleshot']                  = 'Häufige Fehlersuche';
$_['heading_faq']                          = 'Häufig gestellte Fragen';
$_['heading_contact']                      = 'Support kontaktieren';

// Text
$_['text_extension']                       = 'Erweiterungen';
$_['text_success']                         = 'Erfolg: Sie haben das Live Search-Modul erfolgreich geändert!';
$_['text_filter_success']                  = 'Erfolg: Nicht verwendete Filter wurden erfolgreich entfernt!';
$_['text_edit']                            = 'Live Search-Modul bearbeiten';
$_['text_getting_started']                 = '<p><strong>Überblick:</strong> Playful Sparkle - Live Search ist eine erweiterte Sucherweiterung für OpenCart 4, die Suchergebnisse dynamisch in einem Dropdown-Menü anzeigt, während der Benutzer tippt. Sie unterstützt die Suche nach Produkten, Kategorien, Herstellern und Informationsseiten, mit anpassbaren Miniaturbildgrößen, Beschreibungs-Längen und Verzögerungseinstellungen für ein optimales Benutzererlebnis.</p><p><strong>Voraussetzungen:</strong> OpenCart 4.x+, PHP 7.4+ oder höher</p>';
$_['text_setup']                           = '<ul><li><strong>Allgemeine Einstellungen:</strong> Konfigurieren Sie die Eingabeverzögerung (Standard: 100 ms), um die Zeit zwischen Tasteneingaben und der Anzeige der Suchergebnisse zu steuern.</li><li><strong>Produkteinstellungen:</strong><ul><li>Aktivieren/Deaktivieren von Produktsuchergebnissen.</li><li>Aktivieren/Deaktivieren der Produktbeschreibungen; maximale Beschreibungslänge einstellen (Standard: 100 Zeichen).</li><li>Aktivieren/Deaktivieren von Produkt-Miniaturansichten; Breite und Höhe der Miniaturansicht festlegen (mindestens: 16 px, maximal: 128 px).</li></ul></li><li><strong>Kategorieeinstellungen:</strong><ul><li>Aktivieren/Deaktivieren von Kategorie-Suchergebnissen.</li><li>Aktivieren/Deaktivieren der Kategorieminiaturansichten; Abmessungen der Miniaturansichten festlegen (mindestens: 16 px, maximal: 128 px).</li></ul></li><li><strong>Herstellereinstellungen:</strong><ul><li>Aktivieren/Deaktivieren von Hersteller-Suchergebnissen.</li><li>Aktivieren/Deaktivieren der Herstellerminiaturansichten; Abmessungen der Miniaturansichten festlegen (mindestens: 16 px, maximal: 128 px).</li></ul></li><li><strong>Informationsseiteneinstellungen:</strong><ul><li>Aktivieren/Deaktivieren von Informationsseitensuchergebnissen.</li></ul></li></ul>';
$_['text_troubleshot']                     = '<ul><li><strong>Live-Suche funktioniert nicht:</strong> Klicken Sie auf die Schaltfläche „Ereignis-Handler beheben“, überprüfen Sie die Eingabeverzögerungseinstellung und stellen Sie sicher, dass das Modul aktiviert ist.</li><li><strong>Bestimmte Ergebnisse (Produkt, Kategorie, Hersteller, Information) fehlen:</strong> Stellen Sie sicher, dass die entsprechende Ergebniskategorie in den Einstellungen aktiviert ist.</li></ul>';
$_['text_faq']                             = '<details><summary>Was ist die Standard-Eingabeverzögerung?</summary> Die Standard-Eingabeverzögerung beträgt 100 Millisekunden.</details><details><summary>Wie lege ich die maximale Miniaturbildgröße fest?</summary> Die Miniaturbildgrößen können in einem Bereich von 16 bis 128 Pixel für Breite und Höhe eingestellt werden.</details><details><summary>Wie beschränke ich die Länge der Produktbeschreibung?</summary> Die Beschreibungslänge kann in den Einstellungen angepasst werden; der Standardwert beträgt 100 Zeichen.</details><details><summary>Warum werden einige Ergebnisse im Dropdown-Menü nicht angezeigt?</summary> Stellen Sie sicher, dass der spezifische Ergebnistyp (Produkt, Kategorie, Hersteller oder Information) in den Moduleinstellungen aktiviert ist.</details>';
$_['text_contact']                         = '<p>Für weitere Unterstützung wenden Sie sich bitte an unser Support-Team:</p><ul><li><strong>Kontakt:</strong> <a href="mailto:%s">%s</a></li><li><strong>Dokumentation:</strong> <a href="%s" target="_blank" rel="noopener noreferrer">Benutzerdokumentation</a></li></ul>';

// Tab
$_['tab_general']                          = 'Allgemein';
$_['tab_products']                         = 'Produkte';
$_['tab_categories']                       = 'Kategorien';
$_['tab_manufacturers']                    = 'Hersteller';
$_['tab_informations']                     = 'Informationen';
$_['tab_help_and_support']                 = 'Hilfe &amp; Support';

// Entry
$_['entry_status']                         = 'Status';
$_['entry_input_delay']                    = 'Eingabeverzögerung';
$_['entry_product_status']                 = 'Produkte anzeigen';
$_['entry_category_status']                = 'Kategorien anzeigen';
$_['entry_category_image']                 = 'Kategoriebild anzeigen';
$_['entry_category_image_size']            = 'Kategoriebildgröße (B x H)';
$_['entry_manufacturer_status']            = 'Hersteller anzeigen';
$_['entry_manufacturer_image']             = 'Herstellerbild anzeigen';
$_['entry_manufacturer_image_size']        = 'Herstellerbildgröße (B x H)';
$_['entry_information_status']             = 'Informationen anzeigen';
$_['entry_product_description']            = 'Produktbeschreibung anzeigen';
$_['entry_product_description_length']     = 'Länge der Produktbeschreibung';
$_['entry_product_image']                  = 'Produktbild anzeigen';
$_['entry_product_image_size']             = 'Produktbildgröße (B x H)';
$_['entry_product_price']                  = 'Produktpreis anzeigen';
$_['entry_width']                          = 'Breite';
$_['entry_height']                         = 'Höhe';
$_['entry_input_min_chars']                = 'Min. Eingabe';

// Button
$_['button_fix_event_handler']             = 'Ereignishandler beheben';

// Help
$_['help_input_delay']                     = 'Diese Einstellung legt die Verzögerungszeit (in Millisekunden) fest, die zwischen der Eingabe eines Zeichens durch den Benutzer und der Übermittlung der Daten an den Server liegt. Eine Erhöhung dieser Verzögerung kann helfen, die Anzahl der Anfragen während der schnellen Eingabe zu reduzieren und die Leistung sowie die Serverreaktionszeit zu verbessern.';
$_['help_product_description_length']      = 'Geben Sie die maximale Anzahl an Zeichen für die Produktbeschreibung an. Diese Einstellung bestimmt, wie viele Zeichen in den Live-Suchergebnissen angezeigt werden.';
$_['help_input_min_chars']                 = 'Geben Sie die minimale Anzahl von Zeichen an, die erforderlich ist, bevor eine Suchanfrage an den Server gesendet wird.';

// Error
$_['error_permission']                     = 'Warnung: Sie haben keine Berechtigung, das Live Search-Modul zu ändern!';
$_['error_form']                           = 'Das Formular enthält Fehler. Bitte korrigieren Sie die hervorgehobenen Felder.';
$_['error_input_delay_min']                = 'Die Eingabeverzögerung muss mindestens 100 Millisekunden betragen.';
$_['error_product_description_length_min'] = 'Die Länge der Produktbeschreibung darf nicht weniger als 0 Zeichen betragen.';
$_['error_product_description_length_max'] = 'Die Länge der Produktbeschreibung darf 200 Zeichen nicht überschreiten.';
$_['error_product_image_width_min']        = 'Die Breite des Produktbildes muss mindestens 16 Pixel betragen.';
$_['error_product_image_width_max']        = 'Die Breite des Produktbildes darf nicht mehr als 128 Pixel betragen.';
$_['error_product_image_height_min']       = 'Die Höhe des Produktbildes muss mindestens 16 Pixel betragen.';
$_['error_product_image_height_max']       = 'Die Höhe des Produktbildes darf nicht mehr als 128 Pixel betragen.';
$_['error_category_image_width_min']       = 'Die Breite des Kategoriebildes muss mindestens 16 Pixel betragen.';
$_['error_category_image_width_max']       = 'Die Breite des Kategoriebildes darf nicht mehr als 128 Pixel betragen.';
$_['error_category_image_height_min']      = 'Die Höhe des Kategoriebildes muss mindestens 16 Pixel betragen.';
$_['error_category_image_height_max']      = 'Die Höhe des Kategoriebildes darf nicht mehr als 128 Pixel betragen.';
$_['error_manufacturer_image_width_min']   = 'Die Breite des Herstellerbildes muss mindestens 16 Pixel betragen.';
$_['error_manufacturer_image_width_max']   = 'Die Breite des Herstellerbildes darf nicht mehr als 128 Pixel betragen.';
$_['error_manufacturer_image_height_min']  = 'Die Höhe des Herstellerbildes muss mindestens 16 Pixel betragen.';
$_['error_manufacturer_image_height_max']  = 'Die Höhe des Herstellerbildes darf nicht mehr als 128 Pixel betragen.';
$_['error_input_min_chars']                = 'Die minimale Eingabelänge darf nicht kleiner als 1 Zeichen sein.';
