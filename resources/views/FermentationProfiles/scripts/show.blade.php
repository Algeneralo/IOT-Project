<script>
    $(".more").on('click', function (e) {
        console.log("222");
        let profileId = $(this).closest('tr').find(".id").val();
        getProfileData(profileId);
    });

    function getProfileData(id) {
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