@extends('layouts.default')

@section('content')
<div class="panel-header bg-primary-gradient">
	<div class="page-inner py-5">
		<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
			
		</div>
	</div>
</div>
<div class="page-inner mt--5">
	<div class="row">
		<div class="col-md-12">
			<div class="card full-height">

				<div class="card-header">
					<div class="card-head-row">
						<div class="card-title">Playlist Vidio <strong><u>{{ $playlist->judul_playlist }}</u></strong></div>
                        <a href="{{ route('playlist.index') }}" class="btn btn-warning btn-sm ml-auto">
                            <i class="fas fa-undo"></i>&nbsp;
                            Back
                        </a>
					</div>
				</div>

				<div class="card-body">

                    <div class="alert alert-info alert-dismissable">
                        <a class="panel-close close" data-dismiss="alert">×</a> 
                        <i class="fa fa-bell"></i>
                        &nbsp;&nbsp;*requirement foto 1080 x 1080 px.
                    </div>

                    <form method="post" action="{{ route('playlist.update', $playlist->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                        <div class="form-group">
                            <label for="judul">Playlist Vidio</label>
                            <input type="text" name="judul_playlist" value="{{ $playlist->judul_playlist }}" class="form-control" placeholder="Enter Judul">
                        </div>

                        <div class="form-group">
                            <label for="body">Deskripsi</label>
                            <textarea name="deskripsi" id="editor1" class="form-control">{{ $playlist->deskripsi }}</textarea>
                        </div>

                        @if (auth()->user()->level=="admin")
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="is_active" class="form-control">
                                    <option value="1" {{ $playlist->is_active == '1' ? 'selected' : ''}}>
                                        Publish
                                    </option>
                                    <option value="0" {{ $playlist->is_active == '0' ? 'selected' : ''}}>
                                        Draft
                                    </option>
                                </select>
                            </div>
                        @elseif (auth()->user()->level=="user")
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="is_active" class="form-control">
                                    <option value="0" {{ $playlist->is_active == '0' ? 'selected' : ''}}>
                                        Draft
                                    </option>
                                </select>
                            </div>
                        @endif

                        <div class="form-group">
                            <label for="gambar">Gambar Playlist</label>
                            <p>
                                *requirement 1080 x 1080 px
                            </p>
                            <input type="file" name="gambar_playlist" class="form-control">
                            <br>
                            <label for="gambar">Gambar Saat Ini</label>
                            <br>
                            <img src="{{ asset('uploads/' . $playlist->gambar_playlist) }}" width="200">
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary btn-sm" type="submit">SAVE</button>
                            <button class="btn btn-danger btn-sm" type="reset">RESET</button>
                        </div>
                    </form>
				</div>

			</div>
		</div>
	</div>
</div>
@endsection