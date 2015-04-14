@extends('layouts.backend')

@section('content')
	<div class="grid_2">
    	<div class="da-panel">
        	<div class="da-panel-header">
            	<span class="da-panel-title">
                    <img src="{{{asset('images/icons/black/16/list.png')}}}" alt="">
                    Uploads
                </span>
            </div>
            <div class="da-panel-content">
            	<form class="da-form" method="post" enctype="multipart/form-data">
                	<div class="da-form-row">
                        <label>Styled File Input</label>
                        <div class="da-form-item large">
                            <input type="file" class="da-custom-file" name="pic"/>
                        </div>
                    </div>
                    <div class="da-button-row">
                        <button type="submit" class="da-button green">save</button>
                        <input type="hidden" name="user_id" value="{{ $user_id }}"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('scripts')
<script type="text/javascript" src="{{{asset('js/jquery.fileinput.js')}}}"></script>
@stop
