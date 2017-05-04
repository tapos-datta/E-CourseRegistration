/**
 * Created by Tapos on 2/3/2017.
 */
function toggleDiv(divId) {
    $("#"+divId).toggle();
    $('.toggle').not($("#"+divId)).hide();
}
$('#div11,#div12,#div21,#div22,#div31,#div32,#div41,#div42').hide();


function toggleClass(el){
    if(el.className == "glyphicon glyphicon-plus"){
        el.className = "glyphicon glyphicon-minus";
    } else {
        el.className = "glyphicon glyphicon-plus";
    }
}