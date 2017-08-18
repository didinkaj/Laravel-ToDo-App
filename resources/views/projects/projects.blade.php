@extends('layouts.main')

@section('title', 'Projects page')

@section('content')
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-lg-12">
			<div class="text-center m-t-lg">
				<h1 style="color: green;"> Project Management </h1>

			</div>
			<div class="ibox-content">

				<div class="table-responsive">
					<table class="table shoping-cart-table">

						<tbody>
							<tr>
								<td width="90"><div class="cart-product-imitation"></div></td>
								<td class="desc"><h3><a href="#" class="text-navy"> Desktop publishing software </a></h3>
								<p class="small">
									It is a long established fact that a reader will be distracted by the readable
									content of a page when looking at its layout. The point of using Lorem Ipsum is
								</p>
								<dl class="small m-b-none">
									<dt>
										Description lists
									</dt>
									<dd>
										A description list is perfect for defining terms.
									</dd>
								</dl>
								<div class="m-t-sm">
									<a href="#" class="text-muted"><i class="fa fa-gift"></i> Add gift package</a>
									|
									<a href="#" class="text-muted"><i class="fa fa-trash"></i> Remove item</a>
								</div></td>

								<td> $180,00 <s class="small text-muted">$230,00</s></td>
								<td width="65">
								<input class="form-control" placeholder="1" type="text">
								</td>
								<td><h4> $180,00 </h4></td>
							</tr>
						</tbody>
					</table>
				</div>

			</div>
		</div>
	</div>
</div>
@endsection
