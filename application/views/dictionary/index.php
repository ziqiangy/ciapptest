<div>
    <input type="text" id="vocab">
    <input type="submit" id="vocab_search" value="Search">
</div>


<div id="definition"></div>

<script src="/js/jquery-3.7.1.min.js"></script>
<script type="text/javascript">

// #vocab
// #vocab_search
// #definition

$("#vocab_search").click(()=>{
var vocab = $("#vocab").val();
$.ajax({
    type:"post",
    url:"<?php echo base_url(); ?>index.php/dictionary/search",
    data:{"vocab":vocab},
    success:data=>{
        // console.log(data);
        $('#definition').empty();
        [data]=data;
        $("#definition").append("<p>"+data.def+"</p>");
    }
})  
})


</script>