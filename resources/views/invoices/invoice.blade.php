<html>
<head>
	<title>Invoice</title>
	<style type="text/css">

		table {
			font-family: Menlo, Monaco, Consolas, "Courier New", monospace
		}
		#page-wrap {
			width: 700px;
			margin: 0 auto;
		}
		.center-justified {
			text-align: justify;
			margin: 0 auto;
			width: 30em;
		}
		.grey {
			background: #eee;
		}
	</style>
</head>
<body>

@inject('config','App\Configuration')

<div id="page-wrap">
	<table width="100%">
		<tbody>
		<tr>
			<td width="30%">
				<img src="http://exotel.in/wp-content/uploads/2013/03/exotel.png"> <!-- your logo here -->
			</td>
			<td width="70%">
				<h2>Tax Invoice</h2><br>
				<strong>Date:</strong> {{ $order->created_at }}<br>
				<strong>Invoice Number:</strong># {{ $order->id }}<br>
				<strong>Payment Status: </strong>{{ $order->payment_status == 1 ? 'Pending': 'Paid' }}<br>
			</td>
		</tr>
		<tr>
			<td colspan="2">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="2">
				<div>
					<strong>Invoice To:</strong> {{ $order->user->name }} <br />
					<strong>Address :</strong> {{ $order->user->address }}, {{ $order->user->poscode }} , {{ $order->user->state }}<br />
					<strong>Contact :</strong> {{ $order->user->contact }} <br />
				</div>
			</td>
		</tr>
		</tbody>
	</table>

	<p>&nbsp;</p>
	<table width="100%" class="outline-table">
		<tbody>
		<tr class="border-bottom border-right grey">
			<td colspan="5"><strong>Items </strong></td>
		</tr>
		<tr class="border-bottom border-right center">
			<td width="45%"><strong>Description</strong></td>
			<td width="25%"><strong>Quantity</strong></td>
			<td width="30%"><strong>Price / Unit</strong></td>
			<td width="30%"><strong>Total</strong></td>
			<td width="30%"><strong>Discount</strong></td>
		</tr>

		@php $total = []; @endphp
		@foreach($order->items as $item)

			@php
					$total[] = $item->total;
					@endphp
			<tr class="border-right">
				<td class="pad-left">{{ $item->product->product_name }}</td>
				<td class="center">{{ $item->quantity }}</td>
				<td class="right-center">{{ $item->product->price }}</td>
				<td class="right-center">{{ $item->total }}</td>
				<td class="right-center">{{ ($item->product->price * $item->quantity) - $item->total}}</td>
			</tr>
		@endforeach

		<tr>
			<td colspan="5">&nbsp;</td>
		</tr>

		<tr>
			<td colspan="3">GRAND TOTAL</td>
			<td colspan="2">{{ is_null($config->value('currency'))? 'RM' : $config->value('currency') }} @php echo array_sum($total) @endphp </td>
		</tr>

		</tbody>
	</table>
	<p>&nbsp;</p>

</div>
</body>
</html>