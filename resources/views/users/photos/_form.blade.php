<form class="form-horizontal" method="POST" action="{{ route('users.photos.store') }}" enctype="multipart/form-data">
    {{ csrf_field() }}

    <div class="form-group">
        <label for="photo" class="col-md-4 control-label">Photo</label>

        <div class="col-md-6">
            <input class="form-control" type="file" id="photo" name="photo" required>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-8 col-md-offset-4">
            <button type="submit" class="btn btn-primary">
                Upload
            </button>
        </div>
    </div>
</form>