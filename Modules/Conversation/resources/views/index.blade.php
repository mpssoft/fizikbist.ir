
    @extends('layouts.user.master')


@section('content')
<div class="bg-gradient-to-br from-slate-100 to-slate-200 dark:from-gray-900 dark:to-slate-900">
<div class="max-w-6xl mx-auto p-4 chat-container">
    <!-- Chat Header -->
    <div class="bg-white dark:bg-gray-800 rounded-t-2xl shadow-lg border-b border-gray-200 dark:border-gray-700 p-6">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-full bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center">
                    <i class="fas fa-comments text-white text-xl"></i>
                </div>
                <div>
                    <h1 class="text-xl font-bold text-gray-900 dark:text-white">اتاق گفتگوی عمومی</h1>

                </div>
            </div>
            <div class="flex items-center gap-3">
                <button class="p-2 rounded-lg bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-400 hover:bg-gray-200 dark:hover:bg-gray-600 transition">
                    <i class="fas fa-search"></i>
                </button>
                <button class="p-2 rounded-lg bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-400 hover:bg-gray-200 dark:hover:bg-gray-600 transition">
                    <i class="fas fa-cog"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Messages Container -->
    <div class="bg-white dark:bg-gray-800 messages-container overflow-y-auto p-6 space-y-6" id="messagesContainer">


        @foreach($conversations as $message )
            @php $lastId = $message->id; @endphp
            @if(auth()->user()->id == $message->user_id && $message->parent_id == null)
                <!-- My Message -->
                <div class="flex items-start gap-3 justify-end">
                    <div class="flex-1 max-w-md">
                        <div class="flex items-center gap-2 mb-1 justify-end">
                            <span class="text-xs text-gray-500 dark:text-gray-400">{{\Morilog\Jalali\Jalalian::forge($message->created_at)->ago()}}</span>
                            <span class="text-sm font-medium text-gray-900 dark:text-white">شما</span>
                        </div>
                        <div class="bg-gradient-to-r from-blue-500 to-blue-600 rounded-2xl rounded-tl-sm p-4">
                            <p class="text-white">{{$message->body}}</p>
                        </div>
                        <div class="flex items-center gap-3 mt-2 justify-end">
                        {{--
            <span class="text-xs text-gray-500 dark:text-gray-400">
              <i class="fas fa-check-double text-blue-500 ml-1"></i>خوانده شده
            </span>--}}
                        </div>
                    </div>
                    <div class="w-10 h-10 rounded-full bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center text-white font-semibold text-sm">
                        ع
                    </div>
                </div>
            @elseif(auth()->user()->id != $message->user_id && $message->parent_id == null)
                <!-- Other User Message -->
                <div class="flex items-start gap-3">
                    <div class="w-10 h-10 rounded-full bg-gradient-to-br from-green-500 to-emerald-600 flex items-center justify-center text-white font-semibold text-sm">
                        س
                    </div>
                    <div class="flex-1 max-w-md">
                        <div class="flex items-center gap-2 mb-1">
                            <span class="text-sm font-medium text-gray-900 dark:text-white">{{$message->user->name}} </span>
                            <span class="text-xs text-gray-500 dark:text-gray-400">{{\Morilog\Jalali\Jalalian::forge($message->created_at)->ago()}}</span>
                        </div>
                        <div class="bg-gray-100 dark:bg-gray-700 rounded-2xl rounded-tr-sm p-4">
                            <p class="text-gray-900 dark:text-white">{{$message->body}}</p>
                        </div>
                        <div class="flex items-center gap-3 mt-2">
                            <button onclick="replyToMessage('{{$message->user->name}}', '{{$message->body}}','{{$message->id}}')" class="text-xs text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-400 transition">
                                <i class="fas fa-reply ml-1"></i>پاسخ
                            </button>
                            {{--<button class="text-xs text-gray-500 dark:text-gray-400 hover:text-red-600 dark:hover:text-red-400 transition">
                                <i class="fas fa-heart ml-1"></i>۳
                            </button>--}}
                        </div>
                    </div>
                </div>
            @elseif(auth()->user()->id != $message->user_id && $message->parent_id != null)

                <!-- Other User Reply Message -->
                <div class="flex items-start gap-3">
                    <div class="w-10 h-10 rounded-full bg-gradient-to-br from-orange-500 to-red-600 flex items-center justify-center text-white font-semibold text-sm">
                        م
                    </div>
                    <div class="flex-1 max-w-md">
                        <div class="flex items-center gap-2 mb-1">
                            <span class="text-sm font-medium text-gray-900 dark:text-white">{{$message->user->name}} </span>
                            <span class="text-xs text-gray-500 dark:text-gray-400">{{\Morilog\Jalali\Jalalian::forge($message->created_at)->ago()}}</span>
                        </div>
                        <!-- Reply Context -->
                        <div class="bg-gray-50 dark:bg-gray-600 rounded-lg p-3 mb-2 border-r-4 border-blue-500">
                            <div class="text-xs text-gray-600 dark:text-gray-300 mb-1">پاسخ به {{\Modules\Conversation\Models\Conversation::where('id',$message->parent_id)->first()->user->name}}:</div>
                            <div class="text-sm text-gray-700 dark:text-gray-200">{{\Modules\Conversation\Models\Conversation::where('id',$message->parent_id)->first()->body}}</div>
                        </div>
                        <div class="bg-gray-100 dark:bg-gray-700 rounded-2xl rounded-tr-sm p-4">
                            <p class="text-gray-900 dark:text-white">{{$message->body}}</p>
                        </div>
                        <div class="flex items-center gap-3 mt-2">
                            <button onclick="replyToMessage('{{$message->user->name}}', '{{$message->body}}','{{$message->id}}')" class="text-xs text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-400 transition">
                                <i class="fas fa-reply ml-1"></i>پاسخ
                            </button>
                            {{--<button class="text-xs text-gray-500 dark:text-gray-400 hover:text-red-600 dark:hover:text-red-400 transition">
                                <i class="fas fa-heart ml-1"></i>۱
                            </button>--}}
                        </div>
                    </div>
                </div>
            @else
                <!-- My Reply Message -->
                <div class="flex items-start gap-3 justify-end">
                    <div class="flex-1 max-w-md">
                        <div class="flex items-center gap-2 mb-1 justify-end">
                            <span class="text-xs text-gray-500 dark:text-gray-400">{{\Morilog\Jalali\Jalalian::forge($message->created_at)->ago()}}</span>
                            <span class="text-sm font-medium text-gray-900 dark:text-white">شما</span>
                        </div>
                        <!-- Reply Context -->
                        <div class="bg-blue-50 dark:bg-blue-900/30 rounded-lg p-3 mb-2 border-r-4 border-gray-400">
                            <div class="text-xs text-blue-600 dark:text-blue-300 mb-1"> به  پاسخ  {{\Modules\Conversation\Models\Conversation::where('id',$message->parent_id)->first()->user->name}}:</div>
                            <div class="text-sm text-blue-700 dark:text-blue-200">پاسخ به {{\Modules\Conversation\Models\Conversation::where('id',$message->parent_id)->first()->body}}</div>
                        </div>
                        <div class="bg-gradient-to-r from-blue-500 to-blue-600 rounded-2xl rounded-tl-sm p-4">
                            <p class="text-white">{{$message->body}}</p>
                        </div>
                        <div class="flex items-center gap-3 mt-2 justify-end">
            <span class="text-xs text-gray-500 dark:text-gray-400">
              <i class="fas fa-check text-gray-400 ml-1"></i>ارسال شده
            </span>
                        </div>
                    </div>
                    <div class="w-10 h-10 rounded-full bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center text-white font-semibold text-sm">
                        ع
                    </div>
                </div>
            @endif
        @endforeach

    </div>

    <!-- Reply Preview (Hidden by default) -->
    <div id="replyPreview" class="hidden bg-gray-50 dark:bg-gray-700 border-t border-gray-200 dark:border-gray-600 p-4">
        <div class="flex items-center justify-between mb-2">
            <div class="flex items-center gap-2">
                <i class="fas fa-reply text-blue-500"></i>
                <span class="text-sm font-medium text-gray-700 dark:text-gray-300">در حال پاسخ به <span id="replyToUser"></span>:</span>
            </div>
            <button onclick="cancelReply()" class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="reply-preview bg-white dark:bg-gray-600 rounded-lg p-3 border-r-4 border-blue-500">
            <div id="replyContent" class="text-sm text-gray-700 dark:text-gray-200"></div>
        </div>
    </div>

    <!-- Message Input -->
    <div class="bg-white dark:bg-gray-800 rounded-b-2xl shadow-lg border-t border-gray-200 dark:border-gray-700 p-6">
        <div class="flex items-end gap-4">
            <button class="p-3 rounded-full bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-400 hover:bg-gray-200 dark:hover:bg-gray-600 transition">
                <i class="fas fa-paperclip"></i>
            </button>
            <div class="flex-1">
          <textarea id="messageInput"
                    placeholder="پیام خود را بنویسید..."
                    rows="1"
                    class="w-full px-4 py-3 rounded-2xl border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 resize-none transition"
                    onkeydown="handleKeyDown(event)"
                    oninput="autoResize(this)"></textarea>
            </div>
            <button onclick="sendMessage()"
                    class="p-3 rounded-full bg-gradient-to-r from-blue-500 to-blue-600 text-white hover:from-blue-600 hover:to-blue-700 transition shadow-lg">
                <i class="fas fa-paper-plane"></i>
            </button>
        </div>
    </div>
</div>
</div>

@endsection
    <script src="/js/jquery/jquery.min.js"></script>
    <script>
        let lastMessageId = {{$lastId}};

        // Send message
        $('#send-btn').click(function () {
            let content = $('#message-input').val();
            if (!content) return;

            $.ajax({
                url: "{{ route('conversation.send') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    content: content
                },
                success: function (msg) {
                    $('#messages').append(`<div><b>You:</b> ${msg.content}</div>`);
                    $('#message-input').val('');
                    lastMessageId = msg.id;
                }
            });
        });

        // Fetch unseen messages every 3 seconds
     /*   setInterval(function () {
            $.ajax({
                url: "{{ route('conversation.unseen') }}",
                type: "GET",
                data: { last_id: lastMessageId },
                success: function (msgs) {
                    msgs.forEach(msg => {
                        $('#messages').append(`<div><b>User ${msg.user_id}:</b> ${msg.content}</div>`);
                        lastMessageId = msg.id;
                    });
                }
            });
        }, 3000);*/
    </script>

    <script>
    let replyingTo = null;

    // Auto-resize textarea
    function autoResize(textarea) {
        textarea.style.height = 'auto';
        textarea.style.height = Math.min(textarea.scrollHeight, 120) + 'px';
    }

    // Handle Enter key
    function handleKeyDown(event) {
        if (event.key === 'Enter' && !event.shiftKey) {
            event.preventDefault();
            sendMessage();
        }
    }

    // Send message
    function sendMessage() {
        const messageInput = document.getElementById('messageInput');
        const messageText = messageInput.value.trim();

        if (!messageText) return;

        $.ajax({
            url: "{{ route('conversation.send') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                body: messageText,
                parentId : replyingTo ? replyingTo.parentId : null,
                lastId : lastMessageId
            },
            success: function (msg) {

                msg = JSON.stringify(msg);
                alert(msg)
//                lastMessageId = msg.id;
            },
            error: function(msg){
                alert(msg.responseText)
            }

        });
        const messagesContainer = document.getElementById('messagesContainer');
        const currentTime = new Date().toLocaleTimeString('fa-IR', {
            hour: '2-digit',
            minute: '2-digit'
        });

        // Create message element
        const messageDiv = document.createElement('div');
        messageDiv.className = 'flex items-start gap-3 justify-end message-enter';

        let replyHtml = '';
        if (replyingTo) {
            replyHtml = `
          <div class="bg-blue-50 dark:bg-blue-900/30 rounded-lg p-3 mb-2 border-r-4 border-gray-400">
            <div class="text-xs text-blue-600 dark:text-blue-300 mb-1">پاسخ به ${replyingTo.user}:</div>
            <div class="text-sm text-blue-700 dark:text-blue-200">${replyingTo.message}</div>
          </div>
        `;
        }

        messageDiv.innerHTML = `
        <div class="flex-1 max-w-md">
          <div class="flex items-center gap-2 mb-1 justify-end">
            <span class="text-xs text-gray-500 dark:text-gray-400">${currentTime}</span>
            <span class="text-sm font-medium text-gray-900 dark:text-white">شما</span>
          </div>
          ${replyHtml}
          <div class="bg-gradient-to-r from-blue-500 to-blue-600 rounded-2xl rounded-tl-sm p-4">
            <p class="text-white">${messageText}</p>
          </div>
          <div class="flex items-center gap-3 mt-2 justify-end">
            <span class="text-xs text-gray-500 dark:text-gray-400">
              <i class="fas fa-check text-gray-400 ml-1"></i>ارسال شده
            </span>
          </div>
        </div>
        <div class="w-10 h-10 rounded-full bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center text-white font-semibold text-sm">
          ع
        </div>
      `;

        messagesContainer.appendChild(messageDiv);

        // Clear input and reply
        messageInput.value = '';
        messageInput.style.height = 'auto';
        cancelReply();

        // Scroll to bottom
        messagesContainer.scrollTop = messagesContainer.scrollHeight;

        // Simulate message status update
        setTimeout(() => {
            const statusSpan = messageDiv.querySelector('.fa-check');
            if (statusSpan) {
                statusSpan.className = 'fas fa-check-double text-blue-500 ml-1';
                statusSpan.parentElement.innerHTML = '<i class="fas fa-check-double text-blue-500 ml-1"></i>خوانده شده';
            }
        }, 2000);
    }

    // Reply to message
    function replyToMessage(user, message,parentId) {
        replyingTo = { user, message , parentId };

        const replyPreview = document.getElementById('replyPreview');
        const replyToUser = document.getElementById('replyToUser');
        const replyContent = document.getElementById('replyContent');

        replyToUser.textContent = user;
        replyContent.textContent = message;
        replyPreview.classList.remove('hidden');

        // Focus on input
        document.getElementById('messageInput').focus();
    }

    // Cancel reply
    function cancelReply() {
        replyingTo = null;
        document.getElementById('replyPreview').classList.add('hidden');
    }

    // Auto-scroll to bottom on page load
    document.addEventListener('DOMContentLoaded', function() {
        const messagesContainer = document.getElementById('messagesContainer');
        messagesContainer.scrollTop = messagesContainer.scrollHeight;
    });



</script>

