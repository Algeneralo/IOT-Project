<script>
    $('.duration-picker').durationPicker();

    $(".deleteForm button").on("click", function (e) {
        e.preventDefault();
        if (confirm('Do you want to Delete?')) {
            $(this).parent().submit();
        }
    });
</script>
