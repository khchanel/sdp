<a data-iconpos="notext" id="cancel" href="<?php
if($this->uri->segment(2) == 'edit_request') {echo site_url('form/view_request/'.$this->uri->segment(3));  }
else { echo site_url('manage'); }  ?>"
data-theme="custom" data-ajax="false"></a>
<h1>UTS<br/><?php echo $title; ?></h1>
<!--Add Button-->
<a data-iconpos="notext" id="submit"  href="javascript: submitform()" data-theme="custom" data-ajax="false"></a>