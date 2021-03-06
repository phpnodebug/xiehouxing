(function(root,$){
	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
	});

	$('.emotion').qqFace({ 
        assign:'commentContent', //给输入框赋值 
        path:'/img/face/'    //表情图片存放的路径 
    });


	$('body').on('click','a.btn-remove',function(e){
		var msg = $(this).data('message')?$(this).data('message'):'您确定删除这条数据吗？';
		if (confirm(msg)){
			return true;
		}
		return false;
	});

	//swal({   title: "收藏成功",   text: "收藏成功",   timer: 1000,   showConfirmButton: false });


	function  updateSocialCount($el,ctype,callback){
		var action = $el.data('action');
		var target = $el.data('target');
		var id = $el.data('id');
		$.ajax({
			url:'/'+ ctype +'/'+target+ '/' + id +'/'+action,
			success:function(result){
				if (result!=-1){
					if (callback){
						callback($el,result);
					}
					
				}
			}
		});
	}

	function replace_em(str){ 
	    str = str.replace(/\</g,'<；'); 
	    str = str.replace(/\>/g,'>；'); 
	    str = str.replace(/\n/g,'<；br/>；'); 
	    str = str.replace(/\[em_([0-9]*)\]/g,'<img src="face/$1.gif" border="0" />'); 
	    return str; 
	} 
	

	$('a.btn-fav').on('click',function(e){
		e.preventDefault();
		updateSocialCount($(this),'fav',function($el,result){
					swal({title:'收藏成功！',timer: 1000,   showConfirmButton: false });
					$el.find('.icon-fav').removeClass('glyphicon-star-empty').addClass('glyphicon-star');
					$el.find('.favs').text(result);	
		});
	});

	$('a.btn-like').on('click',function(e){
		e.preventDefault();
		updateSocialCount($(this),'like',function($el,result){
					$el.find('.icon-like').removeClass('glyphicon-heart-empty').addClass('glyphicon-heart');
					$el.find('.likes').text(result);	
		});
	});

	// $('a.share-weixin').webuiPopover();

	$('a.pop-login').webuiPopover({width:500});

	$('a.gongzhonghao').webuiPopover({
		content:'<img src="/img/qrcode.jpg">'
	});



})(window,jQuery);
//# sourceMappingURL=main.js.map