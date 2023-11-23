/*
 *  jQuery sws_chat - v1.1.1
 *  Author: Er. Sunny Kumar
 *  Email: sunnyrajkum@gmail.com
 *
 *  Made by Mastermind
 *  Under MIT License
 */
//sws_chat.js
	function sws_void(){
		var msgBox = $('.chat-app');
		
		websocket.onopen = function(ev) { 
			msgBox.append('<div class="system_msg" style="color:#bbbbbb">Welcome to "Chat Server"!</div>'); 
		}
	
		websocket.onmessage = function(ev) { 
		
			var response 		= JSON.parse(ev.data); 
			var res_type 		= response.type; 
			var user_message 	= response.message; 
			var user_name 		= response.name; 
			var sws_self		= response.sws_self;
			var user_color 		= response.color; 
			var time			= response.time; 
			var year 			= response.year; 
			var date 			= response.date; 

			switch(res_type){
				case 'usermsg':
					var align_set=$('#name').val();
					if(response.message!=null)
					{
						
					}
					
					if(sws_self=='true')
					{
						msgBox.append('<div class="direct-chat-msg right mb-30"><div class="clearfix mb-15"><span class="direct-chat-name pull-right" style="color:' + user_color + '">' + user_name + '</span><span class="direct-chat-timestamp pull-right">'+date+'</span></div><div class="direct-chat-text"><p>' + user_message + '</p><p class="direct-chat-timestamp"><time datetime="'+year+'">'+time+'</time></p></div></div>');
					}if(sws_self=='false'){
						msgBox.append('<div class="direct-chat-msg mb-30" ><div class="clearfix mb-15"><span class="direct-chat-name">' + user_name + '</span><span class="direct-chat-timestamp pull-right">'+date+'</span></div><div class="direct-chat-text"><p>' + user_message + '</p><p class="direct-chat-timestamp"><time datetime="'+year+'">'+time+'</time></p></div></div>');
					}
					
					break;
				case 'system':
					/*msgBox.append('<div style="color:#bbbbbb">' + user_message + '</div>');*/
					break;
			}
			msgBox[0].scrollTop = msgBox[0].scrollHeight; 
		
		};
	
		websocket.onerror	= function(ev){ msgBox.append('<div class="system_error">Error Occurred - ' + ev.data + '</div>'); }; 
		websocket.onclose 	= function(ev){ msgBox.append('<div class="system_msg">Connection Closed</div>'); }; 
	}
	
	$('#send-message').click(function(){
		send_message();
	});
	
	$( "#message" ).on( "keydown", function( event ) {
	  if(event.which==13){
		  send_message();
	  }
	});
	
	function send_message(){
		var message_input = $('#message'); 
		var name_input = $('#name'); 
		var to_user_input = $('#to_user_id');
		
		if(message_input.val() == ""){ 
			alert("Enter Some message Please!");
			return;
		}
		send(to_user_input.val(), message_input.val(), name_input.val());
	}
	
	$(function () {
		
		   $(".close-chat").on("click", function (e) {
			   $("#chat_box_" + $(this).attr('close-to-user')).remove();
			   $(this).parents("div.chat-opened").removeClass("chat-opened").slideUp("fast");
			   location.reload(); 
		   });

		   $(".chat-toggle").on("click", function (e) {
			   e.preventDefault();

			   let ele = $(this);
			   let user_id = ele.attr("data-id");
			   let username = ele.attr("data-user");

			   cloneChatBox(user_id, username, function () {
				   let chatBox = $("#chat_box_" + user_id);

				   if(!chatBox.hasClass("chat-opened")) {
					   chatBox.addClass("chat-opened").slideDown("fast");
					   loadLatestMessages(chatBox, user_id);
					   chatBox.find(".chat-app").animate({scrollTop: chatBox.find(".chat-app").offset().top + chatBox.find(".chat-app").outerHeight(true)}, 800, 'swing');
				   }
			   });
		   });
		   
		   let lastScrollTop = 0;

		   $(".chat-app").on("scroll", function (e) {
			   let st = $(this).scrollTop();
			   if(st < lastScrollTop) {
				   fetchOldMessages($(this).parents(".chat-opened").find("#to_user_id").val(), $(this).find(".msg_container:first-child").attr("data-message-id"));
			   }

			   lastScrollTop = st;
		   });
	   
	 });
	 
function loadLatestMessages(container, user_id)
{
    let chat_area = container.find(".chat-app");
    chat_area.html("");
	
    $.ajax({
        url: sws_url + "load-latest-messages",
        data: {user_id: user_id, _token: $("meta[name='csrf-token']").attr("content")},
        method: "GET",
        dataType: "json",
        beforeSend: function () {
            if(chat_area.find(".loader").length  == 0) {
                chat_area.html(loaderHtml());
            }
        },
        success: function (response) { 
            if(response.state == 1) {
                response.messages.map(function (val, index) {
                    $(val).appendTo(chat_area);
                });
            }
        },
        complete: function () {
            chat_area.find(".loader").remove();
        }
    });
}

function fetchOldMessages(to_user, old_message_id)
{
    let chat_box = $("#chat_box_" + to_user);
    let chat_area = chat_box.find(".chat-app");

    $.ajax({
        url: sws_url + "fetch-old-messages",
        data: {to_user: to_user, old_message_id: old_message_id, _token: $("meta[name='csrf-token']").attr("content")},
        method: "GET",
        dataType: "json",
        beforeSend: function () {
            if(chat_area.find(".loader").length  == 0) {
                chat_area.prepend(loaderHtml());
            }
        },
        success: function (response) {
			if(response.state == 1) {
                if(response.data.length > 0) {
					response.data.map(function (val, index) {
						$("#chat_box_" + response.to_user).find(".chat-app").prepend(val);
					});
				}
            }
        },
        complete: function () {
            chat_area.find(".loader").remove();
        }
    });
}

function cloneChatBox(user_id, username, callback)
{
    if($("#chat_box_" + user_id).length == 0) {

        let cloned = $("#chat_box").clone(true);
        cloned.attr("id", "chat_box_" + user_id);
		cloned.find(".chat-user").text(username);
		cloned.find(".close-chat").attr("close-to-user", user_id);
        cloned.find(".publisher-btn").attr("data-to-user", user_id);
        cloned.find("#to_user_id").val(user_id);
        $("#chat-overlay").append(cloned);
    }

	sws_void();
    callback();
	$(".sample").remove();
}

function loaderHtml() {
    return '<i class="glyphicon glyphicon-refresh loader"></i>';
}
