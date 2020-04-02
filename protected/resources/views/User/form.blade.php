


{!! Form::model($model, [
    'route' => 'user.store',
    'method' => 'POST'
]) !!}
    @csrf

        <div class="form-group">
            <label>Nama <span class="validasi">*</span></label>
            {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) !!}
        </div>
        <div class="form-group">
            <label>Email <span class="validasi">*</span></label>
            {!! Form::email('email', null, ['class' => 'form-control', 'id' => 'email']) !!}
        </div>

{!! Form::close() !!}