+(function ($) {
  $.fn.pslivesearch = function (option) {
    var defaults = {
      options: {
        input_min_chars: 1,
        input_delay: 100
      },
      translations: {
        'heading_products': 'Products',
        'text_showing_results': 'Showing results for <output></output>',
        'text_all_product_results': 'Show all product results',
        'text_no_results': 'No results'
      },
      source: null,
      select: null
    };

    return this.each(function () {
      var element = this;
      var $element = $(element);
      var config = $.extend(true, {}, defaults, option);
      $.extend(element, config);

      var $dropdown = $("#" + $element.attr("data-live-search-target"));
      var debounceTimer;
      var currentIndex = -1;
      var $items = [];
      var canRunFocus = true;

      // ARIA attributes setup
      $element.attr({
        "autoComplete": "off",
        "aria-autocomplete": "list",
        "aria-expanded": "false",
        "aria-owns": $element.attr("data-live-search-target"),
        role: "combobox"
      });

      // Event handlers
      $element.on("focusin.psls", function () {
        if (canRunFocus) element.request();
      });

      $element.on("focusout.psls", function (e) {
        if (!$dropdown.has(e.relatedTarget).length && e.relatedTarget !== element) {
          element.closeDropdown();
        }
      });

      $dropdown.on('keydown.psls', '.ps-live-search-item', handleDropdownNavigation);
      $element.on("keydown.psls", handleInputNavigation);
      $element.on("input.psls", handleInput);

      function handleInputNavigation(e) {
        switch (e.key) {
          case 'ArrowDown':
          case 'Down':
            e.preventDefault();
            if ($items.length > 0) {
              currentIndex = 0;
              $items.eq(currentIndex).attr('tabindex', '0').focus();
            }
            break;
          case 'ArrowUp':
          case 'Up':
            e.preventDefault();
            if ($items.length > 0) {
              currentIndex = $items.length - 1;
              $items.eq(currentIndex).attr('tabindex', '0').focus();
            }
            break;
          case 'Escape':
          case 'Esc':
            e.preventDefault();
            element.closeDropdown();
            break;
        }
      }

      function handleDropdownNavigation(e) {
        switch (e.key) {
          case 'ArrowDown':
          case 'Down':
            e.preventDefault();
            if (currentIndex < $items.length - 1) {
              currentIndex++;
              $items.eq(currentIndex).attr('tabindex', '0').focus();
            } else {
              element.focusToInput();
            }
            break;
          case 'ArrowUp':
          case 'Up':
            e.preventDefault();
            if (currentIndex > 0) {
              currentIndex--;
              $items.eq(currentIndex).attr('tabindex', '0').focus();
            } else {
              element.focusToInput();
            }
            break;
          case 'Enter':
            e.preventDefault();
            if (currentIndex > -1) {
              $items.eq(currentIndex)[0].click();
            }
            break;
        }
      }

      function handleInput() {
        if ($element.val().length < element.options.input_min_chars) {
          element.closeDropdown();
          return;
        }
        clearTimeout(debounceTimer);
        debounceTimer = setTimeout(element.request, element.options.input_delay);
      }

      // Plugin methods
      element.focusToInput = function () {
        currentIndex = -1;
        canRunFocus = false;
        $element.trigger('focus');
        setTimeout(() => canRunFocus = true, 100);
      };

      element.closeDropdown = function () {
        $dropdown.removeClass("show");
        $element.attr("aria-expanded", "false");
      };

      element.showDropdown = function () {
        $dropdown.html('<li><span class="ps-live-search-item-loading"><i class="fa-solid fa-circle-notch fa-spin"></i></span></li>');
        $dropdown.addClass("show");
        $element.attr("aria-expanded", "true");
        currentIndex = -1;
      };

      element.request = function () {
        var query = $element.val();
        if (query.length > 0 && typeof element.source === 'function') {
          element.showDropdown();
          element.source(query, $.proxy(element.response, element));
        }
      };

      element.response = function (json) {
        var html = "";
        var url_more = $('base').attr('href') + 'index.php?route=product/search&language=' +
          $dropdown.attr('data-lang') + '&search=' + encodeURIComponent(json.query);

        html += '<li><span class="ps-live-search-subheader">' + this.translations.text_showing_results + '</span></li>';

        if (json.products.status) {
          html += '<li><h3 class="ps-live-search-header">' + this.translations.heading_products + '</h3></li>';

          if (json.products.data.length > 0) {
            for (var product of json.products.data) {
              html += '<li><a href="' + product.href + '" class="ps-live-search-item">';
              if (product.thumb) {
                html += '<img class="thumb" src="' + product.thumb + '" alt="' + product.name + '" width="' + product.thumb_width + '" height="' + product.thumb_height + '">';
              }
              html += '<span class="info"><strong class="name">' + product.name + '</strong>';
              if (product.description) {
                html += '<span class="description">' + product.description + '</span>';
              }
              html += '</span>';
              if (json.products.show_price) {
                html += '<span class="prices">';
                if (!product.special) {
                  html += '<span class="price-new">' + product.price + '</span>';
                } else {
                  html += '<span class="price-old">' + product.price + '</span>';
                  html += '<span class="price-new">' + product.special + '</span>';
                }
                if (product.tax) {
                  html += '<span class="price-tax">' + product.tax + '</span>';
                }
                html += '</span>';
              }
              html += '</a></li>';
            }
          } else {
            html += '<li><span class="ps-live-search-item-text">' + this.translations.text_no_results + '</span></li>';
          }
        }

        if (json.products.status) {
          if (json.products.data.length > 0) {
            html += '<li><a href="' + url_more + '" class="ps-live-search-more">' + this.translations.text_all_product_results + ' <i class="fa-solid fa-caret-down"></i></a></li>';
          } else {
            html += '<li><span class="ps-live-search-more">' + this.translations.text_all_product_results + ' <i class="fa-solid fa-caret-down"></i></span></li>';
          }
        }

        $dropdown.html(html);

        $dropdown.find('.ps-live-search-subheader > output').text(json.query);

        $items = $dropdown.find(".ps-live-search-item");

        $items.attr('tabindex', '-1');
      };
    });
  };
})(jQuery);
