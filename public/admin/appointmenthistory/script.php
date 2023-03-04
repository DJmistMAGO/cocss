<script type="text/javascript">
    $(function(){
        $(".fixTable").tableHeadFixer();

        $("#txtappointmentlistPageCount").val("1");
        $("#txtsearchappointment").keyup(function(e){
            if($('#txtsearchappointment').val() == ""){
                $("#txtappointmentlistPageCount").val("1");
                displayappointmenthislist();
            } else{
                $("#txtappointmentlistPageCount").val("1");
                displayappointmenthislist();
            }
        });
        displayappointmenthislist();
    });


    function displayappointmenthislist(){
        var srchprod = $("#txtsearchappointment").val();
        var page = $("#txtappointmentlistPageCount").val();
        $.ajax ({
            type: 'POST',
            url: 'appointmenthistory/class.php',
            data: 'srchprod=' + srchprod + '&page=' + page + '&form=displayappointmenthislist' ,
            success: function(data) {
                $("#tblappointmentlist").html(data);
                loadappointmenthislistPagination();
            }
        })
    }

    function loadappointmenthislistPagination() {
        var srchprod = $("#txtsearchappointment").val();
        var page = $("#txtappointmentlistPageCount").val();
        $.ajax({
            type: 'POST',
            url: 'appointmenthistory/class.php',
            data: 'srchprod=' + srchprod + '&page=' + page + '&form=loadappointmenthislistPagination',
            success: function(data){
                var arr = data.split("|");
                if(arr[1] != 1){
                    $("#upappointmentlistPageList").html(arr[0]);
                } else{
                    $("#upappointmentlistPageList").html("");
                }
            }
        })
    }

    function appointmenthislistPageFunc(page, pagenums) {
        $(".pgnumappointmenthislistPageFunc").removeClass("active");
        $("#pgappointmenthislistPageFunc" + pagenums).addClass("active");
        $("#txtappointmentlistPageCount").val(page);
        displayappointmenthislist();
    }

    function opencheckupdetmodal(date, time){
        $("#mdlcheckupdet").modal('show');
        $("#txtcheckupdate").text(date);
        $("#txtcheckuptime").text(time);
    }

    function openhealthmeddetmodal(healthissue, recommendation){
        $("#mdlhealthmeddet").modal('show');
        $("#txtviewhealthissue").text(healthissue);
        $("#txtviewrecommendation").text(recommendation);
    }
</script>