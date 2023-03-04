<script type="text/javascript">
    $(function(){
        $(".fixTable").tableHeadFixer();

        $("#txtpatientlogslistPageCount").val("1");
        $("#txtsearchpatientlogs").keyup(function(e){
            if($('#txtsearchpatientlogs').val() == ""){
                $("#txtpatientlogslistPageCount").val("1");
                displaypatientlogslist();
            } else{
                $("#txtpatientlogslistPageCount").val("1");
                displaypatientlogslist();
            }
        });
        displaypatientlogslist();
    });


    function displaypatientlogslist(){
        var srchprod = $("#txtsearchpatientlogs").val();
        var page = $("#txtpatientlogslistPageCount").val();
        $.ajax ({
            type: 'POST',
            url: 'patientsession/class.php',
            data: 'srchprod=' + srchprod + '&page=' + page + '&form=displaypatientlogslist' ,
            success: function(data) {
                $("#tblpatientlogslist").html(data);
                loadpatientlogslistPagination();
            }
        })
    }

    function loadpatientlogslistPagination() {
        var srchprod = $("#txtsearchpatientlogs").val();
        var page = $("#txtpatientlogslistPageCount").val();
        $.ajax({
            type: 'POST',
            url: 'patientsession/class.php',
            data: 'srchprod=' + srchprod + '&page=' + page + '&form=loadpatientlogslistPagination',
            success: function(data){
                var arr = data.split("|");
                if(arr[1] != 1){
                    $("#uppatientlogslistPageList").html(arr[0]);
                } else{
                    $("#uppatientlogslistPageList").html("");
                }
            }
        })
    }

    function patientlogslistPageFunc(page, pagenums) {
        $(".pgnumpatientlogslistPageFunc").removeClass("active");
        $("#pgpatientlogslistPageFunc" + pagenums).addClass("active");
        $("#txtpatientlogslistPageCount").val(page);
        displaypatientlogslist();
    }
</script>