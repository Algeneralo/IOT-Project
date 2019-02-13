<script>
    //get the id for clicked device
    $(".edit").on('click', function (e) {
        let deviceId = $(this).closest('tr').find(".id").val();
        editDeviceData(deviceId);
    });

    //get all data for profile to edit
    function editDeviceData(id) {
        $.ajax({
            url: '/devices/' + id + "/edit",
            type: 'GET',
            data: {
                _token: "{{csrf_token()}}",
            },
            dataType: 'JSON',
            success: function (data) {
                $("#editModal .block-content").html(data);
                $("#editModal").modal('toggle');
            }, error: function (error) {
                alert('Error!')
            }
        });
    }
</script>
