<?php
/* This file is part of Jeedom.
 *
 * Jeedom is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Jeedom is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Jeedom. If not, see <http://www.gnu.org/licenses/>.
 */

if (!isConnect('admin')) {
	throw new Exception('401 Unauthorized');
}
sendVarToJs('node_id', init('id'));
$listServerZwave = openzwave::listServerZwave();
sendVarToJs('path', $listServerZwave[init('serverId')]['path'] . '/');
?>
<script type="text/javascript" src="plugins/openzwave/ressources/zwaveserver/static/vivagraph.min.js"></script>
<script type="text/javascript" src="plugins/openzwave/ressources/zwaveserver/static/app.js"></script>
<style media="screen" type="text/css">
	#graph_network {height:1200px; width:100%;}
	#graph_network > svg {height:100%; width:100%;}
	.noscrolling{
		width:99%;
		overflow: hidden;
	}
	.node-item{
		border: 1px solid;
	}
	.greeniconcolor {color:green;}
	.yellowiconcolor {color:#FFD700;}
	.rediconcolor {color:red;}
	.modal-dialog-center {
		margin: 0;
		position: absolute;
		top: 0%;
		left: 0%;
	}
</style>

<div class="container-fluid noscrolling">
	<div id="content"></div>
</div>

<script>
	console.log(path);
	var nodes = {};
	app.load('nodes','plugins/openzwave/ressources/zwaveserver/');
	app.show('nodes');
</script>