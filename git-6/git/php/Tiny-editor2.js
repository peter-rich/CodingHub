
function TinyEditor(el,opt){
	var DefaultOpt = {
		index : '1'
	}
	ace.require("ace/ext/language_tools");
	opt = utils.mixin(DefaultOpt,opt,true)
	this.init(el,opt)
}

//-- ����������װ
var utils = {
	op	: function(){
		var op = Object.prototype,
			ap	= Array.prototype;
		return {
			ostring		: op.toString,
			hasOwn		: op.hasOwnProperty,
		}
	},
	eachProp : function(obj, func){
		var prop;
		for(prop in obj){
			if(this.hasProp(obj, prop)){
				if(func(obj[prop], prop)){
					break;
				}
			}
		}
	},
	hasProp : function(obj, prop){
		return this.op().hasOwn.call(obj, prop)
	},
	mixin : function(target, source, force, deepStringMixin) {
		if(source){
			this.eachProp(source, function(value, prop){
				if (force || !this.hasProp(target, prop)) {
					if (deepStringMixin && _.isObject(value) && value &&
						!_.isArray(value) && !_.isFunction(value) &&
						!(value instanceof RegExp)){
						if(!target[prop]){
							target[prop] = {};
						}
						mixin(target[prop], value, force, deepStringMixin);
					}else{
						target[prop] = value;
					}
				}
			})
		}
		return target;
	},
	id:function(id){
		return document.getElementById(id);
	},

	//-- �����д��
	store : {
		set:function(key,value){
			localStorage.setItem(key,value);
		},
		get:function(key) {
			return localStorage.getItem(key);
		}
	},

	//-- ��������Ĵ���
	isStore : function(key,editor){
		if(!!utils.store.get(key)){
			var result = utils.store.get(key);
		}else{
			var result = editor.getValue();
		}
		return result;
	},
}


var buffer = {
	//-- ����༭��Ԫ��
	tabPlugin:document.getElementById('tabPlugin'),
	tabControl:document.getElementById('tabControls'),
	tabContainer:this.tabPlugin.getElementsByClassName('tabContainer'),

	//-- ����༭��
	htmlEditor : ace.edit("html"),
	cssEditor : ace.edit("css"),
	jsEditor : ace.edit("js"),

	editorArr : ['htmlEditor','cssEditor','jsEditor'],

	//-- �༭������
	setOptions:{
		enableBasicAutocompletion: true,
		enableSnippets: true,
		enableLiveAutocompletion: true
	},
	//-- ��ʼ������
	setTheme: utils.store.get('theme')||'ace/theme/monokai',

	Themes:['ambiance.css','chaos.css','chrome.css','clouds.css','clouds_midnight.css','cobalt.css','crimson_editor.css','dawn.css','dreamweaver.css','eclipse.css','github.css','idle_fingers.css','iplastic.css','katzenmilch.css','kr_theme.css','kuroir.css','merbivore.css','merbivore_soft.css','mono_industrial.css','monokai.css','pastel_on_dark.css','solarized_dark.css','solarized_light.css','sqlserver.css','terminal.css','textmate.css','tomorrow.css','tomorrow_night.css','tomorrow_night_blue.css','tomorrow_night_bright.css','tomorrow_night_eighties.css','twilight.css','vibrant_ink.css','xcode.css']
}



TinyEditor.prototype = {

	init : function(el,opt){
		var self = this
		if(utils.store.get('dockMode')=='true'){
			utils.dockMode = false;
			self.dockMode();
		}

		//-- ��ʼ����Ӧ�����id�ĸ�
		for(var i = 0,len=buffer.tabContainer.length;i<len;i++){
			buffer.tabContainer[i].style.height= (buffer.tabPlugin.offsetHeight-40)+'px';
		}

		this.tab(opt.index);

		//-- ����ѡ������
		var options = ''
		for(var j = 0,jlen = buffer.Themes.length;j<jlen;j++){
			var theme = buffer.Themes[j].replace('.css','');
			options+='<option value="'+theme+'">'+theme+'</option>'
		}
		utils.id('theme').innerHTML=options
		utils.id('theme').value=buffer.setTheme.replace('ace/theme/','')
		utils.id('theme').onchange = function(){
			self.setTheme('ace/theme/'+this.value)
			utils.store.set('theme','ace/theme/'+this.value)
		}
	},

	//-- tab����������Լ�д
	tab : function(index){

		buffer.tabControl.getElementsByTagName('li')[0].classList.add('active')
		buffer.tabContainer[0].style.zIndex='1';
		buffer.tabContainer[0].style.opacity='1';
		buffer.editorArr[0]&&buffer[buffer.editorArr[0]].focus()


		if(!!utils.dockMode){
			document.getElementById('dockIframe').style.zIndex='0';
			document.getElementById('dockIframe').style.opacity='0';
			this.splitResize(0)
			buffer.tabContainer[0].style.width=(buffer.tabPlugin.offsetWidth-utils.id('dockIframe').offsetWidth)+'px'
		}

	},

	//-- ��������
	setTheme: function(theme){
		buffer.jsEditor.setTheme(theme);
		buffer.jsEditor.setTheme(theme);
		buffer.jsEditor.setTheme(theme);
	},




	//-- ʵʱ����ģʽ�����༭������change�¼�����
	liveMode:function(){
		var self = this;
		if(!!utils.dockMode) {
			if (!!utils.liveMode) {   	//-- ȡ��liveģʽ
				utils.liveMode = false;
				document.getElementById('liveButton').classList.remove('active')
			} else { 					//-- ��ʼliveģʽ
				utils.liveMode = true;
				document.getElementById('liveButton').classList.add('active')
			}
			buffer.htmlEditor.on('change', function (e) {
				!!utils.liveMode&&self.run()
			})
			buffer.cssEditor.on('change', function (e) {
				!!utils.liveMode&&self.run()
			})
			buffer.jsEditor.on('change', function (e) {
				!!utils.liveMode&&self.run()
			})
		}
	},

	//-- ȫ��ģʽ
	fullScreen:function(){
		if(document.getElementById('tabPlugin').className.match('full')){
			document.getElementById('tabPlugin').classList.remove('full')
		}else{
			document.getElementById('tabPlugin').classList.add('full')
		}
		for(var i = 0,len=buffer.tabContainer.length;i<len;i++){
			buffer.tabContainer[i].style.height= (buffer.tabPlugin.offsetHeight-40)+'px';
		}
	},

	//-- ��������¼
	save:function(b){//b���ĵ�id,a���µ��ĵ�ֵ...
		
		var a=buffer.htmlEditor.getValue()
		
		$.ajax({
			url:'edit.php?id='+b,
			type:'post',
			dataType: "text",
			data:'content='+a,
			async : false,
			success: function(data){;
			alert("change ok!");
			}
		});
	}
}
