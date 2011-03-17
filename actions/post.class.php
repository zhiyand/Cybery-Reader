<?php

class Post extends Action
{
    private $PageData;
    private $feedManager;
    private $uid;
    
    private function setMessage( $message )
    {
        $this->PageData['ismsg'] = TRUE;
        $this->PageData['msg'] = $message;
    }
    
    private function init()
    {
        $this->feedManager = new FeedManager($this->uid);
		$this->PageData = array(
		    'ismsg' => FALSE,
		    'msg' => NULL,
		    'isitem' => FALSE,
		    'ctitle' => '评论',
		    'iscomments' => FALSE,
		);
    }
    
	public function execute($context)
	{
		global $db, $tpl;
		    
		$this->uid = $_SESSION['user']['id'];
		$this->init();
		
		if(isset($_POST['url']))
		{
		    $url = $_POST['url'];
            $result = $db->fetch('feeds', 'url', $url);
            if ($result)
            {
                $fid = $result['id'];
                $this->PageData['feedname'] = $result['title'];
                $this->feedManager->select_feed($fid);
                $this->PageData['items'] = $this->feedManager->get_items();
                if ($this->PageData['items'])
                {
                    $this->PageData['isitem'] = TRUE;
                }
            }
		}
		
		?>
<div id="posts">	
<h2 class="flip"><p><?php echo $this->PageData['feedname'];?></p></h2>
<div id="panall">
<?php if($this->PageData['isitem']):?>
    <?php foreach($this->PageData['items'] as $item):?>
        <div>
            <h3 class="flip flip<?php echo $item['guid']; ?>">
                <img src="../static/images/starblank.png" class="star star<?php echo $item['guid']; ?>" />
                <?php echo $item["title"]; ?>
            </h3>
            <div id="panel<?php echo $item['guid']; ?>" class="panel" style="display:none;">
                <? if ($item["content"]):?>
                    <?php echo $item["content"]; ?>
                <? else: ?>
                    <?php echo $item["description"]; ?>
                <? endif; ?>
            </div>
        </div>
    <?php endforeach;?>
<?php endif;?>
</div>
</div>
<script type="text/javascript">
<?php if($this->PageData['isitem']):?>
    <?php foreach($this->PageData['items'] as $item):?>
		$("h3.flip<?php echo $item['guid']; ?>").click(function(){
			$("#panel<?php echo $item['guid']; ?>").slideToggle("slow");
		});
		$("img.star<?php echo $item['guid']; ?>").click(function(){
			$("img.star<?php echo $item['guid']; ?>").attr("src","../static/images/starfull.png");
		});
	<?php endforeach;?>
<?php endif;?>
</script>

		<?php
	}
};

?>
