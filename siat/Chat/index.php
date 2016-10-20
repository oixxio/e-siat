<html>

	<head>
		<link href="css/bootstrap.min.css" rel="stylesheet"/>
		<style>
			p, h1,h2,h3,h4,h5{
				display: block;
				-webkit-margin-before: 0em;
				-webkit-margin-after: 0em;
				-webkit-margin-start: 0px;
				-webkit-margin-end: 0px;
				font-weight: normal;
			}
			#chatBar {
				margin-left: 0px; 
				height:30px; 
				width:100%; 
				bottom:0px; 
				position:fixed;
				background: #c0d7ea;
				border-top: 1px solid #b0c7d7
			}
			#hidden{
				display : none!important 
			}
			#chatBar .chat-wraper:nth-child(1) {
				margin-right:3%;
			}
			#chatBar .chat-wraper:nth-child(2) {
				margin-right:21%;
			}
			#chatBar .chat-wraper:nth-child(3) {
				margin-right:39%;
			}
			.chat-wraper {
				width: 17%;
				height:300px;
				border: 1px solid #e4e4e4;
				margin-top: -308px;
				float : right;
				position:relative;
				background: white
			}
			.chat-head {
				width:100%;
				height : 10%;
				background : #b0c7d7;
				cursor : pointer
			}
			.chat-wraper:hover .chat-head{
				background: #a0b7c7;
			}
			.chat-body {
				width:100%;
				height:89%
			}
			.name-text {
				padding : 5px;
				color: white;
			}
			.messages-body {
				margin : 5%;
				margin-right:1%;
				width: 90%;
				height: 80%;
				overflow-y: auto;
				padding:2%
			}
			.message-my {
				width: 100%;
				height:auto;
				color: #444
			}
			.message-your {
				width: 100%;
				height:auto;
				color: #444
			}
			.message-your p {
				text-align: right;
			}
			.chat-input-wraper{
				width:100%;
				height: 10%;
				border-top: 1px solid #c0d7ea
			}
			.input {
				width:71%;
				height:100%;
				float:left
			}
			.submit {
				width:29%;
				height:100%;
				float:left;
				padding : 0px;
			}
			.submit input {
				width:100%;
				height:100%;
				padding:0px;
				border: 0px;
				cursor : pointer;
				color: #b4b4b4
			}
			.input input {
				width:100%;
				height:100%;
				border: 0px;
				box-shadow:none;
				padding-left: 5px
			}
			.input input:focus{
				outline : 0px;
			}
			#lateralBar {
				width: 15%;
				height: 100%;
				position : fixed;
				border-right: 3px solid #c0d7ea
			}
			#connected-list {
				list-style : none
			}
			#tittle {
				margin-left: 10px;
				color:white;
				font-weight:bold;
				font-size: 30px
			}
			.tittle-container {
				background:#c0d7ea;
				border-bottom: 1px solid #aaa
			}
			#list {
				width:100%;
				margin-top:20px
			}
			a {
				text-decoration : none !important;
				color: #444;
				font-size:10px
			}
			.connected-list-item {
				width:90%; 
				padding:5%;
				border-bottom : 2px solid #c0d7ea
			}
			.connected-list-item:hover {
				background: #f4f4f4
			}
			.item-name {
				
			}
			.icon-user, .user-name {float:left}
			.icon-user {
				margin-top: 3px;
				margin-right: 5px
			}
			.name-text {float:left} .icon-remove-sign { float: right; margin-right:8px; margin-top:8px}
			#planilla-wrapper {
				width: 84%;
				left: 16%; 
				position: fixed;
				height: 98%;
			}
			table {
				border : 1px solid black;
				margin-top: 5%;
				color: #777
			}
			th {
				color: #444;
				width : 190px;
				text-align: left;
				border-left: 1px solid #444;
				border-bottom: 1px solid #444
			}
			td{
				border-left: 1px solid #444;
				height: 30px
			}
		</style>
	</head>

	<body style="margin:0px">
		<div id="lateralBar" >
			<div class="tittle-container">
				<div id="tittle">
					<h3>Conectados</h3>
				</div>
			</div>
			<div id="list">
				
			</div>
		</div>
		<div id="container">
		</div>
		<div id="hidden">
		</div>
		<div id="planilla-wrapper">
			<div id="chartContainer"  style="margin:5%; height: 40%; width: 40%;">
				
			</div>
		
		<!--
		
			<table>
				<thead>
					<th>Fecha</th>
					<th style="width: 50px">Cantidad</th>
					<th>Marca</th>
					<th>Lote</th>
					<th style="width:300px" >Motivo de uso</th>
					<th>Firma</th>
				</thead>
				<tbody>
					<?php
					/*
						$connection = mysql_connect("localhost", "root", "") or die(error);
						mysql_select_db("chat") or die(error);
						
						$query = "SELECT *, DATE_FORMAT(fecha, '%d/%m/%Y - %H:%i' ) as hora FROM dosis";
						
						$result = mysql_query($query, $connection) or die(error);
						
						while($fila = mysql_fetch_array($result)){
							?>
								<tr>
									<td>
										<?= $fila['hora'] ?>
									</td>
									<td>
										<?= $fila['cantidad'] ?>
									</td>
									<td>
										<?= $fila['marca'] ?>
									</td>
									<td>
										<?= $fila['lote'] ?>
									</td>
									<td>
										<?= $fila['motivo_de_uso'] ?>
									</td>
									<td>
										
									</td>
								</tr>
							<?php
						}*/
					?>
				</tbody>
			</table>
		
			-->
		
		</div>
		<footer id="chatBar" >
			
		</footer>
	</body>
	
	<script type="text/html" id="connected">
		<a href="javascript: return false;" class='openChat' id="#head_<%=id%>">
			<div class="connected-list-item" >
				<div class="item-name" >
					<i class='icon-user'></i><h5 class="user-name"><%=name%></h5><div style="clear:both" ></div>
				</div>
			</div>
		</a>
	</script>
	
	<script type="text/html" id="messages">
		<% if(isMine){ %>
			<div class="message-my" >
				<p><%= msg %></p>
			</div>
		<% }else{ %>
			<div class="message-your" >
					<p><%= msg %></p>
			</div>
		<% } %>
	</script>
	
	<script type="text/html" id="chatBox" >
		<div class="chat-wraper" >
			<div class="chat-head" id="head_<%=id%>" >
				<h5 onselectstart="return false;" class="name-text" ><%= name %></h5><i class="icon-remove-sign"></i><div style="clear:both"></div>
			</div>
			<div class="chat-body" >
				<div class="messages-body" id="<%=id %>" >
				</div>
				<div class="chat-input-wraper" >
					<div class="input" >
						<input id="input_<%=id %>" type="text" placeholder="Mensaje" />
					</div>
					<div class="submit" >
						<input class="sendMessage" data-id='<%=id%>' id="#input_<%=id%>" type="button" value="Enviar" />
					</div>
				</div>
			</div>
		</div>
	</script>
	
	<script data-main="scripts/main.js" src="scripts/require.js"></script>
	
	
</html> 