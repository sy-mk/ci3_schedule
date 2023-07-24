/* class .tgl datepicker */
$('.btn-tgl').on('click', function () {
    if ($(this).parent().next().attr('disabled') == 'disabled') {
        return false;
    } else {
        $(this).parent().next().focus();
    }
})

if (jQuery().daterangepicker) {
    if ($(".tgl").length) {
        $('.tgl').daterangepicker({
            autoUpdateInput: false,
            locale: {
                format: 'YYYY-MM-DD',
                cancelLabel: 'Clear'
            },
            singleDatePicker: true,
            showDropdowns: true,
        });

        $('.tgl').on('apply.daterangepicker', function (ev, picker) {
            $(this).val(picker.startDate.format('YYYY-MM-DD'));
            dtabel.fnClearTable();
        });

        $('.tgl').on('cancel.daterangepicker', function (ev, picker) {
            $(this).val('');
            dtabel.fnClearTable();
        });
    }
}
/* class .tgl datepicker End */

/* custom datatable */

$('body').on('click', '.del-btn', function (e) {
    let val = $(this).attr('href');
    confirmDeletion(val);
    return false;
});

/* custom datatable */