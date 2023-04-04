<script type="text/javascript">
    $(function() {
        getLocation();
    });

    function closerec() {
        $.ajax({
            type: 'POST',
            url: 'home/class.php',
            data: 'form=closerec',
            success: function(data) {
                window.location = "index.php?url=" + data + "";
            }
        })
    }

    function getLocation() {
        var maps = new GMaps({
            el: '#map-box2',
            lat: 12.667016,
            lng: 123.881324,
            width: '100%',
            height: '20em',
        });

        maps.addMarker({
            lat: 12.667016,
            lng: 123.881324,
            title: 'Sorsogon State University - Bulan Campus Clinic'
        });

        if (navigator.geolocation) {} else {
            x.innerHTML = "Geolocation is not supported by this browser.";
        }
    }

    function gotologinpatientuser() {
        window.location = 'patient/';
    }

    function gotologinnurseuser() {
        window.location = 'nurse/';
    }

    function gotologinadminuser() {
        window.location = 'admin/';
    }

    function sendmessage() {
        var textcontactname = $("#txtcontactname").val();
        var textcontactemail = $("#txtcontactemail").val();
        var textcontactmessage = $("#txtcontactmessage").val();

        $(".preloader").show().css('background', 'rgba(255,255,255,0.5)');
        $.ajax({
            type: 'POST',
            url: 'home/class.php',
            data: 'textcontactname=' + textcontactname + '&textcontactemail=' + encodeURIComponent(
                    textcontactemail) + '&textcontactmessage=' + encodeURIComponent(textcontactmessage) +
                '&form=sendmessage',
            success: function(data) {
                setTimeout(function() {
                    $(".preloader").hide().css('background', '');
                    Swal.fire(
                        'Success!',
                        'Message Sent.',
                        'success'
                    )
                    clearmessage();
                }, 2000);
            }
        });
    }

    function clearmessage() {
        $("#txtcontactname").val("");
        $("#txtcontactemail").val("");
        $("#txtcontactmessage").val("");
    }
</script>
