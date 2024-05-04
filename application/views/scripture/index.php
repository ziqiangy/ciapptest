<div>
<label for="volume">Volume</label>
<select name="volume" id="volume"></select>
<label for="book">Book</label>
<select name="book" id="book"></select>
<label for="chapter">Chapter</label>
<select name="chapter" id="chapter"></select>
<label for="verse">From Verse</label>
<select name="verse" id="verse"></select>
<label for="to-verse">To Verse</label>
<select name="to-verse" id="to-verse"></select>

<input id="s_v_btn" type="submit" value="search verse">


</div>


<div id="verse_output">

</div>


<script type=" text/javascript" src="/js/jquery-3.7.1.min.js"></script>


<script type="text/javascript">
    $('#volume').empty();

    $.ajax({
        type: "get",
        url: '<?php echo base_url(); ?>index.php/scriptures/search_v_json',

        success: function(data) {
            $("#volume").append('<option value=""></option>');
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
            url: "<?php echo base_url(); ?>index.php/scriptures/search_b_json",
            data: {
                "id": id
            },
            success: function(data) {
                $('#book').empty();
                $('#chapter').empty();
                $('#verse').empty();
                $("#book").append('<option value=""></option>');
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
            url: "<?php echo base_url(); ?>index.php/scriptures/search_c_json",
            data: {
                "id": id
            },
            success: function(data) {
                $('#chapter').empty();
                $('#verse').empty();
$("#chapter").append('<option value=""></option>');
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
            url: "<?php echo base_url(); ?>index.php/scriptures/search_ve_json",
            data: {
                "id": id
            },
            success: function(data) {
                $('#verse').empty();
                $("#verse").append('<option value=""></option>');
                data.forEach((e) => {
                    var row = e;
                    $("#verse").append('<option value="' + row.id +'" verse_number="'+row.verse_number+ '">' + row
                        .verse_number +
                        '</option>');
                })
            },
            error: function(data) {

            }
        });
    });

        $("#verse").bind("change", function() {
        var id = $("#chapter").find("option:selected").attr("value");
        
        $.ajax({
            type: "post",
            url: "<?php echo base_url(); ?>index.php/scriptures/search_ve_json",
            data: {
                "id": id
            },
            success: function(data) {
                $("#to-verse").empty();
                $("#to_verse").append('<option value=""></option>');
                var start_v_num = $("#verse").find("option:selected").attr("verse_number");
                console.log(data);
                data.forEach((e) => {
                    if(Number(e.verse_number)>=Number(start_v_num)){


                        // console.log(e.verse_number);
                        $("#to-verse").append('<option value="' + e.id +'" verse_number="'+e.verse_number+ '">' + e.verse_number +'</option>');
                    }
                    })
            
            },
            error: function(data) {

            }
        });
    });

    $("#s_v_btn").click(function(){
        var vid = $("#verse").find("option:selected").attr("value");
        var cid = $("#chapter").find("option:selected").attr("value");
        var v_to_id = $("#to-verse").find("option:selected").attr("verse_number");
        var v_from_id = $("#verse").find("option:selected").attr("verse_number");
        $.ajax({
            type: "post",
            url: "<?php echo base_url(); ?>index.php/scriptures/search_verse_api",
            data: {
                "vid": vid,
                "cid": cid,
                "from_num":v_from_id,
                "to_num":v_to_id
            },
            success: function(data) {
                $('#verse_output').empty();
                if(data.length==1){
                [data] = data;
                $("#verse_output").append("<p>"+data.verse_number +". "+data.scripture_text+"</p>");
                }else if(data.length>1){
                    data.forEach((item)=>{
                        $("#verse_output").append("<p>"+item.verse_number+". "+item.scripture_text+"</p>");
                    })
                }
            },
            error: function(data) {

            }
        });

    })
</script>