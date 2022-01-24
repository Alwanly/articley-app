$(document).ready(function () {
    $('#modal-edit').on('show.bs.modal', function (e) {

        //get data-id attribute of the clicked element
        var category = $(e.relatedTarget).data('category');
        console.log(category);

        //populate the textbox
        $(e.currentTarget).find('input[name="id"]').val(category.id);
        $(e.currentTarget).find('input[name="category"]').val(category.category);
    });
})
