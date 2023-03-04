<script type="text/javascript">
    $(function(){
        $(".fixTable").tableHeadFixer();

        $("#txtnurselogslistPageCount").val("1");
        $("#txtsearchnurselogs").keyup(function(e){
            if($('#txtsearchnurselogs').val() == ""){
                $("#txtnurselogslistPageCount").val("1");
                displaynurselogslist();
            } else{
                $("#txtnurselogslistPageCount").val("1");
                displaynurselogslist();
            }
        });
        displaynurselogslist();
    });


    function displaynurselogslist(){
        var srchprod = $("#txtsearchnurselogs").val();
        var page = $("#txtnurselogslistPageCount").val();
        $.ajax ({
            type: 'POST',
            url: 'nursesession/class.php',
            data: 'srchprod=' + srchprod + '&page=' + page + '&form=displaynurselogslist' ,
            success: function(data) {
                $("#tblnurselogslist").html(data);
                loadnurselogslistPagination();
            }
        })
    }

    function loadnurselogslistPagination() {
        var srchprod = $("#txtsearchnurselogs").val();
        var page = $("#txtnurselogslistPageCount").val();
        $.ajax({
            type: 'POST',
            url: 'nursesession/class.php',
            data: 'srchprod=' + srchprod + '&page=' + page + '&form=loadnurselogslistPagination',
            success: function(data){
                var arr = data.split("|");
                if(arr[1] != 1){
                    $("#upnurselogslistPageList").html(arr[0]);
                } else{
                    $("#upnurselogslistPageList").html("");
                }
            }
        })
    }

    function nurselogslistPageFunc(page, pagenums) {
        $(".pgnumnurselogslistPageFunc").removeClass("active");
        $("#pgnurselogslistPageFunc" + pagenums).addClass("active");
        $("#txtnurselogslistPageCount").val(page);
        displaynurselogslist();
    }
</script>