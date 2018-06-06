var favorite=[];
var education=[];
function search(type,val)
{
    if(type==1){
if(favorite.indexOf(val) == -1) {
    favorite.push(val);
}
else {
    favorite = favorite.filter(e => e !== val);
}
}
else if(type==2){
if(education.indexOf(val) == -1) {
    education.push(val);
}
else {
    education = education.filter(e => e !== val);
}
}
console.log(favorite);
console.log(education);
$('#search_new').empty();
$.ajax({type: "POST",url: "<?php echo base_url(); ?>search/search_new",data:{favorite:favorite,education:education}, success: function(result){
              console.log(result);
             $('#search_new').html(result);             
         }
     });
}