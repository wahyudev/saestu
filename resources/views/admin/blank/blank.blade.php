@extends('adminlte::page')

@section('title', 'Manage Menu')

@section('content_header')
    <h1>Setup Page Header<small>Setup website page header</small></h1>
    <ol class="breadcrumb">
      <li class="active"><a href="{{url('admin/page-header')}}"><i class="fa fa-wrench"></i> Setup Page Header</a></li>
    </ol>
@stop

@section('content')
  <div class="row">
    <div class="col-lg-12 col-xs-12">
      @if(Session::has('alert'))
        @include('layouts.alert')
      @endif
      <div class="box box-info">
        <div class="box-header with-border">
          <div class="pull-right">
            <a href="#add-menu" data-toggle="modal"  class="btn btn-sm btn-primary"><i class="fa fa-wrench"></i> Setup Page Header</a>
          </div>
        </div>
        <div class="box-body">
          
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="add-menu">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="{{url('admin/manage-menu/')}}" method="post" class="form-horizontal">
                @csrf
                <div class="modal-header">
                    <div class="modal-title">
                        <h3><b><i class="glyphicon glyphicon-plus"></i> Add new Menu</b></h3>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-sm-3">Menu Name</label>
                        <div class="col-sm-8">
                            <input type="text" name="menu_name" class="form-control" placeholder="Menu Name" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">URL</label>
                        <div class="col-sm-8">
                            <input type="text" name="url" class="form-control" placeholder="Menu URL" required="">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-3">Type</label>
                        <div class="col-sm-offset-1 col-sm-8">
                           <div class="radio">
                             <input type="radio" name="type" value="admin_menu"> Admin Menu
                           </div>
                           <div class="radio">
                             <input type="radio" name="type" value="front_menu"> Front Menu
                           </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-3">Icon</label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                
                                <input type="text" name="icon"  class="form-control icon" placeholder="Pick an icon" >
                                <div class="input-group-btn">
                                    <button type="button" class="btn btn-primary btn-md button-icon" data-search="true" data-rows="5" data-cols="5" data-search="true" data-iconset="fontawesome" data-selected-class="btn-danger" data-unselected-class="btn-info" data-placement="top" id="target"   role="iconpicker"></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Close</button>
                    <button  class="btn btn-sm btn-info"><i class="glyphicon glyphicon-floppy-disk"></i> Save</button>
                </div>
            </form>
        </div>
    </div>
  </div>
  <div class="modal fade" id="edit-menu">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="" id="form-edit-menu" method="post" class="form-horizontal">
                @csrf
                @method('patch')
                <div class="modal-header">
                    <div class="modal-title">
                        <h3><b><i class="fa fa-edit"></i> Edit Menu</b></h3>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-sm-3">Menu Name</label>
                        <div class="col-sm-8">
                            <input type="text" name="menu_name" id="menu_name" class="form-control" placeholder="Menu Name" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">URL</label>
                        <div class="col-sm-8">
                            <input type="text" name="url" id="url" class="form-control" placeholder="Menu URL" required="">
                        </div>
                    </div>
                    
                   
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Close</button>
                    <button  class="btn btn-sm btn-info"><i class="glyphicon glyphicon-floppy-disk"></i> Update</button>
                </div>
            </form>
        </div>
    </div>
  </div>
@stop

@section('css')
  @include('plugins.alertify-css')
  @include('plugins.icon-picker-css')
@stop

@section('js')
  @include('plugins.alertify-js')
 
    <script>

      function deletemenu(id,menu) {
        alertify.confirm("Confirmation!","Are sure to delete menu "+menu+" ?",function(){
          $('#'+id).submit();
        },function(){

        })
      }
      function editmenu(id)
      {
         $.ajax({
            url:baseURL()+"/admin/manage-menu/"+id+"/edit",
            type:'get',
            success:function(data)
            {
                $('#edit-menu').modal('show');
                var url=baseURL()+"/admin/manage-menu/"+id;
                $('#form-edit-menu').attr('action',url);
                $('#menu_name').val(data.menu_name);
                $('#url').val(data.url);
                $('#icon').val(data.icon);
                $("#parent_id option[value='"+data.parent_id+"']").prop('selected',true);
                $("input[value='"+data.type+"']").prop('checked',true);
                
                

            }
        });
      }
    </script>
@stop