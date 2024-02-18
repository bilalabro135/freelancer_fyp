@extends('layouts.main')
@section('title','Chat')
@section('content')

    <style>
        #chatBox {
            border: 1px solid #eee;
            border-radius: 5px;
            padding: 2rem;
            height: 300px;
            overflow-y: auto;
        }
        .message {
            margin-bottom: 15px;
        }
        .from-them {
            text-align: left;
            color: blue;
        }
        .message strong {
            display: block;
            font-size: 0.9em;
            margin-bottom: 5px;
        }
        .message small {
            display: block;
            margin-top: 5px;
            opacity: 0.6;
        }

        .from-me {
            text-align: right;
        }
        .message-sequence p{
            font-size: 16px;
        }
        .message-sequence small{
            font-size: 13px;
        }
        .from-me .message-sequence {
            display: inline-block;
            width: 40%;
            color: #fff;
            background-color: #177dff;
            border-radius: 8px;
            padding: 13px 24px;
            position: relative;
        }
        .from-them .message-sequence {
            display: inline-block;
            width: 40%;
            color: #000;
            background-color: #f7f7f7;
            border-radius: 8px;
            padding: 13px 24px;
            position: relative;
        }
        .from-me .message-sequence:before{
            width: 0;
            height: 0;
            border-top: 10px solid transparent;
            border-bottom: 10px solid transparent;
            border-left: 10px solid #177dff;
            content: '';
            position: absolute;
            right: -10px;
            top: 12px;
        }

        .from-them .message-sequence:before{
            width: 0;
            height: 0;
            border-top: 10px solid transparent;
            border-bottom: 10px solid transparent;
            border-right: 10px solid #f7f7f7;
            content: '';
            position: absolute;
            left: -10px;
            top: 12px;
        }
        .attach-label{
            position: absolute;
            top: 20px;
            bottom: 0;
            left: 30px;
        }
        .attach-label i{
            font-size: 20px;
            cursor: pointer;
        }
    </style>
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">@yield('title')</h4>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title text-light">{{$user->name}}</h4>
                            <a  href="{{ route('home') }}" class="btn btn-primary btn-xs ml-auto">
                                <i class="fas fa-arrow-left"></i>
                            </a>
                        </div>
                    </div>
                <div id="chatBox">
                    <!-- Messages will be displayed here -->
                </div>
                <form id="messageForm" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="to_user_id" value="{{$user->id}}"> <!-- Make sure to replace RECIPIENT_USER_ID with actual ID -->
                    <div class="row align-items-center">
                        <div class="col-md-11 col-lg-11">
                            <div id="filePreviewContainer" class="file-preview-container ml-5 d-flex">
                                <!-- Image previews will be appended here -->
                            </div>

                            <textarea name="message" placeholder="Type your message here..." class="form-control pl-5 pt-4"></textarea>
                            <input type="file" class="d-none" id="blah" name="file_path[]" multiple="multiple">
                            <label for="blah" class="attach-label">
                                <i class="fa fa-paperclip" aria-hidden="true"></i>
                            </label>
                        </div>
                         <div class="col-md-1 col-lg-1">
                            <button type="submit" class="btn btn-primary">Send</button>
                        </div>
                    </div>
                </form>

                <script>

                    $(document).ready(function() {
                        $('#blah').change(function() {
                            $('#filePreviewContainer').empty(); // Clear existing previews
                            if (this.files) {
                                $.each(this.files, function(i, file) {
                                    var reader = new FileReader();
                                    reader.onload = function(e) {
                                        $('#filePreviewContainer').append($('<img>', {src: e.target.result, style: 'width: 100%; border-radius: 100px; height: 110px; max-width: 110px; margin: 10px 10px; object-fit: cover;'}));
                                    };
                                    reader.readAsDataURL(file);
                                });
                            }
                        });
                    });



                    function fetchMessages() {
                        $.ajax({
                            type: 'GET',
                            url: '{{ route("fetch.messages", ["userId" => $user->id]) }}', // Adjust as necessary
                            success: function(data) {
                                var shouldScroll = shouldAutoScroll();
                                $('#chatBox').empty();
                                $.each(data, function(index, message) {
                                    var messageClass = message.from_user_id == "{{ Auth::id() }}" ? 'from-me' : 'from-them';
                                    var messageContent = '<div class="message mb-5 ' + messageClass + '">';

                                    // Message text
                                    messageContent += '<div class="message-sequence"><p class="m-0">' + (message.message || '') + '</p></div>';

                                    // Check if filePath is not empty and is a valid JSON string
                                    if (message.file_path) {
                                        try {
                                            var filePaths = JSON.parse(message.file_path); // Parse the JSON to get an array of paths
                                            if (filePaths.length) {
                                                var imagesContent = '<div class="mt-3" style="width: 500px; display: block; margin-left: auto;">'; // Container for images
                                                filePaths.forEach(function(filePath) {
                                                    var fullPath = "{{ asset('/') }}" + filePath; // Adjust the path as necessary
                                                    imagesContent += '<img src="' + fullPath + '" width="150px" height="auto" style="background-color: #f7f7f7;padding: 20px 20px;border-radius: 10px;margin-bottom: 20px;">';
                                                });
                                                imagesContent += '</div>';
                                                messageContent += imagesContent; // Append images to the message content
                                            }
                                        } catch(e) {
                                            console.error("Error parsing file paths: ", e);
                                        }
                                    }

                                    // Append created_at time
                                    messageContent += '<small>' + message.created_at + '</small>';
                                    messageContent += '</div>'; // Closing div for the message

                                    $('#chatBox').append(messageContent);
                                });
                                if (shouldScroll) {
                                    scrollToEnd();
                                }
                            }
                        });
                    }


                    function shouldAutoScroll() {
                        var chatBox = document.getElementById("chatBox");
                        // Check if the user is scrolled within 100 pixels of the bottom
                        return (chatBox.scrollHeight - chatBox.scrollTop - chatBox.clientHeight) < 100;
                    }

                    function scrollToEnd() {
                        var chatBox = document.getElementById("chatBox");
                        chatBox.scrollTop = chatBox.scrollHeight;
                    }

                    $(document).ready(function() {
                        fetchMessages(); // Fetch messages when the page loads
                        setInterval(fetchMessages, 10000000); // Adjust the timing as needed

                        $('#messageForm').submit(function(e) {
                            e.preventDefault();

                            var formData = new FormData(this);

                            $.ajax({
                                type: 'POST',
                                url: '{{ route("send.message") }}',
                                data: formData,
                                cache: false,
                                contentType: false,
                                processData: false,
                                success: function(data) {
                                    $('textarea[name="message"]').val('');
                                    $('#blah').val('');
                                    $('#filePreviewContainer').empty();
                                    fetchMessages(); // Optionally, adjust this to not force fetch if you expect immediate server push updates
                                    scrollToEnd(); // Ensure we scroll to end after sending a message
                                },
                                error: function(data) {
                                    console.log('Error:', data);
                                }
                            });
                        });
                    });
                    </script>

                </div>
            </div>
        </div>
    </div>
@endsection