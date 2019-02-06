<script>
    let stagesNumber = 0;
    //get the id for clicked profile
    $(".edit").on('click', function (e) {
        let profileId = $(this).closest('tr').find(".id").val();
        editProfileData(profileId);
    });

    //get all data for profile to edit
    function editProfileData(id) {
        $.ajax({
            url: '/ferments/' + id + "/edit",
            type: 'GET',
            data: {
                _token: "{{csrf_token()}}",
            },
            dataType: 'JSON',
            success: function (data) {
                $("#editModal .block-content").html(data);
                stagesNumber = $("#editModal .block-content .stage").length;
                $("#editModal").modal('toggle');
                $('#editModal .duration-picker').durationPicker();
            }, error: function (error) {
                console.log(error.responseJSON);
                alert('Error!')
            }
        });
    }

    $("#editModal").on("click", ".deleteStage", function () {
        let confirmed = confirm("are you sure you want to delete stage?",);
        if (confirmed) {
            if (stagesNumber != 1) {
                $(this).siblings("input[name='isDeleted[]']").val("1");
                $(this).parent().hide();
                stagesNumber--;
            } else {
                alert("You can't delete all stages!")
            }
        }

    });
</script>
