
$(function () {
    $(document).on('keyup','#searchByName',function(){
        let name = $('#searchByName').val();
        if(name !=''){
            //alert(name);
            let url = $(this).attr('cus-url');
            $.ajax({
                url:url,
                data:{
                    name:name,
                },
                type: 'get',
                dataType: "json",
                success: function (response) {
                    $('#searchData').html(response.result);
                }
            });
        }
    });
    $(document).on('keyup','#searchByReg',function(){
        let name = $('#searchByReg').val();
        if(name !=''){
            //alert(name);
            let url = $(this).attr('cus-url1');
            $.ajax({
                url:url,
                data:{
                    name:name,
                },
                type: 'get',
                dataType: "json",
                success: function (response) {
                    $('#searchData').html(response.result);
                }
            });
        }
    });
});
