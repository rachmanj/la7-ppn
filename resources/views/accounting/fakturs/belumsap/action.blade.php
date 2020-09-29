<form action="{{ route('accounting.fakturs.destroy', $model) }}" method="post">
    @method('DELETE') @csrf
    <div class="form-group" role="group" aria-label="Basic example">
        <a href="{{ route('accounting.fakturs.edit', $model) }}" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i></a>
        <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button>
    </div>
</form>
