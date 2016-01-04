/**
 * Fungsi untuk melakukan inline edit
 * @return {void}
 */
function inline_edit(){

    var is_finish;

    $('.btn-edit').on('click',function(){

        is_finish = null;

        // Toggle edit button group
        $(this).parent().addClass('hidden');
        $(this).parent().siblings('.btn-group-edit').removeClass('hidden');

        // Jika tombol edit belum telah diklik
        if (!$(this).hasClass('edit-active')) {

            // Menentukan notasi is_finish N atau Y
            if (!(is_finish)) {

                var prepare_is_finish = $(this).parents('td').siblings('.is-finish').children('span').html();

                if (prepare_is_finish == 'Not yet') {

                    is_finish = 'N';
                }
                else{

                    is_finish = 'Y';
                };
            };

            // menandakan tombol edit telah dikilk
            $(this).parents('td').find('.btn-edit').addClass('edit-active');

            // mengganti text menjadi input
            $(this).parents('td').siblings('.task-end').children('span').addClass('hidden');
            $(this).parents('td').siblings('.task-end').find('div').removeClass('hidden');

            $(this).parents('td').siblings('.task-start').children('span').addClass('hidden');
            $(this).parents('td').siblings('.task-start').find('div').removeClass('hidden');

            $(this).parents('td').siblings('.task-name').children('span').addClass('hidden');
            $(this).parents('td').siblings('.task-name').find('input').removeClass('hidden');

            $(this).parents('td').siblings('.is-finish').children('span').addClass('hidden');
            $(this).parents('td').siblings('.is-finish').find('select').removeClass('hidden');
            $(this).parents('td').siblings('.is-finish').find('select').val(is_finish);
        }
        else{

            // menandakan tombol edit belum diklik
            $(this).parents('td').find('.btn-edit').removeClass('edit-active');

            // mengganti input menjadi text
            $(this).parents('td').siblings('.task-end').children('span').removeClass('hidden');
            $(this).parents('td').siblings('.task-end').find('div').addClass('hidden');

            $(this).parents('td').siblings('.task-start').children('span').removeClass('hidden');
            $(this).parents('td').siblings('.task-start').find('div').addClass('hidden');

            $(this).parents('td').siblings('.task-name').children('span').removeClass('hidden');
            $(this).parents('td').siblings('.task-name').find('input').addClass('hidden');

            $(this).parents('td').siblings('.is-finish').children('span').removeClass('hidden');
            $(this).parents('td').siblings('.is-finish').find('select').addClass('hidden');

            is_finish  = null;
        };
    });
}
