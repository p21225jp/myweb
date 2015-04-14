@extends('layouts.backend')

@section('content')
<!--<input type="button" class="da-button green" value="新增测试">-->
<div class="grid_4">
	<a href="{{url('cloud/page')}}"><input type="button" class="da-button green" value="新增测试"/></a>
	<div class="da-panel collapsible"><br/>
    	<div class="da-panel-header">
        	<span class="da-panel-title">
                <img src="{{{asset('images/icons/black/16/list.png')}}}" alt="">
                Test Data Table
            </span>            
        </div>
        <div class="da-panel-content">
            <div id="da-ex-datatable-default_wrapper" class="dataTables_wrapper" role="grid"><table id="da-ex-datatable-default" class="da-table dataTable" aria-describedby="da-ex-datatable-default_info">
                <thead>
                    <tr role="row">
                        <th>ID</th>
                    	<th>测试标题</th>
                    	<th>测试内容</th>
                    	<th>最后修改时间</th>
                    	<th>操作</th>
                    </tr>
                </thead>
                <tbody>
            	@if(isset($list))
            	@foreach($list as $item)
            		<tr>
                        <td>{{$item['id']}}</td>
            			<td>{{$item['test_title']}}</td>
            			<td>{{$item['test_content']}}</td>
            			<td>{{$item['updated_at']}}</td>
            			<td>
                            <a href="#mymodal" data-toggle="modal" onclick="show({{$item['id']}})"><img src="{{{asset('images/icons/black/16/preview.png')}}}" title="查看"></a>&nbsp;
            				<a href="{{url('cloud/page',$item['id'])}}"><img src="{{{asset('images/icons/black/16/pencil.png')}}}" title="编辑"></a>&nbsp;
            				<a href="{{url('cloud/del',$item['id'])}}" onclick="return confirm('确定删除？')"><img src="{{{asset('images/icons/black/16/trashcan.png')}}}" title="删除"></a>
            			</td>
            		</tr>
            	@endforeach
            	@endif
                </tbody>    
            </table>
        </div>
    </div>
</div>
{{$list->links()}}
<!-- Modal -->
<div id="mymodal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width:800px">
        <div class="modal-content">
            <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">
                    预览
                </h3>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                 <button class="btn" data-dismiss="modal" aria-hidden="true">关闭</button>
            </div>
        </div>
    </div>
</div>
<script>
    function show(id)
    {
        $.ajax({
            url:"{{url('cloud/view')}}"+'/'+id,
            dataType:"json",
            success:function(data)
            {
                var _html='';
                _html="<p>标题："+data.cloud.test_title+"</p>"+
                      "<p>内容："+data.cloud.test_content+"</p>"+
                      "<p>编号："+data.cloud.order+"</p>";
                $('#mymodal .modal-body').html(_html);

            }
        });
    }
</script>
@stop
