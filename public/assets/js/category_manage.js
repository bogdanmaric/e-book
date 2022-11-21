$(function () {

    $(".promena-kategorije").submit(function (e) {
        e.preventDefault();

        var form = $(this);
        var url = form.attr("action");
        var method = form.attr("method");
        var data = form.serialize();

        $.ajax({
            url: url,
            method: method,
            data: {
                data,
                _token: $("form input[name='_token']").val(),
                _method: $("form input[name='_method']").val(),
            },
            "success": function (odgovor) {
                form.parent().parent().find("#naziv_kategorije").text(odgovor["promenjena_kategorija"]);
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
