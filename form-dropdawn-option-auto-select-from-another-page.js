<script>
document.addEventListener('DOMContentLoaded', function() {
    const params = new URLSearchParams(window.location.search);
    const service = params.get('service');

    if(service) {
        const field = document.querySelector('select[name="form_fields[field_036409c]"]');
        if(field) {
            field.value = service;
            field.dispatchEvent(new Event('change')); // Just to be safe
        }
    }
});

</script>
