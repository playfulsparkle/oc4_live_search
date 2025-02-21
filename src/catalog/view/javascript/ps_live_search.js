+(function ($) {
  $.fn.pslivesearch = function (option) {
    return this.each(function () {
      var element = this;
      var $dropdown = $("#" + $(element).attr("data-live-search-target"));
      var debounceTimer;
      var currentIndex = -1;
      var items = [];
      var canRunFocus = true;

      $.extend(this, option);

      $(element).attr({
        "aria-autocomplete": "list",
        "aria-expanded": "false",
        "aria-owns": $(element).attr("data-live-search-target"),
        role: "combobox"
      });

      $(element).on("focusin", function () {
        if (canRunFocus) {
          element.request();
        }
      });

      $(element).on("focusout", function (e) {
        if (!$dropdown.has(e.relatedTarget).length && e.relatedTarget !== element) {
          element.closeDropdown();
        }
      });

      $(document).on('keydown', '.ps-live-search-item', function (e) {
        if (items.length) {
          items.attr('tabindex', '-1');
        }

        switch (e.key) {
          case 'ArrowDown':
          case 'Down':
            if (currentIndex < items.length - 1) {
              currentIndex += 1;
              items.eq(currentIndex).attr('tabindex', '0').focus();
            } else {
              element.focusToInput();
            }
            e.preventDefault();
            break;
          case 'Escape':
          case 'Esc':
            e.preventDefault();
            element.closeDropdown();
            break;
          case 'Up':
          case 'ArrowUp':
            if (currentIndex > 0) {
              currentIndex -= 1;
              items.eq(currentIndex).attr('tabindex', '0').focus();
            } else {
              element.focusToInput();
            }
            e.preventDefault();
            break;
          default:
            break;
        }
      });

      $(element).on("keydown", function (e) {
        if (items.length) {
          items.attr('tabindex', '-1');
        }

        switch (e.key) {
          case 'ArrowDown':
          case 'Down':
            currentIndex = 0;
            items.eq(currentIndex).attr('tabindex', '0').focus();
            e.preventDefault();
            break;
          case 'Escape':
          case 'Esc':
            e.preventDefault();
            element.closeDropdown();
            break;
          case 'Up':
          case 'ArrowUp':
            currentIndex = items.length - 1;
            items.eq(currentIndex).attr('tabindex', '0').focus();
            e.preventDefault();
            break;
          default:
            break;
        }
      });

      $(element).on("input", function (e) {
        if ($(element).val().length < this.options.input_min_chars) return;
        clearTimeout(debounceTimer);
        debounceTimer = setTimeout(function () { element.request(); }, this.options.input_delay);
      });

      this.focusToInput = function () {
        currentIndex = -1;
        canRunFocus = false;
        $(element).focus();
        canRunFocus = true;
      };

      this.closeDropdown = function () {
        $dropdown.removeClass("show");
        $(element).attr("aria-expanded", "false");
        canRunFocus = true;
      };

      this.showDropdown = function () {
        $dropdown.html('<li><span class="ps-live-search-item-loading"><i class="fa-solid fa-circle-notch fa-spin"></i></span></li>');
        $dropdown.addClass("show");
        $(element).attr("aria-expanded", "true");
        currentIndex = -1;
      };

      this.request = function () {
        var query = $(element).val();

        if (query.length > 0) {
          element.showDropdown();

          this.source(query, $.proxy(this.response, this));
        }
      };

      this.response = function (json) {
        var html = "";
        var url_more = $('base').attr('href') + 'index.php?route=product/search&language=' + $dropdown.attr('data-lang') + '&search=' + encodeURIComponent(json.query);

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
              html += '</span><span class="prices">';
              if (!product.special) {
                html += '<span class="price-new">' + product.price + '</span>';
              } else {
                html += '<span class="price-old">' + product.price + '</span>';
                html += '<span class="price-new">' + product.special + '</span>';
              }
              html += '<span class="price-tax">' + product.tax + '</span></span></a></li>';
            }
          } else {
            html += '<li><span class="ps-live-search-item-text">' + this.translations.text_no_results + '</span></li>';
          }
        }

        if (json.products.status && json.products.data.length > 0) {
          html += '<li><a href="' + url_more + '" class="ps-live-search-more">' + this.translations.text_all_product_results + ' <i class="fa-solid fa-caret-down"></i></a></li>';
        } else {
          html += '<li><span class="ps-live-search-more">' + this.translations.text_all_product_results + ' <i class="fa-solid fa-caret-down"></i></span></li>';
        }

        $dropdown.html(html);

        $('#ps-live-search-query').text(json.query);

        items = $dropdown.find(".ps-live-search-item");
      };
    });
  };
})(jQuery);
