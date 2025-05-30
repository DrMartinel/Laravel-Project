<div class="">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <strong>Chat room </strong> can be used to create chat room in your app.
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="col-lg-1" style="padding-bottom: 5px;">
                <div class="text-center">
                    <a data-toggle="modal" class="btn btn-primary" href="#modal-form">Create new chat room</a>
                </div>
                <div id="modal-form" class="modal fade" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-sm-6 b-r">
                                        <h3 class="m-t-none m-b">Create your group</h3>

                                        <p>Improve your expirience with messages</p>

                                        <form role="form" method="POST" action={{ route('createConversation') }}>
                                            @csrf
                                            <div class="form-group">
                                                <label>Group Name</label>
                                                <input type="text" placeholder="Enter group name"
                                                    class="form-control" name="GroupName" required minlength="1"
                                                    maxlength="20">
                                            </div>
                                            <div class="form-group">
                                                <label>Group members</label>
                                                <select data-placeholder="  " class="chosen-select"
                                                    name="participants[]" multiple tabindex="4" required>
                                                    @foreach ($users as $user)
                                                        @if ($user->id !== auth()->user()->id)
                                                            <option value="{{ $user->id }}">{{ $user->name }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Create Group</button>
                                        </form>
                                    </div>
                                    <div class="col-sm-6">
                                        <h4>Cant find your friend?</h4>
                                        <p>Not our fault!!!</p>
                                        <p class="text-center">
                                            <a href="">
                                                <image src={{ asset('img/sticker.jpg') }}></image>
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ibox chat-view">
                <div class="ibox-title">
                    <small class="pull-right text-muted">Last message: Mon Jan 26 2015 - 18:39:23</small>
                    Chat room panel
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-md-9">
                            <div>
                                @if ($currentChatId === 0)
                                    <div class="alert alert-warning">
                                        <strong>Warning!</strong> Please create a chat room to start chatting.
                                    </div>
                                @endif
                            </div>
                            <div class="chat-discussion">
                                @foreach ($currentChatMessages as $message)
                                    @if ($message->sender_id === auth()->user()->id)
                                        <div class="chat-message right user-messages" wire:key="{{ $message->id }}">
                                            <img class="message-avatar" src="img/a{{ random_int(1, 5) }}.jpg"
                                                alt="">
                                            <div class="message">
                                                <a class="message-author" href="#">
                                                    {{ $message->sender->name }}</a>
                                                <span class="message-date"> {{ $message->updated_at }} </span>
                                                <span class="message-content"> {{ $message->content }} </span>
                                            </div>
                                            <div class="edit-button" hidden="true">Edit button</div>
                                        </div>
                                    @else
                                        <div class="chat-message left" wire:key="{{ $message->id }}">
                                            <img class="message-avatar" src="img/a{{ random_int(1, 5) }}.jpg"
                                                alt="">
                                            <div class="message">
                                                <a class="message-author" href="#">
                                                    {{ $message->sender->name }}</a>
                                                <span class="message-date"> {{ $message->updated_at }} </span>
                                                <span class="message-content"> {{ $message->content }} </span>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-3" style="height: 500px; overflow-y: scroll;">
                            <div class="chat-users">
                                <div class="users-list">
                                    @foreach ($conversations as $conversation)
                                        <div class="chat-user"
                                            wire:click="selectConversation({{ $conversation->conversation_id }})">
                                            <img class="chat-avatar" src="img/a{{ random_int(1, 5) }}.jpg"
                                                alt="">
                                            <div class="chat-user-name">
                                                <a href="#">{{ $conversation->conversation->name }}</a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <form class="chat-message-form" wire:submit="sendMessage">
                                <div class="form-group">
                                    <textarea class="form-control message-input" name="message" placeholder="Enter message text" style="resize: none;"
                                        wire:model="newMessage"></textarea>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @script
        <script>
            document.addEventListener('livewire:initialized', () => {
                //This code of block is to set the chat always at the bottom
                let isInitialLoad = true;

                // Add textarea enter key handler
                document.querySelector('.message-input').addEventListener('keydown', (e) => {
                    if (e.key === 'Enter' && !e.shiftKey) {
                        e.preventDefault();
                        $wire.sendMessage();
                    }
                });

                const chatDiscussion = document.querySelector('.chat-discussion');

                function scrollToBottom() {
                    const targetScroll = chatDiscussion.scrollHeight;
                    if (chatDiscussion) {
                        if (isInitialLoad) {
                            chatDiscussion.scrollTop = targetScroll;
                            isInitialLoad = false;
                        } else {
                            chatDiscussion.scrollTo({
                                top: targetScroll,
                                behavior: 'smooth'
                            });
                        }
                    }
                }

                scrollToBottom();
                //End of the code block

                // This function initializes the Chosen plugin on elements matching the selector once the livewire component is updated
                function initializeChosen(selector = '.chosen-select') {
                    if (typeof jQuery !== 'undefined' && typeof jQuery.fn.chosen !== 'undefined') {
                        const elements = $(selector);

                        if (elements.length > 0) {
                            try {
                                elements.chosen('destroy');
                                elements.chosen({
                                    width: '100%',
                                    placeholder_text_multiple: 'Select Options...',
                                    no_results_text: "Oops, nothing found!"
                                });
                            } catch (e) {
                                console.error('Error during Chosen destroy/init:', e);
                            }
                        }
                    } else {
                        console.error("jQuery or jQuery.chosen not available!");
                    }
                }

                Livewire.on('newMessages', () => {
                    console.log('New messages received');
                    setTimeout(() => {
                        scrollToBottom();
                        initializeChosen();
                    }, 50);
                });

                const utilsButton = document.querySelector('.edit-button');

                document.querySelectorAll('.user-messages').forEach(element => {
                    element.addEventListener('mouseenter', () => {
                        console.log('Mouse over user message');
                    });

                    element.addEventListener('mouseleave', () => {
                        console.log('Mouse out user message');
                    });
                });

                let currentChannel = null;

                Livewire.on('chat-room-changed', ({
                    newRoomId,
                    oldRoomId
                }) => {
                    setTimeout(() => {
                        scrollToBottom();
                        initializeChosen();
                    }, 100);

                    if (currentChannel) {
                        currentChannel.leave();
                    }

                    if (newRoomId) {
                        currentChannel = Echo.private(`chat.${newRoomId}`)
                            .listen('.message.sent', (e) => {
                                console.log('Received message:', e);
                                $wire.handleIncomingMessage(e);
                            });
                    }
                });
            });
        </script>
        <script>
            $('.chosen-select').chosen({
                width: "100%"
            });
        </script>
    @endscript
</div>
