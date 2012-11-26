Ext.onReady(function(){
var treePanel=Ext.create('Ext.tree.Panel',
		{
			title:'菜单导航',
			width:150,
			height:300,
			renderTo:Ext.getBody(),
			rootVisible: false,
			singleExpand: true,
			root:{
				text:'电大',
				expanded:true,
				children:[{
					text:'节点一',
					leaf:false,
					
					listeners : {
                            'click' : function(node, event) {
                                     event.stopEvent();
                                     Ext.MessageBox.alert('Notices',)
                            },
					
					
					children:[{
					text:'二级节点',
					leaf:true,
					id:'node2'

					}]
				},
				{
					text:'节点二',
					leaf:false
				},
				{
					text:'节点三',
					leaf:true
				}
				]
			}
		
	});
	
});

	

	
	


