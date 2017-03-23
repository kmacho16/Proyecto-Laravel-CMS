<div class="modal fade" tabindex="-1" id="modal-user" role="dialog" aria-labelledby="gridSystemModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel">Informacion del usuario</h4>
      </div>
      <div class="modal-body">
      {!!Form::model(Auth::user(),['route'=>['admin.update',Auth::user()->id],'method'=>'PUT','files'=>true])!!}
        @include('admin.userForm.modalForm')
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
         {!!Form::close()!!}
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->