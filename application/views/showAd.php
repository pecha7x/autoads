<?php $this->load->view('header');?>
<script type="text/javascript">
$(function(){
  $("#lightBox a[rel^='prettyPhoto']").prettyPhoto({
  	theme: 'dark_rounded'
  });
});
</script>
<div id="content">
    <?php if(!empty($rsuccess)):?>
        <div id="removed">
            <?php echo $rsuccess.'</br>'.$link;?>
        </div>
    <?php else :?>
	<div id="showAd">
            <?php if ((check_user_authorization() == $ads->nick_id) || (isset($admin))) :?>
                <div id="edit_delete">
                    <ul>
                        <li><?php echo $link_edit;?></li>
                        <li><?php echo $link_delete;?></li>
                    </ul>    
                </div>
            <?php endif;?>
            <div id="fotos">
                <?php if(!empty($fotos)):?>
                    <ul id="lightBox">
                        <?php foreach($fotos as $foto):?>
                            <li><a rel="prettyPhoto[mixed]" href="http://zahar-test.com/autoads/images/uploads/max/<?php echo $foto->name?>" ><?php echo '<img src="http://zahar-test.com/autoads/images/uploads/min/'.$foto->name.'" alt="" width="158" height="100" aling="center">';?></a></li>
                        <?php endforeach;?>
                    </ul>
                <?php else:?>
                    <?php echo '<img src="http://zahar-test.com/autoads/images/uploads/min/empty.jpg" alt="empty.jpg" width="158" height="100" aling="center">';?>
                    <?php if ((check_user_authorization() == $ads->nick_id) || (isset($admin))) :?>
                        <h3 style="color:#ff0000">
                            Your can  <a style="color:#ff0000" href="<?php echo site_url('ads/editAd/'.$ads->id) ?>">upload</a> a new foto for your ad<br />
                        </h3>
                    <?php endif;?>
                <?php endif;?>
            </div> 
            <div id="date"><?php echo "The year of construction - ".$ads->year ?></div>
            <?php echo "The car brand - ".$ads->title ?><br>
            <div id="price"><?php echo "Price of the car - $".$ads->price ?></div>
            <?php echo $ads->text ?><br>		       
        </div>
        <a href="<?php echo ($frm=='add') ? site_url().'/ads/addNewAd/' : site_url().'/ads/main/' ?>"><?php echo ($frm=='add') ? 'to add more ads' : 'to list of all ads' ?></a>
    <?php endif;?>
</div>
<?php $this->load->view('footer');?>