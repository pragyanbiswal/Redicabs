function selectBrand(){
    var x=document.getElementById("vehicles").value;
    $.ajax({
        url:"show.php",
        method:"POST",
        data:{
            id:x
        },
        success:function(data){
            $("ans").html(data);
        }

    })   
}
