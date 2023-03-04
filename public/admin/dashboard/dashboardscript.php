<script type="text/javascript">
	$(function(){
		date_time();
		dsplyFname();
		dsplytotalnurses();
		dsplytotalpatients();
		dsplytotalappointments();
	});

	function date_time(){
	    date = new Date(getcurrentdatetime());
	    year = date.getFullYear();
	    month = date.getMonth();
	    months = new Array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
	    d = date.getDate();
	    day = date.getDay();
	    days = new Array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
	    h = date.getHours();
	    ampm = h >= 12 ? 'PM' : 'AM';
	    if(h<10)
	    {
	            h = "0"+h;
	    }
	    m = date.getMinutes();
	    if(m<10)
	    {
	            m = "0"+m;
	    }
	    s = date.getSeconds();
	    if(s<10)
	    {
	            s = "0"+s;
	    }
	    result = ''+days[day]+', '+months[month]+' '+d+', '+year+' &nbsp;&nbsp;&nbsp;'+h+':'+m+':'+s + ' '+ampm+' ';

	    $("#txtdatex").html(result);
	    setTimeout(function(){ date_time(); }, 1000);
	    return true;
	}

	function getcurrentdatetime(){
	    var vals = ""
	    $.ajax({
	        type : 'POST',
	        url :  'dashboard/dashboardclass.php',
	        data : "form=currenttime",
	        async:false,
	        beforeSend:function(){    
	               
	        },
	        success : function(data){
	            vals = data;
	        }
	    });
	    return vals;
	}

	function dsplyFname() {
		$.ajax ({
			type: 'POST',
			url: 'dashboard/dashboardclass.php',
			data: 'form=dsplyFname' ,
			success: function(data) {
				$("#txtuserFname").text(data);
			}
		})
	}

	function dsplytotalnurses() {
		$.ajax ({
			type: 'POST',
			url: 'dashboard/dashboardclass.php',
			data: 'form=dsplytotalnurses' ,
			success: function(data) {
				$("#txtTotnurses").text(data);
			}
		})
	}

	function dsplytotalpatients() {
		$.ajax ({
			type: 'POST',
			url: 'dashboard/dashboardclass.php',
			data: 'form=dsplytotalpatients' ,
			success: function(data) {
				$("#txtTotpatients").text(data);
			}
		})
	}

	function dsplytotalappointments() {
		$.ajax ({
			type: 'POST',
			url: 'dashboard/dashboardclass.php',
			data: 'form=dsplytotalappointments' ,
			success: function(data) {
				$("#txtTotappointments").text(data);
			}
		})
	}
</script>