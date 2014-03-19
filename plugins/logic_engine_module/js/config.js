// create a namespace for plugins
if(typeof plugin == "undefined" || !plugin) {
	var plugin = {};
}

// the type of plugin must match the JS singleton (e.g. logic_engine_module) name
plugin.logic_engine_module = {

	showUpdate:true, // shows/hides the submit button
	pageUniqId:null,
	pluginUniqId:null,

	// initialize plugin
	init:function(pageUniqId, pluginUniqId){

		plugin.logic_engine_module.pageUniqId = pageUniqId;
		plugin.logic_engine_module.pluginUniqId = pluginUniqId;

		$('#logic_engine_module-orgid').val($('#'+plugin.logic_engine_module.pluginUniqId).data('orgid'));
		$('#logic_engine_module-modulename').val($('#'+plugin.logic_engine_module.pluginUniqId).data('modulename'));
		$('#logic_engine_module-methodname').val($('#'+plugin.logic_engine_module.pluginUniqId).data('methodname'));
		$('#logic_engine_module-formtitle').val($('#'+plugin.logic_engine_module.pluginUniqId).data('formtitle'));
	},

	// handles the click of the submit button
	update:function(el){
		
		// an easy way to pass data to your plugin is to set data-[var] attributes
		$('#'+plugin.logic_engine_module.pluginUniqId).data('orgid', $('#logic_engine_module-orgid').val());
		$('#'+plugin.logic_engine_module.pluginUniqId).data('modulename', $('#logic_engine_module-modulename').val());
		$('#'+plugin.logic_engine_module.pluginUniqId).data('methodname', $('#logic_engine_module-methodname').val());
		$('#'+plugin.logic_engine_module.pluginUniqId).data('formtitle', $('#logic_engine_module-formtitle').val());

		// show a success message when you are done
		message.showMessage('success', 'Plugin updated successfully');

		// returning true will automatically close the dialog
		return true;
	}

}
