<?php
// Heading
$_['heading_title']                        = 'Playful Sparkle - Live Search';
$_['heading_fix']                          = 'Corriger les erreurs courantes';
$_['heading_getting_started']              = 'Démarrage';
$_['heading_setup']                        = 'Configuration de Live Search';
$_['heading_troubleshot']                  = 'Dépannage courant';
$_['heading_faq']                          = 'FAQ';
$_['heading_contact']                      = 'Contacter le support';

// Text
$_['text_extension']                       = 'Extensions';
$_['text_success']                         = 'Succès : Vous avez modifié le module Live Search !';
$_['text_filter_success']                  = 'Succès : Les filtres non utilisés ont été supprimés avec succès !';
$_['text_edit']                            = 'Modifier le module Live Search';
$_['text_getting_started']                 = '<p><strong>Aperçu :</strong> Playful Sparkle - Live Search est une extension de recherche avancée pour OpenCart 4, conçue pour afficher les résultats de recherche dynamiquement dans un menu déroulant à mesure que l\'utilisateur tape. Elle prend en charge les recherches de produits, de catégories, de fabricants et de pages d\'informations, avec des tailles de vignettes, des longueurs de description et des paramètres de délai personnalisables pour une expérience utilisateur optimale.</p><p><strong>Exigences :</strong> OpenCart 4.x+, PHP 7.4+ ou supérieur</p>';
$_['text_setup']                           = '<ul><li><strong>Paramètres généraux :</strong> Configurez le délai d\'entrée (par défaut : 100 ms) pour contrôler le temps entre les frappes et l\'affichage des résultats de recherche.</li><li><strong>Paramètres des produits :</strong><ul><li>Activer/Désactiver les résultats de recherche de produits.</li><li>Activer/Désactiver l\'affichage des descriptions des produits ; définir la longueur maximale de la description (par défaut : 100 caractères).</li><li>Activer/Désactiver les vignettes des produits ; définir la largeur et la hauteur des vignettes (min : 16 px, max : 128 px).</li></ul></li><li><strong>Paramètres des catégories :</strong><ul><li>Activer/Désactiver les résultats de recherche de catégories.</li><li>Activer/Désactiver les vignettes des catégories ; définir les dimensions des vignettes (min : 16 px, max : 128 px).</li></ul></li><li><strong>Paramètres des fabricants :</strong><ul><li>Activer/Désactiver les résultats de recherche des fabricants.</li><li>Activer/Désactiver les vignettes des fabricants ; définir les dimensions des vignettes (min : 16 px, max : 128 px).</li></ul></li><li><strong>Paramètres des pages d\'informations :</strong><ul><li>Activer/Désactiver les résultats de recherche des pages d\'informations.</li></ul></li></ul>';
$_['text_troubleshot']                     = '<ul><li><strong>La recherche en direct ne fonctionne pas :</strong> Cliquez sur le bouton "Corriger le gestionnaire d\'événements", vérifiez les paramètres de délai d\'entrée et assurez-vous que le module est activé.</li><li><strong>Des résultats spécifiques (Produit, Catégorie, Fabricant, Information) manquent :</strong> Vérifiez que la catégorie de résultats pertinente est activée dans les paramètres.</li></ul>';
$_['text_faq']                             = '<details><summary>Quel est le délai d\'entrée par défaut ?</summary> Le délai d\'entrée par défaut est fixé à 100 millisecondes.</details><details><summary>Comment définir la taille maximale des vignettes ?</summary> La taille des vignettes peut être définie dans une plage de 16 à 128 pixels pour la largeur et la hauteur.</details><details><summary>Comment limiter la longueur de la description du produit ?</summary> La longueur de la description peut être ajustée dans les paramètres ; la valeur par défaut est de 100 caractères.</details><details><summary>Pourquoi certains résultats n\'apparaissent-ils pas dans le menu déroulant ?</summary> Assurez-vous que le type de résultat spécifique (Produit, Catégorie, Fabricant, ou Information) est activé dans les paramètres du module.</details>';
$_['text_contact']                         = '<p>Pour toute assistance supplémentaire, veuillez contacter notre équipe de support :</p><ul><li><strong>Contact :</strong> <a href="mailto:%s">%s</a></li><li><strong>Documentation :</strong> <a href="%s" target="_blank" rel="noopener noreferrer">Documentation utilisateur</a></li></ul>';

// Tab
$_['tab_general']                          = 'Général';
$_['tab_products']                         = 'Produits';
$_['tab_categories']                       = 'Catégories';
$_['tab_manufacturers']                    = 'Fabricants';
$_['tab_informations']                     = 'Informations';
$_['tab_help_and_support']                 = 'Aide et support';

// Entry
$_['entry_status']                         = 'Statut';
$_['entry_input_delay']                    = 'Délai d\'entrée';
$_['entry_product_status']                 = 'Afficher les produits';
$_['entry_category_status']                = 'Afficher les catégories';
$_['entry_category_image']                 = 'Afficher l\'image de la catégorie';
$_['entry_category_image_size']            = 'Taille de l\'image de la catégorie (L x H)';
$_['entry_manufacturer_status']            = 'Afficher les fabricants';
$_['entry_manufacturer_image']             = 'Afficher l\'image du fabricant';
$_['entry_manufacturer_image_size']        = 'Taille de l\'image du fabricant (L x H)';
$_['entry_information_status']             = 'Afficher les informations';
$_['entry_product_description']            = 'Afficher la description du produit';
$_['entry_product_description_length']     = 'Longueur de la description du produit';
$_['entry_product_image']                  = 'Afficher l\'image du produit';
$_['entry_product_image_size']             = 'Taille de l\'image du produit (L x H)';
$_['entry_width']                          = 'Largeur';
$_['entry_height']                         = 'Hauteur';
$_['entry_input_min_chars']                = 'Caractères minimum';

// Button
$_['button_fix_event_handler']             = 'Corriger le gestionnaire d\'événements';

// Help
$_['help_input_delay']                     = 'Ce paramètre spécifie le délai (en millisecondes) entre la frappe d\'une touche par l\'utilisateur et l\'envoi des données au serveur. Augmenter ce délai peut aider à réduire le nombre de requêtes envoyées lors de saisies rapides, améliorant ainsi les performances et les temps de réponse du serveur.';
$_['help_product_description_length']      = 'Spécifiez le nombre maximal de caractères pour la description du produit. Ce paramètre détermine combien de caractères seront affichés dans les résultats de recherche en direct.';
$_['help_input_min_chars']                 = 'Spécifiez le nombre minimum de caractères requis avant qu\'une requête de recherche ne soit envoyée au serveur.';

// Error
$_['error_permission']                     = 'Avertissement : Vous n\'avez pas la permission de modifier le module Live Search !';
$_['error_form']                           = 'Le formulaire contient des erreurs. Veuillez corriger les champs mis en évidence.';
$_['error_input_delay_min']                = 'Le délai d\'entrée doit être d\'au moins 100 millisecondes.';
$_['error_product_description_length_min'] = 'La longueur de la description du produit ne peut pas être inférieure à 0 caractères.';
$_['error_product_description_length_max'] = 'La longueur de la description du produit ne peut pas dépasser 200 caractères.';
$_['error_product_image_width_min']        = 'La largeur de l\'image du produit doit être d\'au moins 16 pixels.';
$_['error_product_image_width_max']        = 'La largeur de l\'image du produit ne doit pas dépasser 128 pixels.';
$_['error_product_image_height_min']       = 'La hauteur de l\'image du produit doit être d\'au moins 16 pixels.';
$_['error_product_image_height_max']       = 'La hauteur de l\'image du produit ne doit pas dépasser 128 pixels.';
$_['error_category_image_width_min']       = 'La largeur de l\'image de la catégorie doit être d\'au moins 16 pixels.';
$_['error_category_image_width_max']       = 'La largeur de l\'image de la catégorie ne doit pas dépasser 128 pixels.';
$_['error_category_image_height_min']      = 'La hauteur de l\'image de la catégorie doit être d\'au moins 16 pixels.';
$_['error_category_image_height_max']      = 'La hauteur de l\'image de la catégorie ne doit pas dépasser 128 pixels.';
$_['error_manufacturer_image_width_min']   = 'La largeur de l\'image du fabricant doit être d\'au moins 16 pixels.';
$_['error_manufacturer_image_width_max']   = 'La largeur de l\'image du fabricant ne doit pas dépasser 128 pixels.';
$_['error_manufacturer_image_height_min']  = 'La hauteur de l\'image du fabricant doit être d\'au moins 16 pixels.';
$_['error_manufacturer_image_height_max']  = 'La hauteur de l\'image du fabricant ne doit pas dépasser 128 pixels.';
$_['error_input_min_chars']                = 'La longueur minimale de l\'entrée ne peut pas être inférieure à 1 caractère.';
