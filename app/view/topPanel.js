/**
 * 顶部标题栏
 */
Ext.define('Star.view.topPanel', {
			extend : 'Ext.panel.Panel',
			alias : 'widget.topPanel',
			region : 'east',
			height : 70,
			weight : '100%',
			html : '<center><font size="5">南京电大继教学院费用管理系统</font></center>',
			initComponent : function() {
				this.callParent(arguments);

			}
		});