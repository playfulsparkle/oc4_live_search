<?php
// Heading
$_['heading_title']                        = 'Playful Sparkle - Live Search';
$_['heading_fix']                          = 'Fix common bugs';
$_['heading_getting_started']              = 'Getting Started';
$_['heading_setup']                        = 'Setting Up Live Search';
$_['heading_troubleshot']                  = 'Common Troubleshooting';
$_['heading_faq']                          = 'FAQ';
$_['heading_contact']                      = 'Contact Support';

// Text
$_['text_extension']                       = 'Extensions';
$_['text_success']                         = 'Success: You have modified Live Search module!';
$_['text_filter_success']                  = 'Success: Unused filters were removed successfully!';
$_['text_edit']                            = 'Edit Live Search Module';
$_['text_getting_started']                 = '<p><strong>Overview:</strong> Playful Sparkle - Live Search is an advanced search extension for OpenCart 4, designed to display search results dynamically in a dropdown as the user types. It supports product, category, manufacturer, and information page searches, with customizable thumbnail sizes, description lengths, and delay settings for optimal user experience.</p><p><strong>Requirements:</strong> OpenCart 4.x+, PHP 7.4+ or higher</p>';
$_['text_setup']                           = '<ul><li><strong>General Settings:</strong> Configure the input delay (default: 100 ms) to control the time between keystrokes and search result display.</li><li><strong>Product Settings:</strong><ul><li>Enable/Disable product search results.</li><li>Enable/Disable display of product descriptions; set maximum description length (default: 100 characters).</li><li>Enable/Disable product thumbnails; set thumbnail width and height (min: 16 px, max: 128 px).</li></ul></li><li><strong>Category Settings:</strong><ul><li>Enable/Disable category search results.</li><li>Enable/Disable category thumbnails; set thumbnail dimensions (min: 16 px, max: 128 px).</li></ul></li><li><strong>Manufacturer Settings:</strong><ul><li>Enable/Disable manufacturer search results.</li><li>Enable/Disable manufacturer thumbnails; set thumbnail dimensions (min: 16 px, max: 128 px).</li></ul></li><li><strong>Information Page Settings:</strong><ul><li>Enable/Disable information page search results.</li></ul></li></ul>';
$_['text_troubleshot']                     = '<ul><li><strong>Live search does not work:</strong> Click the "Fix Event Handler" button, verify the input delay setting, and ensure the module is enabled.</li><li><strong>Specific results (Product, Category, Manufacturer, Information) are missing:</strong> Confirm that the relevant result category is enabled in the settings.</li></ul>';
$_['text_faq']                             = '<details><summary>What is the default input delay?</summary> The default input delay is set to 100 milliseconds.</details><details><summary>How do I set the maximum thumbnail size?</summary> Thumbnail sizes can be set within a range of 16 to 128 pixels for width and height.</details><details><summary>How do I limit the product description length?</summary> The description length can be adjusted in settings; the default is 100 characters.</details><details><summary>Why aren’t some results showing in the dropdown?</summary> Ensure the specific result type (Product, Category, Manufacturer, or Information) is enabled in the module settings.</details>';
$_['text_contact']                         = '<p>For further assistance, please reach out to our support team:</p><ul><li><strong>Contact:</strong> <a href="mailto:%s">%s</a></li><li><strong>Documentation:</strong> <a href="%s" target="_blank" rel="noopener noreferrer">User Documentation</a></li></ul>';

// Tab
$_['tab_general']                          = 'General';
$_['tab_products']                         = 'Products';
$_['tab_categories']                       = 'Categories';
$_['tab_manufacturers']                    = 'Manufacturers';
$_['tab_informations']                     = 'Informations';
$_['tab_help_and_support']                 = 'Help &amp; Support';

// Entry
$_['entry_status']                         = 'Status';
$_['entry_input_delay']                    = 'Input Delay';
$_['entry_product_status']                 = 'Show Products';
$_['entry_category_status']                = 'Show Categories';
$_['entry_category_image']                 = 'Show Category Image';
$_['entry_category_image_size']            = 'Category Image Size (W x H)';
$_['entry_manufacturer_status']            = 'Show Manufacturers';
$_['entry_manufacturer_image']             = 'Show Manufacturer Image';
$_['entry_manufacturer_image_size']        = 'Manufacturer Image Size (W x H)';
$_['entry_information_status']             = 'Show Informations';
$_['entry_product_description']            = 'Show Product Description';
$_['entry_product_description_length']     = 'Product Description Length';
$_['entry_product_image']                  = 'Show Product Image';
$_['entry_product_image_size']             = 'Product Image Size (W x H)';
$_['entry_width']                          = 'Width';
$_['entry_height']                         = 'Height';
$_['entry_input_min_chars']                = 'Min. input';

// Button
$_['button_fix_event_handler']             = 'Fix Event Handler';

// Help
$_['help_input_delay']                     = 'This setting specifies the delay time (in milliseconds) between when the user types a key and when the data is sent to the server. Increasing this delay can help reduce the number of requests sent during rapid input, improving performance and server response times.';
$_['help_product_description_length']      = 'Specify the maximum number of characters for the product description. This setting determines how many characters will be displayed in the live search results.';
$_['help_input_min_chars']                 = 'Specify the minimum number of characters required before a search query is sent to the server.';

// Error
$_['error_permission']                     = 'Warning: You do not have permission to modify Live Search module!';
$_['error_form']                           = 'The form contains errors. Please correct the highlighted fields.';
$_['error_input_delay_min']                = 'The input delay must be at least 100 milliseconds.';
$_['error_product_description_length_min'] = 'Product description length cannot be less than 0 characters.';
$_['error_product_description_length_max'] = 'Product description length cannot exceed 200 characters.';
$_['error_product_image_width_min']        = 'The width of the product image must be at least 16 pixels.';
$_['error_product_image_width_max']        = 'The width of the product image must be no more than 128 pixels.';
$_['error_product_image_height_min']       = 'The height of the product image must be at least 16 pixels.';
$_['error_product_image_height_max']       = 'The height of the product image must be no more than 128 pixels.';
$_['error_category_image_width_min']       = 'The width of the category image must be at least 16 pixels.';
$_['error_category_image_width_max']       = 'The width of the category image must be no more than 128 pixels.';
$_['error_category_image_height_min']      = 'The height of the category image must be at least 16 pixels.';
$_['error_category_image_height_max']      = 'The height of the category image must be no more than 128 pixels.';
$_['error_manufacturer_image_width_min']   = 'The width of the manufacturer image must be at least 16 pixels.';
$_['error_manufacturer_image_width_max']   = 'The width of the manufacturer image must be no more than 128 pixels.';
$_['error_manufacturer_image_height_min']  = 'The height of the manufacturer image must be at least 16 pixels.';
$_['error_manufacturer_image_height_max']  = 'The height of the manufacturer image must be no more than 128 pixels.';
$_['error_input_min_chars']                = 'The input minimum length cannot be lower than 1 character.';
