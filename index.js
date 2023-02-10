$(document).ready(function() {


    $(".model").hide();
    $(".model1").show();
    let lastId = 'model1';
    $(".model-name li").click(function() {
        let id = $(this).attr('id');
        if (id != lastId) {
            $(`.${lastId}`).hide();
        }
        lastId = id;
        $('.' + id).show();
    });

})