$('#sb').on('change', function () {
    var nilai = $(this).val();
    var get_id = $(this).attr('id');
    if ($(this).val() == nilai) {
        $('.' + nilai).css("display", "inline-block");
        $("#" + get_id)[0].selectedIndex = 0;
    }
});

$('.filter .input-group:not(:first-child) span').click(function () {
    if ($(this).parent().next('select').attr('id')) {
        var sel_id = $(this).parent().next('select').attr('id');
        $("#" + sel_id)[0].selectedIndex = 0;
        $(this).parent().parent().css("display", "none");
        dtabel.fnClearTable();
    } else {
        if ($(this).parent().next('input[type=date]').attr('id')) {
            $("input[type=date]").val("");
            $(this).parent().parent().css("display", "none");
            dtabel.fnClearTable();
        } else {
            $("input[type=text]").val("");
            $(this).parent().parent().css("display", "none");
            dtabel.fnClearTable();
        }
    }
});

$('.filter .input-group:not(:first-child) span').parent().next().click(function () {
    var id_input = $(this).attr('id');
    $('#' + id_input).change(function () {
        dtabel.fnClearTable();
    });
});

$('.btn-maximize').click(function () {
    setTimeout(
        function () {
            dtabel.fnClearTable();
        }, 150
    );
});