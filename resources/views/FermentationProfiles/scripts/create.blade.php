<script>
    $(".addStage").on("click", function () {
        //clone the default stage row
        let div = $(this).parent().clone();
        //change the button to delete btn
        div.find("button").removeClass("btn-primary").addClass("btn-danger");
        div.find('i').removeClass("fa-plus").addClass("fa-trash");
        div.find('button').removeClass("addStage").addClass("removeStage");
        //delete the previous durationPicker
        $(div).find(".bdp-input").remove();
        //empty all inputs
        $(div).find("input").each(function (input) {
            $(this).val("");
        });
        //add the new row to stages rows
        $('.stages').append(div);
        //activate duration picker to new stage
        $(div).find('.duration-picker').durationPicker({
            // defines whether to show seconds or not
            showSeconds: false,
            // defines whether to show days or not
            showDays: true,

            // callback function that triggers every time duration is changed
            //   value - duration in seconds
            //   isInitializing - bool value
            onChanged: function (value, isInitializing) {

                // isInitializing will be `true` when the plugin is initialized for the
                // first time or when it's re-initialized by calling `setValue` method
                console.log(value, isInitializing);
            }
        });
    });
    $(".stages").on('click', ".removeStage", function () {
        $(this).parent().remove();
    });
</script>
