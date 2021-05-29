/*
<a href="posts/2" data-method="delete"> <---- We want to send an HTTP DELETE request

- Or, request confirmation in the process -

<a href="posts/2" data-method="delete" data-confirm="Are you sure?">
*/

(function() {
  var laravel = {
    initialize: function() {
      this.methodLinks = $("a[data-method]");
      this.registerEvents();
    },

    registerEvents: function() {
      this.methodLinks.on("click", this.handleMethod);
    },

    handleMethod: function(e) {
      var link = $(this);
      var httpMethod = link.data("method").toUpperCase();
      var form;

      // If the data-method attribute is not PUT or DELETE,
      // then we don't know what to do. Just ignore.
      if ($.inArray(httpMethod, ["GET", "PUT", "DELETE", "POST"]) === -1) {
        return;
      }

      e.preventDefault();

      if (httpMethod === "DELETE" || link.data("action")) {
        var action = link.data("action") || "hapus";
        var text = link.data("text") || `Data ini akan di${action}?`;

        swal
          .fire({
            title: "Anda yakin?",
            text: text,
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: `Ya, ${action}`,
            cancelButtonText: "Batal",
            heightAuto: false
          })
          .then(result => {
            if (result.value) {
              form = laravel.createForm(link);
              form.submit();
            }
          });
      } else if (httpMethod === "GET" || link.data("action")) {
        var action = link.data("action") || "proses";
        var text = link.data("text") || `Aksi ini akan di${action}?`;

        swal
          .fire({
            title: "Anda yakin?",
            text: text,
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: `Ya, ${action}`,
            cancelButtonText: "Batal",
            heightAuto: false
          })
          .then(result => {
            if (result.value) {
              form = laravel.createForm(link);
              form.submit();
            }
          });
      } else {
        form = laravel.createForm(link);
        form.submit();
      }
    },

    createForm: function(link) {
      var form = $("<form>", {
        method: "POST",
        action: link.attr("href")
      });

      var token = $("<input>", {
        type: "hidden",
        name: "_token",
        value: document.head.querySelector('meta[name="csrf-token"]').content
      });

      var hiddenInput = $("<input>", {
        name: "_method",
        type: "hidden",
        value: link.data("method")
      });

      return form.append(token, hiddenInput).appendTo("body");
    }
  };

  laravel.initialize();
})();
