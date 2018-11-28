$(document).ready(function () {

    $('.dragFileUpload input').on('change', function (e) {
        console.log('change!');
        $(e.target).parent().removeClass('hover');
        $(e.target).parent().addClass('filled');

        $(".prototype-block").remove();
        $(this).closest("#form").submit();
    });
    $('.dragFileUpload input').on('dragover', function (e) {
        console.log('dragover');
        $(e.target).parent().addClass('hover');
    });
    $('.dragFileUpload input').on('dragleave', function (e) {
        console.log('dragleave');
        $(e.target).parent().removeClass('hover');
    });

    $(document).on('click', ".deletePrototype", function () {
        var del_id = $(this).attr('id');
        var rowElement = $(this).parent().parent();

        $.ajax({
            type: 'POST',
            url: 'inc/delete.php',
            data: { delete_id: del_id },
            success: function (data) {
                rowElement.fadeOut(500).remove();
            }
        });
    });

    var bar = $('.bar');
    var percent = $('.percent');
    var status = $('#status');

    $("#form").ajaxForm({
        beforeSend: function () {
            status.empty();
            var percentVal = '0%';
            bar.width(percentVal);
            percent.html(percentVal);
        },
        uploadProgress: function (event, position, total, percentComplete) {
            var percentVal = percentComplete + '%';
            bar.width(percentVal);
            percent.html(percentVal);
        },
        success: function (data, statusText, xhr) {
            var percentVal = '100%';
            bar.width(percentVal);
            percent.html(percentVal);
            status.html(xhr.responseText);
        },
        error: function (xhr, statusText, err) {
            status.html(err || statusText);
        }
    });

    $("#form").submit(function (event) {

        $(".form-group").removeClass("has-error");
        $(".help-block").remove();

        $.ajax({
            url: 'inc/upload.php',
            type: 'POST',
            contentType: false,
            processData: false,
            data: new FormData($('#form')[0]),
            dataType: 'json'
        })

            .done(function (data) {

                if (!data.success) {

                    if (data.errors.prototype) {
                        $("#prototype-group").addClass('has-error');
                        $("#prototype-group").append('<div class="help-block">' + data.errors.prototype + '</div>');
                    }

                    if (data.errors.category) {
                        $("#category-group").addClass('has-error');
                        $("#category-group").append('<div class="help-block">' + data.errors.category + '</div>');
                    }

                    if (data.errors.fileImage) {
                        $("#fileimage-group").addClass('has-error');
                        $("#fileimage-group").append('<div class="help-block">' + data.errors.fileImage + '</div>');
                    }

                } else {
                    //$("form").append('<div class="alert alert-success">' + data.successMessage + '</div>');
                    var currentURL = document.URL.substr(0,document.URL.lastIndexOf('/'));

                    if (data.prototypeVersion === "0") {
                        
                        $("form").append('<div class="prototype-block alert">Prototype URL <br /> <a href="'+ currentURL + '/' + data.prototypeURL + '">'+ currentURL + '/' + data.prototypeURL + '</a></div>');
                    } else {
                        $("form").append('<div class="prototype-block alert">Prototype URL <br /> <a href="' + currentURL + '/' + data.prototypeURL + '-v' + data.prototypeVersion + '">'+ currentURL + '/' + data.prototypeURL + '-v' + data.prototypeVersion + '</a></div>');
                    }

                    $("#listPrototypes").load("inc/data.php", { 'action': 'update' });
                }

                console.log(data);
            });
        event.preventDefault();



    });

});
