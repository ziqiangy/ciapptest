<style>

    .box{   
        max-width:400px;
        border:3px solid black;
        background-color:#fff7d1;
        border-radius:10px;
        padding:15px;
        margin:auto;
        
    }




    
    .element{
        margin-top:20px;
        margin-bottom:20px;
        padding-bottom:20px;
        border-bottom:1px solid black;
        word-wrap:break-word;
        
    }
    
    
</style>



 <div class="box">
    <div class="row">
        <div class="col">
        <?php echo anchor("quicknote/insert","Add",array("class"=>"btn btn-primary")); ?>
        </div>
        <div class="col"><h3 class="text-center">Notes</h3></div>
        <div class="col"></div>
    </div>
        <div class="text">     
                
                    <?php foreach($data as $d) { ?>
                                <?php 
                                    if(strlen($d['content'])>300){
                                        $d['content']=substr($d['content'],0,300)."...";
                                        }; ?>
                                <div class="element">
                                    <?php 
                                    echo "<div class='row'>";
                                    
                                    echo "<div class='col-9'>";
                                    echo $d['content']; 
                                    echo "</div>";
                                    echo "<div class='col-3' style='margin:auto;'>";
                                    echo anchor("quicknote/update/".$d['id'],"Edit",array("class"=>"btn btn-outline-secondary")); 
                                    echo "</div>";
                                    // echo anchor("quicknote/update/".$d['id'],$d['content']); 
                                    echo "</div>";
                                    ?>
                                </div>           
                            
                        <?php } ?>
        </div>
    </div>

    

