<div>
<label for="volume"></label>
<select name="volume" id="volume"></select>
<label for="book"></label>
<select name="book" id="book"></select>
<label for="chapter"></label>
<select name="chapter" id="chapter"></select>
<label for="verse"></label>
<select name="verse" id="verse"></select>

<input id="s_v_btn" type="submit" value="search verse">


</div>


<div id="verse_output">

</div>


<script type=" text/javascript" src="/js/jquery-3.7.1.min.js"></script>


<script type="text/javascript">
    $('#volume').empty();

    $.ajax({
        type: "get",
        url: 'http://ciapptest/index.php/scriptures/search_v_json',

        success: function(data) {
            $("#volume").append('<option value="0"></option>');
            data.forEach((item, index, arr) => {
                var row = item;
                $("#volume").append('<option value="' + row.id + '">' + row.volume_title +
                    '</option>');
            });


        }

    });


    $("#volume").bind("change", function() {
        var id = $(this).find("option:selected").attr("value");
        $.ajax({
            type: "post",
            url: "http://ciapptest/index.php/scriptures/search_b_json",
            data: {
                "id": id
            },
            success: function(data) {
                $('#book').empty();
                $('#chapter').empty();
                $('#verse').empty();
                data.forEach((e) => {
                    var row = e;
                    $("#book").append('<option value="' + row.id + '">' + row.book_title +
                        '</option>');
                })
            },
            error: function(data) {

            }
        });
    });

    $("#book").bind("change", function() {
        var id = $(this).find("option:selected").attr("value");
        $.ajax({
            type: "post",
            url: "http://ciapptest/index.php/scriptures/search_c_json",
            data: {
                "id": id
            },
            success: function(data) {
                $('#chapter').empty();
                $('#verse').empty();
                data.forEach((e) => {
                    var row = e;
                    $("#chapter").append('<option value="' + row.id + '">' + row
                        .chapter_number +
                        '</option>');
                })
            },
            error: function(data) {

            }
        });
    });

    $("#chapter").bind("change", function() {
        var id = $(this).find("option:selected").attr("value");
        $.ajax({
            type: "post",
            url: "http://ciapptest/index.php/scriptures/search_ve_json",
            data: {
                "id": id
            },
            success: function(data) {
                $('#verse').empty();
                data.forEach((e) => {
                    var row = e;
                    $("#verse").append('<option value="' + row.id + '">' + row
                        .verse_number +
                        '</option>');
                })
            },
            error: function(data) {

            }
        });
    });

    $("#s_v_btn").click(function(){
        var vid = $("#verse").find("option:selected").attr("value");
        $.ajax({
            type: "post",
            url: "http://ciapptest/index.php/scriptures/search_verse_api",
            data: {
                "id": vid
            },
            success: function(data) {
                [data]=data;
                $("#verse_output").append("<p>"+data.scripture_text+"</p>");
            },
            error: function(data) {

            }
        });

    })
</script>