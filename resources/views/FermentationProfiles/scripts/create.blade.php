<script>
    $(".addStage").on("click", function () {
        let div = $(this).parent().clone();
        div.find("button").removeClass("btn-primary").addClass("btn-danger");
        div.find('i').removeClass("fa-plus").addClass("fa-trash");
        div.find('button').removeClass("addStage").addClass("removeStage");
        $('.stages').append(div);
    });
    $(".stages").on('click', ".removeStage", function () {
        $(this).parent().remove();
    });
</script>