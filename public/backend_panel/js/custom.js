// loading animations

//$(document).ready(function() {
    function animIn_page() {
        $('body').find('.page_animation').each(function (i) {
            var row = $(this);
            setTimeout(function () {
                row.addClass("page_bottom");
            }, 100 * i);
        })
    }
    setTimeout(function () {
        animIn_page();
    }, 500);


//image 1 uploader
function readURL_1(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $(".img_prev_1").attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}

$(document).on("change", ".fileInput_1", function () {
    readURL_1(this);
});

//image 2 uploader
function readURL_2(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $(".img_prev_2").attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}

$(document).on("change", ".fileInput_2", function () {
    readURL_2(this);
});


/*//video uploader
function readURL_3(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $(".video_prev").attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}

$(document).on("change", ".video_input_1", function () {
    readURL_3(this);
});*/



$(document).on("click", ".img_UPLOAD_btn", function () {
    var findCloseInut = $(this).closest(".img_upload_sec").find(".file_in");
    findCloseInut.click();
})




//});

$(document).ready(function () {

    $(".enable-edit").on("click", function () {

        $(this).toggleClass("edit");
        if($(this).is(".edit")){
            $(this).closest(".crop-details").find(".disable-input").attr("disabled", false);
        }
        else{
            $(this).closest(".crop-details").find(".disable-input").attr("disabled", true);
        }
    });
});