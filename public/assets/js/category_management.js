$(function () {

    $(".change-category").submit(function (e) {
        e.preventDefault();

        var form = $(this);
        var url = form.attr("action");
        var data = form.serialize();

        $.ajax({
            url: url,
            method: "PUT",
            data: {
                data,
                _token: $("form input[name='_token']").val(),
            },
            "success": function (odgovor) {
                console.log(odgovor);
                form.parent().parent().find(".category-name").text(odgovor["changed_category"]);
                form.find("input[name='category_name']").val("");
            },
            "error": function (odgovor) {
                console.log(odgovor);
            }
        });
    });


    $(".brisanje-kategorije").submit(function (e) {
        e.preventDefault();

        var form = $(this);
        var url = form.attr("action");
        var method = form.attr("method");

        $.ajax({
            url: url,
            method: method,
            data: {
                _token: form.children("input[name='_token']").val(),
                _method: form.children("input[name='_method']").val(),
            },
            "success": function (odgovor) {
                form.parent().parent().remove();
            },
            "error": function (odgovor) {
                console.log(odgovor);
            }
        });
    });


});
