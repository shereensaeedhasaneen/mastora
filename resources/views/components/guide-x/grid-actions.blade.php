<div class="btn-group" role="group" aria-label="Button group with nested dropdown">
	<div class="btn-group" role="group">
		<button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
			aria-haspopup="true" aria-expanded="false">
			<i class="cil-cog"></i> {{__('main.common.actions.value')}}
		</button>
		<div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
			@foreach ($cellActions as $key => $action)
				<a 
					href="{{$action['url']}}" 
					class="dropdown-item" 
					onclick="{{$action['onClick']}}"
					data-target="#{{$action['dialogId']}}" 
					data-toggle="{{$action['dataToggle']}}"
					data-dialog-title="{{$action['dialogTitle']}}"
					data-dialog-body="{{$action['dialogBody']}}"
				>
					{{$action['title']}}
				</a>
			@endforeach
		</div>
	</div>
</div>