$(document).ready(function () {
    $.fn.copySetsOnClick = function (x) {
        var currentEle = $(x.appendTo);
        var copyCount;
        var initialEex = false;

        function cloneEle() {
            if(initialEex) {
                var singleEle = currentEle.find(x.referenceEle);
                var cloneCopy = singleEle.eq(0).clone();
                $(x.appendTo).append(cloneCopy);
            }
            copyCount = currentEle.find(x.referenceEle).length;

            var newestClone = currentEle.find(x.referenceEle).eq(copyCount-1).find("input");
            if(x.clearInputs){
                newestClone.val("");
            }
            if(x.focusNew){
                newestClone.focus();
            }
            if(x.setIds){
                var inputCount = currentEle.find(x.referenceEle).eq(copyCount-1).find("input").length;
                for(var i=0; i<inputCount; i++){
                    var selecInput = currentEle.find(x.referenceEle).eq(copyCount-1).find("input").eq(i);
                    var inNameInitials = selecInput.attr("placeholder").substring(0,4);
                    //console.log(inNameInitials);
                    if(copyCount==2){
                        currentEle.find(x.referenceEle).eq(0).find("input").eq(i).attr("id", x.idInitials+"rec_"+0+"_"+i).attr("name", x.idInitials+"rec_"+inNameInitials+"[]")
                    }
                    selecInput.attr("id", x.idInitials+"rec_"+(copyCount-1)+"_"+i).attr("name", x.idInitials+"rec_"+inNameInitials+"[]");
                }
            }

            initialEex = true;
        }

        this.bind("click", cloneEle);
        cloneEle();
    }



    $(".addNewField").copySetsOnClick({
        referenceEle: ".multifields_dy",
        appendTo: ".list_item_set",
        clearInputs: true,
        focusNew: true,
        setIds: false,
        idInitials: ""
    });

    $(document).on("click", ".removeCurrenField",function () {
        var closestRecRow = $(this).closest(".multifields_dy, .multifields_double_dy"); //get clicked row element
        /*var current_index = closestRecRow.index(); // get row index
        var rowSetId  = closestRecRow.parent().attr("id"); //get parent ID to identify specific set of element

        var secRowCount = $("#"+rowSetId).find(".rec_row").length; //count number of elements in the set
        var inputIdInitials = $("#"+rowSetId).find("input").attr("id").substring(0,11);
        var rowCount = 0; //count rows on looping
        for(var i=0; i<secRowCount; i++){ //loop through rows
            if(!(i==current_index)){ // skip current current row
                var slectInputs = $("#"+rowSetId+" .rec_row").eq(i).find("input"); //select input elements in the single record row
                for(var j=0; j<slectInputs.length; j++){ //loop through inputs to rest ids into order
                    slectInputs.attr("id", inputIdInitials+rowCount+"_"+j);
                }
                rowCount++;
            }
        }*/
        closestRecRow.remove(); //remove current element from DOM


    });

    //on check box change
    $(document).on("change", ".damage-cat-animal", function () {
        if($(this).prop('checked')){
            $("#ear-tag-number").slideDown(200);
        }
        else{
            $("#ear-tag-number").slideUp(200);
        }
    });
});