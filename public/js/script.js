function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $("#divUpload").html('<img class="img img-responsive img-rounded " style="margin: 0 auto;" onclick="removeImage(this)" id="uploaded_image"/>');
            $('#uploaded_image').attr('src', e.target.result).width(150).height(200).addClass('animated bounceInUp');

        };

        reader.readAsDataURL(input.files[0]);
    }
}

function removeImage(id) {
    $("#image").val('');

    $(id).addClass('animated bounceOutDown');
    setTimeout(function () {
        $(id).remove();
    },500);
}

$(function(){
    $(".messageFlash").delay(5000).slideUp('slow');

    $("#financeTable tbody tr td").each(function(){
        if($(this).text()=='' || $(this).text()==' '){
            $(this).text(0);
        }
    });
// var total = $("#totalCart").val();
//     $(".cartItemsInput").on('change',function(){
//         var current = parseFloat($(this).attr('item_price'));
//         var val = parseFloat($(this).val());
//
//         var equal = parseFloat(current*val + total).toFixed(2);
//
//         $("#totalCart").text(equal);
//     });
});
