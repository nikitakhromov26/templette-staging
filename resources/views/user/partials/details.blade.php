<div class="panel panel-default">
    <div class="panel-heading">User Details</div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="first_name">Role</label>
                    {!! Form::select('role', $roles, $edit ? $user->roles->first()->id : '',
                        ['class' => 'form-control', 'id' => 'role', $profile ? 'disabled' : '']) !!}
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    {!! Form::select('status', $statuses, $edit ? $user->status : '',
                        ['class' => 'form-control', 'id' => 'status', $profile ? 'disabled' : '']) !!}
                </div>
                <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input type="text" class="form-control" id="first_name"
                           name="first_name" placeholder="First Name" value="{{ $edit ? $user->first_name : '' }}">
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" class="form-control" id="last_name"
                           name="last_name" placeholder="Last Name" value="{{ $edit ? $user->last_name : '' }}">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="birthday">Date of Birth</label>
                    <div class="form-group">
                        <div class='input-group date'>
                            <input type='text' name="birthday" id='birthday' value="{{ $edit ? $user->birthday : '' }}" class="form-control" />
                            <span class="input-group-addon" style="cursor: default;">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" id="phone"
                           name="phone" placeholder="Phone" value="{{ $edit ? $user->phone : '' }}">
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address"
                           name="address" placeholder="Street" value="{{ $edit ? $user->address : '' }}">
                </div>
                <div class="form-group">
                    <label for="address">Country</label>
                    {!! Form::select('country_id', $countries, $edit ? $user->country_id : '', ['class' => 'form-control']) !!}
                </div>
            </div>

            @if ($edit)
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary" id="update-details-btn">
                        <i class="fa fa-refresh"></i>
                        Update Details
                    </button>
                </div>
            @endif
        </div>
    </div>
</div>