@extends('layouts.backend')
@section('scripts')
<script type="text/javascript">
    function zan(){
        $.get("{{url('cloud/zan',$list['id'])}}",
            function(data){
                $('#zan').html('赞('+data+')');
        });
    }
    </script>
@stop

@section('content')
    <div class="grid_2">
    	<div class="da-panel">
        	<div class="da-panel-header">
            	<span class="da-panel-title">
                    <img src="{{{asset('images/icons/black/16/pencil.png')}}}" alt="" />
                    云测试
                </span>
            </div>
            <div class="da-panel-content">
            	<form class="da-form" method="post">
                	<div class="da-form-row">
                    	<label>测试标题</label>
                        <div class="da-form-item large">
                        	<p>{{$list['test_title']}}</p>
                        </div>
                    </div>
                	<div class="da-form-row">
                    	<label>测试内容</label>
                        <div class="da-form-item large">
                        	<p>{{$list['test_content']}}</p>
                        </div>
                    </div>
                    <a id="zan" href="javascript:zan()"><img src="{{{asset('images/icons/black/16/facebook_like.png')}}}" title="赞">赞({{$list['test_zans']}})</a>
                </form>
            </div>
        </div>
    </div>

@stop