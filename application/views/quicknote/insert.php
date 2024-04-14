<style>
    .box-father{
        display:flex;
        justify-content:center;
    }
    .box-child{   
        width:400px;
        border:3px solid black;
        background-color:#fff7d1;
        border-radius:10px;
        padding:15px;
        
    }

    .h-title{
        text-align:center;
    }
    .text-father{
        display:flex;
        justify-content:center;
    }
</style>


<div class="box-father">
    <div class="box-child">
        <div class="h-title">
            <h3>Insert a Quick Note</h3>
        </div>


    
        <div class="text-father">
            <div class="text-child">            
                

            <?php echo form_open("Quicknote/insert") ?>
            <div class="form-group">
            <label for="content">Quick Note:</label>
<textarea class="form-control" id="content" name="content" rows="10" cols="35"></textarea>

            </div>
            <label for="cate_name">Note Category</label>
            <select name="cate_id" id="cate_name">
                <option value="0" selected>No Category</option>
                <?php foreach($data as $row): ?>
                    <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                <?php endforeach ?>
            </select>
<input class="btn btn-primary mt-2" type="submit" value="submit">
</form>
            


            </div>
        </div>
    </div>
</div>


