<?php
require_once('api_loader.php');

$api = new api_loader($orgid);
?>

<h3><?=$formtitle?></h3>
<div id='le-module-contents-<?=$id?>'>
	<?php $api->call_method($modulename, $methodname)?>
</div>
<script type='text/javascript'>
	$(document).ready(function(){
		$('#le-module-contents-<?=$id?>').on('submit', 'form', function(e){
			e.preventDefault();
			var form = this;
			
			var action = $(form).attr('action');
			//if there is no action, then we'll redefine it
			if(!action.trim()){
				action = '?module=<?$modulename?>&method=<?=$methodname?>';
			}
			
			if(!action.match(/http(s{0,1}):\/\//)){
				action = 'plugins/logic_engine_module/ajax_call.php' + action + '&org_id=<?=$orgid?>';
			}
			console.debug(action);
			
			jQuery.ajax(action, {
				'type': form.method,
				'data': $(form).serialize(),
				'success' : function(data, textStatus, jqXHR){
					$('#le-module-contents-<?=$id?>').html(data);
				}
			});
			
			return false;
		});
	});
</script>