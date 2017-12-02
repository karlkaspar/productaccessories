<div class="row accessoriesContainer">
	<h2 class="heading col-md-12">
		{l s="Accessories" mod="productaccessories"}
	</h2>
	{foreach $accessories as $accessory}
		<div class="accessoryItem col-md-3 col-xs-12 col-sm-6">
			<div class="col-md-12 accessoryUp">
				<img src="{$accessory['image']}">
			</div>
			<div class="col-md-12 accessoryDown">
				<div class="col-md-12 accessoryPrice">
					{$accessory['price']} {$currency.sign}
				</div>
				<form action="{$urls.pages.cart}" method="post">
		          	<input type="hidden" value="{$accessory['id_product']}" name="id_product">
		          	<input type="number" class="input-group form-control acessoryQty" name="qty" min="1" value="1">
		          	<button data-button-action="add-to-cart" class="btn-primary accessoryCart">
		          		{l s="Add to cart" mod="productaccessories"}
		          	</button>
	          	</form>
			</div>
		</div>
	{/foreach}
</div>