@extends('def')

@section('id','space')
@section('title')
- {{ $user->name}} 的空间
@endsection
@section('content')
@include('common.space-banner')
<div class="container space-main">
	@include('common.space-menu',['menu'=>'home'])
	<div class="row">
		@include('common.space-side')
		<article class="col-md-9">
			<p>&nbsp;</p>
			<br>	
			@if($user->isme())
			<div class="row text-center">
				<div class="col-md-4"> 
					<div class="hot-nav"> 
						<p><i class="glyphicon glyphicon-map-marker hot-nav-icon" ></i></p>
						<p class="text-muted">放松一下，写下旅途的点滴吧！</p>
						<a href="/notes/create" class="btn btn-success "> <i class="glyphicon glyphicon-pencil"></i> 写游记</a> 
					</div> 
				</div>
				<div class="col-md-4"> <div class="hot-nav">
					<p><i class="glyphicon glyphicon-globe hot-nav-icon" ></i></p>
					<p class="text-muted">看看攻略，找找灵感！</p>
					<a href="/guides" target="_blank" class="btn btn-warning "> <i class="glyphicon glyphicon-eye-open"></i> 看攻略</a> 
					</div></div>
				<div class="col-md-4"> 
					<div class="hot-nav last">
					
						<p><i class="glyphicon glyphicon-road hot-nav-icon"></i></p>
						<p class="text-muted">背上行囊，期待旅行的邂逅！</p>
						<a href="" class="btn btn-warning"> <i class="glyphicon glyphicon-certificate"></i> 参加活动</a>
					</div>
				</div>
			</div>
			<p>&nbsp;</p>
			@endif
			<h4 class="space-head"> <a href="/u/{{$user->id}}/notes" class="pull-right text-md"> 更多 </a> 我的游记</h4>
			@if ($notes->count()>0)
				@include('space.note-list')
			@else
				<div class=" well-space  text-center text-muted">
					还没有写游记！@if($user->isme()) 放松一下，写下第一篇  <a href="/notes/create">游记</a> 吧！@endif
				</div>
			@endif

			{{-- <p>&nbsp;</p>
			<h4 class="space-head"> <a href="#" class="pull-right text-md"> 更多 </a>  我的点评</h4>
			<div class=" well-space  text-center text-muted">
				潜水中，还没有点评！@if($user->isme()) 去逛逛，用你的旅行经验去<a href="#">帮助</a> 更多人吧！  @endif
			</div> --}}
			<p>&nbsp;</p>
			<h4 class="space-head"> <a href="/u/{{$user->id}}/acts" class="pull-right text-md"> 更多 </a> 我参加的活动</h4>
			<br>
			@if($members->count()>0)
				@foreach($members as $member)
					@include('activity.member-table',['atitle'=>true])
				@endforeach
			@else
				<div class=" well-space  text-center text-muted">
					还没有参加活动！@if($user->isme()) 去看看有没有喜欢的  <a href="/activities" target="_blank">活动</a> ！  @endif
				</div>
			@endif
			
			<p>&nbsp;</p>
		</article>
	</div>
</div>

@endsection