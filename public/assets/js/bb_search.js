
$(function () {
    $(document).on('keyup','#searchByName',function(){
        let name = $('#searchByName').val();
        if(name !=''){
            //alert(name);
            let url = $(this).attr('cus-url');
            let status = $(this).attr('cus-status');
           // alert(status);
            $.ajax({
                url:url,
                data:{
                    name:name,
                    status:status,
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
            let status = $(this).attr('cus-status');
            //alert(status);
            $.ajax({
                url:url,
                data:{
                    name:name,
                    status:status,
                },
                type: 'get',
                dataType: "json",
                success: function (response) {
                    $('#searchData').html(response.result);
                }
            });
        }
    });
    $(document).on('keyup','#searchByPhone',function(){
        let name = $('#searchByPhone').val();
        if(name !=''){
            //alert(name);
            let url = $(this).attr('cus-url2');
            //alert(url);
            let status = $(this).attr('cus-status');
            //alert(status);
            $.ajax({
                url:url,
                data:{
                    name:name,
                    status:status,
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
