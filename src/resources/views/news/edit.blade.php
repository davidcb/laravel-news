@extends('admin.layouts.app')

@section('content')
<form id="form" role="form" method="POST" action="{{ route('admin.news.update', $news->id) }}">
	@csrf
	@method('PUT')

	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<strong>Actualizar noticia</strong>
				</div>
				<div class="card-body">
					<form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
						<div class="form-group row">
							<label class="col-md-3 col-lg-2 col-form-label" for="title">Título</label>
							<div class="col-md-9 col-lg-10">
								<input type="text" id="title" name="title" class="form-control" placeholder="Título" value="{{ old('title', $news->title) }}">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-3 col-lg-2 col-form-label" for="description">Descripción</label>
							<div class="col-md-9 col-lg-10">
								<textarea id="description" name="description" class="form-control" placeholder="Descripción">{{ old('description', $news->description) }}</textarea>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-3 col-lg-2 col-form-label" for="published_at">Fecha publicación</label>
							<div class="col-md-9 col-lg-10">
								<input type="text" id="published_at" name="published_at" class="form-control datepicker" placeholder="Fecha publicación" value="{{ old('published_at', $news->published_at) }}">
							</div>
						</div>
					</form>
				</div>
				<div class="card-footer">
					<button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i> Guardar</button>
					<a href="{{ URL::previous() }}" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i> Cancelar</a>
				</div>
			</div>
		</div>
	</div>
</form>

@endsection