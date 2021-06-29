<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<div class="card-body">
    <?php $permissions=\App\Models\Permission::all(); ?>
    @if($permissions->count()>0)
    <form method="POST" action="{{ url('api/permission-update') }}">
       @foreach($permissions as $prm)
       <input type="hidden" name="id" value="{{$prm->id}}">
        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>

            <div class="col-md-6">
                <select class="form-control" name="status">
                    <option value="{{$prm->status}}">Current @if($prm->status==1) Active @else Deactive @endif </option>
                    <option value="1">Active</option>
                    <option value="0">Deactive</option>
                </select>
            </div>
        </div>
        @endforeach
        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-success">
                    {{ __('Change Permission') }}
                </button>
            </div>
        </div>
    </form>
    @else
    <form method="POST" action="{{ url('api/permission-post') }}">

        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>

            <div class="col-md-6">
                <select class="form-control" name="status">
                    <option value="1">Active</option>
                    <option value="0">Deactive</option>
                </select>
            </div>
        </div>
        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Permission Push') }}
                </button>
            </div>
        </div>
    </form>

    @endif

</div>