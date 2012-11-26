Ext.onReady(function(){
//	gp.render('detail_container');
	var gp=Ext.create('Star.view.ui.DetailPanel');
	
	var viewPort=Ext.create('Ext.container.Viewport',{
	layout:'border',
	items:[{	
			title:'南京电大继教院费用明细管理系统',
			region:'north',
			html:'<center><font size= 5>南京电大继教院费用明细管理系统</font></center>',
			height:70
		},treePanel
		,{
		xtype:'tabpanel',
		title:'工作区',
		id:'tb3',
		region:'center',
		flex:1,
		items:[{
		title:'tt',
		xtype:'panel',
		text:'container',
		items:[{
		xtype:'container',
		items:[{
		title:'tt',
		xtype:'grid'
		}]
		}]
		
		}
		
		
		]
		
		}
		]
		
	});
	
	
	


});

var treePanel=Ext.create('Ext.tree.Panel',
		{
			title:'菜单导航',
			width:150,
			region:'west',
			rootVisible: false,
			singleExpand: true,
			id:'tP',
			root:{
				text:'南京电大',
				leaf:false,
				children:[{
				 text:'明细管理',
				 children:[{
				 text:'费用明细管理',
				 leaf:true,
				 id:'managerDetail'
				 },
				 {
				 text:'明细报表管理',
				 leaf:true,
				 id:'reportDetail'
				 },
				 {
				 text:'打印管理',
				 leaf:true,
				 id:'printDetail'
				 }
				 ]
				},
				{
				 text:'工时管理',
				 children:[{
				 text:'工时明细管理',
				 leaf:true,
				 id:'managerWorking'
				 },
				 {
				 text:'工时报表管理',
				 leaf:true,
				 id:'reportWorking'
				 },
				 {
				 text:'打印管理',
				 leaf:true,
				 id:'printWorking'
				 }
				 ]
				},
				{
				 text:'监考管理',
				 children:[{
				 text:'监考费用管理',
				 leaf:true,
				 id:'managerInvigilate'
				 },
				 {
				 text:'临考老师管理',
				 leaf:true,
				 id:'teacher'
				 },
				 {
				 text:'报表管理',
				 leaf:true,
				 id:'reportInvigilate'
				 },
				 {
				 text:'打印管理',
				 leaf:true,
				 id:'printInvigilate'
				 }]
				},
				 
				{
				 text:'报表管理',
				 children:[{
				 text:'报表管理',
				 leaf:true,
				 id:'managerReport'
				 }
				 ]
				},
				{
				 text:'系统管理',
				 children:[{
				 text:'用户管理',
				 leaf:true,
				 id:'user'
				 }
				 ]
				}
				]
			},
		listeners:{
     // itemclick: function(node,event){
		itemclick: function(view, record, item, index,  e,  eOpts){
           console.info(view);
           console.info(record.raw.url);
           console.info(item);
           console.info(index);
           console.info(e);
           console.info(eOpts);
      }
			

    }
		
	});

	var workArea=Ext.create('Ext.tab.Panel',{
	title:'工作区',
	frame:true,
	region:'center',
	activeTab:1,
	defaults:   {autoScroll:true, authHeight:true},
	
	flex:1,
	items:[
	       {title:'tab 1',tbar:[ { xtype: 'button',id:'add', text: '添加明细',handler:onButtonClick }]},
	      
	       {title:'tab 2'},
	       {title:'tab 3',html:'tab3'},
	       {title:'tab 4',html:'tab4'},
	       {title:'tab 5',html:'tab5'}
	       ]
});
	 
    
function onButtonClick(btn){
	 var win;
	 alert('Error');
	if (!win) {
        win = Ext.create('Ext.window.Window', {
            title: 'Layout Window',
            closable: true,
            closeAction: 'hide',
            width: 600,
            minWidth: 350,
            height: 350,
            layout: 'border',
            bodyStyle: 'padding: 5px;',
            items: [{
                region: 'west',
                title: 'Navigation',
                width: 200,
                split: true,
                collapsible: true,
                floatable: false
            }, {
                region: 'center',
                xtype: 'tabpanel',
                items: [{
                    title: 'Bogus Tab',
                    html: 'Hello world 1'
                }, {
                    title: 'Another Tab',
                    html: 'Hello world 2'
                }, {
                    title: 'Closable Tab',
                    html: 'Hello world 3',
                    closable: true
                }]
            }]
        });
        
        if (win.isVisible()) {
            win.hide(this, function() {
            	btn.dom.disabled = false;
            });
        } else {
            win.show(this, function() {
            	btn.dom.disabled = false;
            });
        }
    }
	else
		{
		alert('aaaa');
		}
}

var userStore = Ext.create('Ext.data.Store', {
    model: 'User',
    data: [
        { name: 'Lisa', email: 'lisa@simpsons.com', phone: '555-111-1224' },
        { name: 'Bart', email: 'bart@simpsons.com', phone: '555-222-1234' },
        { name: 'Homer', email: 'home@simpsons.com', phone: '555-222-1244' },
        { name: 'Marge', email: 'marge@simpsons.com', phone: '555-222-1254' },
		{ name: 'Lisa', email: 'lisa@simpsons.com', phone: '555-111-1224' },
        { name: 'Bart', email: 'bart@simpsons.com', phone: '555-222-1234' },
        { name: 'Homer', email: 'home@simpsons.com', phone: '555-222-1244' },
        { name: 'Marge', email: 'marge@simpsons.com', phone: '555-222-1254' },
		{ name: 'Lisa', email: 'lisa@simpsons.com', phone: '555-111-1224' },
        { name: 'Bart', email: 'bart@simpsons.com', phone: '555-222-1234' },
        { name: 'Homer', email: 'home@simpsons.com', phone: '555-222-1244' },
        { name: 'Marge', email: 'marge@simpsons.com', phone: '555-222-1254' },
		{ name: 'Lisa', email: 'lisa@simpsons.com', phone: '555-111-1224' },
        { name: 'Bart', email: 'bart@simpsons.com', phone: '555-222-1234' },
        { name: 'Homer', email: 'home@simpsons.com', phone: '555-222-1244' }
    ]
});
var gp=Ext.create('Ext.grid.Panel', {
	title:'明细',
    store: userStore,	
//	autoWeight:true,
  height:300,
  weight:300,
    viewConfig:{forceFit: true},
    columns: [
        {
            text: 'Name',
            width: 100,
            sortable: false,
            hideable: false,
            dataIndex: 'name'
        },
        {
            text: 'Email Address',
            width: 150,
            dataIndex: 'email',
            hidden: true
        },
        {
            text: 'Phone Number',
            flex: 1,
            dataIndex: 'phone'
        }
    ]
});





