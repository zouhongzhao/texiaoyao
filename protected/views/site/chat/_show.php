<div class="setfarme row">
				    <div class="msgList">
                	    <ul class="msguser">
                    	    <li class="id">来自<?php echo Functions::GetAreaByIp($data->ip);?>的朋友</li>                      
                            <li class="time"><?php echo $data->send_date?></li>
                        </ul>
                        <div class="msginfo">
                    	    <p> <?php echo $data->content?></p>     
                    	    <?php if($data->reply):?> 
                    	    <div><b>回复内容：</b><?php echo $data->reply?></div> 
                    	    <?php endif;?>                 
                        </div>
                    </div>
                </div>