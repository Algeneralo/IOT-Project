<script>
    $(".more").on('click', function (e) {
        let profileId = $(this).closest('tr').find(".id").val();
        showProfileData(profileId);
    });

    function showProfileData(id) {
        $.ajax({
            url: '/ferments/' + id,
            type: 'GET',
            data: {
                _token: "{{csrf_token()}}",
            },
            dataType: 'JSON',
            success: function (data) {
                $("#show-profile .block-content").html(data);
                $("#show-profile").modal('toggle');
            }, error: function (error) {
                console.log(error.responseJSON);
                alert('Error!')
            }
        });
    }
</script>
