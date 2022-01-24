require('select2');
$('.select2').select2({
    maximumSelectionLength: 2,
    placeholder: 'Select Max 2',
    allowClear: true
});
$('.select2-b4').select2({
    theme: 'bootstrap4'
});
$('.select2-classic').select2({
    theme: "classic"
});
