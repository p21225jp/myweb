@extends('layouts.backend')

@section('content')
    <div class="grid_2">
    	<div class="da-panel">
        	<div class="da-panel-header">
            	<span class="da-panel-title">
                    <img src="images/icons/black/16/pencil.png" alt="" />
                    完善个人信息
                </span>
            </div>
            <div class="da-panel-content">
            	<form class="da-form" method="post">
                	<div class="da-form-row">
                    	<label>真实姓名</label>
                        <div class="da-form-item large">
                        	<input type="text" name="true_name" value="{{$user_message['true_name']}}"/>
                        </div>
                    </div>
                	<div class="da-form-row">
                    	<label>身份证号</label>
                        <div class="da-form-item large">
                        	<input type="text" name="accounts" value="{{$user_message['accounts']}}"/>
                        </div>
                    </div>
                    <div class="da-form-row">
                    	<label>手机号</label>
                        <div class="da-form-item large">
                        	<input type="text" name="phone" value="{{$user_message['phone']}}"/>
                        </div>
                    </div>
                    <div class="da-form-row">
                    	<label>邮箱</label>
                        <div class="da-form-item large">
                        	<input type="text" name="e_mail" value="{{$user_message['e_mail']}}"/>
                        </div>
                    </div>
                    <div class="da-button-row">
                    	<input type="submit" value="保存" class="da-button green" />
                    </div>
                </form>
            </div>
        </div>
    </div>

@stop