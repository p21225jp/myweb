@extends('layouts.backend')

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
                        	<input type="text" name="test_title" value="{{$list['test_title'] or ''}}"/>
                        </div>
                    </div>
                	<div class="da-form-row">
                    	<label>测试内容</label>
                        <div class="da-form-item large">
                        	<textarea rows="auto" cols="auto" name="test_content">{{$list['test_content'] or ''}}</textarea>
                        </div>
                    </div>
                    <div class="da-form-row">
                        <label>编号</label>
                        <div class="da-form-item large">
                            <input type="text" name="order" value="{{$list['order'] or ''}}"/>
                        </div>
                    </div>
                    <div class="da-button-row">
                    	<input type="submit" value="保存" class="da-button green" />
                    </div>
                    <input type="hidden" name="id" value="{{ $list['id'] or 0}}"/>
                </form>
            </div>
        </div>
    </div>

@stop