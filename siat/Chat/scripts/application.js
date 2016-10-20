(function(){
	var _socket = io.connect('http://localhost:8888');
	var myId = 1;
	
	var _messageModel = Backbone.Model.extend({
		
		defaults : {
			message : "",
			involved_a : 0,
			involved_b : 0,
			idMessage : 0,
			from : 0,
			isMine : false,
			element : ""
		},
		
		initialize : function(){
			this.render();
			_.bindAll(this, 'getMessage');
		},
		
		render : function(){
						
			var _template = _.template($("#messages").html());
						
			var _templateData = {
				msg : this.get('message'),
				isMine : this.get('isMine')
			};
			
			$(this.get('element')).append(_template(_templateData));
			
		},
		
		getMessage : function(){
			return this.get('message');
		}
		
	});
	
	var _usersModel = Backbone.Model.extend({
			
		defaults : {
			firstName : "",
			lastName : "",
			userId : 0,
		},
		
		initialize : function(){
		
			var _template = _.template($("#connected").html());
						
			var _templateData = {
				id : this.get('userId'),
				name : this.get('firstName')
			};
			
			$("#list").append(_template(_templateData));
			_.bindAll(this, 'getName');
		},
		
		getName : function(){
			return this.get("firstName")+" "+this.get("lastName");
		}
		
	});
	
	var _messagesCollection = Backbone.Collection.extend({
		
		_self : this, 
		
		model : _messageModel, 
		
		lastIndex : 0,
		
		initialize : function(){
			
		},
		
		render : function(){
			
		}
		
	});
	
	var _usersCollection = Backbone.Collection.extend({
		
		model : _usersModel,
		
		initialize : function(){
			
		}, 
		render : function(){
		}
	});
	
	var _messagesView = Backbone.View.extend({
		
		events : {
			
		},
		
		initialize : function(){
		},
		
		render : function(){
		}
		
	});

	var _usersView = Backbone.View.extend({
		_tagName : "li",
		
		events: {
			'click' : 'loadChat'
		},

		initialize : function(){
			this.listenTo(this.model, 'change', this.render);
		},
		
		render: function() {
			return "<li>"+this.model.getName()+"</li>";
		},
		
		loadChat : function(){
		}
	});
	
	var _chatView = Backbone.View.extend({
		
		_element : 'undefined',
		
		initialize : function(){
			this.render();
			
			var _element = this._element;
			var col = this.collection;
			
			var set = function(val){
				col.lastIndex = val;
			};
			
			var inv_a = 1;
			var inv_b = this.model.get('userId');
			var from = 1;
			
				_socket.emit('getMessages', {
					inv_a : inv_a,
					inv_b : inv_b,
					id : from
				}, function(data){
					if(data)
						$.each(data, function(key, value){
							set(value.id_message);
							col.add(new _messageModel({ 
								involved_a: value.involved_a, 
								involved_b: value.involved_b, 
								idMessage : value.id_message,
								from : value.id_from,
								message : value.message,
								isMine : ((value.id_from == 1) ? true : false),
								element : _element
							}));
						});
					});
				
			setInterval(function(){
				_socket.emit('getNewMessages', {
					inv_a : inv_a,
					inv_b : inv_b,
					id : from,
					lastIndex : col.lastIndex
				}, function(data){
					if(data)
						$.each(data, function(key, value){							
							set(value.id_message);
							col.add(new _messageModel({ 
								involved_a: value.involved_a, 
								involved_b: value.involved_b, 
								idMessage : value.id_message,
								from : value.id_from,
								message : value.message,
								isMine : ((value.id_from == 1) ? true : false),
								element : _element
							}));
						});
				});
			}, 500);
		},
		
		render : function(){
			var _template = _.template($("#chatBox").html());
			
			var id = this.model.get('userId');
			var name = this.model.get('firstName');
			
			var _templateData = {
				id : id,
				name : name
			};
			
			this._element = "#"+id;
			
			$("#container").append(_template(_templateData));
		}
		
	});
	
	var _mainApp = Backbone.View.extend({
		
		_el : $("#container"),
		_ul : $("#clientsList"),
		_addButton : $("#sendMessage"),
		
		events : {
		},
		
		initialize : function(){
			var col = this.collection;			
			
			_socket.on('initialData', function(data){
				$.each(data, function(key, value){
					
					var model = new _usersModel({ 
						firstName: value.user, 
						lastName: value.user, 
						userId : value.id_user
					});			
					var view = new _chatView({
						model : model, 
						collection : new _messagesCollection({
							model : _messageModel 
						}) 
					});
					_collection.add(model);
				});
			});
			
			_.bindAll(this, 'render');
			this.render();
		},
		
		render : function(){

		}
		
	});
	
	var _collection = new _usersCollection();
	var _ul = $("#clientsList");
	var _ulMessages = $("#messageList");
	var _messageCollection = new _messagesCollection();
	
	var _main = new _mainApp({
		collection : _collection
	});
	
	_socket.on('intialMessages', function(data){
		
		_ulMessages.html("");
		
		var _template = _.template($("#chatBox").html());
		
		var _templateData = {
			name : "Santiago Roca",
			messages : _messageCollection
		};
		
		$("#chatBar").html(_template(_templateData));
		
	});		
	
	$('body').on('click', '.sendMessage',function(){
		var text = $($(this).attr('id')).val();
		$($(this).attr('id')).val("");
		_socket.emit('newMessage', {
			message : text,
			idFrom : myId,
			idTo : $(this).attr('data-id')
		});
	});
	
}());

