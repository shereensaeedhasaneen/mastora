<table class="table table-borderless table-hover">
	<thead>
		<tr>
			<th scope="col">#</th>
			@foreach($columnHeaders as $columnHeader)
				<th scope="col">{{$columnHeader}}</th>
			@endforeach
		</tr>
	</thead>
	<tbody>
		@foreach($rows as $rowKey => $row)
			<tr>
				<th scope="row">{{$rowKey}}</th>
				@foreach($row as $cellKey => $cell)
					@if($cellKey === 'actions')
						<td>
							<x-guide-x.grid-actions :cellActions="$cell"/>
						</td>
						@continue
					@endif
					<td>{!!$cell!!}</td>
				@endforeach
			</tr>
		@endforeach
		
	</tbody>
</table>