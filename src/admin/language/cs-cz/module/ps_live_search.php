<?php
// Heading
$_['heading_title']                        = 'Playful Sparkle - Live Search';
$_['heading_fix']                          = 'Oprava běžných chyb';
$_['heading_getting_started']              = 'Začínáme';
$_['heading_setup']                        = 'Nastavení Live Search';
$_['heading_troubleshot']                  = 'Běžné řešení problémů';
$_['heading_faq']                          = 'Často kladené otázky';
$_['heading_contact']                      = 'Kontaktujte podporu';

// Text
$_['text_extension']                       = 'Rozšíření';
$_['text_success']                         = 'Úspěch: Modul Live Search byl upraven!';
$_['text_filter_success']                  = 'Úspěch: Nepoužívané filtry byly úspěšně odstraněny!';
$_['text_edit']                            = 'Upravit modul Live Search';
$_['text_getting_started']                 = '<p><strong>Přehled:</strong> Playful Sparkle - Live Search je pokročilé vyhledávací rozšíření pro OpenCart 4, které zobrazuje výsledky vyhledávání dynamicky v rozbalovacím menu během psaní. Podporuje vyhledávání produktů, kategorií, výrobců a informačních stránek s nastavitelnými velikostmi miniatur, délkou popisů a zpožděním pro optimální uživatelskou zkušenost.</p><p><strong>Požadavky:</strong> OpenCart 4.x+, PHP 7.4+ nebo vyšší</p>';
$_['text_setup']                           = '<ul><li><strong>Obecná nastavení:</strong> Nastavte zpoždění vstupu (výchozí: 100 ms) pro kontrolu času mezi stiskem klávesy a zobrazením výsledků vyhledávání.</li><li><strong>Nastavení produktu:</strong><ul><li>Povolit/zakázat výsledky vyhledávání produktů.</li><li>Povolit/zakázat zobrazení popisů produktů; nastavte maximální délku popisu (výchozí: 100 znaků).</li><li>Povolit/zakázat miniatury produktů; nastavte šířku a výšku miniatury (min: 16 px, max: 128 px).</li></ul></li><li><strong>Nastavení kategorie:</strong><ul><li>Povolit/zakázat výsledky vyhledávání kategorií.</li><li>Povolit/zakázat miniatury kategorií; nastavte rozměry miniatury (min: 16 px, max: 128 px).</li></ul></li><li><strong>Nastavení výrobce:</strong><ul><li>Povolit/zakázat výsledky vyhledávání výrobců.</li><li>Povolit/zakázat miniatury výrobců; nastavte rozměry miniatury (min: 16 px, max: 128 px).</li></ul></li><li><strong>Nastavení informačních stránek:</strong><ul><li>Povolit/zakázat výsledky vyhledávání informačních stránek.</li></ul></li></ul>';
$_['text_troubleshot']                     = '<ul><li><strong>Live search nefunguje:</strong> Klikněte na tlačítko "Opravit správce událostí", ověřte nastavení zpoždění vstupu a ujistěte se, že modul je povolen.</li><li><strong>Chybí specifické výsledky (produkt, kategorie, výrobce, informace):</strong> Ověřte, že příslušná kategorie výsledků je povolena v nastavení.</li></ul>';
$_['text_faq']                             = '<details><summary>Jaké je výchozí zpoždění vstupu?</summary> Výchozí zpoždění vstupu je nastaveno na 100 milisekund.</details><details><summary>Jak nastavím maximální velikost miniatury?</summary> Velikosti miniatur lze nastavit v rozmezí 16 až 128 pixelů na šířku a výšku.</details><details><summary>Jak mohu omezit délku popisu produktu?</summary> Délku popisu lze upravit v nastavení; výchozí hodnota je 100 znaků.</details><details><summary>Proč se některé výsledky nezobrazují v rozbalovacím menu?</summary> Ujistěte se, že specifický typ výsledku (produkt, kategorie, výrobce nebo informace) je povolen v nastavení modulu.</details>';
$_['text_contact']                         = '<p>Pro další pomoc se prosím obraťte na náš tým podpory:</p><ul><li><strong>Kontakt:</strong> <a href="mailto:%s">%s</a></li><li><strong>Dokumentace:</strong> <a href="%s" target="_blank" rel="noopener noreferrer">Dokumentace pro uživatele</a></li></ul>';

// Tab
$_['tab_general']                          = 'Obecné';
$_['tab_products']                         = 'Produkty';
$_['tab_categories']                       = 'Kategorie';
$_['tab_manufacturers']                    = 'Výrobci';
$_['tab_informations']                     = 'Informace';
$_['tab_help_and_support']                 = 'Nápověda a podpora';

// Entry
$_['entry_status']                         = 'Stav';
$_['entry_input_delay']                    = 'Zpoždění vstupu';
$_['entry_product_status']                 = 'Zobrazit produkty';
$_['entry_category_status']                = 'Zobrazit kategorie';
$_['entry_category_image']                 = 'Zobrazit obrázek kategorie';
$_['entry_category_image_size']            = 'Velikost obrázku kategorie (Š x V)';
$_['entry_manufacturer_status']            = 'Zobrazit výrobce';
$_['entry_manufacturer_image']             = 'Zobrazit obrázek výrobce';
$_['entry_manufacturer_image_size']        = 'Velikost obrázku výrobce (Š x V)';
$_['entry_information_status']             = 'Zobrazit informace';
$_['entry_product_description']            = 'Zobrazit popis produktu';
$_['entry_product_description_length']     = 'Délka popisu produktu';
$_['entry_product_image']                  = 'Zobrazit obrázek produktu';
$_['entry_product_image_size']             = 'Velikost obrázku produktu (Š x V)';
$_['entry_width']                          = 'Šířka';
$_['entry_height']                         = 'Výška';
$_['entry_input_min_chars']                = 'Min. počet znaků';

// Button
$_['button_fix_event_handler']             = 'Opravit zpracovatele událostí';

// Help
$_['help_input_delay']                     = 'Toto nastavení určuje časové zpoždění (v milisekundách) mezi stiskem klávesy uživatelem a odesláním dat na server. Zvýšení tohoto zpoždění může pomoci snížit počet požadavků při rychlém zadávání, což zlepší výkon a dobu odezvy serveru.';
$_['help_product_description_length']      = 'Zadejte maximální počet znaků pro popis produktu. Toto nastavení určuje, kolik znaků bude zobrazeno ve výsledcích vyhledávání.';
$_['help_input_min_chars']                 = 'Určete minimální počet znaků, které jsou vyžadovány před odesláním vyhledávacího dotazu na server.';

// Error
$_['error_permission']                     = 'Upozornění: Nemáte oprávnění k úpravě modulu Live Search!';
$_['error_form']                           = 'Formulář obsahuje chyby. Prosím, opravte zvýrazněná pole.';
$_['error_input_delay_min']                = 'Zpoždění vstupu musí být alespoň 100 milisekund.';
$_['error_product_description_length_min'] = 'Délka popisu produktu nemůže být menší než 0 znaků.';
$_['error_product_description_length_max'] = 'Délka popisu produktu nesmí přesáhnout 200 znaků.';
$_['error_product_image_width_min']        = 'Šířka obrázku produktu musí být alespoň 16 pixelů.';
$_['error_product_image_width_max']        = 'Šířka obrázku produktu nesmí být větší než 128 pixelů.';
$_['error_product_image_height_min']       = 'Výška obrázku produktu musí být alespoň 16 pixelů.';
$_['error_product_image_height_max']       = 'Výška obrázku produktu nesmí být větší než 128 pixelů.';
$_['error_category_image_width_min']       = 'Šířka obrázku kategorie musí být alespoň 16 pixelů.';
$_['error_category_image_width_max']       = 'Šířka obrázku kategorie nesmí být větší než 128 pixelů.';
$_['error_category_image_height_min']      = 'Výška obrázku kategorie musí být alespoň 16 pixelů.';
$_['error_category_image_height_max']      = 'Výška obrázku kategorie nesmí být větší než 128 pixelů.';
$_['error_manufacturer_image_width_min']   = 'Šířka obrázku výrobce musí být alespoň 16 pixelů.';
$_['error_manufacturer_image_width_max']   = 'Šířka obrázku výrobce nesmí být větší než 128 pixelů.';
$_['error_manufacturer_image_height_min']  = 'Výška obrázku výrobce musí být alespoň 16 pixelů.';
$_['error_manufacturer_image_height_max']  = 'Výška obrázku výrobce nesmí být větší než 128 pixelů.';
$_['error_input_min_chars']                = 'Minimální délka vstupu nemůže být nižší než 1 znak.';
