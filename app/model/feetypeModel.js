Ext.define('Star.model.feetypeModel', {
    extend: 'Ext.data.Model',
    fields: [ 
    	{name:'ID',type:'int'},//ID以DB为主，新增加数据时为空，从DB取数据时为DB内ID的值
    	{name:'name',type:'string'}//项目名称
    	,{name:'value',type:'string'}//value
    	,{name:'remark',type:'string'}//value

    	]
  /**  	,
    	validations:[
    	{type: 'inclusion', field: 'fee_type',   list: ['BXD', 'ZP', 'LYD', 'ZZ']},
    	{type: 'inclusion', field: 'payment',   list: ['0', '1']}
    	]
    	**/
});