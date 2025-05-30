

<div id="chat-circle" class="btn btn-raised">
    <div id="chat-overlay"></div>
    <i class="fa fa-comments" aria-hidden="true"></i>
</div>

<div class="chat-box">
    <div class="chat-box-header">
        ChatBot
        <span class="chat-box-toggle"><i class="fa fa-window-close"></i></span>
    </div>
    <div class="chat-box-body">
        <div class="chat-box-overlay">
        </div>
        <div class="chat-logs">

        </div><!--chat-log -->
    </div>
    <div class="chat-input">
        <form>
            @csrf
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <input type="text" id="chat-input" placeholder="Send a message..." />
            <button type="button" class="chat-submit" id="chat-submit">
                <i class="fa fa-paper-plane"></i>
            </button>
        </form>
    </div>
</div>
