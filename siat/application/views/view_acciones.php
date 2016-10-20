<div class="container-fluid">
	<div id="titulo" class="row">
    	<div class="col-xs-12">
	        <img src="<?=base_url()?>assets/img/icoactions.png">
	        Acciones
      </div>    
  </div>
  <div class="page-header" style="margin: 0px 0 20px;" ></div>
  <div>

  	<?= $cuestionario; ?>

  	<?= $imagen; ?>

  </div>
</div>

<script>
	
	$(document).ready(function(){
		$(".center_vertically").each(function(){

			if($(this).is("img"))
				$(this).load(function(){
					cenver_vertically(this);
				});
			else
				cenver_vertically(this);

		});

		$(".action_item").click( function () {
			location.href = $(this).data("href");
		});

	});

	function cenver_vertically (ctx) {
		var parent_height = parseInt($(ctx).parent().css("height"));
		var elem_height = parseInt($(ctx).css("height"));

		console.log(parent_height + " " + elem_height);

		$(ctx).css("margin-top", (parent_height - elem_height) / 2);
	}

</script>

<style>
	.action_item > *:hover {
		cursor : pointer;
	}
</style>