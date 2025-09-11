@extends(auth()->user()->role === 'admin' ? 'layouts.admin.master' : 'layouts.user.master')


@section('content')
<div class=" bg-gradient-to-br h-full from-slate-100 to-slate-200 dark:from-gray-900 dark:to-slate-900 ">
<div class="w-full h-full flex flex-col max-w-6xl mx-auto md:p-4 chat-container">
    <!-- Chat Header -->
    <div class="bg-white dark:bg-gray-800 md:rounded-t-2xl shadow-lg border-b border-gray-200 dark:border-gray-700 p-6">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-full bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center">
                    <i class="fas fa-question text-white text-xl"></i>
                </div>
                <div>
                    <h1 class="text-xl font-bold text-gray-900 dark:text-white">پرسش و پاسخ</h1>

                </div>
            </div>
            <div class="flex items-center gap-3">
                @if(auth()->user()->role == 'admin')
                <div class="relative" x-data="{ showMenu: false }">
                    <button
                        @mouseenter="showMenu = true"
                        @mouseleave="showMenu = false"
                        class="p-2 rounded-lg bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-400 hover:bg-gray-200 dark:hover:bg-gray-600 transition"
                    >
                        <i class="fas fa-cog"></i>
                    </button>

                    <!-- Dropdown Menu -->
                    <div
                        x-show="showMenu"
                        @mouseenter="showMenu = true"
                        @mouseleave="showMenu = false"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 transform scale-95"
                        x-transition:enter-end="opacity-100 transform scale-100"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 transform scale-100"
                        x-transition:leave-end="opacity-0 transform scale-95"
                        class="absolute top-full left-0 mt-2 w-48 bg-white dark:bg-gray-800 rounded-lg shadow-lg border border-gray-200 dark:border-gray-700 py-2 z-50"
                        style="display: none;"
                    >
                        <button
                            @click="clearConversation()"
                            class="w-full text-right px-4 py-3 text-gray-700 dark:text-gray-300 hover:bg-red-50 dark:hover:bg-red-900/20 hover:text-red-600 dark:hover:text-red-400 transition-colors flex items-center gap-3"
                        >
                            <i class="fas fa-trash-alt text-red-500"></i>
                            <span>پاک کردن همه</span>
                        </button>
                    </div>
                </div>
                    @endif
            </div>

        </div>
    </div>

    <!-- Messages Container -->
    <div class="bg-white flex-1 dark:bg-gray-800 messages-container overflow-y-auto p-6 space-y-6" id="messagesContainer">


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
                    <div style="background:url('{{Storage::disk('users')->url('thumbs/'.$message->user->image)}}');background-size:cover" class="w-10 h-10 rounded-full bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center text-white font-semibold text-sm">

                    </div>
                </div>
            @elseif(auth()->user()->id != $message->user_id && $message->parent_id == null)
                <!-- Other User Message -->
                <div class="flex items-start gap-3">
                    <div  style="background:url('{{Storage::disk('users')->url('thumbs/'.$message->user->image)}}');background-size:cover" class="w-10 h-10 rounded-full bg-gradient-to-br from-green-500 to-emerald-600 flex items-center justify-center text-white font-semibold text-sm">

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
                    <div  style="background:url('{{Storage::disk('users')->url('thumbs/'.$message->user->image)}}');background-size:cover" class="w-10 h-10 rounded-full bg-gradient-to-br from-orange-500 to-red-600 flex items-center justify-center text-white font-semibold text-sm">

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
                            <div class="text-xs text-blue-600 dark:text-blue-300 mb-1">   پاسخ به {{\Modules\Conversation\Models\Conversation::where('id',$message->parent_id)->first()->user->name}}:</div>
                            <div class="text-sm text-blue-700 dark:text-blue-200">  {{\Modules\Conversation\Models\Conversation::where('id',$message->parent_id)->first()->body}}</div>
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
                    <div style="background:url('{{Storage::disk('users')->url('thumbs/'.$message->user->image)}}');background-size:cover" class="w-10 h-10 rounded-full bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center text-white font-semibold text-sm">

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
        </div>
    </div>
            <div id="replyContent" class="text-sm text-gray-700 dark:text-gray-200"></div>

    <!-- Message Input -->
    <div class="bg-white dark:bg-gray-800 md:rounded-b-2xl shadow-lg border-t border-gray-200 dark:border-gray-700 p-6">
        <div class="flex items-end gap-4">
           {{-- <button class="p-3 rounded-full bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-400 hover:bg-gray-200 dark:hover:bg-gray-600 transition">
                <i class="fas fa-paperclip"></i>
            </button>--}}
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
        let lastMessageId = {{$lastId ?? 0}};

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
        setInterval(function () {
            $.ajax({
                url: "{{ route('conversation.unseen') }}",
                type: "GET",
                data: { lastId: lastMessageId },
                success: function (msgs) {

                   renderMessages(msgs);
                }
            });
        }, 10000);
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
        const messagesContainer = document.getElementById('messagesContainer')
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

                //msg = JSON.stringify(msg);

                renderMessages(msg)
//                lastMessageId = msg.id;
            },
            error: function(msg){
                alert(msg.responseText)
            }

        });

        const currentTime = new Date().toLocaleTimeString('fa-IR', {
            hour: '2-digit',
            minute: '2-digit'
        });

        // Create message element
        const messageDiv = document.createElement('div');
        messageDiv.className = 'flex items-start gap-3 justify-end message-enter';



        // Clear input and reply
        messageInput.value = '';
        messageInput.style.height = 'auto';
        cancelReply();

        // Scroll to bottom
        messagesContainer.scrollTop = messagesContainer.scrollHeight;

    }

        // Example: set current user id
        const authUserId = {{auth()->user()->id}};



        function renderMessages(messages) {


        messages.forEach(message => {
        let html = "";

        // My Message
        if (message.user_id === authUserId && message.parent_id === null) {
        html = `
                <div class="flex items-start gap-3 justify-end">
                    <div class="flex-1 max-w-md">
                        <div class="flex items-center gap-2 mb-1 justify-end">
                            <span class="text-xs text-gray-500"> ${getTime()}</span>
                            <span class="text-sm font-medium text-gray-900 dark:text-white">شما</span>
                        </div>
                        <div class="bg-gradient-to-r from-blue-500 to-blue-600 rounded-2xl rounded-tl-sm p-4">
                            <p class="text-white">${message.body}</p>
                        </div>
                    </div>
                    <div style="background:url('/images/users/thumbs/${message.user.image}');background-size:cover" class="w-10 h-10 rounded-full bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center text-white font-semibold text-sm">

                    </div>
                </div>
                `;
    }
        // Other User Message
        else if (message.user_id !== authUserId && message.parent_id === null) {
        html = `
                <div class="flex items-start gap-3">
                    <div  style="background:url('/images/users/thumbs/${message.user.image}');background-size:cover" class="w-10 h-10 rounded-full bg-gradient-to-br from-green-500 to-emerald-600 flex items-center justify-center text-white font-semibold text-sm">

                    </div>
                    <div class="flex-1 max-w-md">
                        <div class="flex items-center gap-2 mb-1">
                            <span class="text-sm font-medium text-gray-900 dark:text-white"> ${message.user.name}</span>
                            <span class="text-xs text-gray-500">${getTime()}</span>
                        </div>
                        <div class="bg-gray-100 dark:bg-gray-700 rounded-2xl rounded-tr-sm p-4">
                            <p class="text-gray-900 dark:text-white">${message.body}</p>
                        </div>
                        <div class="flex items-center gap-3 mt-2">
                            <button onclick="replyToMessage('${message.user.name}', '${message.body}','${message.id}')" class="text-xs text-gray-500 hover:text-blue-600">
                                <i class="fas fa-reply ml-1"></i>پاسخ
                            </button>
                        </div>
                    </div>
                </div>
                `;
    }
        // Other User Reply
        else if (message.user_id !== authUserId && message.parent_id !== null) {

        html = `
                 <div class="flex items-start gap-3">
                    <div style="background:url('/images/users/thumbs/${message.user.image}');background-size:cover" class="w-10 h-10 rounded-full bg-gradient-to-br from-orange-500 to-red-600 flex items-center justify-center text-white font-semibold text-sm">

                    </div>
                    <div class="flex-1 max-w-md">
                        <div class="flex items-center gap-2 mb-1">
                            <span class="text-sm font-medium text-gray-900 dark:text-white"> ${message.user.name}</span>
                            <span class="text-xs text-gray-500 dark:text-gray-400">${getTime()}</span>
                        </div>
                        <div class="bg-gray-50 dark:bg-gray-600 rounded-lg p-3 mb-2 border-r-4 border-blue-500">
                            <div class="text-xs text-blue-600 dark:text-blue-300 mb-1">پاسخ به  ${message.parent?message.parent.user.name:''}:</div>
                            <div class="text-sm text-blue-700 dark:text-blue-200">${message.parent?message.parent.body : ''}</div>
                        </div>
                        <div class="bg-gray-100 dark:bg-gray-700 rounded-2xl rounded-tr-sm p-4">
                            <p class="text-gray-900 dark:text-white">${message.body}</p>
                        </div>
                        <div class="flex items-center gap-3 mt-2">
                            <button onclick="replyToMessage('${message.user.name}', '${message.body}','${message.id}')" class="text-xs text-gray-500 hover:text-blue-600">
                                <i class="fas fa-reply ml-1"></i>پاسخ
                            </button>
                        </div>
                    </div>
                </div>
                `;

    }
        // My Reply
        else {

        html = `
                <div class="flex items-start gap-3 justify-end">
                    <div class="flex-1 max-w-md">
                        <div class="flex items-center gap-2 mb-1 justify-end">
                            <span class="text-xs text-gray-500">${getTime()}</span>
                            <span class="text-sm font-medium text-gray-900 dark:text-white">شما</span>
                        </div>
                        <div class="bg-blue-50 dark:bg-blue-900/30 rounded-lg p-3 mb-2 border-r-4 border-gray-400">
                            <div class="text-xs text-blue-600 dark:text-blue-300 mb-1">پاسخ به  ${message.parent?message.parent.user.name:''}:</div>
                            <div class="text-sm text-blue-700 dark:text-blue-200">${message.parent?message.parent.body : ''}</div>
                        </div>
                        <div class="bg-gradient-to-r from-blue-500 to-blue-600 rounded-2xl rounded-tl-sm p-4">
                            <p class="text-white">${message.body}</p>
                        </div>
                    </div>
                    <div style="background:url('/images/users/thumbs/${message.user.image}');background-size:cover" class="w-10 h-10 rounded-full bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center text-white font-semibold text-sm">

                    </div>
                </div>
                `;
    }
        lastMessageId = message.id;

        messagesContainer.innerHTML += html;
    });
    }

    // Reply to message
    function replyToMessage(user, message,parentId) {
        replyingTo = { user, message , parentId };

        const replyPreview = document.getElementById('replyPreview');
        const replyToUser = document.getElementById('replyToUser');


        replyToUser.textContent = user;

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

    function getTime() {
        const now = new Date();
        const hours = String(now.getHours()).padStart(2, '0');   // H (00-23)
        const minutes = String(now.getMinutes()).padStart(2, '0'); // i (00-59)
        return `${hours}:${minutes}`;
    }

</script>
<script src="/js/modules/sweetalert2.js"></script>
@if(auth()->user()->role == 'admin')
<script>
    // Clear conversation function
    function clearConversation() {
        Swal.fire({
            title: 'پاک کردن همه مکالمات',
            text: 'آیا مطمئن هستید که می‌خواهید تمام مکالمات را پاک کنید؟ این عمل قابل بازگشت نیست.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#ef4444',
            cancelButtonColor: '#6b7280',
            confirmButtonText: 'بله، پاک کن',
            cancelButtonText: 'انصراف',
            reverseButtons: true,
            customClass: {
                popup: 'rtl-popup'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                // Show loading
                Swal.fire({
                    title: 'در حال پاک کردن...',
                    text: 'لطفاً صبر کنید',
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    showConfirmButton: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });

                // Send request to clear conversation
                fetch('/conversation/clear', {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest',
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    }
                })
                    .then(response => {
                        if (response.ok) {
                            Swal.fire({
                                title: 'موفق!',
                                text: 'تمام مکالمات با موفقیت پاک شدند.',
                                icon: 'success',
                                confirmButtonText: 'متوجه شدم',
                                customClass: {
                                    popup: 'rtl-popup'
                                }
                            });
                            lastMessageId  = 0;
                            messagesContainer.innerHTML = "";
                        } else {
                            throw new Error('خطا در پاک کردن مکالمات'+JSON.stringify(response) );
                        }
                    })
                    .catch(error => {
                        Swal.fire({
                            title: 'خطا!',
                            text:  'مشکلی در پاک کردن مکالمات رخ داد. لطفاً دوباره تلاش کنید.'+error,
                            icon: 'error',
                            confirmButtonText: 'متوجه شدم',
                            customClass: {
                                popup: 'rtl-popup'
                            }
                        });
                    });
            }
        });
    }
</script>
    @endif

