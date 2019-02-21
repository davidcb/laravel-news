@extends('admin.layouts.app')

@section('content')

<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				<div class="row justify-content-between">
					<div class="col-2">
						<i class="fa fa-align-justify"></i> Noticias
					</div>
					<div class="col-4 text-right actions">
						<a href="{{ route('admin.news.create') }}"><i class="fa fa-plus"></i></a>
						<a class="delete_selected" href="#"><i class="fa fa-trash"></i></a>
					</div>
				</div>
			</div>
			<div class="card-body">
				<table class="table table-responsive-sm table-striped">
					<thead>
						<tr class="header">
							<th class="checkbox2"><input type="checkbox" id="selectAll" name="selectAll" value="1" /></th>
							<th>Título</th>
							<th>Descripción</th>
							<th>Fecha de publicación</th>
							<th>Acciones</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($news as $new)
						<tr>
							<td class="checkbox2"><input type="checkbox" name="selected[]" value="{{ $new->id }}" class="check" /></td>
							<td>{{ $new->title }}</td>
							<td>{{ str_limit(strip_tags($new->description), 200) }}</td>
							<td>{{ $new->publishedAtReadable() }}</td>
							<td class="actions">
								<a class="edit" href="{{ route('admin.news.edit', $new->id) }}"><i class="fa fa-edit"></i></a>
								<a class="delete" href="{{ route('admin.news.destroy', $new->id) }}"><i class="fa fa-trash"></i></a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>

				{!! $pagination->render() !!}
			</div>
		</div>
	</div>
</div>

@endsection

@section('scripts')
@parent

<script>
	$(function() {
		$('.delete_selected').click(function(e) {
			e.preventDefault();
			if (confirm('¿Estás seguro de que deseas eliminar las noticias seleccionadas?')) {
				$('.checkbox2 input:checked').each(function() {
					clicked = $(this).parent().parent();
					deleteFromList(clicked);
				});
			}
		});

		$('tbody .delete').click(function(e) {
			e.preventDefault();
			if (confirm('¿Estás seguro de que deseas eliminar esta noticia?')) {
				clicked = $(this).parent().parent();
				deleteFromList(clicked);
			}
		});

		$('.reset').click(function(e) {
			e.preventDefault();
			window.location.replace($('#form').attr('action'));
		});
	});
</script>

@endsection
